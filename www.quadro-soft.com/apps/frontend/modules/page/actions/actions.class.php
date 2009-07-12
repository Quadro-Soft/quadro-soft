<?php

/**
 * page actions.
 *
 * @package    quadrosoft
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class pageActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    public function executeIndex(sfWebRequest $request)
    {
        
    }
    
    public function executeError404(sfWebRequest $request)
    {
        //$this->redirect('page/index');
        $this->redirect('@homepage');
    }
    
    public function executeWhatWeDo(sfWebRequest $request)
    {
        
    }
    
    public function executeHowWeWork(sfWebRequest $request)
    {
        
    }
    
    public function executeAboutUs(sfWebRequest $request)
    {
        
    }
    
    public function executeOurWorks(sfWebRequest $request)
    {
        
    }
    
    public function executeContact(sfWebRequest $request)
    {
        $this->contactName = '';
        $this->contactEmail = '';
        $this->contactCompany = '';
        $this->contactPhone = '';
        $this->contactMessage = '';
        
        $this->isMessage = false;
        $this->isError = false;
        
        
        if ($request->isMethod(sfRequest::POST))
        {
            //$sess_co = $this->getUser(); ???
            // session_name: from factories
            $sess_coo = $request->getCookie('sf', null);
            
            $name = myStringPeer::trim($request->getPostParameter('contactName', null));
            $email = myStringPeer::trim($request->getPostParameter('contactEmail', null));
            $company = myStringPeer::trim($request->getPostParameter('contactCompany', null));
            $phone = myStringPeer::trim($request->getPostParameter('contactTelephone', null));
            $message = myStringPeer::trim($request->getPostParameter('contactMessage', null));
            
            
            
            $criteria = new Criteria();
            //$criteria->add(ContactRequestPeer::SESS_COO, $sess_coo, Criteria::EQUAL);
            $criteria->add(ContactRequestPeer::NAME, $name, Criteria::EQUAL);
            $criteria->add(ContactRequestPeer::EMAIL, $email, Criteria::EQUAL);
            $criteria->add(ContactRequestPeer::COMPANY, $company, Criteria::EQUAL);
            $criteria->add(ContactRequestPeer::PHONE, $phone, Criteria::EQUAL);
            $criteria->add(ContactRequestPeer::MESSAGE, $message, Criteria::EQUAL);
            $criteria->add(ContactRequestPeer::CREATED_AT, myStringPeer::time2mysql(time() - 3600 * 24), Criteria::GREATER_THAN);
            
            $contactRequest = ContactRequestPeer::doSelectOne($criteria);
            
            if ($contactRequest != null)
            {
                // if all data exists in database
                return sfView::SUCCESS;
            }
            
            
            
            
            
            if ($sess_coo == null)
            {
                // Session cookie
                $this->isError = true;
                $this->error = "Send error<br />Cookie is disabled";
            }
            else if (
                myStringPeer::isNullOrEmpty($name)
                ||
                myStringPeer::isNullOrEmpty($email)
                ||
                myStringPeer::isNullOrEmpty($message)
            )
            {
                // Request field
                $this->isError = true;
                $this->error = "Please fill all requred fields";
            }
            else
            {
                // Message from this session (last 3 minute)
                $criteria = new Criteria();
                $criteria->add(ContactRequestPeer::SESS_COO, $sess_coo, Criteria::EQUAL);
                $criteria->add(ContactRequestPeer::CREATED_AT, myStringPeer::time2mysql(time() - 60 * 3), Criteria::GREATER_THAN);
                
                $contactRequest = ContactRequestPeer::doSelectOne($criteria);
                if ($contactRequest != null)
                {
                    $this->isError = true;
                    $this->error = "You have sent message,<br />next message you can send in a few minutes.";
                }
            }
            
            if ($this->isError)
            {
                $this->contactName = myStringPeer::special($name);
                $this->contactEmail = myStringPeer::special($email);
                $this->contactCompany = myStringPeer::special($company);
                $this->contactPhone = myStringPeer::special($phone);
                $this->contactMessage = myStringPeer::special($message);
            }
            else
            {
                $contact = new ContactRequest();
                $contact->setSessCoo($sess_coo);
                $contact->setName($name);
                $contact->setEmail($email);
                $contact->setCompany($company);
                $contact->setPhone($phone);
                $contact->setMessage($message);
                $contact->save();
                
                $this->isMessage = true;
                $this->message = myStringPeer::special($name) . ",<br/>thank you for your message.";
            }
            
            return sfView::SUCCESS;
        }
    }
    
    
    public function preExecute()
    {
        $this->titleContent = null;
        $this->title = null;
        
        $metaT = '';
        $metaK = '';
        $metaD = '';
        
        $c = new Criteria();
        //$c->add(PagePeer::PARENT_ID, null, Criteria::ISNOTNULL);
        $c->add(PagePeer::URI, sfContext::getInstance()->getRouting()->getCurrentInternalUri(true));
        $c->add(PagePeer::IS_ACTIVE, true);
        $page = PagePeer::doSelectOne($c);
        
        $this->currentPage = $page;
        $this->rootPage = null;
        
        
        while ($page != null)
        {
            $metaT = $page->getTitle() . ($metaT == '' ? '' : ' / ') . $metaT;
            $metaK = $page->getMetaKeywords() . ($metaK == '' ? '' : ', ') . $metaK;
            $metaD = $page->getMetaDescription() . ($metaD == '' ? '' : ' '). $metaD;
            
            if ($page->getParentId() == null)
            {
                $this->rootPage = $page;
                $page = null;
            }
            else
            {
                $page = PagePeer::retrieveByPk($page->getParentId());
            }
        }
        
        $response = $this->getResponse();
        if ($metaT != '') $response->setTitle($metaT);
        if ($metaK != '') $response->addMeta('keywords', $metaK);
        if ($metaD != '') $response->addMeta('description',  $metaD);;
        
        if ($this->currentPage != null/* && $this->currentPage->getParentId() == $this->rootPage->getId()*/)
        {
            $this->title = $this->currentPage->getTitle();
            
            $this->titleContent = array(
                'title'  => $this->currentPage->getTitle(),
                'bgUrl'  => preg_replace("/^@page_([\w\-]+)$/", "/images/pic-\${1}.jpg", $this->currentPage->getUri()),
                'imgSrc' => preg_replace("/^@page_([\w\-]+)$/", "/images/ttl-\${1}.png", $this->currentPage->getUri())
            );
        }
    }
    
    public function postExecute()
    {
        
    }
}

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
    
    public function executeWhatWeDo(sfWebRequest $request)
    {
        
    }
    
    public function executeHowWeWork(sfWebRequest $request)
    {
        
    }
    
    public function executeAboutUs(sfWebRequest $request)
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
            $name = myStringPeer::trim($request->getPostParameter('contactName', null));
            $email = myStringPeer::trim($request->getPostParameter('contactEmail', null));
            $company = myStringPeer::trim($request->getPostParameter('contactCompany', null));
            $phone = myStringPeer::trim($request->getPostParameter('contactTelephone', null));
            $message = myStringPeer::trim($request->getPostParameter('contactMessage', null));
            
            //$sess_co = $this->getUser(); ???
            // session_name: from factories
            $sess_coo = $request->getCookie('sf', null);
            
            if ($sess_coo == null)
            {
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
                $this->isError = true;
                $this->error = "Send error<br />Please fill all requred fields";
            }
            else
            {
                // Check last message from BD
                $criteria = new Criteria();
                $criteria->add(ContactRequestPeer::SESS_COO, $sess_coo, Criteria::EQUAL);
                $criteria->add(ContactRequestPeer::CREATED_AT, myStringPeer::time2mysql(time() - 120), Criteria::GREATER_THAN);
                
                $contactRequest = ContactRequestPeer::doSelectOne($criteria);
                if ($contactRequest != null)
                {
                    $this->isError = true;
                    $this->error = "Вы уже отправили сообщение,<br /> Попробуйте позже (через несколько минут)";
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
                $criteria = new Criteria();
                //$criteria->add(ContactRequestPeer::SESS_COO, $sess_coo, Criteria::EQUAL);
                $criteria->add(ContactRequestPeer::NAME, $name, Criteria::EQUAL);
                $criteria->add(ContactRequestPeer::EMAIL, $email, Criteria::EQUAL);
                $criteria->add(ContactRequestPeer::COMPANY, $company, Criteria::EQUAL);
                $criteria->add(ContactRequestPeer::PHONE, $phone, Criteria::EQUAL);
                $criteria->add(ContactRequestPeer::MESSAGE, $message, Criteria::EQUAL);
                
                $contactRequest = ContactRequestPeer::doSelectOne($criteria);
                
                if ($contactRequest != null)
                {
                    $contact = new ContactRequest();
                    $contact->setSessCoo($sess_coo);
                    $contact->setName($name);
                    $contact->setEmail($email);
                    $contact->setCompany($company);
                    $contact->setPhone($phone);
                    $contact->setMessage($message);
                    
                    $contact->save();
                }
                $this->isMessage = true;
                $this->message = myStringPeer::special($name) . ",<br/> thank you for your message.";
            }
            
            return sfView::SUCCESS;
        }
    }
    
}

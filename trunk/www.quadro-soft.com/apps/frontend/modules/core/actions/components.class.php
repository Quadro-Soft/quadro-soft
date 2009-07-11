<?php

/**
 * core components.
 *
 * @package    quadrosoft
 * @subpackage core
 * @author     Kotlyarov
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class coreComponents extends sfComponents
{
    public function executeMenu(sfWebRequest $request)
    {
        $currentInternalUri = sfContext::getInstance()->getRouting()->getCurrentInternalUri(true);
        
        $menuItems = array();
        
        $uri = '@page_what-we-do';
        $menuItems[$uri] = array('title' => 'What we do', 'url' => $this->getController()->genUrl($uri), 'is_current' => ($currentInternalUri == $uri));
        
        $uri = '@page_how-we-work';
        $menuItems[$uri] = array('title' => 'How we work', 'url' => $this->getController()->genUrl($uri), 'is_current' => ($currentInternalUri == $uri));
        
        $uri = '@page_about-us';
        $menuItems[$uri] = array('title' => 'About Us', 'url' => $this->getController()->genUrl($uri), 'is_current' => ($currentInternalUri == $uri));
        
        $uri = '@page_contact';
        $menuItems[$uri] = array('title' => 'Contact', 'url' => $this->getController()->genUrl($uri), 'is_current' => ($currentInternalUri == $uri));
        
        $this->items = $menuItems;
    }
}

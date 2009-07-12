<?php

/**
 * core components.
 *
 * @package    quadrosoft
 * @subpackage page
 * @author     Kotlyarov
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class pageComponents extends sfComponents
{
    public function executeMenu(sfWebRequest $request)
    {
        $this->items = array();
        $menuItems = array();
        
        $currentInternalUri = sfContext::getInstance()->getRouting()->getCurrentInternalUri(true);
        
        $c = new Criteria();
        $c->add(PagePeer::PARENT_ID, null, Criteria::ISNULL);
        $c->add(PagePeer::IS_ACTIVE, true);
        $rootItem = PagePeer::doSelectOne($c);
        
        if ($rootItem != null)
        {
            $c = new Criteria();
            $c->add(PagePeer::PARENT_ID, $rootItem->getId());
            $c->add(PagePeer::IS_ACTIVE, true);
            $c->addAscendingOrderByColumn(PagePeer::POS);
            $items = PagePeer::doSelect($c);
        }
        
        foreach ($items as $item)
        {
            $menuItems[$item->getUri()] = array(
                'title'      => $item->getTitle(),
                'is_current' => ($currentInternalUri == $item->getUri())
            );
        }
        
        $this->items = $menuItems;
    }
}

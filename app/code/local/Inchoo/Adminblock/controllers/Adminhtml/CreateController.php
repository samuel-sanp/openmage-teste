<?php

class Inchoo_Adminblock_Adminhtml_CreateController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
    die("DIE TEST");
        $this->loadLayout()
            ->_addContent(
            $this->getLayout()
            ->createBlock('inchoo_adminblock/adminhtml_adminblock')
            ->setTemplate('inchoo/adminblock.phtml')
            );
            return $this->renderLayout();
    }

    protected function _isAllowed() {
        return true;
    }
}
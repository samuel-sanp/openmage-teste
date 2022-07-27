<?php

class Inchoo_Adminblock_Adminhtml_CreateController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        // $this->loadLayout()
        //     ->_addContent(
        //     $this->getLayout()
        //     ->createBlock('inchoo_adminblock/adminhtml_adminblock')
        //     ->setTemplate('inchoo/adminblock.phtml')
        //     );
        //     return $this->renderLayout();

        $this->loadLayout();
        $block = $this->getLayout()->createBlock('inchoo_adminblock/adminhtml_adminblock');
        $this->getLayout()->getBlock('content')->append($block);
        return $this->renderLayout();

        // $this->loadLayout();
        // return $this->renderLayout();
    }

    protected function _isAllowed() {
        return true;
    }
}
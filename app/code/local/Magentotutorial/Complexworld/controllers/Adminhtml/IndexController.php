<?php

class Magentotutorial_Complexworld_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {   
        // $this->loadLayout()
        // ->_addContent(
        //     $this->getLayout()
        //     ->createBlock('magentotutorial_complexworld/adminhtml_complexworld')
        //     ->setTemplate('magentotutorial_complexworld/complexworld.phtml')
        // );
        // return $this->renderLayout();

        // $this->loadLayout();
        // $block = $this->getLayout()->createBlock('magentotutorial_complexworld/adminhtml_complexworld');
        // $this->getLayout()->getBlock('content')->append($block);
        // return $this->renderLayout();

        $this->loadLayout();
        return $this->renderLayout();
    }

    protected function _isAllowed() {
        return true;
    }
}
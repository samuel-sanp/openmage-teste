<?php

class Magentotutorial_Complexworld_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {   
        $this->loadLayout();
        return $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    protected function _isAllowed() {
        return true;
    }
}
<?php

class Magentotutorial_Complexworld_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {  
        $this->loadLayout();
        return $this->renderLayout();
    }

    protected function _initPost()
    {
        $postCode = $this->getRequest()->getParam('post_code', null);
        $post = Mage::getModel('complexworld/eavblogpost')->load($postCode);

        Mage::register('current_post_instance', $post);
        return $post;
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {   
        $this->_initPost();
        $this->loadLayout();
        return $this->renderLayout();
    }


    protected function _isAllowed() {
        return true;
    }
}
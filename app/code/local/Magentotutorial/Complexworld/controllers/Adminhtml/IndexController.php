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
        /**
         * @var Magentotutorial_Complexworld_Helper_Data $helper
         */
        $helper = Mage::helper('magentotutorial_complexworld');
        $postCode = $this->getRequest()->getParam('post_code', null);

        $post = $helper->_initPost($postCode);

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

    public function deleteAction()
    {
        $post = $this->_initPost();
        try {
            $post->delete();
            $this->_getSession()->addSuccess($this->__('The post has been deleted.'));
        } catch (Exception $e) {
            $this->_getSession()->addError($e->getMessage());
        }
        $this->_redirect('*/*/');
        return;
    }

    public function deleteManyAction()
    {

        try {
            $codes = $this->getRequest()->getPost('codes');

            foreach ($codes as $code) {
                $post = Mage::getModel('complexworld/eavblogpost')->load($code);
                $post->delete();
            }

            $this->_getSession()->addSuccess($this->__('The posts has been deleted.'));
        } catch (Exception $e) {
            $this->_getSession()->addError($e->getMessage());
        }
        
        $this->_redirect('*/*/');
        return;

    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();

        if ($data) {
            try {
                $post = $this->_initPost();
                $post->addData($data);
        
                // TODO: implement validation
        
                $post->save();
        
                // display success message
                $this->_getSession()->addSuccess(
                    Mage::helper('magentotutorial_complexworld')->__('The post has been saved.')
                );
        
                // clear previously saved data from session
                $this->_getSession()->setFormData(false);
        
                $this->_redirect('*/*');
                return;
            } catch (Mage_Core_Exception $e) {
                Mage::logException($e);
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                Mage::logException($e);
                $this->_getSession()->addError($this->__('An error occurred during saving a post %s', $e->getMessage()));
            }
    
            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array('post_code' => $this->getRequest()->getParam('post_code')));
            return;
        }
    }


    protected function _isAllowed() {
        return true;
    }
}
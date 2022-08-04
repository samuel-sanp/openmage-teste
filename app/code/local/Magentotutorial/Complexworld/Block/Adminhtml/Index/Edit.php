<?php

class Magentotutorial_Complexworld_Block_Adminhtml_Index_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->getPost()->isOverlay()) { // save mode
            $this->removeButton('reset');
        }

    }

    protected function _construct()
    {
        parent::_construct();
        $this->_objectId = 'post_code';
        $this->_blockGroup = 'magentotutorial_complexworld';
        $this->_controller = 'adminhtml_index';
    }

    /**
     * Get Post
     *
     * @return Magentotutorial_Complexworld_Model_Eavblogpost
     */
    public function getPost()
    {
        return Mage::registry('current_post_instance');
    }


    /**
     * Return header text depending on creating/editing action
     *
     * @return string
     */
    public function getHeaderText()
    {
        if ($this->getPost()->getId()) {
            return $this->__('%s', $this->escapeHtml($this->getPost()->getTitle()));
        } else {
            return $this->__('New Post');
        }
    }

    /**
     * Return save url for edit form
     *
     * @return string
     */
    public function getSaveUrl()
    {
        return $this->getUrl('*/*/save', array('_current'=>true, 'back'=>null));
    }
}
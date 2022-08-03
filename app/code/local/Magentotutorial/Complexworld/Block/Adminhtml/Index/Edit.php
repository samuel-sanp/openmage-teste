<?php

class Magentotutorial_Complexworld_Block_Adminhtml_Index_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

    }

    protected function _construct()
    {
        parent::_construct();
        $this->_objectId = 'post_code';
        $this->_blockGroup = 'magentotutorial_complexworld';
        $this->_controller = 'adminhtml_index';
    }

    /**
     * Get job
     *
     * @return Aoe_Scheduler_Model_Job
     */
    public function getPost()
    {
        return Mage::registry('current_post_instance');
    }


    /**
     * Return translated header text depending on creating/editing action
     *
     * @return string
     */
    public function getHeaderText()
    {
        if ($this->getPost()->getId()) {
            return $this->__('Post "%s"', $this->escapeHtml($this->getPost()->getTitle()));
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
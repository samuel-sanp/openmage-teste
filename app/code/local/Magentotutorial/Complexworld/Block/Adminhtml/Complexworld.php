<?php

class Magentotutorial_Complexworld_Block_Adminhtml_Complexworld extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {   
        $this->_blockGroup = 'magentotutorial_complexworld';
        $this->_controller = 'adminhtml_index';
        $this->_headerText = $this->__('Posts');
        parent::__construct();
    }

    public function getPosts()
    {
        $weblog = Mage::getModel('complexworld/eavblogpost');
        $entries = $weblog->getCollection()
            ->addAttributeToSelect('title')
            ->addAttributeToSelect('content')
            ->addAttributeToSelect('date');
        $entries->load();

        return $entries;
    }

    protected function _prepareLayout()
    {
        $this->_addButton('remove', array(
            'label' => $this->__('Remove'),
            'onclick' => "setLocation('{$this->getUrl('*/*/testAction')}')",
        ));
        return parent::_prepareLayout();
    }
}
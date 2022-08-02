<?php

class Magentotutorial_Complexworld_Block_Adminhtml_Complexworld extends Mage_Adminhtml_Block_Widget_Container
{
    public function getPosts()
    {
        $weblog = Mage::getModel('complexworld/eavblogpost');
        $entries = $weblog->getCollection()
            ->addAttributeToSelect('title')
            ->addAttributeToSelect('content')
            ->addAttributeToSelect('date');
        // $entries->load();

        return $entries;
    }

    protected function _prepareLayout()
    {
        // $this->removeButton('add');
        $this->_addButton('add_new', array(
            'label' => $this->__('Add'),
            'onclick' => "setLocation('{$this->getUrl('*/*/testAction')}')",
        ));
        $this->_addButton('edit', array(
            'label' => $this->__('Edit'),
            'onclick' => "setLocation('{$this->getUrl('*/*/testAction')}')",
        ));
        $this->_addButton('remove', array(
            'label' => $this->__('Remove'),
            'onclick' => "setLocation('{$this->getUrl('*/*/testAction')}')",
        ));
        return parent::_prepareLayout();
    }
}
<?php

class Magentotutorial_Complexworld_Block_Adminhtml_Index_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('complexworld_grid');
        $this->_filterVisibility = false;
        $this->_pagerVisibility = false;
    }

    public function _prepareCollection()
    {
        /** @var Magentotutorial_Complexworld_Model_Resource_Eavblogpost_Collection $collection */
        $collection = Mage::getSingleton('complexworld/eavblogpost')->getCollection()
            ->addAttributeToSelect('title')
            ->addAttributeToSelect('content')
            ->addAttributeToSelect('date');

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }


    protected function _prepareColumns()
    {
        $this->addColumn(
            'title',
            array(
                'header'   => $this->__('Post Title'),
                'index'    => 'title',
                'sortable' => false,
            )
        );
        $this->addColumn(
            'content',
            array(
                'header'   => $this->__('Content'),
                'index'    => 'content',
                'sortable' => false,
            )
        );
        $this->addColumn(
            'date',
            array(
                'header'   => $this->__('Date'),
                'index'    => 'date',
                'sortable' => false,
            )
        );
        return parent::_prepareColumns();
    }


    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('codes');
        $this->getMassactionBlock()->addItem(
            'enable',
            array(
                'label' => $this->__('Enable'),
                'url'   => $this->getUrl('*/*/enable'),
            )
        );
        return $this;
    }

}
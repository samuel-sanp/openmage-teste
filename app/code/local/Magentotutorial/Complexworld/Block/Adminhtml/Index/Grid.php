<?php

class Magentotutorial_Complexworld_Block_Adminhtml_Index_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('complexworld_grid');
    }

    public function _prepareCollection()
    {
        /** @var Magentotutorial_Complexworld_Model_Resource_Eavblogpost_Collection $collection */
        $collection = Mage::getSingleton('complexworld/eavblogpost')->getCollection()
            ->addAttributeToSelect('title')
            ->addAttributeToSelect('content')
            ->addAttributeToSelect('date');

        // $collection->getSelect()->where();

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
        $this->addColumnAfter(
            'content',
            array(
                'header'   => $this->__('Content'),
                'index'    => 'content',
                'sortable' => false,
            ),
            'date'
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
            'remove',
            array(
                'label' => $this->__('Remove'),
                'url'   => $this->getUrl('*/*/deleteMany'),
            )
        );


        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('post_code' => $row->getId()));
    }
}
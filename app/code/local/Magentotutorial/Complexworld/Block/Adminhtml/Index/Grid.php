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
            ->addAttributeToSelect('entity_id')
            ->addAttributeToSelect('title')
            ->addAttributeToSelect('content')
            ->addAttributeToSelect('is_active')
            ->addAttributeToSelect('date');

        // $collection->getSelect()->where();

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }


    protected function _prepareColumns()
    {
        $this->addColumn(
            'id',
            array(
            'header' => $this->__('Id'),
            'index' => 'entity_id',
            'width' => 50,
            'sortable' => false,
        )
        );
        $this->addColumn(
            'title',
            array(
            'header' => $this->__('Title'),
            'index' => 'title',
            'sortable' => false,
        )
        );
        $this->addColumnAfter(
            'date',
            array(
            'header' => $this->__('Date'),
            'index' => 'date',
            'width' => 150,
            'sortable' => false,
            ),
            'content'
        );
        $this->addColumn(
            'content',
            array(
            'header' => $this->__('Content'),
            'index' => 'content',
            'sortable' => false,
        )
        );
        $this->addColumn(
            'is_active',
            array(
            'header' => $this->__('Status'),
            'index' => 'is_active',
            'sortable' => false,
            'width' => 200,
            'frame_callback' => array($this, 'decorateStatus'),
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
            'url' => $this->getUrl('*/*/deleteMany'),
        )
        );
        $this->getMassactionBlock()->addItem(
            'disable',
            array(
                'label' => $this->__('Disable'),
                'url'   => $this->getUrl('*/*/disable'),
            )
        );
        $this->getMassactionBlock()->addItem(
            'enable',
            array(
                'label' => $this->__('Enable'),
                'url'   => $this->getUrl('*/*/enable'),
            )
        );


        return $this;
    }

        /**
     * Decorate status column values
     *
     * @param $value
     *
     * @return string
     */
    public function decorateStatus($value)
    {
        $cell = sprintf(
            '<span class="grid-severity-%s"><span>%s</span></span>',
            $value ? 'notice' : 'critical',
            $this->__($value ? 'Enabled' : 'Disabled')
        );
        return $cell;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('post_code' => $row->getId()));
    }
}
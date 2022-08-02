<?php

class My_Blog_Model_Resource_Eavmyblogpost extends Mage_Eav_Model_Entity_Abstract
{
    protected function _construct()
    {
        $resource = Mage::getSingleton('core/resource');
        $this->setType('blog_eavmyblogpost');
        $this->setConnection(
            $resource->getConnecction('blog_read'),
            $resource->getConnecction('blog_write')
        );

    }
}
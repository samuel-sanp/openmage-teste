<?php

class My_Blog_Model_Resource_Eavmyblogpost_Collection extends Mage_Eav_Model_Entity_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('blog/eavmyblogpost');
    }
}
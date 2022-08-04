<?php

class Magentotutorial_Complexworld_Model_Eavblogpost extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('complexworld/eavblogpost');
    }

    public function isOverlay()
    {
        $data =$this->getData('entity_id');
        if (empty($data)) return false;

        return true;
    }
}
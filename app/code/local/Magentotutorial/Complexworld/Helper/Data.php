<?php

class Magentotutorial_Complexworld_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function _initPost($param): Magentotutorial_Complexworld_Model_Eavblogpost
    {
        $model = Mage::getModel('complexworld/eavblogpost')->load($param);
        return $model;
    }
}
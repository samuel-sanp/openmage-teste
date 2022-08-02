<?php

class Magentotutorial_Complexworld_Block_Adminhtml_Complexworld extends Mage_Core_Block_Template
{

    protected function _construct()
    {
        $this->setTemplate('magentotutorial_complexworld/complexworld.phtml');
    }

    public function getName()
    {
        return ["name" => "samuel"];
    }
}
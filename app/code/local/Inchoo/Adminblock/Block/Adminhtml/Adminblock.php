<?php

class Inchoo_Adminblock_Block_Adminhtml_Adminblock extends Mage_Core_Block_Template
{

    /**
     * Initialize template
     *
     */
    protected function _construct()
    {
        $this->setTemplate('inchoo/adminblock.phtml');
    }

    public function getName()
    {
        return ["name" => "samuel"];
    }
}
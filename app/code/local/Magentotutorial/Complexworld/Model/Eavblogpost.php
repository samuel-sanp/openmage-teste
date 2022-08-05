<?php

class Magentotutorial_Complexworld_Model_Eavblogpost extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('complexworld/eavblogpost');
    }

    /**
     * @param bool $flag
     *
     * @return $this
     */
    public function setIsActive($flag)
    {
        return $this->setData('is_active', !in_array($flag, array(false, 'false', 0, '0'), true));
    }

    /**
     * @return bool
     */
    public function getIsActive()
    {
        return !in_array($this->getData('is_active'), array(false, 'false', 0, '0'), true);
    }

    public function isOverlay()
    {
        $data = $this->getData('entity_id');
        if (empty($data))
            return false;

        return true;
    }
}
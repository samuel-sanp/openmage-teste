<?php

class My_Module_Model_Job_Hello
{
    /**
     * Log 'Hello World'
     *
     * @param Aoe_Scheduler_Model_Schedule $schedule
     */
    public function run(/* Aoe_Scheduler_Model_Schedule $schedule */)
    {
		Mage::log('Hello World');
    }
}
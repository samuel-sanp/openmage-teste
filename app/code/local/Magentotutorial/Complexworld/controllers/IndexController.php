<?php
class Magentotutorial_Complexworld_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
        $weblog2 = Mage::getModel('complexworld/eavblogpost');
        $weblog2->load(1);
        
        $this->loadLayout();
        $this->renderLayout();
    }

    public function populateEntriesAction() {
        for ($i=0; $i<10; $i++) {
            $weblog2 = Mage::getModel('complexworld/eavblogpost');
            $weblog2->setTitle('Test title '.$i);
            $weblog2->setContent('Test content '.$i);
            $weblog2->setDate(now());
            $weblog2->save();
        }

        echo 'Done';
    }

    public function showCollectionAction() {
        $weblog2 = Mage::getModel('complexworld/eavblogpost');
        $entries = $weblog2->getCollection()
            ->addAttributeToSelect('title')
            ->addAttributeToSelect('date')
            ->addAttributeToSelect('content');
        $entries->load();

        foreach($entries as $entry)
        {
            echo '<h2>' . $entry->getTitle() . '</h2>';
            echo '<p>Date: ' . $entry->getDate() . '</p>';
            echo '<p>' . $entry->getContent() . '</p>';
        }

        echo '</br>Done</br>';
    }
}
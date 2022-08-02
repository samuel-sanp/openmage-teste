<?php
class Magentotutorial_Complexworld_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
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

    public function testAction()
    {
        $collection_of_posts = Mage::getModel('complexworld/eavblogpost')
            ->getCollection()
            ->addAttributeToSelect('title');

        // $collection_of_posts->addAttributeToSelect('*');

        // $collection_of_posts->addFieldToFilter(
        //     'entity_id',
        //     array('eq' => '2')
        // );

        $collection_of_posts->addFieldToFilter(
            'entity_id',
            array('lt' => '3')
        );

        // $collection_of_posts->addFieldToFilter(
        //     'title',
        //     array('like' => 'Test%')
        // );

        // $collection_of_posts->addFieldToFilter(
        //     'entity_id',
        //     array('in' => array('3', '6'))
        // );

        $filtered_posts = $collection_of_posts->getItems();

        foreach ($filtered_posts as $post) {
            echo
            '<pre>',
                var_dump($post->getData()),
            '</pre>';
        }

        echo '<pre>',
        var_dump((string) $collection_of_posts->getSelect()),
        '</pre>';
    }
}
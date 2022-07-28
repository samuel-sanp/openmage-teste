<?php

class Magentotutorial_Weblog_IndexController extends Mage_Core_Controller_Front_Action {
    public function testModelAction() {
        $params = $this->getRequest()->getParams();
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load($params['id']);
        $data = $blogpost->getData();
        var_dump($data);
    }

    public function createNewPostAction() {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->setTitle('Codificar novo Post!');
        $blogpost->setPost('Este post foi criado a partir de codigo!');
        $blogpost->save();
        echo 'post com ID '.$blogpost->getId().' criado';
    }

    public function editFirstPostAction() {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load(1);
        $blogpost->setTitle('O primeiro post!');
        $blogpost->save();
        echo 'post com ID '.$blogpost->getId().' editado';
    }

    public function deleteSecondPostAction() {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load(2);
        $blogpost->delete();
        echo 'post removido';
    }

    public function showAllBlogPostAction() {
        $posts = Mage::getModel('weblog/blogpost')->getCollection();
        foreach($posts as $blogpost) {
            echo '<h3>'.$blogpost->getTitle().'</h3>';
            echo nl2br($blogpost->getPost());
        }
    }
}
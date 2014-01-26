<?php
/**
 * Boangri Weblog admin module
 * 
 * @category Boangri
 * @package Boangri_Weblog
 * @copyright Copyright (c) 2014 Cyberhull LLC (www.cyberhull.com)
 * @author Boris Gribovskiy (boris.gribovskiy@cyberhull.com)
 */
/**
 * Frontend controller (for tests and tutorial purposes)
 * 
 * @category Boangri
 * @package Boangri_Weblog 
 */
class Boangri_Weblog_IndexController extends Mage_Core_Controller_Front_Action {
    /**
     * testModel action
     */
    public function testModelAction() 
    {
        $params = $this->getRequest()->getParams();
        $blogpost = Mage::getModel('weblog/blogpost');
        echo("Loading the blogpost with an ID of ".$params['id']);
        $blogpost->load($params['id']);
        $data = $blogpost->getData();
        var_dump($data);
    }
    
    /**
     * createNewPost action
     */
    public function createNewPostAction() 
    {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->setTitle('Code Post!');
        $blogpost->setPost('This post was created from code!');
        $blogpost->save();
        echo 'post with ID ' . $blogpost->getId() . ' created';
    }
    
    /**
     * editFirstPost action
     */
    public function editFirstPostAction() 
    {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load(1);
        $blogpost->setTitle("The First post!");
        $blogpost->save();
        echo 'post edited';
    } 
    
    /**
     * deleteFirstPost action
     */
    public function deleteFirstPostAction() 
    {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load(1);
        $blogpost->delete();
        echo 'post removed';
    }
    
    /**
     *  action
     */
    public function showAllBlogPostsAction() 
    {
        $posts = Mage::getModel('weblog/blogpost')->getCollection();
        echo get_class($posts);
        foreach($posts as $blogpost){
            echo '<h3>'.$blogpost->getTitle().'</h3>';
            echo nl2br($blogpost->getPost());
        }
    } 
} 
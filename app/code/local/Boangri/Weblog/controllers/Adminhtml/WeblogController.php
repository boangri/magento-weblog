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
 * Adminhtml controller 
 * 
 * @category Boangri
 * @package Boangri_Weblog 
 */

class Boangri_Weblog_Adminhtml_WeblogController extends Mage_Adminhtml_Controller_action
{
    /**
     * index action
     */
    public function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }
    
    /**
     * delete action
     */
    public function deleteAction() {
        $id = $this->getRequest()->getParam('id');
        if( $id > 0 ) {
            try {
                $model = Mage::getModel('weblog/blogpost');
                  
                $model->setId($id)->delete();
                  
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }
    
    /**
     * exportCsv action
     */
    public function exportCsvAction()
    {
        $fileName   = 'blog_posts.csv';
        $content    = $this->getLayout()->createBlock('weblog/adminhtml_form_grid')
            ->getCsv();
 
        $this->_sendUploadResponse($fileName, $content);
    }
    
    /**
     * exportXml action
     */
    public function exportXmlAction()
    {
        $fileName   = 'blog_posts.xml';
        $content    = $this->getLayout()->createBlock('weblog/adminhtml_form_grid')
            ->getXml();
 
        $this->_sendUploadResponse($fileName, $content);
    }
    
    /**
     * grid action
     */
// For call via AJAX
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('weblog/adminhtml_form_grid')->toHtml()
        );
    }
    
    /**
     * new action
     */
    public function newAction(){
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('weblog/adminhtml_form'))
             ->_addLeft($this->getLayout()->createBlock('weblog/adminhtml_form_edit_tabs'));   
        $this->renderLayout();
    }

    /**
     * edit action
     */
    public function editAction() {
        //echo "here we are!";
        $params = $this->getRequest()->getParams();
        $blogpost = Mage::getModel('weblog/blogpost');
        //echo("Loading the blogpost with an ID of ".$params['id']);
        $blogpost->load($params['id']);
        $data = $blogpost->getData();
        Mage::register('weblog_post', $data);
        //var_dump($data);
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('weblog/adminhtml_editform'))
             ->_addLeft($this->getLayout()->createBlock('weblog/adminhtml_form_edit_tabs'));   
        $this->renderLayout();
    }
    
    /**
     * save action
     */
    public function saveAction() {
        if ($data = $this->getRequest()->getPost()) {
            $id = $data['id'];
            $blogpost = Mage::getModel('weblog/blogpost');
            if ($id > 0) {
                $blogpost = $blogpost->load($id);
            }
            $blogpost->setTitle($data['title']);
            $blogpost->setPost($data['content']);
            $blogpost->setStatus($data['status']);
            if ($data['date']) {
                $a = explode('/', $data['date']);
                $date = $a[2].'-'.$a[0].'-'.$a[1];
                $blogpost->setDate($date);
            }
            $blogpost->save();
        }
        $this->_redirect('*/*/');
        //$this->loadLayout();
        //$this->_addContent($this->getLayout()->createBlock('weblog/adminhtml_form'));
        //$this->renderLayout();
    }

    /**
     * send CSV or XML file
     */
    protected function _sendUploadResponse($fileName, $content, $contentType='application/octet-stream')
    {
        $response = $this->getResponse();
        $response->setHeader('HTTP/1.1 200 OK','');

        $response->setHeader('Pragma', 'public', true);
        $response->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true);

        $response->setHeader('Content-Disposition', 'attachment; filename='.$fileName);
        $response->setHeader('Last-Modified', date('r'));
        $response->setHeader('Accept-Ranges', 'bytes');
        $response->setHeader('Content-Length', strlen($content));
        $response->setHeader('Content-type', $contentType);
        $response->setBody($content);
        $response->sendResponse();
        die;
    }
}
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
     * mass delete action - delete group of selected items
     */
    public function massDeleteAction() {
        $ids = $this->getRequest()->getParam('id');
        try {
            $model = Mage::getModel('weblog/blogpost');
            foreach ($ids as $id) {
                $model->setId($id)->delete();
            }
        } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
        $this->_redirect('*/*/');
    }
    
    /**
     * mass status action - change status for the group of the selected items
     */
    public function massStatusAction() {
        $ids = $this->getRequest()->getParam('id');
        $status = $this->getRequest()->getParam('status');
        try {
            $model = Mage::getModel('weblog/blogpost');
            foreach ($ids as $id) {
                $model->setId($id)->setStatus($status)->save();
            }
        } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
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
        $params = $this->getRequest()->getParams();
        try {
            $blogpost = Mage::getModel('weblog/blogpost');
            $blogpost->load($params['id']);
            $data = $blogpost->getData();
            Mage::register('weblog_post', $data);
            $this->loadLayout();
            $this->_addContent($this->getLayout()->createBlock('weblog/adminhtml_editform'))
                 ->_addLeft($this->getLayout()->createBlock('weblog/adminhtml_form_edit_tabs'));   
            $this->renderLayout();
        } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
    }
    
    /**
     * save action
     */
    public function saveAction() {
        if ($data = $this->getRequest()->getPost()) {
            $id = $data['id'];
            try {
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
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was saved'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
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
<?php
/**
 * Grid container
 *
 * @category Cyberhull
 * @package Boangri_Weblog
 * @copyright Copyright (c) 2014 Cyberhull LLC (www.cyberhull.com)
 * @author Boris Gribovskiy (boris.gribovskiy@cyberhull.com)
 */

class Boangri_Weblog_Block_Adminhtml_Weblog 
    extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_weblog';
        $this->_blockGroup = 'weblog';
        $this->_headerText = Mage::helper('weblog')->__('Post Manager');
        $this->_addButtonLabel = Mage::helper('weblog')->__('Add Post');
        
        // Add a button
        //$this->_addButton('button1', array(
        //    'label'     => Mage::helper('weblog')->__('Button Label1'),
        //    'onclick'   => 'setLocation(\'' . $this->getUrl('*/*/button1') .'\')',
        //    'class'     => 'add',
        //));
        
        parent::__construct();
    }
}

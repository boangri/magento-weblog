<?php
/**
 * Form for a new post creation
 *
 * @category Cyberhull
 * @package Boangri_Weblog
 * @copyright Copyright (c) 2014 Cyberhull LLC (www.cyberhull.com)
 * @author Boris Gribovskiy (boris.gribovskiy@cyberhull.com)
 */

class Boangri_Weblog_Block_Adminhtml_Form 
    extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                  
        $this->_objectId = 'blogpost_id';
        $this->_blockGroup = 'weblog';
        $this->_controller = 'adminhtml_weblog';
         
        $this->_updateButton('save', 'label', Mage::helper('weblog')->__('Save'));
        /*
        $this->_updateButton('delete', 'label', Mage::helper('weblog')->__('Delete'));
         
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);
        */
    }
 
    public function getHeaderText()
    {
        return Mage::helper('weblog')->__('Create new post');
    }
}

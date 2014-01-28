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
 * Tabs widget
 * 
 * @category Boangri
 * @package Boangri_Weblog 
 */

class Boangri_Weblog_Block_Adminhtml_Form_Edit_Tabs 
    extends Mage_Adminhtml_Block_Widget_Tabs
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('form_tabs');
        $this->setDestElementId('edit_form'); // this should be same as the form id define above
        $this->setTitle(Mage::helper('weblog')->__('Post Information'));
    }
    
    /**
     * 
     * @return type
     */
    protected function _beforeToHtml()
    {
        $this->addTab('form_section', array(
          'label'     => Mage::helper('weblog')->__('Required data'),
          'title'     => Mage::helper('weblog')->__('Required data'),
          'content'   => $this->getLayout()->createBlock('weblog/adminhtml_weblog_edit_tab_form')->toHtml(),
        ));
      
        $this->addTab('form_section2', array(
          'label'     => Mage::helper('weblog')->__('Optional data'),
          'title'     => Mage::helper('weblog')->__('Optional data'),
          'content'   => $this->getLayout()->createBlock('weblog/adminhtml_weblog_edit_tab_form2')->toHtml(),
        ));
        // AJAX 
        
        //$this->addTab('form_section3', array(
        //        'label'     => Mage::helper('weblog')->__('Item Information3'),
        //        'url'       => $this->getUrl('*/*/form', array('_current' => true)),
        //        'class'     => 'ajax',
        //));
        
        return parent::_beforeToHtml();
    }
}

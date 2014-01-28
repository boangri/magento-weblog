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
 * Form for required parameters
 * 
 * @category Boangri
 * @package Boangri_Weblog 
 */
class Boangri_Weblog_Block_Adminhtml_Form_Edit_Tab_Form 
    extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * 
     * @return type
     */
    protected function _prepareForm()
    {
        $data = Mage::registry('weblog_post');
        $id = isset($data['blogpost_id']) ? $data['blogpost_id'] : 0;
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('form_form', 
                array('legend'=>Mage::helper('weblog')->__('Main data')));
        
        $fieldset->addField('title', 'text', array(
            'label'     => Mage::helper('weblog')->__('Title'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'title',
            'value'     => $data['title'],
        ));
        
        $fieldset->addField('hidden', 'hidden', array(
            'name'      => 'id',
            'value'     => $id ,
        ));
/*  
        // Password 
        $fieldset->addField('password', 'password', array(
          'label'     => Mage::helper('weblog')->__('Password'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
          'onclick' => "",
          'onchange' => "",
          'style'   => "",
          'value'  => 'hello !!',
          'disabled' => false,
          'readonly' => false,
          'after_element_html' => '<small>Comments</small>',
          'tabindex' => 1
        ));
        
        // Text 
        $fieldset->addField('title3', 'text', array(
          'label'     => Mage::helper('weblog')->__('Title3'),
          'class'     => 'required-entry',
          'required'  => false,
          'name'      => 'title',
          'onclick' => "alert('on click');",
          'onchange' => "alert('on change');",
          'style'   => "border:10px",
          'value'  => 'hello !!',
          'disabled' => false,
          'readonly' => true,
          'after_element_html' => '<small>Comments</small>',
          'tabindex' => 1
        ));
        
        // time 
        $fieldset->addField('time', 'time', array(
          'label'     => Mage::helper('weblog')->__('Time'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
          'onclick' => "",
          'onchange' => "",
          'value'  => '12,04,15',
          'disabled' => false,
          'readonly' => false,
          'after_element_html' => '<small>Comments</small>',
          'tabindex' => 1
        ));
*/
        // TextArea 
        $fieldset->addField('textarea', 'textarea', array(
            'label'     => Mage::helper('weblog')->__('Content Of Your Post'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'content',
            'value'     => $data['post'],
          //'onclick' => "",
          //'onchange' => "",
          //'value'  => '',
          //'disabled' => false,
          //'readonly' => false,
          //'after_element_html' => '',
          //'tabindex' => 1
        ));
/*
        // Dropdown 
        $fieldset->addField('select', 'select', array(
          'label'     => Mage::helper('weblog')->__('Select'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
          'onclick' => "",
          'onchange' => "",
          'value'  => '1',
          'values' => array('-1'=>'Please Select..','1' => 'Option1','2' => 'Option2', '3' => 'Option3'),
          'disabled' => false,
          'readonly' => false,
          'after_element_html' => '<small>Comments</small>',
          'tabindex' => 1
        ));

        // Radio button 
        $fieldset->addField('radio', 'radio', array(
          'label'     => Mage::helper('weblog')->__('Radio'),
          'name'      => 'title',
          'onclick' => "",
          'onchange' => "",
          'value'  => '1',
          'disabled' => false,
          'readonly' => false,
          'after_element_html' => '<small>Comments</small>',
          'tabindex' => 1
        ));
        
        // Radio buttons 
        $fieldset->addField('radio2', 'radios', array(
          'label'     => Mage::helper('weblog')->__('Radios'),
          'name'      => 'title',
          'onclick' => "",
          'onchange' => "",
          'value'  => '2',
          'values' => array(
                            array('value'=>'1','label'=>'Radio1'),
                            array('value'=>'2','label'=>'Radio2'),
                            array('value'=>'3','label'=>'Radio3'),
                       ),
          'disabled' => false,
          'readonly' => false,
          'after_element_html' => '<small>Comments</small>',
          'tabindex' => 1
        ));

        // Note 
        $fieldset->addField('note', 'note', array(
          'text'     => Mage::helper('weblog')->__('Text Text'),
        ));

        // Link 
        $fieldset->addField('link', 'link', array(
          'label'     => Mage::helper('weblog')->__('Link'),
          'style'   => "",
          'href' => 'www.excellencemagentoblog.com',
          'value'  => 'Magento Blog',
          'after_element_html' => ''
        ));

        // Label 
        $fieldset->addField('label', 'label', array(
          'value'     => Mage::helper('weblog')->__('Label Text'),
        ));
        
        // Image upload 
        $fieldset->addField('image', 'image', array(
          'value'     => 'http://www.excellencemagentoblog.com/wp-content/themes/excelltheme/images/logo.png',
        ));

        // File Upload 
        $fieldset->addField('file', 'file', array(
          'label'     => Mage::helper('weblog')->__('Upload'),
          'value'  => 'Uplaod',
          'disabled' => false,
          'readonly' => true,
          'after_element_html' => '<small>Comments</small>',
          'tabindex' => 1
        ));
 * 
        // Date 
        $fieldset->addField('date', 'date', array(
          'label'     => Mage::helper('weblog')->__('Date'),
          'after_element_html' => '<small>Date to post</small>',
          'tabindex' => 1,
          'image' => $this->getSkinUrl('images/grid-cal.gif'),
          'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
          'name' => 'date'  
        ));

        // Checkbox 
        $fieldset->addField('checkbox', 'checkbox', array(
          'label'     => Mage::helper('weblog')->__('Checkbox'),
          'name'      => 'Checkbox',
          'checked' => false,
          'onclick' => "",
          'onchange' => "",
          'value'  => '1',
          'disabled' => false,
          'after_element_html' => '<small>Comments</small>',
          'tabindex' => 1
        ));

        // Checkboxes 
        $fieldset->addField('checkboxes', 'checkboxes', array(
          'label'     => Mage::helper('weblog')->__('Checkboxs'),
          'name'      => 'Checkbox',
          'values' => array(
                            array('value'=>'1','label'=>'Checkbox1'),
                            array('value'=>'2','label'=>'Checkbox2'),
                            array('value'=>'3','label'=>'Checkbox3'),
                       ),
          'onclick' => "",
          'onchange' => "",
          'value'  => '1',
          'disabled' => false,
          'after_element_html' => '<small>Comments</small>',
          'tabindex' => 1
        ));        
        
        // Submit Button 
        $fieldset->addField('submit', 'submit', array(
          'label'     => Mage::helper('weblog')->__('Submit'),
          'required'  => true,
          'value'  => 'Submit post',
          'after_element_html' => '<small>Comments</small>',
          'tabindex' => 1
        ));
*/
        return parent::_prepareForm();
    }
}

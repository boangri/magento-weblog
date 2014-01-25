<?php
/**
 * Edit form
 *
 * @category Cyberhull
 * @package Boangri_Weblog
 * @copyright Copyright (c) 2014 Cyberhull LLC (www.cyberhull.com)
 * @author Boris Gribovskiy (boris.gribovskiy@cyberhull.com)
 */

class Boangri_Weblog_Block_Adminhtml_Weblog_Edit_Form 
    extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
                        'id' => 'edit_form',
                        'action' => $this->getUrl('*/*/save', 
                                array('id' => $this->getRequest()->getParam('blogpost_id'))),
                        'method' => 'post',
                        'enctype' => 'multipart/form-data'
                     )
        );

        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}

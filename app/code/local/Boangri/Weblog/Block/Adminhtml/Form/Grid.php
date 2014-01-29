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
 * Grid widget
 * 
 * @category Boangri
 * @package Boangri_Weblog 
 */

class Boangri_Weblog_Block_Adminhtml_Form_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('weblogGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        // for AJAX
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);

    }
    
    /**
     * 
     * @return type 
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('weblog/blogpost')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    
    /**
     * 
     * @return type
     */
    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
          'header'    => Mage::helper('weblog')->__('ID'),
          'align'     =>'right',
          'width'     => '10px',
          'index'     => 'blogpost_id',
        ));
 
        $this->addColumn('title', array(
          'header'    => Mage::helper('weblog')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
          'width'     => '50px',
        ));
       
        $this->addColumn('content', array(
            'header'    => Mage::helper('weblog')->__('Content'),
            'width'     => '150px',
            'index'     => 'post',
        ));
        
        $this->addColumn('dropdown', array(
          'header'    => Mage::helper('weblog')->__('Post Type'),
          'width'     => '50px',  
          'align'     =>'left',
          'index'     => 'status',
          'type'      => 'options',
          'options'    => array('1' => 'Draft','2' => 'Published' , '3' => 'Hidden')
        ));
        
        $this->addColumn('date', array(
            'header'    => Mage::helper('weblog')->__('Date'),
            'width'     => '50px',
            'index'     => 'date',
        ));
        
        $this->addColumn('ts', array(
            'header'    => Mage::helper('weblog')->__('Timestamp'),
            'width'     => '50px',
            'index'     => 'timestamp',
        ));
           
        $this->addExportType('*/*/exportCsv', Mage::helper('weblog')->__('CSV'));
        $this->addExportType('*/*/exportXml', Mage::helper('weblog')->__('XML'));
       
        return parent::_prepareColumns();
    }
    
    /**
     * 
     * @param type $row
     * @return type
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
    
    // For  AJAX
    /**
     * 
     * @return type
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
    
    /**
     * 
     * @return \Boangri_Weblog_Block_Adminhtml_Form_Grid
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('blogpost_id');
        $this->getMassactionBlock()->setFormFieldName('id');
 
        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('weblog')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('weblog')->__('Are you sure?')
        ));
 
        $statuses = array(1 => 'Draft', 2 => 'Published', 3 => 'Hidden');
        // $statuses = Mage::getSingleton('weblog/status')->getOptionArray();
 
        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('weblog')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('weblog')->__('Status'),
                         'values' => $statuses
        )
        )
        ));
        return $this;
    }

}

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
 * Blogpost model resource
 * 
 * @category Boangri
 * @package Boangri_Weblog 
 */

class Boangri_Weblog_Model_Resource_Blogpost extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * magento constructor
     */
    protected function _construct()
    {
        $this->_init('weblog/blogpost', 'blogpost_id');
    }
}

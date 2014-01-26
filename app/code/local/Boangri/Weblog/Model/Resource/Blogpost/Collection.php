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
 * Collection of blog posts
 * 
 * @category Boangri
 * @package Boangri_Weblog 
 */

class Boangri_Weblog_Model_Resource_Blogpost_Collection 
    extends Mage_Core_Model_Resource_Db_Collection_Abstract 
{
    /**
     * magento constructor
     */
    protected function _construct()
    {
            $this->_init('weblog/blogpost');
    }
} 
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
 * Blogpost model 
 * 
 * @category Boangri
 * @package Boangri_Weblog 
 */

class Boangri_Weblog_Model_Blogpost extends Mage_Core_Model_Abstract
{
    /**
     * Constructor
     */
    protected function _construct()
    {
        $this->_init('weblog/blogpost');
    }
}

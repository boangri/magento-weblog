<?php
/**
 * Resource for blogpost 
 *
 * @category Cyberhull
 * @package Boangri_Weblog
 * @copyright Copyright (c) 2014 Cyberhull LLC (www.cyberhull.com)
 * @author Boris Gribovskiy (boris.gribovskiy@cyberhull.com)
 */

class Boangri_Weblog_Model_Resource_Blogpost extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('weblog/blogpost', 'blogpost_id');
    }
}

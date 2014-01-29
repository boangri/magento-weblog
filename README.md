# magento-weblog

## Magento admin module for weblog management


simple admin (backend) module for management of blog posts.

The module works with posts, which are stored in the table as follows:
```
CREATE TABLE `blog_posts` (
`blogpost_id` int(11) NOT NULL AUTO_INCREMENT,
`title` text,
`post` text,
`status` tinyint(4) NOT NULL DEFAULT '1',
`date` datetime DEFAULT NULL,
`timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`blogpost_id`)
ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 
```

This module creates a sub-menu "Weblog" in the "Boangri modules" group in the Admin panel menu

The sub-menu includes 2 items - "Manage posts" and "Add new post".

The first item deals with a grid widget, the second one - with a form widget.

In the grid widget you may browse, edit and add new posts. You may export entire weblog as CSV or XML file.
Group operation (delete, change status) are implemented as well.  

The module may be used as a template/sample/generic for development of other admin modules with similar functionality.

### Known issues
* 

### Used resources
The following articles were used for writing this module:

* http://www.magentocommerce.com/knowledge-base/entry/magento-for-dev-part-5-magento-models-and-orm-basics
* http://excellencemagentoblog.com/magento-blogs/admin-module-development/

magento-weblog
==============

Magento admin module for weblog management

simple admin (backend) module for learning development of such modules.


The module works with post, which are stored in the table as follow:
```
CREATE TABLE `blog_posts` (
`blogpost_id` int(11) NOT NULL AUTO_INCREMENT,
`title` text,
`post` text,
`status` tinyint(4) NOT NULL DEFAULT '1',
`date` datetime DEFAULT NULL,
`timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`blogpost_id`)
ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 
```


<?php

$installer=$this;

$installer->startSetup();

$installer->run("
  CREATE TABLE IF NOT EXISTS `{$installer->getTable('dz_featcat/category')}`
  (
    `category_id` int(100) NOT NULL AUTO_INCREMENT,
      `name` varchar(50) NOT NULL,
      `image` varchar(50) NOT NULL,
      `link` varchar(100) NOT NULL,
      `status` smallint(6) NOT NULL default '0',
      `sort_order` smallint(6) NOT NULL default '0',
      `created_at` datetime NULL,
      PRIMARY KEY (`category_id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
");

$installer->endSetup();





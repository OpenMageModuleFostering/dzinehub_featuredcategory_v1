<?php

/***************************************************************************
	@extension	: Featured Category Images
	@Version  	: 1.0.0.
	@package	: Dzinehub_FeaturedCategory	
	@class		: app/code/local/Dzinehub/FeaturedCategory/Block/Category.php	
	@author		: Srilekha
	@email		: arun@dzine-hub.com
	@support	: http://www.dzine-hub.com/contact-us/		
***************************************************************************/
class Dzinehub_FeaturedCategory_Block_Category extends Mage_Core_Block_Template{
	
	 protected function getFeatured()
    {
        $collection=Mage::getResourceModel('dz_featcat/category_collection')->addFieldToFilter('status',1);
        $collection->setOrder('sort_order','ASC');
        return $collection;
    }
 }
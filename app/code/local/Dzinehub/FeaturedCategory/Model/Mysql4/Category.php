<?php
/***************************************************************************
	@extension	: Featured Category Images
	@Version  	: 1.0.0.
	@package	: Dzinehub_FeaturedCategory	
	@class		: app/code/local/Dzinehub/FeaturedCategory/Model/Mysql4/Category.php	
	@author		: Srilekha
	@email		: arun@dzine-hub.com
	@support	: http://www.dzine-hub.com/contact-us/		
***************************************************************************/
class Dzinehub_FeaturedCategory_Model_Mysql4_Category extends Mage_Core_Model_Mysql4_Abstract{

	protected function _construct(){

		$this->_init('dz_featcat/category','category_id');
	}
}
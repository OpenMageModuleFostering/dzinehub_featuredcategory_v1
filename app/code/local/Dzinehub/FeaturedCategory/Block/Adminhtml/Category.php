<?php

/***************************************************************************
	@extension	: Featured Category Images
	@Version  	: 1.0.0.
	@package	: Dzinehub_FeaturedCategory	
	@class		: app/code/local/Dzinehub/FeaturedCategory/Block/Adminhtml/Category.php	
	@author		: Srilekha
	@email		: arun@dzine-hub.com
	@support	: http://www.dzine-hub.com/contact-us/		
***************************************************************************/

class Dzinehub_FeaturedCategory_Block_Adminhtml_Category extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct(){

		$this->_blockGroup='dz_featcat';

		$this->_controller='adminhtml_category';

		$this->_headerText=Mage::helper('dz_featcat')->__('Featured Category');

		$this->_addButtonLabel=Mage::helper('dz_featcat')->__('Add Featured Items');
		
		parent::__construct();
	}
}
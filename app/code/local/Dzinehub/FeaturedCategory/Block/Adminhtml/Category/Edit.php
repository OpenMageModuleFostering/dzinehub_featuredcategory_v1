<?php

/***************************************************************************
	@extension	: Featured Category Images
	@Version  	: 1.0.0.
	@package	: Dzinehub_FeaturedCategory	
	@class		: app/code/local/Dzinehub/FeaturedCategory/Block/Adminhtml/Category/Edit.php	
	@author		: Srilekha
	@email		: arun@dzine-hub.com
	@support	: http://www.dzine-hub.com/contact-us/		
***************************************************************************/

class Dzinehub_FeaturedCategory_Block_Adminhtml_Category_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{

	public function __construct(){

		parent::__construct();

		$this->_objectId='id';
		$this->_blockGroup='dz_featcat';
		$this->_controller='adminhtml_category';
		$this->_mode='edit';
		
		$this->_updateButton('save', 'label', Mage::helper('dz_featcat')->__('Save Category'));
		$this->_updateButton('delete','label',Mage::helper('dz_featcat')->__('Delete Category'));
	}
	public function getHeaderText(){
		if(Mage::registry('dz_featcat_data') && Mage::registry('dz_featcat_data')->getId()){
			return Mage::helper('dz_featcat')->__("Edit Featured Category %s",
				$this->htmlEscape(Mage::registry('dz_featcat_data')->getName()));
		}
		else{
			return Mage::helper('dz_featcat')->__('Add Featured Item');
		}
	}

}
<?php
/***************************************************************************
	@extension	: Featured Category Images
	@Version  	: 1.0.0.
	@package	: Dzinehub_FeaturedCategory	
	@class		: app/code/local/Dzinehub/FeaturedCategory/Block/Adminhtml/Category/Edit/Tabs.php	
	@author		: Srilekha
	@email		: arun@dzine-hub.com
	@support	: http://www.dzine-hub.com/contact-us/		
***************************************************************************/
class Dzinehub_FeaturedCategory_Block_Adminhtml_Category_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs{

	public function __construct(){

		parent::__construct();
		$this->setId('dz_featcat_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle(Mage::helper('dz_featcat')->__('New Featured Category'));
	}

	protected function _beforeToHtml(){

		$this->addTab('form_tab',array(
			'label'  => Mage::helper('dz_featcat')->__('Featured Category Information'),
			'title'  => Mage::helper('dz_featcat')->__('Featured Category Information'),
			'content'=> $this->getLayout()->createBlock('dz_featcat/adminhtml_category_edit_tab_main')->toHtml(),
			'active' => true
		));
		return parent::_beforeToHtml();
	}
}
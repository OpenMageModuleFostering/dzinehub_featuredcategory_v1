<?php
/***************************************************************************
	@extension	: Featured Category Images
	@Version  	: 1.0.0.
	@package	: Dzinehub_FeaturedCategory	
	@class		: app/code/local/Dzinehub/FeaturedCategory/controllers/CategoryController.php	
	@author		: Srilekha
	@email		: arun@dzine-hub.com
	@support	: http://www.dzine-hub.com/contact-us/		
***************************************************************************/
class Dzinehub_FeaturedCategory_CategoryController extends Mage_Core_Controller_Front_Action{

	public function indexAction(){
		$this->loadLayout();
	    $this->renderLayout();
	}
	 
}
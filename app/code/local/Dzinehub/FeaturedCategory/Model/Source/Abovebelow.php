
<?php
/***************************************************************************
	@extension	: Featured Category Images
	@Version  	: 1.0.0.
	@package	: Dzinehub_FeaturedCategory	
	@class		: app/code/local/Dzinehub/FeaturedCategory/Model/Source/Abovebelow.php	
	@author		: Srilekha
	@email		: arun@dzine-hub.com
	@support	: http://www.dzine-hub.com/contact-us/		
***************************************************************************/
class Dzinehub_FeaturedCategory_Model_Source_Abovebelow
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'above', 'label'=>Mage::helper('dz_featcat')->__('Above image')),
            array('value'=>'below', 'label'=>Mage::helper('dz_featcat')->__('Below image')),
        );
    }
}

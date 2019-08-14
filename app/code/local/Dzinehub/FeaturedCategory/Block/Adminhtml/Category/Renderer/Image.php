<?php
/***************************************************************************
    @extension  : Featured Category Images
    @Version    : 1.0.0.
    @package    : Dzinehub_FeaturedCategory 
    @class      : app/code/local/Dzinehub/FeaturedCategory/Block/Adminhtml/Category/Renderer/Image.php   
    @author     : Srilekha
    @email      : arun@dzine-hub.com
    @support    : http://www.dzine-hub.com/contact-us/      
***************************************************************************/
class Dzinehub_FeaturedCategory_Block_Adminhtml_Category_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
    	if($row->getData($this->getColumn()->getIndex())==""){
            return "";
        }
        else
        {
        $html = '<img ';
        $html .= 'id="' . $this->getColumn()->getId() . '" ';
        $html .= 'src="' . Mage::getBaseUrl('media').'featuredcategory/'.$row->getData($this->getColumn()->getIndex()) . '"';
        $html.='width="'.$this->getColumn()->getWidth().'"';
        $html .= 'class="grid-image ' . $this->getColumn()->getInlineCss() . '"/>';

        return $html;
   		 }
    }

}

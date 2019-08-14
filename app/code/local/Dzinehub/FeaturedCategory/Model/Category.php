<?php
/***************************************************************************
    @extension  : Featured Category Images
    @Version    : 1.0.0.
    @package    : Dzinehub_FeaturedCategory 
    @class      : app/code/local/Dzinehub/FeaturedCategory/Model/Category.php   
    @author     : Srilekha
    @email      : arun@dzine-hub.com
    @support    : http://www.dzine-hub.com/contact-us/      
***************************************************************************/
class Dzinehub_FeaturedCategory_Model_Category extends Mage_Core_Model_Abstract{

    protected function _construct(){

        $this->_init('dz_featcat/category');
    }
     protected function _beforeSave()
    {

        parent::_beforeSave();
        $now = Mage::getSingleton('core/date')->gmtDate();

        if ($this->isObjectNew()){
            $this->setCreatedAt($now);
        }
        return $this;
    }
     protected function _afterSave()
     {
        return parent::_afterSave();
    }
    
}
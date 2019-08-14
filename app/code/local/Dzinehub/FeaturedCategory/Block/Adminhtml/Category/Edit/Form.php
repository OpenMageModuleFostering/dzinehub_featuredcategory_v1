<?php
/***************************************************************************
  @extension  : Featured Category Images
  @Version    : 1.0.0.
  @package  : Dzinehub_FeaturedCategory 
  @class    : app/code/local/Dzinehub/FeaturedCategory/Block/Adminhtml/Category/Edit/Form.php 
  @author   : Srilekha
  @email    : arun@dzine-hub.com
  @support  : http://www.dzine-hub.com/contact-us/    
***************************************************************************/
class Dzinehub_FeaturedCategory_Block_Adminhtml_Category_Edit_Form extends Mage_Adminhtml_Block_Widget_Form{

	 protected function _prepareForm()
  {
      $form = new Varien_Data_Form(array(
                'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method' => 'post',
   			  'enctype'  => 'multipart/form-data'
                                   )
      );

      $form->setUseContainer(true);
      $this->setForm($form);
      return parent::_prepareForm();
  }
}
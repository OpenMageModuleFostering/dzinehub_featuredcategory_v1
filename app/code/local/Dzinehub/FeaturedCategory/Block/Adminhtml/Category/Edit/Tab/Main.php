<?php
/***************************************************************************
    @extension  : Featured Category Images
    @Version    : 1.0.0.
    @package    : Dzinehub_FeaturedCategory 
    @class      : app/code/local/Dzinehub/FeaturedCategory/Block/Adminhtml/Category/Edit/Tab/Main.php   
    @author     : Srilekha
    @email      : arun@dzine-hub.com
    @support    : http://www.dzine-hub.com/contact-us/      
***************************************************************************/
class Dzinehub_FeaturedCategory_Block_Adminhtml_Category_Edit_Tab_Main extends Mage_Adminhtml_Block_Widget_Form 
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldSet('dz_featcat_fieldset', array(
            'legend' => Mage::helper('dz_featcat')->__('Category Information')
        ));

        $fieldset -> addField('name','text',array(
            'name'  => 'name',
            'label' => Mage::helper('dz_featcat')->__('Name'),
            'title' => Mage::helper('dz_featcat')->__('Name'),
            'required' => true
        ));

        $fieldset -> addField('file_image','image',array(
            'name'  => 'file_image',
            'label' =>  Mage::helper('dz_featcat')->__('Image'),
            'title' =>  Mage::helper('dz_featcat')->__('Image'),
            'after_element_html' => '<div><small>Image width and height should not exceed 400px</small></div>',
        ));
        $fieldset -> addField('link','text',array(
            'name'  => 'link',
            'label' => Mage::helper('dz_featcat')->__('Link'),
            'title' => Mage::helper('dz_featcat')->__('Link'),
            'class' => 'validate-url',
            'after_element_html' => '<small>Always enter absolute url</small>',
            
        ));

        $fieldset->addField('sort_order','text',array(
            'name'  => 'sort_order',
            'label' => Mage::helper('dz_featcat')->__('Sort Order'),
            'title' => Mage::helper('dz_featcat')->__('Sort Order'),
            'required' => true,
            'class'    => 'validate-number',
        ));

        $fieldset -> addField('status','select',array(
            'name'  => 'status',
            'label' => Mage::helper('dz_featcat')->__('Status'),
            'title' => Mage::helper('dz_featcat')->__('Status'),
            'options' => array(
                0 => Mage::helper('dz_featcat')->__('Disabled'),
                1 => Mage::helper('dz_featcat')->__('Enabled')
            ),
            'required'=>true
        ));
        Mage::dispatchEvent('adminhtml_category_edit_tab_main_prepare_form', array('form'=>$form));


        if(Mage::registry('dz_featcat_data'))
        {
            $form->setValues(Mage::registry('dz_featcat_data')->getData());
        }
        return parent::_prepareForm();
    }
}

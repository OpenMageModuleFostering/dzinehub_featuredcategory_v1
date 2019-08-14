<?php

/***************************************************************************
    @extension  : Featured Category Images
    @Version    : 1.0.0.
    @package    : Dzinehub_FeaturedCategory 
    @class      : app/code/local/Dzinehub/FeaturedCategory/Adminhtml/Category/Grid.php   
    @author     : Srilekha
    @email      : arun@dzine-hub.com
    @support    : http://www.dzine-hub.com/contact-us/      
***************************************************************************/

class Dzinehub_FeaturedCategory_Block_Adminhtml_Category_Grid extends Mage_Adminhtml_Block_Widget_Grid{

	 public function __construct()
    {
        parent::__construct();
        $this->setId('dz_featcatGrid');
        $this->setDefaultDir('DESC');
        $this->setDefaultSort('category_id');
        $this->setSaveParametersInSession(true);
    }

    protected  function _prepareCollection()
    {
        $collection=Mage::getModel('dz_featcat/category')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

   protected  function _prepareColumns()
    {
        $this->addColumn('category_id',array(
            'header' => Mage::helper('dz_featcat')->__('Category ID'),
            'index'  => 'category_id',
            'align'  => 'left',
            'width'  => '10px'
        ));

        $this->addColumn('image',array(
            'header' => Mage::helper('dz_featcat')->__('Image'),
            'index'  => 'image',
            'align'  =>  'center',
            'type'   =>  'image',
            'renderer'=> 'dz_featcat/adminhtml_category_renderer_image',
            'width'   => '100px',
        ));

        $this->addColumn('name',array(
            'header'  => Mage::helper('dz_featcat')->__('Name'),
            'index'   => 'name'
        ));

        $this->addColumn('link',array(
            'header' => Mage::helper('dz_featcat')->__('Link'),
            'index'  => 'link'
        ));

        $this->addColumn('status',array(
            'header' => Mage::helper('dz_featcat')->__('Status'),
            'index'  => 'status',
            'type'   => 'options',
            'options'=> array(
                   1 => Mage::helper('dz_featcat')->__('Enabled'),
                   0 => Mage::helper('dz_featcat')->__('Disabled')
            )
        ));

        $this->addColumn('sort_order',array(
            'header' => Mage::helper('dz_featcat')->__('sort_order'),
            'index'  => 'sort_order',
        ));

        $this->addColumn('created_at', array(
            'header'    => Mage::helper('dz_featcat')->__('Created At'),
            'align'     => 'left',
            'width'     => '120px',
            'type'      => 'date',
            'default'   => '--',
            'index'     => 'created_at',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit',array('id'=>$row->getId()));
    }

}
<?php
/***************************************************************************
  @extension  : Featured Category Images
  @Version    : 1.0.0.
  @package  : Dzinehub_FeaturedCategory 
  @class    : app/code/local/Dzinehub/FeaturedCategory/controllers/Adminhtml/CategoryController.php 
  @author   : Srilekha
  @email    : arun@dzine-hub.com
  @support  : http://www.dzine-hub.com/contact-us/    
***************************************************************************/
class Dzinehub_FeaturedCategory_Adminhtml_CategoryController extends Mage_Adminhtml_Controller_Action{

    protected function _initAction() 
    {
       $this->loadLayout()
         ->_setActiveMenu('dzinehub')
         ->_title($this->__('Featured Category'))
         ->_addBreadcrumb(Mage::helper('adminhtml')->__('Featured Category Manager'),
           Mage::helper('adminhtml')->__('Featured Category Manager'));

             return $this;
      }
      public function indexAction()
       {
        $this->_initAction();
        $this->renderLayout();
        }
      public function gridAction()
      {
        $this->loadLayout();
        $this->renderLayout();
      }
       public function editAction()
      {
         $id=$this->getRequest()->getParam('id');
           $model=Mage::getModel('dz_featcat/category')->load($id);
          if($model->getId() || $id==0)
            {
              $data=Mage::getSingleton('adminhtml/session')->getFormData(true);
             if(!empty($data)){
                
               $model->setData($data);
               }

          Mage::register('dz_featcat_data',$model);

          $this->loadLayout();
          $this->_setActiveMenu('featured_cat');

        $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Manage Category'),Mage::helper('adminhtml')->__('Manage Category'));
        $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Items'),Mage::helper('adminhtml')->__('Items'));

        $this->getLayout()->getBlock('head')->setCanLoadExtnJs(true);

        $this->_addContent($this->getLayout()->createBlock('dz_featcat/adminhtml_category_edit'))
            ->_addLeft($this->getLayout()->createBlock('dz_featcat/adminhtml_category_edit_tabs'));

        $this->renderLayout();

        }
        else{
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('dz_featcat')->__('Category does not exist'));
            $this->_redirect('*/*/');
          }
    }

    public function newAction()
    {
        $this->_forward('edit');
    }
    public function saveAction()
    {
     $model=Mage::getModel('dz_featcat/category');
        $data=$this->getRequest()->getPost();
        $redirectPath = '*/*';
        $redirectParams = array();
        if($data)
        {
            $id=$this->getRequest()->getParam('id');
           if($id)
           {
               $model->load($id);
           }
           $model->addData($data);

           try
           {
               $hasError=false;
               $imageHelper=Mage::helper('dz_featcat');
               $imageFile = $imageHelper->uploadImage('file_image');

               if ($imageFile) {
                   $model->setImage($imageFile);
               }
               else{
                unset($data['file_image']);
                
            }
               $model->save();
               $this->_getSession()->addSuccess(Mage::helper('dz_featcat')->__('The category has been saved'));

           }
           catch(Mage_Core_Exception $e)
           {
               $hasError=true;
               $this->_getSession()->addError($e->getMessage());
           }
           catch(Exception $e)
           {
                $this->_getSession()->addError($e,Mage::helper('dz_featcat')->__('An error occured while saving the category'));
           }
           if($hasError)
           {
               $this->_getSession()->setFormData($data);
               $redirectPath='*/*/edit';
               $redirectParams=array($this->getRequest()->getParam('id'));
           }

        }
        $this->_redirect($redirectPath,$redirectParams);
        } 
    public function deleteAction(){
       $id=$this->getRequest()->getParam('id');
        if($id){
           try
            {
              $model=Mage::getModel('dz_featcat/category');
                $model->load($id);
                if(!$model->getId()){
                   Mage::throwException(Mage::helper('dz_featcat')->__('Unable to find the category'));
                }
                 $model->delete();
                $this->_getSession()->addSuccess(Mage::helper('dz_featcat')->__('The category item has been saved'));
            }
            catch(Mage_Core_Exception $e)
            {
                $this->_getSession()->addError($e->getMessage());
            }
            catch(Exception $e)
            {
                $this->_getSession()->addException($e,Mage::helper('dz_featcat')->__('An error occured while deleting the category'));
            }
                
        }
    $this->_redirect('*/*/');
  }
}


   
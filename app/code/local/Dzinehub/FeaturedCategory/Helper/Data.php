<?php
/***************************************************************************
    @extension  : Featured Category Images
    @Version    : 1.0.0.
    @package    : Dzinehub_FeaturedCategory 
    @class      : app/code/local/Dzinehub/FeaturedCategory/Helper/Data.php   
    @author     : Srilekha
    @email      : arun@dzine-hub.com
    @support    : http://www.dzine-hub.com/contact-us/      
***************************************************************************/
class Dzinehub_FeaturedCategory_Helper_Data extends Mage_Core_Helper_Abstract{
    
    const MEDIA_PATH="featuredcategory";
    const MAX_FILE_SIZE = 1048576;
  
    protected $_allowedExtensions = array('jpg', 'gif', 'png');

    public function getBaseDir()
    {
        return Mage::getBaseDir('media') . DS . self::MEDIA_PATH;
    }

    public function getBaseUrl()
    {
        return Mage::getBaseUrl('media') . '/' . self::MEDIA_PATH;
    }
    public function uploadImage($scope)
    {
        $adapter  = new Zend_File_Transfer_Adapter_Http();
        if ($adapter->isUploaded($scope)) {
            // validate image
            if (!$adapter->isValid($scope)) {
                Mage::throwException(Mage::helper('featured')->__('Uploaded image is not valid'));
            }
            $upload = new Varien_File_Uploader($scope);
            $upload->setAllowCreateFolders(true);
            $upload->setAllowedExtensions(array('jpeg','jpg', 'gif', 'png'));
            $upload->setAllowRenameFiles(true);
            $upload->setFilesDispersion(false);
            if ($upload->save($this->getBaseDir())) {
                return $upload->getUploadedFileName();
            }
        }
        return false;
    }

    public function removeImage($imageFile)
    {
        $io = new Varien_Io_File();
        $io->open(array('path' => $this->getBaseDir()));
        if ($io->fileExists($imageFile)) {
            return $io->rm($imageFile);
        }
        return false;
    }

    public function getFeaturedTitle(){
        return Mage::getStoreConfig('featured_category/general/title');
    }
    public function resizeImage($imageName, $width=NULL, $height=NULL, $imagePath=NULL)
    {       
    $imagePath = str_replace("/", DS, $imagePath);
    $imagePathFull = Mage::getBaseDir('media') . DS . $imagePath . DS . $imageName;
    
    if($width == NULL && $height == NULL) {
        $width = 100;
        $height = 100; 
    }
    $resizePath = $width . 'x' . $height;
    $resizePathFull = Mage::getBaseDir('media') . DS . $imagePath . DS . $resizePath . DS . $imageName;
            
    if (file_exists($imagePathFull) && !file_exists($resizePathFull)) {
        $imageObj = new Varien_Image($imagePathFull);
        $imageObj->constrainOnly(TRUE);
        $imageObj->keepAspectRatio(TRUE);
        $imageObj->keepFrame(TRUE);
        $imageObj->keepTransparency(FALSE);
        $imageObj->backgroundColor(array(255,255,255));
        $imageObj->resize($width,$height);
        $imageObj->save($resizePathFull);
    }
            
    $imagePath=str_replace(DS, "/", $imagePath);
    return Mage::getBaseUrl("media") . $imagePath . "/" . $resizePath . "/" . $imageName;
}
}

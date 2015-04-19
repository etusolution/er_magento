<?php
class Etu_Er_Block_Action_View extends Mage_Catalog_Block_Product_Abstract
{
    
    protected function _prepareLayout()
    {        
        new Etu_Er_Helper_Data();
    	return parent::_prepareLayout();
    }

    public function getProduct()
    {
        if (!Mage::registry('product') && $this->getProductId()) {
            $product = Mage::getModel('catalog/product')->load($this->getProductId());
            Mage::register('product', $product);
        }
        return Mage::registry('product');
    }

    public function getCategory()
    {
        return Mage::registry('current_category');
    }

    public function getCustomerId()
    {
        if (!$this->hasData('customer_id')) {
            $customerId = Mage::getSingleton('customer/session')->getCustomerId();
            $this->setData('customer_id', $customerId);
        }
        return $this->getData('customer_id');
    }
}

?>
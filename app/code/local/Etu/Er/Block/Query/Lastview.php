<?php
class Etu_Er_Block_Query_Lastview extends Mage_Catalog_Block_Product_Abstract implements Mage_Widget_Block_Interface 
{
    protected function _prepareLayout()
    {
        new Etu_Er_Helper_Data();
        return parent::_prepareLayout();
    }
    
	protected $_defaultColumnCount = 5;
    public function getCustomerId()
    {
        if (!$this->hasData('customer_id')) {
            $customerId = Mage::getSingleton('customer/session')->getCustomerId();
            $this->setData('customer_id', $customerId);
        }
        return $this->getData('customer_id');
    }

    public function getProductCount()
    {
    	if (!$this->hasData('products_count')) {
            return parent::getProductsCount();
        }
        return $this->getData('products_count');
    }
    
}

?>
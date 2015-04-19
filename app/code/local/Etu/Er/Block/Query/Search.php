<?php
class Etu_Er_Block_Query_Search extends Mage_Core_Block_Template
{
    protected function _prepareLayout()
    {
        new Etu_Er_Helper_Data();
        return parent::_prepareLayout();
    }
    
    public function getProductCount()
    {
        return $this->getData('products_count');
    }
    public function getCustomerId()
    {
        if (!$this->hasData('customer_id')) {
            $customerId = Mage::getSingleton('customer/session')->getCustomerId();
            $this->setData('customer_id', $customerId);
        }
        return $this->getData('customer_id');
    }

    public function getEscapedQueryText()
    {
        return $this->helper('catalogsearch')->getEscapedQueryText();
    }
}

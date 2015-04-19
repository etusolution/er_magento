<?php
class Etu_Er_Block_Checkout_Cart_Crosssell extends Mage_Checkout_Block_Cart_Crosssell
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


}
			
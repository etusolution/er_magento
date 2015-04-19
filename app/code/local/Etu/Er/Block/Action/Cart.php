<?php
class Etu_Er_Block_Action_Cart extends Mage_Checkout_Block_Cart_Abstract
{

    protected function _prepareLayout()
    {
        new Etu_Er_Helper_Data();
    	return parent::_prepareLayout();
    }


    public function getCustomerId()
    {
        if (!$this->hasData('customer_id')) {
            $customerId = Mage::getSingleton('customer/session')->getCustomerId();
            $this->setData('customer_id', $customerId);
        }
        return $this->getData('customer_id');
    }


    public function getItemsJson()
    {
        $ptuple = array();
        foreach ($this->getItems() as $item) {
            array_push($ptuple, 
                array(
                    "paypid" => $item->getProduct()->getId(),
                    "qty" => strval($item->getQty()),
                    "unit_price" => strval($item->getPrice()),
                    "pcat" => implode(',',$item->getProduct()->getCategoryIds()),
                ));
        }
        return json_encode($ptuple);
    }
}

?>
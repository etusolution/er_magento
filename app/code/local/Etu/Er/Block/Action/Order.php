<?php
class Etu_Er_Block_Action_Order extends Mage_Checkout_Block_Cart_Abstract
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

    protected function getOrder()
    {
        if (!isset($this->_order)){
            $orderId = Mage::getSingleton('checkout/session')->getLastOrderId();
            if ($orderId) {
                $this->_order = Mage::getModel('sales/order')->load($orderId);
            }
        }
        return $this->_order;
    }

    protected function getOrderId()
    {
        if ($this->getOrder()->getId()) {
            return $this->getOrder()->getIncrementId();
        }
        return '';
    }

    public function getItems()
    {
        return $this->getOrder()->getItemsCollection();
    }

    public function getItemsJson()
    {
        $ptuple = array();
        foreach ($this->getItems() as $item) {
            if (!$item->getParentItem()) {
            array_push($ptuple, 
                array(
                    "paypid" => $item->getProduct()->getId(),
                    "qty" => strval($item->getQtyOrdered()),
                    "unit_price" => strval($item->getPrice()),
                    "pcat" => implode(',',$item->getProduct()->getCategoryIds()),
                ));
            }
        }
        return json_encode($ptuple);
    }
}

?>
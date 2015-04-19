<?php
class Etu_Er_Block_Ajax_Gridproduct extends Mage_Catalog_Block_Product_Abstract
{
    protected function _prepareLayout()
    {
    	return parent::_prepareLayout();
    }

    public function getProduct()
    {
        $productId = $this->getData('product_id');
        if (!Mage::registry('product') && $productId) {
            $product = Mage::getModel('catalog/product')->load($productId);
            Mage::register('product', $product);
        }
        return Mage::registry('product');
    }

    public function getCaller()
    {
        return $this->getData('caller');
    }

}

?>
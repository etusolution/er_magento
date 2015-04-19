<?php
class Etu_Er_Block_Catalog_Product_List_Related extends Mage_Catalog_Block_Product_List_Related
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

    public function getProduct()
    {
    	return Mage::registry('product');
    }
}
			
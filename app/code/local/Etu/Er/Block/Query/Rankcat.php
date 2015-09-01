<?php
class Etu_Er_Block_Query_Rankcat extends Mage_Core_Block_Template
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

    public function getCurrentCategoryID()
    {
        return $this->getCurrentCategory()->getId();
    }
    public function getCurrentCategory()
    {
        if (!$this->hasData('current_category')) {
            $this->setData('current_category', Mage::registry('current_category'));
        }
        return $this->getData('current_category');
    }
}

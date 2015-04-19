<?php
class Etu_Er_IndexController extends Mage_Core_Controller_Front_Action
{
    public function IndexAction()
    {
     
        $this->loadLayout();
        $this->renderLayout();
       
        return;
    }

    public function ProductAction()
    {
        $productId  = (int) $this->getRequest()->getParam('id');
        $style = $this->getRequest()->getParam('style');
        $this->loadLayout();
        $myBlock = $this->getLayout()->createBlock('er/ajax_gridproduct');
        $myBlock->setData("product_id", $productId);
        $myBlock->setData("caller", $this->getRequest()->getParam('from'));
        $myBlock->setTemplate($style != '' ? 'er/ajax/'.$style.'product.phtml': 'er/ajax/gridproduct.phtml');
        $myHtml =  $myBlock->toHtml(); //also consider $myBlock->renderView();
        $this->getResponse()
        ->setHeader('Content-Type', 'text/html')
        ->setBody($myHtml);
       
        return;
    }
}

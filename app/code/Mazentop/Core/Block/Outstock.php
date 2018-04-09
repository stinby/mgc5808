<?php 
namespace Mazentop\Core\Block;

class Outstock extends \Magento\Swatches\Block\Product\Renderer\Configurable
{

   public function getAllowProducts()
    {
        if (!$this->hasAllowProducts()){
             $skipSaleableCheck = 1;
             $products = $skipSaleableCheck ?
             $this->getProduct()->getTypeInstance()->getUsedProducts($this->getProduct(), null) :
                $this->getProduct()->getTypeInstance()->getSalableUsedProducts($this->getProduct(), null);
            $this->setAllowProducts($products);
        }
        return $this->getData('allow_products');
    }
}
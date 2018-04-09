<?php
namespace Mazentop\Core\Block\Product\Price;

class Discount extends \Magento\Framework\View\Element\Template
{
    protected $registry;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    )
    {
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    public function getDiscount()
    {
        $product = $this->registry->registry('current_product');
        $finalPrice = $product->getFinalPrice();
        $regularPrice = $product->getPrice();
        if ($regularPrice > $finalPrice) {
            return number_format(($regularPrice - $finalPrice) * 100 / $regularPrice,0);
        }
        return 0;
    }
}
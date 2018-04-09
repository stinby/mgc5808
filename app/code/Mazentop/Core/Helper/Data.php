<?php

/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Mazentop\Core\Helper;

use Magento\Catalog\Model\Category;
use Magento\Wishlist\Model\Wishlist;
use Magento\Wishlist\Model\ResourceModel\Item\CollectionFactory;

/**
 * Catalog data helper
 * @SuppressWarnings(PHPMD.TooManyFields)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper {

    protected $_category;
    protected $_wishlistCollectionFactory;
    protected $_storeManagerry;
    protected $_stockItemRepository;
    protected $logoblock;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        Category $category, \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Helper\Category $categoryHelper,
        CollectionFactory $wishlistCollectionFactory, 
        \Magento\Theme\Block\Html\Header\Logo $logoblock, 
        \Magento\CatalogInventory\Api\StockStateInterface $stockItemRepository,
        \Magento\ConfigurableProduct\Model\Product\Type\Configurable $configurable
    ) {
        $this->_category = $category;
        $this->_storeManager = $storeManager;
        $this->_categoryHelper = $categoryHelper;
        $this->_wishlistCollectionFactory = $wishlistCollectionFactory;
        $this->_stockItemRepository = $stockItemRepository;
        $this->logoblock = $logoblock;
        $this->_configurable = $configurable;
        parent::__construct($context);
    }

    public function getBaseUrl() {  //网站域名
        return $this->_storeManager->getStore()->getBaseUrl();
    }

    public function getIsHomePage() {  //判断是否是首页
        return $this->logoblock->isHomePage();
    }

    public function getCurrentUrl() {  
        return $this->_urlBuilder->getCurrentUrl(); // Give the current url of recently viewed page
    }

    public function getMediaUrl($file) {  //Media下的 图片路径
        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).$file;
    }
    
    function getAllChildrenOfCategory($category) {  //获取当前分类的所有子分类
        $resArr = array(); //结果数组    
        $categoryId = $category->getId();
        $categoryName = $category->getName();
        //获取当前分类的子分类
        $_category = $this->_category->load($categoryId);
        $subcatalog = $_category->getChildrenCategories();
        return $subcatalog;
    }
    function getWishCount($productId) {  //get Product Wishlist Count
        $wishlist = $this->_wishlistCollectionFactory->create()->addFieldToFilter('product_id', $productId);
        if ($wishlist) {
            $count = count($wishlist);
        } else {
            $count = 0;
        }
        return $count;
    }

    public function getStoreCurrency() {
        return $this->_storeManager->getStore()->getCurrentCurrency()->getCurrencySymbol();
    }
     public function getStoreCurrencyCode() {
        return $this->_storeManager->getStore()->getCurrentCurrency()->getCurrencyCode();
    }
    public function getStockNum($product) {  //get Product Stock 
        $configurable_products = $this->_configurable->getUsedProducts(
                $product
        );
        $qty = 0;
        if ($configurable_products) {
            foreach ($configurable_products as &$cproduct) {
                $qty += $this->_stockItemRepository->getStockQty($cproduct->getId(), $cproduct->getStore()->getWebsiteId());
            }
        } else {
            $qty = $this->_stockItemRepository->getStockQty($product->getId(), $product->getStore()->getWebsiteId());
        }
        return $qty;
    }   
    
}

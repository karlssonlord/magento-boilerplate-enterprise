<?php
/**
 * Product View block
 *
 * @category    KL
 * @package     KL_Catalog
 * @module      Catalog
 */
class KL_Catalog_Block_Product_View extends Mage_Catalog_Block_Product_View
{
    /**
     * Add meta information from product to head block
     *
     * @see     Mage_Catalog_Block_Product_View::_prepareLayout()
     * @return  Mage_Catalog_Block_Product_View
     */
    protected function _prepareLayout() {
        $product = $this->getProduct();
        if ($product->getMetaDescription() == '') {
            // set short_description as meta_description
            $product->setMetaDescription($product->getShortDescription());
        }

        return parent::_prepareLayout();
    }
}
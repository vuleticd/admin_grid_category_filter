<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category    Vuleticd
 * @package     Vuleticd_AdminGridCategoryFilter
 * @copyright   Copyright (c) 2013 Vuletic Dragan (http://www.vuleticd.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
 class Vuleticd_AdminGridCategoryFilter_Block_Catalog_Product_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function filterCallback($collection, $column)
    {
      $value = $column->getFilter()->getValue();
      $_category = Mage::getModel('catalog/category')->load($value);
      $collection->addCategoryFilter($_category);

      return $collection;
    }
}

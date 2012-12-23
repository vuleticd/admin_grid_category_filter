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
class Vuleticd_AdminGridCategoryFilter_Model_System_Config_Source_Category
{
    public function toOptionArray($addEmpty = true)
    {
        $options = array();
        foreach ($this->load_tree() as $category) {
            $options[$category['value']] =  $category['label'];
        }

        return $options;
    }
    
    
    
    public function buildCategoriesMultiselectValues(Varien_Data_Tree_Node $node, $values, $level = 0)
    {
    	$level++;
    
    	$values[$node->getId()]['value'] =  $node->getId();
    	$values[$node->getId()]['label'] = str_repeat("--", $level) . $node->getName();
    
    	foreach ($node->getChildren() as $child)
    	{
    		$values = $this->buildCategoriesMultiselectValues($child, $values, $level);
    	}
    
    	return $values;
    }
    
    public function load_tree()
    {
    	$store = Mage::app()->getFrontController()->getRequest()->getParam('store', 0);
    	$parentId = $store ? Mage::app()->getStore($store)->getRootCategoryId() : 1;  // Current store root category
    	
    	$tree = Mage::getResourceSingleton('catalog/category_tree')->load();
    
    	$root = $tree->getNodeById($parentId);
    
    	if($root && $root->getId() == 1)
    	{
    		$root->setName(Mage::helper('catalog')->__('Root'));
    	}
    
    	$collection = Mage::getModel('catalog/category')->getCollection()
    	->setStoreId($store)
    	->addAttributeToSelect('name')
    	->addAttributeToSelect('is_active');
    
    	$tree->addCollectionData($collection, true);
    
    	return $this->buildCategoriesMultiselectValues($root, array());
    }
}

<?php
/**
 * Boilerplate
 * Copyright (C) 2014 Karlsson & Lord AB
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301
 * USA
 *
 * @category  KL
 * @package   KL_Boilerplate
 * @author    Erik Eng <erik@karlssonlord.com>
 * @author    Jacob Klapwijk <jacob@karlssonlord.com>
 * @author    Andreas Karlsson <andreas@karlssonlord.com>
 * @copyright 2014 Karlsson & Lord AB
 * @license   http://choosealicense.com/licenses/lgpl-v2.1/ LGPL v2.1
 */

/**
 * Customer account navigation
 */
class KL_Boilerplate_Block_Customer_Address_Edit
    extends Mage_Customer_Block_Address_Edit
{

    public function getCountryHtmlSelect($defValue=null, $name='country_id', $id='country', $title='Country')
    {
        Varien_Profiler::start('TEST: '.__METHOD__);
        if(is_null($defValue)) {
            $defValue = $this->getCountryId();
        }
        $cacheKey = 'DIRECTORY_COUNTRY_SELECT_STORE_'.Mage::app()->getStore()->getCode();
        if(Mage::app()->useCache('config') && $cache = Mage::app()->loadCache($cacheKey)) {
            $options = unserialize($cache);
        } else {
            $options = $this->getCountryCollection()->toOptionArray();
            if(Mage::app()->useCache('config')) {
                Mage::app()->saveCache(serialize($options), $cacheKey, array('config'));
            }
        }

        $html = $this->getLayout()->createBlock('core/html_select')
            ->setName($name)
            ->setId($id)
            ->setTitle(Mage::helper('directory')->__($title))
            ->setClass('validate-select')
            ->setValue($defValue);

        if(count($options) < 3) {
            if(isset($options[0]['value']) && $options[0]['value'] === '') {
                $options = array_slice($options, 1);
            }
        }

        $html = $html->setOptions($options)->getHtml();

        Varien_Profiler::stop('TEST: '.__METHOD__);
        return $html;
    }
}

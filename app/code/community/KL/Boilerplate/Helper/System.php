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
 * System helper
 */
class KL_Boilerplate_Helper_System
     extends Mage_Core_Helper_Abstract
{
    /**
     * Is Enterprise Edition?
     *
     * @return boolean
     */
    public function isEnterpriseEdition()
    {
        $modules = array(
            'Enterprise_AdminGws',
            'Enterprise_Enterprise',
            'Enterprise_Checkout',
            'Enterprise_Customer'
        );

        foreach ($modules as $module) {
            $moduleConfig = Mage::getConfig()->getModuleConfig($module);

            if (!$moduleConfig) {
                return false;
            }
        }

        return true;
    }

    /**
     * Is Community Edition?
     *
     * @return boolean
     */
    public function isCommunityEdition()
    {
        return !$this->isEnterpriseEdition();
    }
}

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
class KL_Boilerplate_Block_Customer_Account_Navigation
    extends Mage_Customer_Block_Account_Navigation
{
    /**
     * Remove link from account navigation
     *
     * @param  string $name
     *
     * @return void
     */
    public function removeLink($name)
    {
        if (isset($this->_links[$name])) {
            unset($this->_links[$name]);
        }
    }
}

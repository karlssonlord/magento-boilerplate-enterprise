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
 * Design package
 */
class KL_Boilerplate_Model_Design_Package
    extends Mage_Core_Model_Design_Package
{
    /**
     * Use this one to get existing file name with fallback to default
     *
     * $params['_type'] is required
     *
     * @param string $file
     * @param array $params
     * @return string
     */
    public function getFilename($file, array $params)
    {
        Varien_Profiler::start(__METHOD__);
        $this->updateParamDefaults($params);
        $result = $this->_fallback($file, $params, array(
            array(),
            array('_theme' => $this->getFallbackTheme()),
            array('_theme' => self::DEFAULT_THEME),
            array('_theme' => self::DEFAULT_THEME, '_package' => 'kl'),
            array('_theme' => self::DEFAULT_THEME, '_package' => 'enterprise'),
            array('_theme' => self::DEFAULT_THEME, '_package' => 'default'),
        ));
        Varien_Profiler::stop(__METHOD__);

        return $result;
    }

    /**
     * Get skin file url
     *
     * @param string $file
     * @param array $params
     * @return string
     */
    public function getSkinUrl($file = null, array $params = array())
    {
        Varien_Profiler::start(__METHOD__);
        if (empty($params['_type'])) {
            $params['_type'] = 'skin';
        }
        if (empty($params['_default'])) {
            $params['_default'] = false;
        }
        $this->updateParamDefaults($params);
        if (!empty($file)) {
            $result = $this->_fallback($file, $params, array(
                array(),
                array('_theme' => $this->getFallbackTheme()),
                array('_theme' => self::DEFAULT_THEME),
                array('_theme' => self::DEFAULT_THEME, '_package' => 'kl'),
                array('_theme' => self::DEFAULT_THEME, '_package' => 'enterprise'),
                array('_theme' => self::DEFAULT_THEME, '_package' => 'default'),
            ));
        }
        $result = $this->getSkinBaseUrl($params) . (empty($file) ? '' : $file);
        Varien_Profiler::stop(__METHOD__);

        return $result;
    }
}

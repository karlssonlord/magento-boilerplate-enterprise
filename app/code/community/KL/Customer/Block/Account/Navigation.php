<?php
/**
 * Customer account navigation sidebar
 *
 * @category   Mage
 * @package    Mage_Customer
 * @author     Erik Eng <erik@karlssonlord.com>
 */

class KL_Customer_Block_Account_Navigation extends Mage_Customer_Block_Account_Navigation
{

    /**
     * Remove link from account navigation
     *
     * @param string $name
     * @return void
     * @access public
     */
    public function removeLink($name)
    {
        if(isset($this->_links[$name])) {
            unset($this->_links[$name]);
        }
    }
}
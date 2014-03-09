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
 * @author    Andreas Karlsson <andreas@karlssonlord.com>
 * @copyright 2014 Karlsson & Lord AB
 * @license   http://choosealicense.com/licenses/lgpl-v2.1/ LGPL v2.1
 * @see       Mage_Core_Block_Messages
 */

/**
 * Messages block
 */
class KL_Boilerplate_Block_Core_Messages
    extends Mage_Core_Block_Messages
{
    /**
     * Retrieve messages in HTML format grouped by type
     *
     * Improvements:
     * - Only output distinct (unique) messages
     * - Simplified markup output
     *
     * @param string $type
     *
     * @return string
     */
    public function getGroupedHtml()
    {
        if (Mage::app()->getStore()->isAdmin()) {
            return parent::getGroupedHtml();
        }

        $types = array(
            Mage_Core_Model_Message::ERROR,
            Mage_Core_Model_Message::WARNING,
            Mage_Core_Model_Message::NOTICE,
            Mage_Core_Model_Message::SUCCESS
        );

        $html = '';
        $messageMap = array();

        foreach ($types as $type) {
            if ($messages = $this->getMessages($type)) {
                if (!$html) {
                    $html .= '<' . $this->_messagesFirstLevelTagName . ' class="messages">';
                }

                foreach ($messages as $message) {
                    $messageText = $message->getText();

                    if (in_array($messageText, $messageMap)) {
                        continue;
                    }

                    $messageMap[] = $messageText;

                    $html .= '<' . $this->_messagesSecondLevelTagName . ' class="message message--' . $type . '">';
                    $html .= '<' . $this->_messagesContentWrapperTagName . '>';
                    $html .= ($this->_escapeMessageFlag) ? $this->escapeHtml($messageText) : $messageText;
                    $html .= '</' . $this->_messagesContentWrapperTagName . '>';
                    $html .= '</' . $this->_messagesSecondLevelTagName . '>';
                }
            }
        }

        if ($html) {
            $html .= '</' . $this->_messagesFirstLevelTagName . '>';
        }

        return $html;
    }
}

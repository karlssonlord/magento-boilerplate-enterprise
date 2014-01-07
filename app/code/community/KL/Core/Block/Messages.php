<?php
/**
 * Messages block
 *
 * @category   Mage
 * @package    Mage_Core
 * @author     Erik Eng <erik@karlssonlord.com>
 */
class KL_Core_Block_Messages extends Mage_Core_Block_Messages
{

    /**
     * Retrieve messages in HTML format grouped by type
     *
     * Improvements:
     * - Only output distinct (unique) messages
     * - Simplified markup output
     *
     * @param   string $type
     * @return  string
     */
    public function getGroupedHtml()
    {
        $types = array(
            Mage_Core_Model_Message::ERROR,
            Mage_Core_Model_Message::WARNING,
            Mage_Core_Model_Message::NOTICE,
            Mage_Core_Model_Message::SUCCESS
        );
        $html = '';

        $messageMap = array();
        foreach($types as $type) {
            if($messages = $this->getMessages($type)) {
                if(!$html) {
                    $html .= '<' . $this->_messagesFirstLevelTagName . ' class="messages">';
                }

                foreach($messages as $message) {
                    $messageText = $message->getText();
                    if(in_array($messageText, $messageMap)) continue;
                    $messageMap[] = $messageText;

                    $html.= '<' . $this->_messagesSecondLevelTagName . ' class="message message--' . $type . '">';
                    $html.= '<' . $this->_messagesContentWrapperTagName . '>';
                    $html.= ($this->_escapeMessageFlag) ? $this->escapeHtml($messageText) : $messageText;
                    $html.= '</' . $this->_messagesContentWrapperTagName . '>';
                    $html.= '</' . $this->_messagesSecondLevelTagName . '>';
                }
            }
        }
        if($html) {
            $html .= '</' . $this->_messagesFirstLevelTagName . '>';
        }

        return $html;
    }
}

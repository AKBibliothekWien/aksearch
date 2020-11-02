<?php
/**
 * Extension of VuFind Mailer Class
 *
 * PHP version 5
 *
 * Copyright (C) AK Bibliothek Wien 2020.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software Foundation,
 * Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1335, USA.
 *
 * @category AKsearch
 * @package  Mailer
 * @author   Michael Birkner <michael.birkner@akwien.at>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://wien.arbeiterkammer.at/service/bibliothek/
 */
namespace AkSearch\Mailer;

use VuFind\Exception\Mail as MailException;

/**
 * Extending VuFind Mailer Class
 * 
 * @category AKsearch
 * @package  Mailer
 * @author   Michael Birkner <michael.birkner@akwien.at>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://wien.arbeiterkammer.at/service/bibliothek/
 */
class Mailer extends \VuFind\Mailer\Mailer
{

    /**
     * Send an email message.
     * 
     * AK: Set Sender header field, mainly to solve problems with emails sent to
     *     gmx.at and web.de addresses.
     *
     * @param string $to      Recipient email address (or delimited list)
     * @param string $from    Sender email address
     * @param string $subject Subject line for message
     * @param string $body    Message body
     * @param string $cc      CC recipient (null for none)
     *
     * @throws MailException
     * @return void
     */
    public function send($to, $from, $subject, $body, $cc = null)
    {
        $recipients = $this->stringToAddressList($to);

        // Validate email addresses:
        if ($this->maxRecipients > 0
            && $this->maxRecipients < count($recipients)
        ) {
            throw new MailException('Too Many Email Recipients');
        }
        $validator = new \Zend\Validator\EmailAddress();
        if (count($recipients) == 0) {
            throw new MailException('Invalid Recipient Email Address');
        }
        foreach ($recipients as $current) {
            if (!$validator->isValid($current->getEmail())) {
                throw new MailException('Invalid Recipient Email Address');
            }
        }
        if (!$validator->isValid($from)) {
            throw new MailException('Invalid Sender Email Address');
        }

        // Convert all exceptions thrown by mailer into MailException objects:
        try {
            // Send message
            $message = $this->getNewMessage()
                ->addFrom($from)
                ->addTo($recipients)
                ->setBody($body)
                ->setSubject($subject)
                ->setSender($from); // AK: Set Sender header (for gmx.at and web.de)
            if ($cc !== null) {
                $message->addCc($cc);
            }
            $this->getTransport()->send($message);
        } catch (\Exception $e) {
            throw new MailException($e->getMessage());
        }
    }
}

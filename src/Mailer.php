<?php

/**
 * Mailer
 *
 * An example mailer class
 */
class Mailer
{

    /**
     * Send a message
     *
     * @param string $email  Recipient email address
     * @param string $message  Content of the message
     *
     * @throws InvalidArgumentException If $email is empty
     *
     * @return boolean
     */
    public static function send(string $email, string $message)
    {
        if (empty($email)) {
            throw new InvalidArgumentException;
        }

        echo "Send '$message' to $email";

        return true;
    }
            /**
     * Send a message
     *
     * @param string $email The email address
     * @param string $message The message
     *
     * @return boolean True if sent, false otherwise
     */
    public function sendMessage($email, $message)
    {
        if (empty($email)) {
            throw new Exception;
        }
        // Use mail() or PHPMailer for example
        sleep(3);

        echo "send '$message' to '$email'";

        return true;
    }
}

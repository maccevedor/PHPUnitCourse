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

}

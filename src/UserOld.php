<?php

/**
 * User
 *
 * A user of the system
 */
class User
{

    /**
     * First name
     * @var string
     */
    public $first_name;

    /**
     * Last name
     * @var string
     */
    public $surname;

    /**
     * Email address
     * @var string
     */
    public $email;

    /**
     * Mailer object
     * @var Mailer
     */
    protected $mailer;


    public function _constructor(string $email)
    {
        $this->email = $email;
    }

    /**
     * Set the mailer dependency
     *
     * @param Mailer $mailer The Mailer object
     */
    public function setMailer(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    /**
     * Get the user's full name from their first name and surname
     *
     * @return string The user's full name
     */
    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }

    /**
     * Send the user a message
     *
     * @param string $message The message
     *
     * @return boolean True if sent, false otherwise
     */
    public function notify(string $message)
    {

        return Mailer::send($this->email,$message);

        //return $this->mailer->sendMessage($this->email, $message);
    }
}

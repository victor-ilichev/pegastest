<?php

namespace Pegas\TestBundle\Entity;

class UserForm
{
    protected $email;

    protected $message;

    public function getEmail() {
        return $this->email;
    }
	
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getMessage() {
        return $this->message;
    }
	
    public function setMessage($message) {
        $this->message = $message;
    }
}

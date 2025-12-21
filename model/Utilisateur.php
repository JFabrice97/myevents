<?php

namespace Model;

    /**
     * User class
     * This class represents a user in the system and provides methods to manage user data.
     */
    class User extends AbstractActionBdd
    {
        private $lastname;
        private $firstname;
        private $sex;
        private $birthdate;
        private $email;

        public function __construct($last_name, $first_name, $sex='', $birthdate='', $email='')
        {
            parent::__construct();
            $this->lastname = $last_name;
            $this->firstname = $first_name;
            $this->sex = $sex;
            $this->birthdate = $birthdate;
            $this->email = $email;
        }

    }

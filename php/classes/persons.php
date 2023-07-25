<?php 
    class person{
        private $FirstName;
        private $LastName;
        private $Email;
       // private $Address;
        private $Password;

        function __construct($FirstName, $LastName, $Email, $Password){
            $this->FirstName = $FirstName;
            $this->LastName = $LastName;
            $this->Email = $Email;
          //  $this->Address = $Address;
            $this->Password = $Password;

        } 
        public function getFirstName(){
            return $this->FirstName;
        }
        public function getLastName(){
            return $this->LastName;
        }
        public function getEmail(){
            return $this->Email;
        }
        // public function getAddress(){
        //     return $this->Address;
        // }
        public function getPassword(){
            return $this->Password;
        }
    }

    class user extends person{
        private $userId;
        private $District;

        private $PhoneNo;

        private $Address;
        function __construct($FirstName, $LastName, $Email, $Password, $Address, $userId, $District, $PhoneNo){
            parent::__construct($FirstName, $LastName, $Email,  $Password);
            $this->userId = $userId;
            $this->District = $District;
            $this->PhoneNo = $PhoneNo;
            $this->Address = $Address;

        }
        public function getUserId(){
            return $this-> userId;
        }
        public function getDistrict(){
            return $this-> District;
        }
        public function getPhoneNo(){
            return $this-> PhoneNo;
        }
        public function getAddress(){
            return $this-> Address;
        }

    }

?>
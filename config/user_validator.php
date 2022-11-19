<?php

//create a user validator class to handle validation
class UserValidator {
    private $data;
    private $errors = [];
    private static $fields = ['username', 'email'];

    //constructor which takes in post data from form
    public function __construct($post_data){
        $this->data = $post_data;
    }

    //create methods to validate indivual fields
    public function validateForm(){

        //check required "fields to check" are present in the data
        foreach(self::$fields as $field){
            if(!array_key_exists($field, $this->data)){
                trigger_error("$field is not present in data");
                return;
            }
        }

        $this->validateUsername();
        $this->validateEmail();
        return $this->errors;
    }

    //-- a method to validate a username 
    private function validateUsername(){

        $val = trim($this->data['username']);

        if(empty($val)){
            $this->addError('username', 'username cannot be empty');
        } else {
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
                $this->addError('username', 'username must be 6-12 chars & alphanumeric');
            }
        }
    }

    //-- a method to validate an email
    private function validateEmail(){
        $val = trim($this->data['email']);

        if(empty($val)){
            $this->addError('email', 'email cannot be empty');
        }else {
            if(!filter_var('$val', FILTER_VALIDATE_EMAIL)){
                $this->addError('email', 'email must be a valid email');
            }
        }

    }

    // return an error array once all checks are done
    private function addError($key, $val){
        $this->errors[$key] = $val;
    }

}

?>
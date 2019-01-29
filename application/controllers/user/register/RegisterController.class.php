<?php

class RegisterController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	

     

       
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	var_dump($_POST);

        $userModel = new UserModel();
        $userModel->signUp(
                        $_POST['lastName'],
                        $_POST['firstName'],
                        $_POST['email'],
                        $_POST['password'],
                        $_POST['birthYear'].'-'.$_POST['birthMonth'].'-'.$_POST['birthDay'],
                        $_POST['address'],
                        $_POST['city'],
                        $_POST['zipCode'],
                        $_POST['phone']
                    );

    }
}
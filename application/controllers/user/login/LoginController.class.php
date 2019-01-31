<?php

class LoginController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	

     

       
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        //var_dump($_POST);

        $userModel = new UserModel();
        $userModel->findWithEmailPassword($_POST['email'],$_POST['password']);

        $http->redirectTo('/')
    }
}
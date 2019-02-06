<?php

class ValidateController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	// redirection pour les petits malins pas connectés 
        if(array_key_exists('user', $_SESSION) == false) {
            $http->redirectTo('/user/login');
        }
     

       
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
     
    }
}
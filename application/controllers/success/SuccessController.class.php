<?php

class SuccessController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	// redirection si un petit malin n'est pas connecté et veut passer par l'url

        if(array_key_exists('user', $_SESSION) == false) {
            $http->redirectTo('/user/login');
        }
     

       
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        
    }
}
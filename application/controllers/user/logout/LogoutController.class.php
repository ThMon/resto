<?php

class LogoutController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

    	// haha si tu comprends pas ça t'es nul 
    	// juste on vide $_SESSION pour déconnecter
    	session_destroy();

    	//redirection vers index
        $http->redirectTo('/');   

       
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    
    }
}
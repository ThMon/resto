<?php

class PaymentController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	
        if(array_key_exists('user', $_SESSION) == false) {
            $http->redirectTo('/user/login');
        }
     

       
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        var_dump($_POST);
        $order = json_decode($_POST['order']);
        var_dump($order);
    }
}
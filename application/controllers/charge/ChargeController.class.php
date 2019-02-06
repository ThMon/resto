<?php

class ChargeController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	// redirection si un petit malin n'est pas connecté et veut passer par l'url

       
            $http->redirectTo('/order');
            

       
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

        $orderId= $_GET['orderId'];
        $orderModel = new OrderModel();

        $order = $orderModel->findOrder($orderId);

        $totalTTC = floatval($order['TotalAmount']) + floatval($order['TaxAmount']);

        require_once('vendor/autoload.php');


        \Stripe\Stripe::setApiKey('sk_test_WvJOfwZp9WEwNygwuHXgiwLX');

        //$_POST['first_name'];

        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

        
        $email = $_SESSION['user']['email'];
        $token = $_POST['stripeToken'];

        // create customer 

        $customer = \Stripe\Customer::create(array(
            "email" => $email,
            "source" => $token
        ));

        $charge = \Stripe\Charge::create(array(
            "amount" => $totalTTC*100,
            "currency" => "eur",
            "description"=>"Commande ok",
            "customer" => $customer->id
        ));

        //redirection vers success
        $http->redirectTo('/success?tid='.$charge->id.'&product='.$charge->decription);

    }
}
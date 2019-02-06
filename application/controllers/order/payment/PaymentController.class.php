<?php

class PaymentController
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
        // recupération du post on vérifie toujours les infos
       // var_dump($_POST);

        // transformation de la string JSON récupéré en tableau d'objet PHP
        $orders = json_decode($_POST['order']);
       // var_dump($orders);

        $mealModel = new MealModel();


        /*Le prix n'est pas du tout sécurisé depuis le local storage

            on boucle sur tous les meals de la commande afin de récupérer les prix unitaire depuis la 

            base de données. Dans notre tableau d'objet $orders on ajoute un clef safeSalePrice sur chaque meal.
        */
        foreach($orders as $order) {
            $meal = $mealModel->find($order->mealId);
            $order->safeSalePrice = $meal['SalePrice'];
        }

        var_dump($orders);

        // fonction d'enregistrement de la commande dans les tables Order et OrderLine
        $orderModel = new OrderModel();
        $totalTTC    = $orderModel->validate
        (
            $_SESSION['user']['userId'],
            $orders
        );

        



    }
}
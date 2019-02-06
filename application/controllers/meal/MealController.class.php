<?php

class MealController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	// ceci est une mini api qui a pour but de renvoyer du json d'un meal en particulier
        if(array_key_exists('id', $_GET) == true && ctype_digit($_GET['id']) == true)
        {
                // recupération du meal dans la variable $meal
                $mealModel = new MealModel();
                $meal      = $mealModel->find($_GET['id']);

                // transformation de la varaible en json
                $http->sendJsonResponse($meal);

               
        
        } else {
            $http->redirectTo('/');
        }

        
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    
    }
}
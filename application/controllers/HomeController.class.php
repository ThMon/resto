<?php

class HomeController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */

    // On instancie MealModel afin de recupérer la méthode listAll() qui récupère tous les meals

        $mealModel = new MealModel();
        $meals     = $mealModel->listAll();

    // var_dump($meals);

    // il faut retourner la variable dans le phtml  on renvoie un tableau associatif, la key sera le nom
    // de la variable ds le html et la value sera ce qu'elle contient

        return
        [
            'meals'    => $meals
        ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
    }
}
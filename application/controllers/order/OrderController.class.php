<?php

class OrderController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        // redirection si un petit malin n'est pas connecté et veut passer par l'url
    	if(array_key_exists('user', $_SESSION) == false) {

    		$http->redirectTo('/user/login');
    	}

        //on instancie MealModel pour avoir accès à ses méthode 
    	$mealModel = new MealModel();

        // utlisation de la méthode listAll qui récupère tous les meals
        $meals     = $mealModel->listAll();

        // il faut retourner la variable dans le phtml  on renvoie un tableau associatif, la key sera le nom
        // de la variable ds le html et la value sera ce qu'elle contient
		return
		[
			'meals' => $meals
		];

       
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    
    }
}

?>
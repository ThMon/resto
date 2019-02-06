<?php

class RegisterController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	

     

       
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        //on vérifie toujours qu'on récupère bien le form
    	//var_dump($_POST);

        //instanciation des méthodes contenu ds le UserModel
        $userModel = new UserModel();

        // appel de la méthode signUp qui enregistreun nouvel utilisateur dans la base de donnée
        $userModel->signUp(
                        $_POST['lastName'],
                        $_POST['firstName'],
                        $_POST['email'],
                        $_POST['password'],
                        $_POST['birthYear'].'-'.$_POST['birthMonth'].'-'.$_POST['birthDay'],
                        $_POST['address'],
                        $_POST['city'],
                        $_POST['zipCode'],
                        $_POST['phone']
                    );
        //redirection vers index
        $http->rediretTo('/');

    }
}
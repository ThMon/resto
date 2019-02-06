<?php

class LoginController
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

        // méthode qui créer la session utilisateur en vérifiant email et mot de passe
        $userModel->findWithEmailPassword($_POST['email'],$_POST['password']);

        // redirection
        $http->redirectTo('/');
    }
}
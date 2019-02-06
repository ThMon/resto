<?php

class UserModel {

    //méthode d'enregistrement utilisateur
	public function signUp( $lastname, $firstname, $email, $password, $birthDate, $address, $city, $zipCode, $phone ) {

        // instaciation de la librairie database

		$database = new Database();

        // il faut hasher le mot de pass pour des raisons de sécurité

		$hashPassword = $this->hashPassword($password);
		
		$sql = 'INSERT INTO User (  LastName,
									FirstName,
									Email,
									Password,
									BirthDate,
									CreationTimestamp,
									Address,
									City,
									ZipCode,
									Phone )
				VALUES (?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?)';

		$values = [$lastname, $firstname, $email, $hashPassword, $birthDate, $address, $city, $zipCode, $phone];

		$database->executeSql($sql, $values);


	}

    //méthode pour connecter utilisateur
	public function findWithEmailPassword($email, $password)
    {
        $database = new Database();

        // Récupération de l'utilisateur ayant l'email spécifié en argument.
        $user = $database->queryOne
        (
            "SELECT
                *
            FROM User
            WHERE Email = ?",
            [ $email ]
        );

        // Est-ce qu'on a bien trouvé un utilisateur ?
        if(empty($user) == true)
        {
           var_dump('pas trouvé');
        }

        // Est-ce que le mot de passe spécifié est correct par rapport à celui stocké ?
    	if($this->verifyPassword($password, $user['Password']) ==true)
    	{
			// création de la session et enregistrement date(ds la super gloabal $_SESSION)
    		$_SESSION['user']['userId'] = $user['Id'];
    		$_SESSION['user']['firstName'] = $user['FirstName'];
    		$_SESSION['user']['lastName'] = $user['LastName'];
    		$_SESSION['user']['email'] = $user['Email'];
    		$_SESSION['user']['address'] = $user['Address'];
    		$_SESSION['user']['city'] = $user['City'];
    		$_SESSION['user']['zipCode'] = $user['ZipCode'];
    		$_SESSION['user']['phone'] = $user['Phone'];

    		var_dump($_SESSION);

    	}

		
    }


    // méthode de cryptage mot de passe
	private function hashPassword($password)
    {
        
        $salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);

        return crypt($password, $salt);
    }

    // méthode de vérification de mot de passe crypté
    private function verifyPassword($password, $hashedPassword)
	{
		return crypt($password, $hashedPassword) == $hashedPassword;
	}

}



?>
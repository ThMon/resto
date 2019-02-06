<?php

class MealModel {

    // méthode pour récupérer tous les meals

	public function listAll() {
        $database = new Database();

        $sql = 'SELECT * FROM Meal';

        return $database->query($sql);
    }


    // méthode pour récupérer un meals en fonction de son id


    public function find($mealId)
    {
        $database = new Database();

        $sql = 'SELECT
                    *
                FROM Meal
                WHERE Id = ?';

        // Récupération du produit alimentaire spécifié.
        return $database->queryOne($sql, [ $mealId ]);
    }

}



?>
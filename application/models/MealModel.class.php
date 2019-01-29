<?php

class MealModel {

	public function listAll() {
        $database = new Database();

        $sql = 'SELECT * FROM Meal';

        return $database->query($sql);
    }

}



?>
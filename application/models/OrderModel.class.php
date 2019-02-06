<?php


class OrderModel
{   
	

    /* Méthode d'enregistrement d'un order et de ses orderline

        il faut d'abord créer un order et récupérer l'id de l'order créer.

        On boucle ensuite sur les  meal pour les enregister sur orderline grace à l'id récupérer précédement on

        peut les lier à un order.


    */
    public function validate($userId, array $basketItems)
    {
        $database = new Database();

        // Insertion de la commande dans la base de donées.
        $orderId = $database->executeSql
        (
            'INSERT INTO `Order`
			(
				User_Id,
				CreationTimestamp,
				TaxRate,
                Status
			) VALUES (?, NOW(), 20.0, "not payed")',
            [ $userId ]
        );


        $sql = 'INSERT INTO OrderLine
        (
            Order_Id,
            Meal_Id,
            QuantityOrdered,
            PriceEach
        ) VALUES (?, ?, ?, ?)';

        // Initialisation du montant total HT.
        $totalAmount = 0;

        // Insertion des lignes de la commande.
        foreach($basketItems as $basketItem)
        {
            // Ajout du montant HT de la ligne du panier au montant total HT.
            $totalAmount += $basketItem->quantity * $basketItem->safeSalePrice;

            // Insertion d'une ligne de commande dans la base de données.
            $database->executeSql
            (
                $sql,
                [
                    $orderId,
                    $basketItem->mealId,
                    $basketItem->quantity,
                    $basketItem->safeSalePrice
                ]
            );
        }


        // Mise à jour de la commande dans la base de données, avec les montants.
        $sql = 'UPDATE `Order`
				SET CompleteTimestamp = NOW(),
					TotalAmount       = ?,
					TaxAmount         = ? * TaxRate / 100
				WHERE Id = ?';

        $database->executeSql
        (
            $sql,
            [
                $totalAmount,
                $totalAmount,
                $orderId
            ]
        );

        $taxeRate = $totalAmount * 0.2;

        $totalTTC = $totalAmount + $taxeRate;

        return $totalTTC;
    }
}
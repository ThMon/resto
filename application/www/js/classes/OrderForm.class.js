'use strict';

// gestion de toute la page order
var OrderForm = function()
{
    // instanciation de toutes les méthodes de gestion de localStorage
	this.basket = new BasketSession();

	this.onChangeMeal();
	$('#meal').on('change', this.onChangeMeal.bind(this));
	$('#order-form button').on('click', this.validateMeal.bind(this));
    $(document).on('click', '.trash', this.removeMeal.bind(this));
}

//au changement fait une requête AJAX sur notre page /meal afin d'avoir les infos d'un meal
OrderForm.prototype.onChangeMeal = function(event)
{
    var mealId;

    mealId = $('#meal').val();

    //console.log(mealId);

   // console.log(getRequestUrl() + '/meal?id=' + mealId);
    
    $.getJSON( getRequestUrl() + '/meal?id=' + mealId, this.onAjaxChangeMeal);    
};

// affichage d'un meal 
OrderForm.prototype.onAjaxChangeMeal = function(response)
{

	console.log(response);

	var imageUrl = getWwwUrl() + '/images/meals/' + response.Photo;

    $('#meal-details p').text(response.Description);
    $('#meal-details strong').text(parseFloat(response.SalePrice).toFixed(2));
    $('#meal-details img').attr('src', imageUrl);

   // $('#order-form input[name=salePrice]').val(response.SalePrice);

}


// enregistrement d'un meal ds le localStorage et utilisation de la méthode add dans basketSession
OrderForm.prototype.validateMeal = function(event) {
	event.preventDefault();

	var mealId = $('#meal').val();
	var name = $('#meal').find('option:selected').text();
    var quantity = $('#quantity').val();
    var salePrice = $('#meal-details strong').text();
    var img = $('#meal-details img').attr('src');

    console.log(mealId+','+ name+','+ quantity+','+ salePrice);

	this.basket.add(mealId, name, quantity, salePrice, img);


}

// méthode qui supprime un meal du LocalStorage appelle la méthode remove de BasketSession
OrderForm.prototype.removeMeal = function(event) {
    event.preventDefault();
    var index = event.currentTarget.dataset.id;
    console.log(index);
    this.basket.remove(index);

}
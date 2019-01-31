'use strict';


var OrderForm = function()
{

	this.basket = new BasketSession();

	this.onChangeMeal();
	$('#meal').on('change', this.onChangeMeal.bind(this));
	$('#order-form button').on('click', this.validateMeal.bind(this));

}


OrderForm.prototype.onChangeMeal = function(event)
{
    var mealId;

    mealId = $('#meal').val();

    console.log(mealId);

    console.log(getRequestUrl() + '/meal?id=' + mealId);
    
    $.getJSON( getRequestUrl() + '/meal?id=' + mealId, this.onAjaxChangeMeal.bind(this));    
};


OrderForm.prototype.onAjaxChangeMeal = function(response)
{

	console.log(response);

	var imageUrl = getWwwUrl() + '/images/meals/' + response.Photo;

    $('#meal-details p').text(response.Description);
    $('#meal-details strong').text(parseFloat(response.SalePrice).toFixed(2));
    $('#meal-details img').attr('src', imageUrl);

   // $('#order-form input[name=salePrice]').val(response.SalePrice);

}

OrderForm.prototype.validateMeal = function(event) {
	event.preventDefault();

	var mealId = $('#meal').val();
	var name = $('#meal').find('option:selected').text();
    var quantity = $('#quantity').val();
    var salePrice = $('#meal-details strong').text();

    console.log(mealId+','+ name+','+ quantity+','+ salePrice);

	this.basket.add(mealId, name, quantity, salePrice);


}
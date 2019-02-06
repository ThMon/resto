'use strict';

var RecapValidate = function()
{
	// recupération du panier
	this.basket = new BasketSession();
	// envoie le panier dans la value du input hidden du formulaire de la page
	// nous permet d'envoyer l'info côté PHP
	this.sendToPhp();
};


RecapValidate.prototype.sendToPhp = function() {
	var order = JSON.stringify(this.basket.items)

	console.log(order);
	$('#orderValidation').val(order);
}
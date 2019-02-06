'use strict';

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////

console.log(document.location.href);
/*
	On teste les url de la page grace à document.location.href.indexOf (natif js)
	si on est sur /order on instancie OrderForm si on est sur /order/validate on instacie RecapValidate
*/
if (document.location.href.indexOf('order') != -1 && document.location.href.indexOf('order/validate') == -1 && document.location.href.indexOf('order/payment') == -1) {
	console.log('JS orderForm');
	var order = new OrderForm();
}

if (document.location.href.indexOf('order/validate') != -1) {
	console.log('JS Validate');
	var validate = new RecapValidate();
}


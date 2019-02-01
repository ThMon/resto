'use strict';

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////

console.log(document.location.href);

if (document.location.href.indexOf('order') != -1 && document.location.href.indexOf('order/validate') == -1) {
	console.log('JS orderForm');
	var order = new OrderForm();
}

if (document.location.href.indexOf('order/validate') != -1) {
	console.log('JS Validate');
	var validate = new RecapValidate();
}


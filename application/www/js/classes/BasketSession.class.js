'use strict';

var BasketSession = function()
{
    // Contenu du panier.
    this.items = null;

    this.load();
};



BasketSession.prototype.save = function()
{
    saveDataToDomStorage('panier', this.items);
};


BasketSession.prototype.load = function()
{
    this.items = loadDataFromDomStorage('panier');

    if(this.items == null)
    {
        this.items = [];
    }
    this.build();
};

BasketSession.prototype.add = function(mealId, name, quantity, salePrice)
{


    mealId    = parseInt(mealId);
    quantity  = parseInt(quantity);
    salePrice = parseFloat(salePrice);

    for(var index = 0; index < this.items.length; index++)
    {
        if(this.items[index].mealId == mealId)
        {
            this.items[index].quantity += quantity;

            this.save();
            this.build();

            return;
        }
    }

    this.items.push(
    {
        mealId    : mealId,
        name      : name,
        quantity  : quantity,
        salePrice : salePrice
    });

    this.save();
    this.build();

};




BasketSession.prototype.build = function() {
	var table = $('<table class="generic-table">');

	table.append('<tr><td class="number"><strong>Quantité</strong></td><td><strong>Produit</strong></td><td class="number"><strong>Prix Unitaire</strong></td><td class="number"><strong>Prix Total</strong></td></tr>');

	for (var i =0; i < this.items.length; i++) {
		var tr = $('<tr>');
		tr.append('<td class="number">'+this.items[i].quantity+'</td><td ><strong>'+this.items[i].name+'</strong></td><td class="number">'+this.items[i].salePrice+'</td><td class="number">'+parseFloat(this.items[i].quantity)*parseFloat(this.items[i].salePrice)+'</td>')
		table.append(tr);
	}

	$('#order-summary').html(table);

}

(function($) {init();})(jQuery);

function init() {

 // CartJS.addItem(3,1000);

   CartJS.init({
    "token": "14545454545",
    "note": null,
    "attributes": {},
    "total_price": 0,
    "total_discount": 0,
    "total_weight": 0,
    "item_count": 0,
    "items": [],
    "requires_shipping": false
  },{
      "currency": "人名币",
      "moneyFormat": "${{amount}}",
      "moneyWithCurrencyFormat": "${{amount}} ￥",
      "dataAPI": true,
      "debug": true
    });
}
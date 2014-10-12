var username = "Marcus";
var urlPrefix = "http://128.199.213.71:9292/";
var serverPrefix = "http://localhost/cs/index.php/"; 

var brokerId = "cs";
var type = "Market";
var transactionInterval;
var transactionDone;

var testPrice = 6;

$(document).ready(function() {
    $("#buyButton").click( function() {
        // var price = document.getElementById("buyPrice").value;
        console.log("clicked");
        var price = testPrice;
        var ric = "0002.HK";
        var quantity = 100;


        checkMarcketPrice({price: price, ric: ric, isBuying: true, quantity: quantity, brokerId: brokerId, type: type});
    });

    $("#sellButton").click( function() {
        // var price = document.getElementById("sellPrice").value;
        var price = testPrice;
        var ric = "0002.HK";
        var quantity = 100;


        checkMarcketPrice({price: price, ric: ric, isBuying: true});
    });
});

function checkMarcketPrice(option){
    transactionDone = false;
    transactionInterval = setInterval(function () {
        $.ajax({
          type: "GET",
          url: serverPrefix+ "instrument/"+ option.ric,
          crossDomain : true,
          success: function(data){
            var date = new Date();
            var response = $.parseJSON(data);
            console.log(response);

            var priceCompare = (option.isBuying) ? (response.livePrice <= option.price) : (response.livePrice >= option.price);
            if (priceCompare && !transactionDone){
                doTransaction(option);
            }
          },
        });
    }, 1000);  
};

function doTransaction(data){
    $.ajax({
      type: "POST",
      url: urlPrefix + "buy",
      data: JSON.stringify(data),
      crossDomain : true,
      success: function(response){
        console.log(response);
        updateDatabase(data);
      },
    });
};

function updateDatabase(data){
    
	$.ajax({
      type: "POST",
      url: serverPrefix+ "member_area/buy",
      data: "sid=" + data.ric + "&price=" + data.price+ "&amount=" +data.quantity,
      crossDomain : true,
      success: function(data){
        console.log(data);
       clearInterval(transactionInterval);
      },
    });
};

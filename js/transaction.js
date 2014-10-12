var username = "Marcus";
var urlPrefix = "http://128.199.213.71:9292/";
var serverPrefix = "http://localhost/cs/index.php/"; 

var brokerId = "cs";
var type = "Market";
var transactionInterval;
var transactionDone;
var price = 100;
var testPrice = 6;


var ric = "0002.HK";
var quantity = 100;


$(document).ready(function() {


    $("#transactionForm").submit(function(e) {
        e.preventDefault();
    });

    $("#buyButton").click( function() {
        console.log("clicked");
        price = getPrice();
        ric = getCurrentRic();
        quantity = parseInt(getAmount());
        checkMarcketPrice({price: price, ric: ric, isBuying: true, quantity: quantity, brokerId: brokerId});
    });

    $("#sellButton").click( function() {
        price = getPrice();
        ric = getCurrentRic();
        quantity = parseInt(getAmount());

        checkMarcketPrice({price: price, ric: ric, isBuying: true});
    });


    setCurrentRic('0003.HK');
    console.log(getCurrentRic());

});

function checkMarcketPrice(option){
    transactionDone = false;
    transactionInterval = setInterval(function () {
        $.ajax({
          type: "GET",
          url: urlPrefix+ "instrument/"+ option.ric,
          crossDomain : true,
          success: function(data){
            var date = new Date();
            var response = $.parseJSON(data);

            var priceCompare = (option.isBuying) ? (response.livePrice <= option.price) : (response.livePrice >= option.price);
            if (priceCompare && !transactionDone){
                doTransaction({ric: ric, quantity: quantity, brokerId: brokerId, type: type, price: price, isBuying: option.isBuying});
            }
          },
        });
    }, 1000);  
};

function doTransaction(data){
 
    console.log(JSON.stringify({ "ric" : data.ric, "quantity" : data.quantity, "brokerId" : data.brokerId, "type" : type }));
    $.ajax({
      type: "POST",
      url: urlPrefix + "buy",
      data: JSON.stringify(data),
      crossDomain : true,
      success: function(response){
        alert(response);
        var reply = JSON.parse(response);

        updateDatabase({ric: data.ric, price: reply.price, quantity: data.quantity});
        // clearInterval(transactionInterval);
      },
      error: function(e){
        console.log("error"+e);
      }
    });
};

function updateDatabase(data){
	$.ajax({
      type: "POST",
      url: serverPrefix+ "member_area/" + data.isBuying ? "buy" : "sell",
      data: "sid=" + data.ric + "&price=" + data.price+ "&amount=" +data.quantity,
      crossDomain : true,
      success: function(response){
        console.log(response);
        console.log("sid=" + data.ric + "&price=" + data.price+ "&amount=" +data.quantity);
        clearInterval(transactionInterval);
      },
    });
};

var username = "Marcus";
var urlPrefix = "http://128.199.213.71:9292/";
var serverPrefix = "http://localhost/cs/"; 
var ric = "0002.HK";
var quantity = 100;
var brokerId = "cs";
var type = "Market";
var transactionInterval;
var transactionDone;


$(document).ready(function() {
    $("#buyButton").click( function() {
        var price = document.getElementById("buyPrice").value;//$("#buyPrice").value;
        console.log(price);
        buyAtPrice(price, ric);
    });
});

function buyAtPrice(price,ric){
    transactionDone = false;
    transactionInterval = setInterval(function () {
        $.ajax({
          type: "GET",
          url: "http://128.199.213.71:9292/instrument/"+ ric,
          crossDomain : true,
          success: function(data){
            var date = new Date();
            var response = $.parseJSON(data);
            console.log(response);
            if (response.livePrice < price && !transactionDone){
                doTransaction({ric: ric, quantity: quantity, brokerId: brokerId, type: type});
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
      url: serverPrefix + "member_area/buy",
      data: JSON.stringify(data),
      crossDomain : true,
      success: function(data){
        console.log(data);
        clearInterval(transactionInterval);
      },
    });
};

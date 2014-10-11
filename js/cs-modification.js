var testingEnvironment = true;
var urlPrefix = "http://128.199.213.71:9292/";
var serverPrefix = "http://localhost/cs/index.php/member_area/"; 
var actualUrlPrefix = (testingEnvironment ? serverPrefix : urlPrefix);



//dynamic table for the stock list
$.ajax({
  type: "GET",
  url: actualUrlPrefix+ "instruments",
  // data: data,
  crossDomain : true,
  success: function(data){
    var response = $.parseJSON(data);
    console.log(response);
    console.log(response[0]);
    console.log(JSON.stringify(response[0]));


        
          for(var i=0; i<response.length; i++) {
            var selectId = "<td id=No"+ (i+1) + ">";
            $("#stockInfo").append(
              $('<div style="border: 1px solid black;">'),           
                $('<tr>'),
                 $('<td>').text(i+1),
                 $('<td>').text(response[i].ric),
                 $('<td>').text(response[i].name),
                 $(selectId).text(Math.round(response[i].livePrice*100)/100),
                 $('</tr>'),
              $('</div>')
            );
          }
  }
});
//create table for the stock list


setInterval(function () {
  $.ajax({
    type: "GET",
    url: actualUrlPrefix+ "instruments",
    // data: data,
    crossDomain : true,
    success: function(data){
      var response = $.parseJSON(data);
      console.log(response);
      console.log(response[0]);
      console.log(JSON.stringify(response[0]));


      for(var i=0; i<response.length; i++){
        var selectId="No"+ (i+1) ;
        $('#'+selectId).text(Math.round(response[i].livePrice*100)/100)
      }
      //$('#No1').text(Math.round(response[0].livePrice*100)/100)
    }
  });
}, 1000);
//dynamic update the live price




//search in the stock list
var $rows = $('#stockInfo tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
//search in the stock list
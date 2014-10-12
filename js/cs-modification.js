var chart;
var chartData = [];
var chartCursor;


var testingEnvironment = true;
var urlPrefix = "http://128.199.213.71:9292/";
var serverPrefix = "http://localhost/cs/index.php/member_area/"; 
var actualUrlPrefix = (testingEnvironment ? serverPrefix : urlPrefix);
var interval1;

//create table for the stock list
$.ajax({
  type: "GET",
  url: actualUrlPrefix+ "instruments",
  // data: data,
  crossDomain : true,
  success: function(data){
    var response = $.parseJSON(data);
    // console.log(response);
    // console.log(response[0]);
    // console.log(JSON.stringify(response[0]));

    
        
    for(var i=0; i<response.length; i++) {
      var selectId = "<td id=No"+ (i+1) + ">";
      var selectIdRow= "<tr id=Num"+ (i+1) + ">";
      var str=selectIdRow+      
                "<td>"+(i+1)+"</td>"+
                "<td id='Ric"+(i+1)+"'>"+response[i].ric+"</td>"+
                "<td id='Com"+(i+1)+"'>"+response[i].name+"</td>"+
                selectId+Math.round(response[i].livePrice*100)/100+"</td>"+
              "</tr>";

      $("#stockInfo").append(str);

      // $("#Num"+(i+1)).click( drawRealtime(response[i].ric, true));
      $("#Num"+(i+1)).click(function(){
          var oldId = ($(this).attr('id'));
          var newId = oldId.replace("Num", "Ric");
          var comId = oldId.replace("Num", "Com");
          console.log($("#"+newId).text());
          $("#CompanyName").text($("#"+newId).text()+"    "+$("#"+comId).text());
          // drawRealtime($("#"+newId).text(), true);        //PROBLEM HERE
          drawRealtime("0006.HK",true);

      });
    }
  }


          
});
//create table for the stock list

//dynamic update the live price
setInterval(function () {
  $.ajax({
    type: "GET",
    url: actualUrlPrefix+ "instruments",
    // data: data,
    crossDomain : true,
    success: function(data){
      var response = $.parseJSON(data);
      // console.log(response);
      // console.log(response[0]);
      // console.log(JSON.stringify(response[0]));


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


function drawRealtime(selectedRIC, refresh){
    if(typeof(selectedRIC)==='undefined') selectedRIC = "0002.HK";
    if(typeof(refresh)==='undefined') refresh = false;
    
    // (function() {
        // SERIAL CHART    
        if (refresh){
                chart.dataProvider = [];
                chartData = [];
                chart.validateData();
                clearInterval(interval1);
                refresh = false;
        };

        chart = new AmCharts.AmSerialChart();
        chart.pathToImages = "http://www.amcharts.com/lib/images/";
        chart.marginTop = 0;
        chart.marginRight = 10;
        chart.autoMarginOffset = 5;
        chart.zoomOutButton = {
            backgroundColor: '#000000',
            backgroundAlpha: 0.15
        };
        chart.dataProvider = chartData;
        chart.categoryField = "date";

        // AXES
        // category
        var categoryAxis = chart.categoryAxis;
        categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
        categoryAxis.minPeriod = "ss"; 
        categoryAxis.dashLength = 1;
        categoryAxis.gridAlpha = 0.15;
        categoryAxis.axisColor = "#DADADA";

        // value                
        var valueAxis = new AmCharts.ValueAxis();
        valueAxis.axisAlpha = 0.2;
        valueAxis.dashLength = 1;
        chart.addValueAxis(valueAxis);

        // GRAPH
        var graph = new AmCharts.AmGraph();
        graph.title = "red line";
        graph.valueField = "visits";
        graph.bullet = "round";
        graph.bulletBorderColor = "#FFFFFF";
        graph.bulletBorderThickness = 2;
        graph.lineThickness = 2;
        graph.lineColor = "#b5030d";
        graph.negativeLineColor = "#0352b5";
        graph.hideBulletsCount = 50; // this makes the chart to hide bullets when there are more than 50 series in selection
        chart.addGraph(graph);

        // CURSOR
        chartCursor = new AmCharts.ChartCursor();
        chartCursor.cursorPosition = "mouse";
        chart.addChartCursor(chartCursor);

        // SCROLLBAR
        var chartScrollbar = new AmCharts.ChartScrollbar();
        chartScrollbar.graph = graph;
        chartScrollbar.scrollbarHeight = 40;
        chartScrollbar.color = "#FFFFFF";
        chartScrollbar.autoGridCount = true;
        chart.addChartScrollbar(chartScrollbar);

        // WRITE
        chart.write("chartdiv");
        interval1 = setInterval(function () {
            $.ajax({
              type: "GET",
              url: actualUrlPrefix + "instrument/"+ selectedRIC,
              crossDomain : true,
              success: function(data){
                var date = new Date();
                var response = $.parseJSON(data);
                if (chart.dataProvider.length > 25) 
                    chart.dataProvider.shift();
                chart.dataProvider.push({
                    date: date,
                    visits: response.livePrice
                });
                chart.validateData();
              },
            });
        }, 1000);
    // });
};

drawRealtime();

$("#PortfolioInfo").click(function(){
  window.open("http://localhost/cs/index.php/member_area/");
});

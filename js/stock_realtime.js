var chart;
var chartData = [];
var chartCursor;

var testingEnvironment = true;
var urlPrefix = "http://128.199.213.71:9292/";
var serverPrefix = "http://localhost/cs/index.php/member_area/"; 
var actualUrlPrefix = (testingEnvironment ? serverPrefix : urlPrefix);

// create chart
AmCharts.ready(function() {
    // SERIAL CHART    
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
    setInterval(function () {

        // chart.dataProvider.shift();
        $.ajax({
	      type: "GET",
		  url: actualUrlPrefix + "instrument/0002.HK",
		  crossDomain : true,
		  success: function(data){
		  	var date = new Date();
		  	var response = $.parseJSON(data);
		  	// console.log(response);

        	chart.dataProvider.push({
            	date: date,
            	visits: response.livePrice
        	});
        	chart.validateData();
        	// console.log(JSON.stringify(chart.dataProvider));

		  },
		});
    }, 1000);
});
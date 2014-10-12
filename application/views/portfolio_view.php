<!DOCTYPE html>
<html lang="en">
<div id='chartdiv'> </div>

<style>
    #chartdiv {
        width       : 100%;
        height      : 300px;
        font-size   : 11px;
    }
</style>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/pie.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/themes/none.js"></script>
<script type="text/javascript" src="http://underscorejs.org/underscore-min.js"></script>
<script type="text/javascript">

var pieDataArray1 = ["Lithuania","Czech Republic","Ireland","Germany"];
var pieDataArray2 = [100,200,300,400];
var pieData = [];
for (var i=0; i<pieDataArray2.length; i++){
    pieData.push({ric: pieDataArray1[i], allowance: pieDataArray2[i]});
}

var pieChart = AmCharts.makeChart("chartdiv", {
    "type": "pie",
    "theme": "none",
    "dataProvider": pieData,
    "valueField": "allowance",
    "titleField": "ric",
    "exportConfig":{    
      menuItems: [{
      icon: '/lib/3/images/export.png',
      format: 'png'   
      }]  
    }
});
</script>
</html>
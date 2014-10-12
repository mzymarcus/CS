<!DOCTYPE html>
<html lang="en">
<div id='chartdiv'> </div>

<style>
#chartdiv {
    width       : 100%;
    height      : 500px;
    font-size   : 11px;
}
</style>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/pie.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/themes/none.js"></script>



<script type="text/javascript">
var chart = AmCharts.makeChart("chartdiv", {
    "type": "pie",
    "theme": "none",
    "dataProvider": [
{
        "country": "Lithuania",
        "litres": 501.9
    },
{
        "country": "Czech Republic",
        "litres": 301.9
    }, {
        "country": "Ireland",
        "litres": 201.1
    }, {
        "country": "Germany",
        "litres": 165.8
    }],
    "valueField": "litres",
    "titleField": "country",
    "exportConfig":{    
      menuItems: [{
      icon: '/lib/3/images/export.png',
      format: 'png'   
      }]  
    }
});
</script>
</html>
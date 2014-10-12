<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href='<?php echo base_url(). "css/bootstrap.min.css" ?>' rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href='<?php echo base_url(). "css/sb-admin-2.css" ?>' rel="stylesheet" type="text/css" />
    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js"
    type="text/javascript"></script>

    <style type="text/css">
    @import url("http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.css");

    #feedControl {
    margin-top : 10px;
    margin-left: auto;
    margin-right: auto;
    width : 440px;
    font-size: 12px;
    color: #9CADD0;
    }
    </style>
    <script type="text/javascript">
    function load() {
    var feed ="http://feeds.bbci.co.uk/news/world/rss.xml";
    new GFdynamicFeedControl(feed, "feedControl");

    }
    google.load("feeds", "1");
    google.setOnLoadCallback(load);
    </script>
    <!--Google News Config-->

</head>

<body>

    <div id="wrapper">

        <!--User info at left side-->
        <nav>   
            <div class="navbar-default sidebar" role="navigation">
                <ul class="nav" id="side-menu">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>User Info</thead>
                        <tr>
                            <th>TotalAllowance($)</th>
                            <th>123456789</th>
                        </tr>
                        <tr>
                            <th>AllowanceAtHand($)</th>
                            <th>123456789</th>
                        </tr>
                    </table>

                    <table class="table table-bordered table-hover table-striped" id="currentStock">
                        <thead>StocksAtHand</thead>
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>StockNo.</th>
                                <th>Company</th> 
                                <th>Shares</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th>123</th>
                                <th>CS</th> 
                                <th>100</th>
                            </tr>
                            <tr>
                                <th>2</th>
                                <th>123</th>
                                <th>CS</th> 
                                <th>100</th>
                            </tr>
                        </tbody>
                    </table> 

                    <button>Back to Market</button>   
                </ul>   
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="pull-right">
                        <button>LogOut</button>
                </div>
                <div class="col-lg-12">
                    <h1 class="page-header">My Portfolio</h1>
                </div>
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Portfolio Analysis
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div id="pieChart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Social Footprint
                            <a class="twitter-timeline" href="https://twitter.com/hashtag/finance" data-widget-id="521135888940556291">#finance Tweets</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>    
                        </div>
                        
                    </div>
                    <!-- /.panel -->
                </div>

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Related News
                                <div id="body">
                                    <div id="feedControl">Loading...</div>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <a href="http://feeds.finance.yahoo.com/rss/2.0/headline?s="+
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    
                </div>

            </div>
            
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
    <!-- Javascript for cs competition-->
    <script src="js/cs-modification.js"></script>
</body>


<style>
    #pieChart {
        width       : 600px;
        height      : 600px;
        font-size   : 11px;
        margin-bottom: 0px;
        margin-left  : 0px;
        margin-right : 0px;
        margin-top   : 0px;
        padding     : 0px;
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

var pieChart = AmCharts.makeChart("pieChart", {
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
<!--Pie Chart-->





</html>





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
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pie Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-pie-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
       
                <div class="pull-right">    
                    <div class="col-lg-5">
                        <div class="panel-body">
                            <div class="row">
                                <input type="text" id="search" placeholder="Search for Stock" style="width:400px">
                                    <table class="table table-bordered table-hover table-striped" id="stockInfoHead" style="width:400px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>StockNo.</th>
                                                <th>CompanyName</th>
                                                <th>LivePrice</th>
                                           </tr>
                                        </thead>
                                     </table>
                                <div style="width:400px;height:440px;overflow:scroll;">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped" id="stockInfo">
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Related News
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <a href="http://feeds.finance.yahoo.com/rss/2.0/headline?s="+
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Social Footprint
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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

</html>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Counter Strike Trading System</title>

    <!-- Bootstrap Core CSS -->
    <link href='<?php echo base_url(). "css/bootstrap.min.css" ?>' rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href='<?php echo base_url(). "css/sb-admin-2.css" ?>' rel="stylesheet" type="text/css" />
    <!-- Custom Fonts -->
    <!-- <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->

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
                            <th id="TotalAllowance">123456789</th>
                        </tr>
                        <tr>
                            <th>AllowanceAtHand($)</th>
                            <th id="AllowanceLeft">123456789</th>
                        </tr>
                    </table>

                    <table class="table table-bordered table-hover table-striped" id="currentStock">
                        <thead>StocksAtHand</thead>
                        <tbody>
                            <tr id="StockAtHandFirstLine">
                                <th>#</th>
                                <th>StockNo.</th>
                                <th>Shares</th>
                                <th>Earning</th>
                            </tr>
                            <tr id="StockAtHandSecondLine">
                                
                        </tbody>
                    </table> 

                    <button if="PortfolioInfo">Portfolio Info</button>   
                </ul>   
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="pull-right">
                        <button id="lougOut">LogOut</button>
                </div>
                <div class="col-lg-12">
                    <h1 class="page-header">Wonderland Stock Exchange</h1>
                </div>

            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> 
                            <h id="CompanyName">Company Name</h>
                            <div id="chartdiv" style="width : 100%; height  : 500px;"></div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="buyOrSell">
                            <form>
							<row>
									Stock:
									<input type="text" name="sid">
									Price:
									<input type="text" name="price">
									Amount:
									<input type="text" name="amount">
                                    <input type="submit" id ="buyButton" name="bbuy" value="Buy" class="center"/>
                                    <input type="submit" id ="sellButton" name="bsell" value="Sell" class="center"/>
                            </row>
							</form>
                        </div>
                        <!-- /.buyOrSell -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.col-lg-6 -->
                    
                <div class="pull-left">    
                    <div class="col-lg-5">
                        <div class="panel-body">
                            <div class="row">
                                <input type="text" id="search" placeholder="Search for Stock" style="width:400px">
                                    <table class="table table-bordered table-hover table-striped fixed" id="stockInfoHead" style="width:400px">
                                        <col width="30px" />
                                        <col width="80px" />
                                        <col width="230px" />
                                        <col width="60px" />
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>StockNo.</th>
                                                <th>CompanyName</th>
                                                <th>Price</th>
                                           </tr>
                                        </thead>
                                     </table>
                                <div style="width:400px;height:440px;overflow:scroll;">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped fixed" id="stockInfo" style="cursor: pointer">
                                            <col width="30px" />
                                            <col width="80px" />
                                            <col width="230px" />
                                            <col width="60px" />
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
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <script src="<?= base_url() ?>js/jquery-2.1.1.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>js/bootstrap.min.js"></script>
    <!-- Javascript for cs competition-->
    <script src="<?= base_url() ?>js/amcharts.js"></script>
    <script src="<?= base_url() ?>js/serial.js"></script>
    <script src="<?= base_url() ?>js/none.js"></script>
    <script src="<?= base_url() ?>js/amstock.js"></script>
    <script src="<?= base_url() ?>js/stock_realtime.js"></script>
    <script src="<?= base_url() ?>js/transaction.js"></script>
    <script src="<?= base_url() ?>js/cs-modification.js"></script>
</body>

</html>

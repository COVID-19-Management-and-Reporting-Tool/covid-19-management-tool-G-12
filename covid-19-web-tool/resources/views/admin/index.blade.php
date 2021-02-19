<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19 MANAGEMENT</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="your-project-dir/font-css/LineIcons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
    <link rel="stylesheet" href="assests/chart.js/Chart.css">
</head>

<body>
    <main id="home">
        <div class="nav-wrapper">
            <nav class="nav-bar">
                <h2 class="logo"><a href="index">covid-19 management and reporting tool</a></h2>
                <div class="nav-btns">
                    <a href="logout" class="btn">logout</a>
                </div>
            </nav>
        </div>
        <div class="icon-nav">
            <!-- ---------- pop up menu ----------------------------- -->
          
        <div class="content">
            <div class="sidenav hide-on-small">
                <ul class="sidenav-menu">
                    <li class="sidenav-link"><a href="index" class="active"><i class="lni lni-dashboard"></i> Dashboad</a></li>
                    <li class="sidenav-link"><a href="donations"><i class="lni lni-money-location"></i> Donations</a></li>
                    <li class="sidenav-link"><a href="patient"><i class="lni lni-user"></i> Patients</a></li>
                    <li class="sidenav-link"><a href="payment"><i class="lni lni-coin"></i> Payments</a></li>
                    <li class="sidenav-link"><a href="healthofficer"><i class="lni lni-user"></i> Health Officers</a></li>
                    <li class="sidenav-link"><a href="organization" ><i class="lni lni-users"></i> Org Chart</a></li>
                    <li class="sidenav-link"><a href="rank"><i class="lni lni-user"></i> Rank Officers</a></li>
                </ul>
            </div>
            <div class="sidenav hide-on-large" id="mobile">
                <i class="lni lni-chevron-right hide-on-large" id="menu-btn"></i>
                <ul class="sidenav-menu-mobile">
                    <i class="lni lni-chevron-left" id="menu-btn-close"></i>
                    <li class="sidenav-link"><a href="index" class="active"><i class="lni lni-dashboard"></i> Dashboad</a></li>
                    <li class="sidenav-link"><a href="donations"><i class="lni lni-money-location"></i> Donations</a></li>
                    <li class="sidenav-link"><a href="patient"><i class="lni lni-user"></i> Patients</a></li>
                    <li class="sidenav-link"><a href="payment"><i class="lni lni-coin"></i> Payments</a></li>
                    <li class="sidenav-link"><a href="healthofficer"><i class="lni lni-user"></i> Health Officers</a></li>

                    <li class="sidenav-link"><a href="rank"><i class="lni lni-user"></i> Rank Officers</a></li>
                </ul>
            </div>


            <div class="dashboard-sum">
                <h4>covid-19 summary report</h4>
                <div class="gr gr-2">
                    <div class="sum-cases">
                        <h3>Total number of cases</h3>
                        <p class="counter" data-target="">{{$cases}}</p>
                    </div>
                    <!-- <div class="sum-recovery">
                        <h3>Recoveries</h3>
                        <p class="counter" data-target="30000">0</p>
                    </div> -->
                    <!-- <div class="sum-death">
                        <h3>Deaths</h3>
                        <p class="counter" data-target="200">0</p>
                    </div> -->
                    <div class="sum-workers">
                        <h3>Health Workers</h3>
                        <p class="counter" data-target="">{{$total}}</p>
                    </div>
                </div>

                <div class="charts">
                    <h3>graph summary</h3>
                    <div class="donations-chart">
                        <h4>donations</h4>
                        <canvas class="donations-graph" id="donChart"></canvas>
                    </div>
                    <div class="enrollment-chart">
                        <h4>enrollment figures</h4>
                        <canvas class="enrollment-graph" id="enrollmentChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- ----------------- back to top button ------------------------------------------------------------------------------------ -->
        <a class="btn-top hide"><i class="lni lni-chevron-up"></i></a>
    </main>
    <footer>
        <h3> &copy; Copyright 2021</h3>
        <h3>novalabs</h3>
    </footer>

    <!-- -------------------- data for graphs from database. Data will be hidden and not displayed but will be shown here. The data values should fetched and displayed here. -------------------------------------------------------------------------- -->
    <div class="data" hidden>
        <div class="donations-data">
            <div id="data-set" class="Jan" data-target="{{$jan}}"></div>
            <div id="data-set" class="Feb" data-target="{{$feb}}"></div>
            <div id="data-set" class="Mar" data-target="{{$mar}}"></div>
            <div id="data-set" class="Apr" data-target="{{$apr}}"></div>
            <div id="data-set" class="May" data-target="{{$may}}"></div>
            <div id="data-set" class="Jun" data-target="{{$jun}}"></div>
            <div id="data-set" class="Jul" data-target="{{$jul}}"></div>
            <div id="data-set" class="Aug" data-target="{{$aug}}"></div>
            <div id="data-set" class="Sep" data-target="{{$sep}}"></div>
            <div id="data-set" class="Oct" data-target="{{$oct}}"></div>
            <div id="data-set" class="Nov" data-target="{{$nov}}"></div>
            <div id="data-set" class="Dec" data-target="{{$dec}}"></div>
        </div>
        <div class="enrollment-data">
            <div id="data-set" class="Jan" data-target="{{$ojan}}"></div>
            <div id="data-set" class="Feb" data-target="{{$ofeb}}"></div>
            <div id="data-set" class="Mar" data-target="{{$omar}}"></div>
            <div id="data-set" class="Apr" data-target="{{$apr}}"></div>
            <div id="data-set" class="May" data-target="{{$omay}}"></div>
            <div id="data-set" class="Jun" data-target="{{$ojun}}"></div>
            <div id="data-set" class="Jul" data-target="{{$ojul}}"></div>
            <div id="data-set" class="Aug" data-target="{{$oaug}}"></div>
            <div id="data-set" class="Sep" data-target="{{$osep}}"></div>
            <div id="data-set" class="Oct" data-target="{{$ooct}}"></div>
            <div id="data-set" class="Nov" data-target="{{$onov}}"></div>
            <div id="data-set" class="Dec" data-target="{{$odec}}"></div>
        </div>
    </div>
    <!-- ----------------- end of data div -------------------------------------------------------------------------------------------------- -->

</body>
<script src="assests/chart.js/Chart.js"></script>
<script src="assets/chart.js/Chart.min.js"></script>
<script src="js/main.js"></script>
<script src="js/chart.js"></script>
<script src="js/sidenav.js"></script>


</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19 MANAGEMENT</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="your-project-dir/font-css/LineIcons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
</head>

<body>
    <main id="health-officer">

       
        <!-- --------------------------- form for promoting health workers ----------------------------------------------------------------------------------------------------------------------------- -->

        <div id="promotion" class="modal-promote-form">
            <div class="promotion-hdr">
                <span>
                            <i class="lni lni-user"></i>
                            <h2>Rank Health Officer</h2>
                        </span>
                <i class="lni lni-close" id="modal-btn-close"></i>
            </div>
            <div class="promotion-form">
            <form action="rank" method="post">
                    @csrf
                    <div class="results">
                @if(Session::get('success'))
                <div style="color:green;font-size:40px;">{{Session::get('success')}}</div>

                @endif
                @if(Session::get('fail'))
                <div style="color:red">{{Session::get('fail')}}</div>

                @endif
                </div>
                    <div class="input">
                        <label for="fullname">Full Name</label>
                        <i class="lni lni-user"></i>
                        <input type="text" name="name" id="fullname" value="">
                        <span style="color:red">@error('name'){{$message}} @enderror</span>
                    </div>
                    <div class="input">
                        <label for="type">Type of Rank</label>
                        <i class="lni lni-user"></i>
                        <input type="text" name="Title" id="type" placeholder="eg. headofficer">
                        <span style="color:red">@error('Title'){{$message}} @enderror</span>
                    </div>
                    <button name="addRank" type="submit">Rank</button>
                </form>
                <div class="promotion-img"></div>
            </div>
        </div>

        <!-- --------------------------- end of form for promoting health workers ----------------------------------------------------------------------------------------------------------------------------- -->

        <!-- --------------------------- main content starts heere ----------------------------------------------------------------------------------------------------------------------------- -->
        <div class="health-content">
            <div class="nav-wrapper">
                <nav class="nav-bar">
                    <h2 class="logo"><a href="/">covid-19 management and reporting tool</a></h2>
                    <div class="nav-btns">
                        <a href="logout" class="btn">logout</a>
                    </div>

                </nav>
            </div>
            <div class="di">
                <div class="content-hdr">
                    <span>
                        <h2>Health Officers</h2>
                    <i class="lni lni-user"></i>
                    </span>
                    <button  hidden class="btn modal-btn">Add Health Officer</button>
                    <button class="btn promote-btn">Rank Officer</button>
                </div>
                <div class="sidenav">
                    <i class="lni lni-chevron-right" id="menu-btn"></i>
                    <ul class="sidenav-menu-mobile">
                        <li class="sidenav-link"><a href="donations"><i class="lni lni-money-location"></i> Donations</a></li>
                        <li class="sidenav-link"><a href="patient"><i class="lni lni-user"></i> Patients</a></li>
                        <li class="sidenav-link"><a href="payment"><i class="lni lni-coin"></i> Payments</a></li>
                        <li class="sidenav-link"><a href="healthofficer" ><i class="lni lni-user"></i> Health Officers</a></li>
                        <li class="sidenav-link"><a href="index" ><i class="lni lni-dashboard"></i> Dashboad</a></li>
                        <li class="sidenav-link"><a href="rank" class="active"><i class="lni lni-user"></i> Rank Officers</a></li>
                    </ul>
                </div>
            </div>
           
        </div>
    </main>
    <footer>
        <h3> &copy; Copyright 2021</h3>
        <h3>novalabs</h3>
    </footer>
</body>
<script src="js/modalForm.js"></script>
<script src="js/sidenav.js"></script>
<script src="js/main.js"></script>


</html>
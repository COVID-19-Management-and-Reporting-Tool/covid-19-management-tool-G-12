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
    <main id="donations">
        <div id="donation-page-form" class="modal-form">
            <div class="donation-page-hdr">
                <span>
                    <i class="lni lni-user"></i>
                    <h2>Add Donation</h2>
                </span>
                <i class="lni lni-close" id="modal-btn-close"></i>
            </div>
            <div class="donation-form">
                <form action="/donations" method="post">
                    @csrf
                    <div class="input">
                        <label for="donor">Name of Donor</label>
                        <i class="lni lni-user"></i>
                        <input type="text" name="name" id="donor" placeholder="eg. John Doe">
                        <span style="color:red">@error('name'){{$message}} @enderror</span>
                    </div>
                    <div class="input">
                        <label for="amount">Amount</label>
                        <i class="lni lni-lock-alt"></i>
                        <input type="number" name="amount" id="amount" placeholder="eg. 1000">
                        <span style="color:red">@error('amount'){{$message}} @enderror</span>
                    </div>
                    
                   
                    <button type="submit">Add Donation</button>
                </form>
                <div class="donation-img"></div>
            </div>
        </div>
        <div class="donations-content">
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
                        <h2>Donations</h2>
                    <i class="lni lni-money-location"></i>
                    </span>
                    <button class="btn modal-btn">Add Donations</button>
                </div>
                <div class="sidenav">
                    <i class="lni lni-chevron-right" id="menu-btn"></i>
                    <ul class="sidenav-menu-mobile">
                        <li class="sidenav-link"><a href="donations" class="active"><i class="lni lni-money-location"></i> Donations</a></li>
                        <li class="sidenav-link"><a href="patient"><i class="lni lni-user"></i> Patients</a></li>
                        <li class="sidenav-link"><a href="payment"><i class="lni lni-coin"></i> Payments</a></li>
                        <li class="sidenav-link"><a href="index" ><i class="lni lni-dashboard"></i> Dashboad</a></li>
                        <li class="sidenav-link"><a href="healthofficer"><i class="lni lni-user"></i> Health Officers</a></li>
                        <li class="sidenav-link"><a href="rank"><i class="lni lni-user"></i> Rank Officers</a></li>
                    </ul>
                </div>
            </div>
            <div class="donations-table">
                <h3>List of donations</h3>
                <table>
                

                    <tr>
                        <th>Name of Donor</th>
                        <th>Amount</th>
                        <th>Date and time</th>
                    </tr>
                      
                   @foreach($donations as $donation)
                   <tr>
                        <th>{{$donation['name']}}</th>
                        <th>{{$donation['amount']}}</th>
                        <th>{{$donation['created_at']}}</th>
                    </tr>
                    @endforeach
                    
                   
                </table>
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

</html>
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
    <main id="payments">
        <div id="payment-page-form" class="modal-form">
            <div class="payment-page-hdr">
                <span>
                    <i class="lni lni-user"></i>
                    <h2>Add payment</h2>
                </span>
                <i class="lni lni-close" id="modal-btn-close"></i>
            </div>
            <div class="payment-form">
                
                <div class="payment-img"></div>
            </div>
        </div>
        <div class="payments-content">
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
                        <h2>payments</h2>
                        <i class="lni lni-coin"></i>
                    </span>
                   
                </div>
                <div class="sidenav">
                    <i class="lni lni-chevron-right" id="menu-btn"></i>
                    <ul class="sidenav-menu-mobile">
                        <li class="sidenav-link"><a href="donations"><i class="lni lni-money-location"></i> Donations</a></li>
                        <li class="sidenav-link"><a href="patient"><i class="lni lni-user"></i> Patients</a></li>
                        <li class="sidenav-link"><a href="index"><i class="lni lni-dashboard"></i> Dashboad</a></li>
                        <li class="sidenav-link"><a href="payment" class="active"><i class="lni lni-coin"></i> Payments</a></li>
                        <li class="sidenav-link"><a href="healthofficer"><i class="lni lni-user"></i> Health Officers</a></li>
                        <li class="sidenav-link"><a href="rank"><i class="lni lni-user"></i> Rank Officers</a></li>
                    </ul>
                </div>
            </div>
            <div class="payments-table">
                <h3>List of payments</h3>
                <table>

                    <tr>
                        <th>Name of Receipient</th>
                        <th>Amount</th>
                        <th>status</th>
                    </tr>
                    @foreach($payments  as $payment)
                    <tr>
                        <td>{{$payment['name']}}</td>
                        <td>{{$payment['salary_paid']}}</td>
                        <td>{{$payment['status']}}</td>
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

<script src="/js/sidenav.js"></script>


</html>
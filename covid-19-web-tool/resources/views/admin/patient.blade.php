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
    <main id="patients">
        <div class="nav-wrapper">
            <nav class="nav-bar">
                <h2 class="logo"><a href="/">covid-19 management and reporting tool</a></h2>
                <div class="nav-btns">
                    <a href="logout" class="btn">logout</a>
                </div>
            </nav>
        </div>
        
        <div class="sidenav">
            <i class="lni lni-chevron-right" id="menu-btn"></i>
            <ul class="sidenav-menu-mobile">
                <li class="sidenav-link"><a href="donations"><i class="lni lni-money-location"></i> Donations</a></li>
                <li class="sidenav-link"><a href="patient" class="active"><i class="lni lni-user"></i> Patients</a></li>
                <li class="sidenav-link"><a href="index" ><i class="lni lni-dashboard"></i> Dashboad</a></li>
                <li class="sidenav-link"><a href="payment"><i class="lni lni-coin"></i> Payments</a></li>
                <li class="sidenav-link"><a href="healthofficer"><i class="lni lni-user"></i> Health Officers</a></li>
                <li class="sidenav-link"><a href="rank"><i class="lni lni-user"></i> Rank Officers</a></li>
            </ul>
        </div>
        <div class="patients-wrapper">
        
           
            <div class="patients-table">
                <table>
                    <tr>
                        <th>Full Name</th>
                        <th>Date of Admission</th>
                        <th>Nature </th>
                        <th>Health Officer</th>
                    </tr>
                   @foreach($patients as $patient )
                    <tr>
                        <td>{{$patient['name']}}</td>
                        <td>{{$patient['date']}}</td>
                        <td>{{$patient['status']}}</td>
                        <td>{{$patient['officer_name']}}</td>

                       
                    </tr>
                    @endforeach
                    
                </table>
                <div class="total">
                    <span><h3>{{$patientCount}}</h3></span>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <h3> &copy; Copyright 2021</h3>
        <h3>novalabs</h3>
    </footer>
</body>

<script src="/js/sidenav.js"></script>


</html>
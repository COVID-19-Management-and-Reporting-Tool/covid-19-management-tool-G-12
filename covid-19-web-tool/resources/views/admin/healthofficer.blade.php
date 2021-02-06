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

        <!-- --------------------------- form for registering health workers ----------------------------------------------------------------------------------------------------------------------------- -->
        <div id="health-page-form" class="modal-form">
            <div class="health-page-hdr">
                <span>
                    <i class="lni lni-user"></i>
                    <h2>Add Health Officer</h2>
                </span>
                <i class="lni lni-close" id="modal-btn-close"></i>
            </div>
            <div class="health-form">
                <form action="/healthofficer" method="post">
                @csrf
                    <div class="input">
                        <label for="fullname">Full Name</label>
                        <i class="lni lni-user"></i>
                        <input type="text" name="fullname" id="fullname" placeholder="eg. John Doe">
                        <span style="color:red">@error('fullname'){{$message}} @enderror</span>
                    </div>
                  
                   
                   
                    <button type="submit">Add</button>
                </form>
                <div class="health-img"></div>
            </div>
        </div>
        <!-- --------------------------- enf of form for registering health workers ----------------------------------------------------------------------------------------------------------------------------- -->


       

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
                    <button class="btn modal-btn">Add Health Officer</button>
                </div>
                <div class="sidenav">
                    <i class="lni lni-chevron-right" id="menu-btn"></i>
                    <ul class="sidenav-menu">
                        <li class="sidenav-link"><a href="donations"><i class="lni lni-money-location"></i> Donations</a></li>
                        <li class="sidenav-link"><a href="patient"><i class="lni lni-user"></i> Patients</a></li>
                        <li class="sidenav-link"><a href="payment"><i class="lni lni-coin"></i> Payments</a></li>
                        <li class="sidenav-link"><a href="healthofficer" class="active"><i class="lni lni-user"></i> Health Officers</a></li>
                    </ul>
                </div>
            </div>
            <div class="health-table">
                <h3>List of Health Officers</h3>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Salary</th>
                        
                    </tr>
                    @foreach($workers as $worker)
                    <tr>
                        <td class="name">{{$worker['name']}}</td>
                        <td class="type">{{$worker['category']}}</td>
                        <td class="salary">{{$worker['salary']}}</td>
                       
                       
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
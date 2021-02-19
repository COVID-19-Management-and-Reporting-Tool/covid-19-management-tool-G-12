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
    <main id="organization">
        <div class="nav-wrapper">
            <nav class="nav-bar">
                <h2 class="logo"><a href="index">covid-19 management and reporting tool</a></h2>
                <div class="nav-btns">
                    <a href="logout" class="btn">logout</a>
                </div>
            </nav>
        </div>
        <div class="content">
            <div class="sidenav">
                <ul class="sidenav-menu">
                    <li class="sidenav-link"><a href="index"><i class="lni lni-dashboard"></i> Dashboad</a></li>
                    <li class="sidenav-link"><a href="donations"><i class="lni lni-money-location"></i> Donations</a></li>
                    <li class="sidenav-link"><a href="patient"><i class="lni lni-user"></i> Patients</a></li>
                    <li class="sidenav-link"><a href="payment"><i class="lni lni-coin"></i> Payments</a></li>
                    <li class="sidenav-link"><a href="healthofficer"><i class="lni lni-user"></i> Health Officers</a></li>
                    <li class="sidenav-link"><a href="organization" class="active"><i class="lni lni-users"></i> Org Chart</a></li>
                </ul>
            </div>
            <div class="organization-chart">
                <div class="chart">
                    <h3>Organizational Chart</h3>
                    <div id="orgchart">
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

</body>
<script src="js/main.js"></script>
<script src="assests/OrgChartJS/orgchart.js"></script>
<script>
    var chart = new OrgChart(document.getElementById("orgchart"), {
        nodeBinding: {
            field_0: "name"
        },
        nodes: [{
            id: 1,
            name: "Director National Referral"
        }, {
            id: 2,
            name: "Consultant"
        }, {
            id: 3,
            pid: 2,
            name: "Superitendant Regional Hospital"
        }, {
            id: 4,
            pid: 2,
            name: "Senior Officer"
        }, {
            id: 5,
            pid: 4,
            name: "Head of Health Officers"
        }, {
            id: 6,
            pid: 4,
            name: "Health Officer"
        }]
    });
</script>

</html>
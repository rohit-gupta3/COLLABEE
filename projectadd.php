<?php
    session_start();
    require "connection.php";
    if(isset($_POST['submit']))
    {
        $pname = $_POST['title'];
        $phead = $_POST['phead'];
        $budget = $_POST['budget'];
        $doc = $_POST['doc'];
        $detail = $_POST['details'];
        $deliverable1 = $_POST['deliverable1'];
        $date1 = $_POST['date1'];
        $deliverable2 = $_POST['deliverable2'];
        $date2 = $_POST['date2'];
        $deliverable3 = $_POST['deliverable3'];
        $date3 = $_POST['date3'];

        $sql = "INSERT INTO `projectdetails` (`ptitle`, `phead`, `budget`, `doc`, `pdetail`, `deliverable1`, `date1`, `deliverable2`, `date2`, `deliverable3`, `date3`) VALUES ('$pname', '$phead', '$budget', '$doc', '$detail', '$deliverable1', '$date1', '$deliverable2', '$date2', '$deliverable3', '$date3');";
        $sql1 = "INSERT INTO `activity`(`ptitle`, `deliverable`, `date`, `detail`) VALUES ('$pname','$deliverable1','$date1','$detail');";
        $sql1 .= "INSERT INTO `activity`(`ptitle`, `deliverable`, `date`, `detail`) VALUES ('$pname','$deliverable2','$date2','$detail');";
        $sql1 .= "INSERT INTO `activity`(`ptitle`, `deliverable`, `date`, `detail`) VALUES ('$pname','$deliverable3','$date3','$detail');";
        try{
            $result = mysqli_multi_query($conn,$sql);
           $result1 = mysqli_multi_query($conn,$sql1);
            if($result)
            {

                header("location:index.php");
            }
            else{
                echo "error";
            }
        }
        catch(Exception $e)
        {
            echo "<h1 style='color:red'>Opps, This Project might exist Please Check the Dashboard</h1>";
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>COLLABEE - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        #projectdetails{
            display:grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 150px;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">COLLABEE </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Projects</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="projectadd.php">Add Project</a>
                        <a class="collapse-item" href="projectview.php">View Project</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Expenses</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="expense-add.php">Add Expenses</a>
                        <a class="collapse-item" href="expense-getinvoice.php">Get Invoice</a>
                        <a class="collapse-item" href="expense-total.html">Total Expense</a>
                        <a class="collapse-item" href="expense-invoicegenerate.html">Generate Invoice</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Profile</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="activity.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Activity</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="calendar.html">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Calendar</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="expenselist.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Expenses</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">1</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">1</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Rohit</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Your Next Project Details</h1>

                    </div>
                    <!-- Content Row -->
                    <div class="container px-3 my-5">
                    <form id="contactForm" method="post">
                        <div class="mb-3">
                            <label class="form-label" for="projectTitle">Project Title</label>
                            <input class="form-control" id="projectTitle" type="text" name="title" placeholder="Project Title" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="projectTitle:required">Project Title is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Project Head</label>
                            <select class="form-control" name="phead" id="phead" aria-label="Title">
                                <option>ROHIT</option>
                                <option>NAREN</option>
                                <option>SURYA</option>
                                <option>GAYATRI</option>
                            </select>
                            <div class="invalid-feedback" data-sb-feedback="projectHead:required">Project Head is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="budget">Budget</label>
                            <input class="form-control" id="budget" type="text" name="budget" placeholder="Budget" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="budget:required">Budget is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="dateOfCompletion">Date Of Completion</label>
                            <input class="form-control" id="dateOfCompletion" type="date" name="doc" placeholder="Date Of Completion" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="dateOfCompletion:required">Date Of Completion is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="details">Details</label>
                            <input class="form-control" id="details" type="text" name="details" placeholder="Details" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="details:required">Details is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="deliverable1">Deliverable 1</label>
                            <input class="form-control" id="deliverable1" type="text" name="deliverable1" placeholder="Deliverable 1" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="deliverable1:required">Deliverable 1 is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="data1">Data 1</label>
                            <input class="form-control" id="data1" type="date" name="date1" placeholder="Data 1" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="data1:required">Data 1 is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="deliverable2">Deliverable 2</label>
                            <input class="form-control" id="deliverable2" type="text" name="deliverable2" placeholder="Deliverable 2" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="deliverable2:required">Deliverable 2 is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="date2">Date 2</label>
                            <input class="form-control" id="date2" type="date" name="date2" placeholder="Date 2" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="date2:required">Date 2 is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="devliverable3">Devliverable 3</label>
                            <input class="form-control" id="devliverable3" type="text" name="deliverable3" placeholder="Devliverable 3" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="devliverable3:required">Devliverable 3 is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="date3">Date 3</label>
                            <input class="form-control" id="date3" type="date" name="date3" placeholder="Date 3" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="date2:required">Date 3 is required.</div>
                        </div>
                        <div class="d-grid">
                            <input class="btn btn-primary" id="submitButton" name="submit" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; COLLABEE @2022<T/span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
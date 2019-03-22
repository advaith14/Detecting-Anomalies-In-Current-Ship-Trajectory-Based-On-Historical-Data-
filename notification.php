<?php
session_start( );
if(isset($_SESSION['id'])) {
  $id=$_SESSION['id'];
//echo "<script type='text/javascript'>alert('. $id .');</script>";
  include ('connectdbshore.php');
  $sql = "SELECT * FROM user WHERE id=$id";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($result)) {
    $email = $row['email'];
    $name = $row['name'];
  }
//mysql_close($conn);
}
else {
  header('Location: not_active.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <!--link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png"-->
    <title>Ship Anomaly Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!--ajax to check db after interval -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <script type="text/javascript">// <![CDATA[
      $(document).ready(function() {
        $.ajaxSetup({ cache: false }); // This part addresses an IE bug. without it, IE will only load the first number and will never refresh
        setInterval(function() {
          $('#divToRefresh').load('dbcheck.php');
        }, 500); // refers to the time to refresh the div. it is in milliseconds.
      });
// ]]></script>

</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
      <!-- header header  -->
      <div class="header">
          <nav class="navbar top-navbar navbar-expand-md navbar-light">
              <!-- Logo -->
              <div class="navbar-header">
                  <a class="navbar-brand" href="index.php">
                      <!-- Logo icon -->
                      <!--b><img src="images/logo.png" alt="homepage" class="dark-logo" /></b-->
                      <!--End Logo icon -->
                      <!-- Logo text -->
                      <span><!--img src="images/logo-text.png" alt="homepage" class="dark-logo" /-->AVASTS</span>
                  </a>
              </div>
              <!-- End Logo -->
              <div class="navbar-collapse">
                  <!-- toggle and nav items -->
                  <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                    <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                      <!-- Messages -->
                      <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                          <div class="dropdown-menu animated zoomIn">
                              <ul class="mega-dropdown-menu row">


                                  <li class="col-lg-12">
                                      <h4 class="m-b-20">CONTACT US</h4>
                                      <!-- Contact -->
                                      <form>
                                          <div class="form-group">
                                              <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                          <div class="form-group">
                                              <input type="email" class="form-control" placeholder="Enter email"> </div>
                                          <div class="form-group">
                                              <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                          </div>
                                          <button type="submit" class="btn btn-info">Submit</button>
                                      </form>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <!-- End Messages -->
                  </ul>
                  <!-- User profile and search -->
                  <ul class="navbar-nav my-lg-0">

                      <!-- Search -->
                      <!--li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                          <form class="app-search">
                              <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                      </li-->
                      <!-- Comment -->
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
              <div class="notify" id="blinker" style="display:none;"> <span class="heartbit" ></span> <span class="point"></span> </div>
            </a>
                          <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                              <ul>
                                  <li>
                                      <div class="drop-title">Notifications</div>
                                  </li>
                                  <li>
                                      <div class="message-center">
                                          <!-- Message -->

                                          <?php $count = 0;
                                          //session_start();
                                            $notify_query = "SELECT * FROM notification    ORDER BY id DESC";
                                            $notify_result = mysqli_query($conn,$notify_query);
                                            if(mysqli_num_rows($notify_result) > 0) {
                                              while($row = mysqli_fetch_assoc($notify_result)) { ?>
                                          <a style="<?php if($row['status']==1) { echo 'background-color: #f2f4f8 !important;'; } else { $count++; } ?>" class="sweet-text" href="view_notification.php?id=<?php echo $row['id']; ?>" >
                                              <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                                              <div class="mail-contnet">
                                                  <h5><?php echo $row['heading']; ?></h5> <span class="mail-desc"><?php echo $row['message']; ?></span> <span class="time"><?php echo $row['timestamp']; ?></span>
                                              </div>
                                          </a>

                                          <?php
                                              }
                                            }
                                            if ($count > 0) { ?>
                                              <script>
                                              document.getElementById("blinker").style.display = 'block';
                                              </script>
                                            <?php }
                                          ?>

                                          <!-- Message -->

                                      </div>
                                  </li>
                                  <li>
                                      <a class="nav-link text-center" href="notification.php"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <!-- End Comment -->
                      <!-- Messages -->
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
              <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
                          <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                              <ul>
                                  <li>
                                      <!--div class="drop-title">You have 4 new messages</div-->
                                  </li>
                                  <li>
                                      <div class="message-center">
                                          <!-- Message -->
                                          <a href="#" style="">
                                              <div class="user-img"> <img src="images/users/5.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                              <div class="mail-contnet">
                                                  <h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span>
                                              </div>
                                          </a>
                                          <!-- Message -->
                                          <a href="#">
                                              <div class="user-img"> <img src="images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                              <div class="mail-contnet">
                                                  <h5>John Doe</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span>
                                              </div>
                                          </a>
                                          <!-- Message -->
                                          <a href="#">
                                              <div class="user-img"> <img src="images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                              <div class="mail-contnet">
                                                  <h5>Mr. John</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span>
                                              </div>
                                          </a>
                                          <!-- Message -->
                                          <a href="#">
                                              <div class="user-img"> <img src="images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                              <div class="mail-contnet">
                                                  <h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                              </div>
                                          </a>
                                      </div>
                                  </li>
                                  <li>
                                      <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                  </li>
                              </ul>
                          </div>
                      </li-->
                      <!-- End Messages -->
                      <!-- Profile -->

                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                          <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                              <ul class="dropdown-user">
                                  <li style="padding: 10px;"><b>Welcome <?php echo $name; ?>!</b><br><?php echo $email;?></li>
                                  <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                                  <li><a href="#"><i class="ti-wallet"></i> Balance</a></li>
                                  <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                  <li><a href="#"><i class="ti-settings"></i> Setting</a></li>
                                  <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                              </ul>
                          </div>
                      </li>
                  </ul>
              </div>
          </nav>
      </div>
      <!-- End header header -->
      <!-- Left Sidebar  -->
      <div class="left-sidebar">
          <!-- Sidebar scroll-->
          <div class="scroll-sidebar">
              <!-- Sidebar navigation-->
              <nav class="sidebar-nav">
                  <ul id="sidebarnav">
                      <li class="nav-devider"></li>
                      <li class="nav-label">Home</li>
                      <li>
                        <a class="has-arrow  " href="index.php" aria-expanded="false">
                          <i class="fa fa-tachometer"></i>
                          <span class="hide-menu">Dashboard</span>
                        </a>
                      </li>
                      <li class="nav-label">Messages</li>
                      <li> <a class="  " href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">Email</span></a>
                          <ul aria-expanded="false" class="collapse">
                              <li><a href="email-compose.html">Compose</a></li>
                              <li><a href="email-inbox.php">Inbox</a></li>
                          </ul>
                      </li>
                      <li> <a class="" href="notification.php" aria-expanded="false"> <i class="fa fa-bell"></i><span class="hide-menu">Notifications</span></a>

                      </li>

                  </ul>
              </nav>
              <!-- End Sidebar navigation -->
          </div>
          <!-- End Sidebar scroll-->
      </div>
      <!-- End Left Sidebar  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Notifications </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>

                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Level</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $count = 1;
                                            include ('connectdbshore.php');
                                            $sql = "SELECT * FROM notification ORDER BY id DESC ";
                                            $result = mysqli_query($conn,$sql);
                                            if(mysqli_num_rows($result) > 0) {
                                              while($row = mysqli_fetch_assoc($result)) {
                                                $nid = $row['id'];
                                                ?>

                                                <a href="view_notification.php?id=<?php echo $nid; ?>">
                                                  <tr style="<?php if($row['status'] == 1) { echo 'background-color: #f2f4f8;'; } ?>cursor: pointer;" onclick="view();">
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $row['heading']; ?></td>
                                                    <td><?php echo $row['message']; ?></td>
                                                    <td><?php echo $row['timestamp']; ?></td>
                                                    <td>
                                                      <?php if($row['abnormality_level'] == 1) { ?>
                                                        <span class="badge badge-warning">Warning</span>
                                                      <?php }
                                                      else { ?>
                                                        <span class="badge badge-danger">Danger</span>
                                                      <?php } ?>
                                                    </td>
                                                  </tr>
                                                  <script>
                                                  function view() {
                                                    window.open("view_notification.php?id=<?php echo $nid; ?>", "_self");
                                                  }
                                                  </script>
                                                </a>
                                            <?php $count++;
                                          } }
                                             ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /# row -->
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->

        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>

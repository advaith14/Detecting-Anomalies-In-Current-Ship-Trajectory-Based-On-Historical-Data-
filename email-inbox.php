<?php

// include Imap_parser class
include_once('lib/Imap_parser.php');

// create Imap_parser Object
$email = new Imap_parser();

// data
$data = array(
	// email account
	'email' => array(
		'hostname' => '{imap.gmail.com:993/imap/ssl}INBOX',
		'username' => 'swapnilshindeid3@gmail.com',
		'password' => 'admin@sihmail.com'
	),
	// inbox pagination
	'pagination' => array(
		'sort' => 'DESC', // or ASC
		'limit' => 5,
		'offset' => 0
	)
);

// get inbox. Array
$result = $email->inbox($data);

/*echo '<pre>';
print_r($result);
echo '</pre>';*/
?>
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Inline Styling For Maps -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=visualization&sensor=true_or_false"></script>
<style>

	    #map_canvas{
        height: 520px !important;
        width: 100%;
       }
       #my-div {
     position: fixed;
     width: 30%; /* Set your desired with */
     z-index: 2; /* Make sure its above other items. */
     top: 50%;
     left: 50%;
     margin-top: -10%; /* Changes with height. */
     margin-left: -10%; /* Your width divided by 2. */
     color: white;

     /* You will not need the below, its only for styling   purposes. */
     padding: 70px;
     /*background-color: #FFFFFF;*/
     border-radius: 5px;
     text-align: center;
     box-shadow:3px 20px 50px 5px #99ABB4;
 }
    </style>

</head>

<body class="fix-header fix-sidebar" onload="initialize()">
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
                                              $notify_query = "SELECT * FROM notification WHERE user_id = $id ORDER BY id DESC";
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
                            <a class="nav-link dropdown-toggle text-muted  " href="email-inbox.php" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
								 <span class="point"></span> </div>
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
                          <a class="" href="clusters.php" aria-expanded="false" style="color: #99abb4;">
                            <i class="fa fa-compass" style="color: #99abb4;"></i>
                            <span class="hide-menu">Vessel Routes</span>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-content">
                                    <!-- Left sidebar -->
                                    <div class="inbox-leftbar">
                                        <a class="btn btn-danger btn-block waves-effect waves-light" href="email-compose.html">Compose</a>

                                        <div class="mail-list mt-4">
                                            <a class="list-group-item border-0 text-danger" href="#"><i class="mdi mdi-inbox font-18 align-middle mr-2"></i><b>Inbox</b><span class="label label-danger float-right ml-2">8</span></a>
                                            <a class="list-group-item border-0" href="#"><i class="mdi mdi-star font-18 align-middle mr-2"></i>Starred</a>
                                            <a class="list-group-item border-0" href="#"><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Draft<span class="label label-info float-right ml-2">32</span></a>
                                            <a class="list-group-item border-0" href="#"><i class="mdi mdi-send font-18 align-middle mr-2"></i>Sent Mail</a>
                                            <a class="list-group-item border-0" href="#"><i class="mdi mdi-delete font-18 align-middle mr-2"></i>Trash</a>
                                        </div>

                                        <h6 class="mt-5 m-b-15">Labels</h6>

                                        <div class="list-group b-0 mail-list">
                                            <a class="list-group-item border-0" href="#"><span class="fa fa-circle text-info mr-2"></span>Web App</a>
                                            <a class="list-group-item border-0" href="#"><span class="fa fa-circle text-warning mr-2"></span>Project 1</a>
                                            <a class="list-group-item border-0" href="#"><span class="fa fa-circle text-purple mr-2"></span>Project 2</a>
                                            <a class="list-group-item border-0" href="#"><span class="fa fa-circle text-pink mr-2"></span>Friends</a>
                                            <a class="list-group-item border-0" href="#"><span class="fa fa-circle text-success mr-2"></span>Family</a>
                                        </div>

                                    </div>
                                    <!-- End Left sidebar -->

                                    <div class="inbox-rightbar">

                                        <div role="toolbar" class="">
                                            <div class="btn-group">
                                                <button class="btn btn-light waves-effect" type="button"><i class="mdi mdi-archive font-18 vertical-middle"></i></button>
                                                <button class="btn btn-light waves-effect" type="button"><i class="mdi mdi-alert-octagon font-18 vertical-middle"></i></button>
                                                <button class="btn btn-light waves-effect" type="button"><i class="mdi mdi-delete-variant font-18 vertical-middle"></i></button>
                                            </div>
                                            <div class="btn-group">
                                                <button aria-expanded="false" data-toggle="dropdown" class="btn btn-light dropdown-toggle waves-effect" type="button">
                                                                                    <i class="mdi mdi-folder font-18 vertical-middle"></i>
                                                                                    <b class="caret m-l-5"></b>
                                                                                </button>
                                                <div class="dropdown-menu">
                                                    <span class="dropdown-header">Move to</span>
                                                    <a href="javascript: void(0);" class="dropdown-item">Social</a>
                                                    <a href="javascript: void(0);" class="dropdown-item">Promotions</a>
                                                    <a href="javascript: void(0);" class="dropdown-item">Updates</a>
                                                    <a href="javascript: void(0);" class="dropdown-item">Forums</a>
                                                </div>
                                            </div>
                                            <div class="btn-group">
                                                <button aria-expanded="false" data-toggle="dropdown" class="btn btn-light dropdown-toggle waves-effect" type="button">
                                                                                    <i class="mdi mdi-label font-18 vertical-middle"></i>
                                                                                    <b class="caret m-l-5"></b>
                                                                                </button>
                                                <div class="dropdown-menu">
                                                    <span class="dropdown-header">Label as:</span>
                                                    <a href="javascript: void(0);" class="dropdown-item">Updates</a>
                                                    <a href="javascript: void(0);" class="dropdown-item">Social</a>
                                                    <a href="javascript: void(0);" class="dropdown-item">Promotions</a>
                                                    <a href="javascript: void(0);" class="dropdown-item">Forums</a>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <button aria-expanded="false" data-toggle="dropdown" class="btn btn-light dropdown-toggle waves-effect" type="button">
                                                                                    More
                                                                                    <span class="caret m-l-5"></span>
                                                                                </button>
                                                <div class="dropdown-menu">
                                                    <span class="dropdown-header">More Option :</span>
                                                    <a href="javascript: void(0);" class="dropdown-item">Mark as Unread</a>
                                                    <a href="javascript: void(0);" class="dropdown-item">Add to Tasks</a>
                                                    <a href="javascript: void(0);" class="dropdown-item">Add Star</a>
                                                    <a href="javascript: void(0);" class="dropdown-item">Mute</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="mt-4">
                                                <div class="">
                                                    <ul class="message-list">
																											<?php foreach($result['inbox'] as $r) {
																												$id = $r['id']; ?>
                                                        <li class="unread">
                                                            <a href="email-read.php?id=<?php echo $id;?>">
                                                                <div class="col-mail col-mail-1">
                                                                    <div class="checkbox-wrapper-mail">
                                                                        <input type="checkbox" id="<?php echo 'chk'. $r['id']; ?>">
                                                                        <label class="toggle" for="<?php echo 'chk'. $r['id']; ?>"></label>
                                                                    </div>
                                                                    <p class="title"><?php echo $r['from']; ?></p><span class="star-toggle fa fa-star-o"></span>
                                                                </div>
                                                                <div class="col-mail col-mail-2">
                                                                    <div class="subject">
                                                                        <?php echo $r['subject']; ?>
                                                                    </div>
                                                                    <div class="date"><?php echo $r['status']; ?></div>
                                                                </div>
                                                            </a>
                                                        </li>
																											<?php } ?>



                                                    </ul>
                                                </div>

                                            </div>
                                            <!-- panel body -->
                                        </div>
                                        <!-- panel -->

                                        <div class="row">
                                            <div class="col-7">
                                                Showing 1 - 20 of 289
                                            </div>
                                            <div class="col-5">
                                                <div class="btn-group float-right">
                                                    <button class="btn btn-gradient waves-effect" type="button"><i class="fa fa-chevron-left"></i></button>
                                                    <button class="btn btn-gradient waves-effect" type="button"><i class="fa fa-chevron-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

<?php
/**
 * 
 */
class Layouts
{
	private $pageTitle;
	private $email;
	private $firstname;
	private $lastname;

	function __construct($pageTitle)
	{
		$this->pageTitle = $pageTitle;
		$this->email = $_COOKIE['email'];
		$this->firstname = $_COOKIE['firstname'];
		$this->lastname = $_COOKIE['lastname'];

	}

	function header(){
	?>
		<!DOCTYPE html>
		<html lang="en">

		<head>

		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		  <meta name="description" content="Tax registration App">
		  <meta name="author" content="Cliff Mnduwira">

		  <title>MRA Tax Registration - <?php echo $this->pageTitle; ?></title>

		  <!-- Custom fonts-->
		  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		  <!-- Custom styles-->
		  <link href="css/main.css" rel="stylesheet">

		</head>

		<body id="page-top">

		  <!-- Page Wrapper -->
		  <div id="wrapper">

		    <!-- Sidebar -->
		    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		      <!-- Sidebar - Brand -->
		      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
		        <div class="sidebar-brand-icon rotate-n-15">
		        </div>
		        <div class="sidebar-brand-text mx-3"><img width="200px" src="img/logo.png"></div>
		      </a>

		      <!-- Divider -->
		      <hr class="sidebar-divider my-0">

		      <!-- Nav Item - Dashboard -->
		      <li class="nav-item active">
		        <a class="nav-link" href="dashboard.php">
		          <i class="fas fa-fw fa-tachometer-alt"></i>
		          <span>Dashboard</span></a>
		      </li>

		      <!-- Divider -->
		      <hr class="sidebar-divider">

		      <!-- Heading -->
		      <div class="sidebar-heading">
		        MENU
		      </div>
		      <!-- Nav Item - Tax-Payers Collapse Menu -->
		      <li class="nav-item">
		        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
		          <i class="fas fa-user"></i>
		          <span>Tax Payers</span>
		        </a>
		        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
		          <div class="bg-white py-2 collapse-inner rounded">
		            <h6 class="collapse-header">Options</h6>
		            <a class="collapse-item" href="taxpayer_create.php">Create</a>
		            <a class="collapse-item" href="taxpayer_view.php">View</a>
		            <a class="collapse-item" href="taxpayer_edit_delete.php">Edit | Delete</a>
		          </div>
		        </div>
		      </li>

		      <!-- Divider -->
		      <hr class="sidebar-divider">
		      <!-- Nav Item - profile -->
		      <li class="nav-item">
		        <a class="nav-link" href="profile.php">
		          <i class="fas fa-fw fa-wrench"></i>
		          <span>Profile</span></a>
		      </li>

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

		          <!-- Topbar Title -->
		          <div class="d-none d-sm-inline-block text-primary">
		            Tax Registration System
		          </div>

		          <!-- Topbar Navbar -->
		          <ul class="navbar-nav ml-auto">
		            <li class="nav-item dropdown no-arrow d-sm-none">
		              <!-- Dropdown - Messages -->
		              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
		                <form class="form-inline mr-auto w-100 navbar-search">
		                  <div class="input-group">
		                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
		                    <div class="input-group-append">
		                      <button class="btn btn-primary" type="button">
		                        <i class="fas fa-search fa-sm"></i>
		                      </button>
		                    </div>
		                  </div>
		                </form>
		              </div>
		            </li>

		            <div class="topbar-divider d-none d-sm-block"></div>

		            <!-- Nav Item - User Information -->
		            <li class="nav-item dropdown no-arrow">
		              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                <span class="mr-2 d-none d-lg-inline text-warning small"><?php echo $this->firstname." ".$this->lastname; ?></span>
		                <span><i class="fas fa-user fa-sm fa-fw mr-2 text-warning"></i></span>
		                <!-- <img class="img-profile rounded-circle" src="img/user.jpg"> -->
		              </a>
		              <!-- Dropdown - User Information -->
		              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
		                <a class="dropdown-item" href="profile.php">
		                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
		                  Profile
		                </a>
		                <div class="dropdown-divider"></div>
		                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
		                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
		                  Logout
		                </a>
		              </div>
		            </li>

		          </ul>

		        </nav>
		        <!-- End of Topbar -->
	<?php
	}



	function footer(){
	?>
		      <!-- Footer -->
		      <footer class="sticky-footer bg-white">
		        <div class="container my-auto">
		          <div class="copyright text-center my-auto">
		            <span>Copyright &copy; Cliff Mnduwira 2021</span>
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
		  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		          <a class="btn btn-primary" href="logout.php">Logout</a>
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
		  <script src="js/sb-main.min.js"></script>

		</body>

		</html>

		<?php
	}
}
?>
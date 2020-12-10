
<?php $this->load->view('include/popup.php'); ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion disp " id="accordionSidebar" >

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
       <div class="sidebar-brand-icon" style="font-size:25px;">
         Hair Expo
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>index.php/Admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <div class="sidebar-heading">
        Invoice
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefourr" aria-expanded="true" aria-controls="collapsefour">
        <i class="fa fa-cog" aria-hidden="true"></i>
          <span>New Invoice</span>
        </a>
        <div id="collapsefourr" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Invoice Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/invoice/add_invoice">New Invoice</a>
             <a class="collapse-item" href="<?php echo base_url();?>View/invoice/list_invoice">List Invoice</a>
          </div>
        </div>
      </li>
      <!-- Divider -->

      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Master
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
          <i class="fas fa-plus"></i>
          <span>Service Type</span>
        </a>
        <div id="collapsetwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Service Type Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/service/add_service">Add Service Type</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/service/list_service">List Service Type</a>
          </div>
        </div>
      </li>
     
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
          <i class="fas fa-user"></i>
          <span>Customer</span>
        </a>
        <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Customer Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/customer/add_customer">Add Customer</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/customer/list_customer">List Customer</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
          <i class="fas fa-address-book"></i>
          <span>Employee</span>
        </a>
        <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Employee Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/employee/add_employee">Add Employee</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/employee/list_employee">List Employee</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour11" aria-expanded="true" aria-controls="collapsefour">
          <i class="fas fa-address-book"></i>
          <span>Supplier</span>
        </a>
        <div id="collapsefour11" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Supplier Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/supplier/add_supplier">Add Supplier</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/supplier/list_supplier">List Supplier</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour71" aria-expanded="true" aria-controls="collapsefour">
          <i class="fas fa-address-book"></i>
          <span>Products</span>
        </a>
        <div id="collapsefour71" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Products Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/product/add_product">Add Products</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/product/list_product">List Products</a>
          </div>
        </div>
      </li>
      
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Purchase
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefourr2" aria-expanded="true" aria-controls="collapsefour">
        <i class="fa fa-cog" aria-hidden="true"></i>
          <span>Purchase</span>
        </a>
        <div id="collapsefourr2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Purchase Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/purchase/add_purchase">Purchase</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/purchase/list_purchase">List Purchase</a>
          </div>
          
        </div>
      </li>
      
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Booking
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefourr285" aria-expanded="true" aria-controls="collapsefour">
        <i class="fa fa-cog" aria-hidden="true"></i>
          <span>Booking</span>
        </a>
        <div id="collapsefourr285" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Booking Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/book/booked">Booked list</a>
          </div>
         
        </div>
      </li>
       <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Stock
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefourr28" aria-expanded="true" aria-controls="collapsefour">
        <i class="fa fa-cog" aria-hidden="true"></i>
          <span>Stock</span>
        </a>
        <div id="collapsefourr28" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Stock Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/stock/stock_manage">Stock</a>
             <a class="collapse-item" href="<?php echo base_url();?>View/stock/taken_report">Taken Report</a>
          </div>
         
        </div>
      </li>
      
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Report
      </div>
      <li class="nav-item">
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>View/report/service_report">
          <i class="fas fa-address-book"></i>
          <span>Service Report</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>View/report/purchase_report">
          <i class="fas fa-address-book"></i>
          <span>Purchase Report</span>
        </a>
      </li>
      </li>
      
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Settings
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour4" aria-expanded="true" aria-controls="collapsefour">
        <i class="fa fa-cog" aria-hidden="true"></i>
          <span>GST Setting</span>
        </a>
        <div id="collapsefour4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">GST Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/gst_setting/add_gst">GST%</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/gst_setting/list_gst">List GST%</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour1" aria-expanded="true" aria-controls="collapsefour">
        <i class="fa fa-cog" aria-hidden="true"></i>
          <span>General Setting</span>
        </a>
        <div id="collapsefour1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Setting Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/setting/add_profile">Profile</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/setting/add_smtp">SMTP</a>
          </div>
        </div>
      </li>
      
      
    
     
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Register
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefourr623" aria-expanded="true" aria-controls="collapsefour">
        <i class="fa fa-cog" aria-hidden="true"></i>
          <span>Register</span>
        </a>
        <div id="collapsefourr623" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Register Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/register/add_register">Register</a>
          </div>
        </div>
      </li>
     
      
      <!-- Heading -->
     

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
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
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

            <!-- Nav Item - Alerts -->
           
            <!-- Nav Item - Messages -->
           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                
      <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php $name = $this->session->userdata('employee_name'); echo $name; ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>assets/img/img.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <div class="dropdown-item" onclick="disp_profile()">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
</div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>Admin/logout_front" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
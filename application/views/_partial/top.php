<?php
$role = $this->session->userdata('role');
$side_permission = array(
	0 => (in_array($role, array("Super Admin", "Operator", "Finance", "Commercial", "Customer")) ? 1 : 0), //Shipment List
	1 => (in_array($role, array("Super Admin", "Operator", "Commercial")) ? 1 : 0), //Create Shipment
	2 => (in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //Import Shipment
	3 => (in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //Operation
	4 => (in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //Master Tracking List
	5 => (in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //Create Master Tracking
	6 => (in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //Share Link
	7 => (in_array($role, array("Driver", "Super Admin")) ? 1 : 0), //Driver
	8 => (in_array($role, array("Super Admin")) ? 1 : 0), //User Management
	9 => (in_array($role, array("Super Admin", "Finance")) ? 1 : 0), //Finance Report
	10 => (in_array($role, array("Super Admin", "Commercial")) ? 1 : 0), //Commercial Customer
	11 => (in_array($role, array("Super Admin", "Commercial")) ? 1 : 0), //View Quotation
	12 => (in_array($role, array("Super Admin", "Commercial")) ? 1 : 0), //Create Quotation
	13 => (in_array($role, array("Super Admin", "Commercial", "Customer")) ? 1 : 0),
);
?>

<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<div class="wrapper">
		<header class="header-top" header-theme="light">
			<!-- <header class="header-top" style="background: #008060"> -->
			<div class="container-fluid">
				<div class="d-flex justify-content-between">
					<div class="top-menu d-flex align-items-center">
						<button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
						<div class="header-search">
							<div class="input-group">
								<span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
								<input type="text" class="form-control">
								<span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
							</div>
						</div>
						<button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
					</div>
					<div class="top-menu d-flex align-items-center">
						<div class="dropdown">
							<a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="<?php echo base_url(); ?>assets/img/just_logo_xpdc.jpeg" alt=""><span style="position: relative; bottom: 3px; left: 5px;"><b><?php echo $this->session->userdata('name') ?></b></span></a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
								<!-- <a class="dropdown-item" href="profile.html"><i class="ik ik-user dropdown-icon"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
								<a class="dropdown-item" href="#"><span class="float-right"><span class="badge badge-primary">6</span></span><i class="ik ik-mail dropdown-icon"></i> Inbox</a>
								<a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i> Message</a> -->
								<?php if ($this->session->userdata('id') == "Guest") : ?>
									<a class="dropdown-item" href="<?php echo base_url(); ?>"><i class="ik ik-home dropdown-icon"></i> Home Page</a>
								<?php else : ?>
									<a class="dropdown-item" href="<?php echo base_url(); ?>user/user_password"><i class="fas fa-key dropdown-icon"></i> Change Password</a>
									<a class="dropdown-item" href="<?php echo base_url(); ?>home/logout"><i class="ik ik-power dropdown-icon"></i> Logout</a>
								<?php endif; ?>
							</div>
						</div>

					</div>
				</div>
			</div>
		</header>

		<div class="page-wrap">
			<div class="app-sidebar colored">
				<div class="sidebar-header" style="overflow: hidden; padding-left: 7px;">
					<a class="header-brand" href="<?php echo base_url() ?>">
						<img src="<?php echo base_url(); ?>assets/img/logo-white-fix.png" class="header-brand-img" alt="lavalite" width="150px">
					</a>
					<button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
					<button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
				</div>

				<div class="sidebar-content">
					<div class="nav-container">
						<nav id="main-menu-navigation" class="navigation-main">
							<div class="nav-lavel">Navigation (<?php echo $role ?>)</div>
							<?php if ($this->session->userdata('id') == "Guest") : ?>
								<div class="nav-item">
									<a href="<?php echo base_url() ?>home/shipment_create"><i class="fas fa-plus"></i><span>Create Shipment</span></a>
								</div>
							<?php else : ?>
								<div class="nav-item">
									<a href="<?php echo base_url() ?>home/home"><i class="fas fa-home"></i><span>Dashboard</span></a>
								</div>
								<?php if (in_array("1", array($side_permission[0], $side_permission[1], $side_permission[2]))) : ?>
									<div class="nav-item has-sub">
										<a href="javascript:void(0)"><i class="fas fa-pallet"></i><span>Shipment</span></a>
										<div class="submenu-content">
											<?php if ($side_permission[0] == 1) : ?>
												<a href="<?php echo base_url() ?>shipment/shipment_list" class="menu-item">Shipment List</a>
											<?php endif; ?>
											<?php if ($side_permission[1] == 1) : ?>
												<a href="<?php echo base_url() ?>shipment/shipment_create" class="menu-item">Create Shipment</a>
											<?php endif; ?>
											<?php if ($side_permission[2] == 1) : ?>
												<a href="<?php echo base_url() ?>shipment/shipment_import" class="menu-item">Import Shipment</a>
											<?php endif; ?>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($side_permission[7] == 1) : ?>
									<div class="nav-item has-sub">
										<a href="javascript:void(0)"><i class="fas fa-truck"></i><span>Driver</span></a>
										<div class="submenu-content">
											<a href="<?php echo base_url() ?>shipment/shipment_list?status_driver=pickup" class="menu-item">PickUp List</a>
											<a href="<?php echo base_url() ?>shipment/shipment_list?status_driver=deliver" class="menu-item">Deliver List</a>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($side_permission[3] == 1) : ?>
									<div class="nav-item has-sub">
										<a href="javascript:void(0)"><i class="fas fa-cogs"></i><span>Operation</span></a>
										<div class="submenu-content">
											<a href="<?php echo base_url() ?>shipment/shipment_history_update" class="menu-item">Update History</a>
											<a href="<?php echo base_url() ?>shipment/shipment_list?status=Picked up" class="menu-item">Picked up</a>
											<!-- <a href="<?php echo base_url() ?>operation/service_center" class="menu-item">Service Center</a> -->
											<!-- <a href="<?php echo base_url() ?>operation/departed" class="menu-item">Departed</a>
									<a href="<?php echo base_url() ?>operation/arrived" class="menu-item">Arrived</a>
									<a href="<?php echo base_url() ?>operation/with_courier" class="menu-item">With Courier</a>
									<a href="<?php echo base_url() ?>operation/delivered" class="menu-item">Delivered</a> -->
										</div>
									</div>
								<?php endif; ?>
								<?php if ($side_permission[4] == 1 || $side_permission[5] == 1) : ?>
									<div class="nav-item has-sub">
										<a href="javascript:void(0)"><i class="fas fa-box"></i><span>Master Tracking</span></a>
										<div class="submenu-content">
											<?php if ($side_permission[4] == 1) : ?>
												<a href="<?php echo base_url() ?>master_tracking/master_tracking_list" class="menu-item">Master Tracking List</a>
											<?php endif; ?>
											<?php if ($side_permission[5] == 1) : ?>
												<a href="<?php echo base_url() ?>master_tracking/master_tracking_create" class="menu-item">Create Master Tracking</a>
											<?php endif; ?>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($side_permission[6] == 1) : ?>
									<div class="nav-item">
										<a href="<?php echo base_url() ?>shipment/shipment_link_share"><i class="fas fa-share-alt"></i> <span>Share Link</span></a>
									</div>
								<?php endif; ?>
								<?php if ($side_permission[13] == 1) : ?>
									<div class="nav-item">
										<a href="<?php echo base_url() ?>customer/check_price"><i class="fas fa-ship"></i> <span><?=($this->session->userdata('role') == 'Customer') ? 'Book Shipment' : 'Price Check'?></span></a>
									</div>
								<?php endif; ?>
								<?php if ($side_permission[9] == 1) : ?>
									<div class="nav-item">
										<a href="<?php echo base_url() ?>report/summary_report"><i class="fas fa-file-alt"></i> <span>Summary Report</span></a>
									</div>
								<?php endif; ?>
								<?php if ($side_permission[10] == 1) : ?>
									<div class="nav-item has-sub">
										<a href="javascript:void(0)"><i class="fas fa-address-card"></i><span>Commercial</span></a>
										<div class="submenu-content">
											<a href="<?php echo base_url() ?>commercial/customer_list" class="menu-item">Customer List</a>
											<a href="<?php echo base_url() ?>commercial/customer_create" class="menu-item">Create Customer</a>
										</div>
									</div>
								<?php endif; ?>
								<?php if (in_array(1, array($side_permission[11], $side_permission[12]))) : ?>
									<div class="nav-item has-sub">
										<a href="javascript:void(0)"><i class="fas fa-hand-holding-usd"></i><span>Quotation</span></a>
										<div class="submenu-content">
											<?php if ($side_permission[11] == 1) : ?>
												<a href="<?php echo base_url() ?>quotation/quotation_list" class="menu-item">Quotation List</a>
											<?php endif; ?>
											<?php if ($side_permission[12] == 1) : ?>
												<a href="<?php echo base_url() ?>quotation/quotation_create" class="menu-item">Create Quotation</a>
											<?php endif; ?>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($side_permission[8] == 1) : ?>

									<div class="nav-item has-sub">
										<a href="javascript:void(0)"><i class="fas fa-cog"></i><span>Configuration</span></a>
										<div class="submenu-content">
											<div class="nav-item">
												<a href="<?php echo base_url() ?>user/user_list" class="menu-item"><i class="fas fa-user"></i><span>User</span></a>
											</div>
											<div class="nav-item">
												<a href="<?php echo base_url() ?>branch/branch_list" class="menu-item"><i class="fas fa-code-branch"></i><span>Branch</span></a>
											</div>
											<div class="nav-item ">
												<a href="<?php echo base_url() ?>agent/agent_list" class="menu-item"><i class="fas fa-user-secret"></i><span>Agent</span></a>
											</div>
											<div class="nav-item">
												<a href="<?php echo base_url() ?>payment_terms/payment_terms_list" class="menu-item"><i class="far fa-credit-card"></i> Payment Terms</a>
											</div>
											<div class="nav-item">
												<a href="<?php echo base_url() ?>uom/uom_list" class="menu-item"><i class="fas fa-ruler"></i><span>UOM</span></a>
											</div>
											<div class="nav-item">
												<a href="<?php echo base_url() ?>zone/zone_list" class="menu-item"><i class="fas fa-map-marked-alt"></i><span>Zone</span></a>
											</div>
											<div class="nav-item">
												<a href="<?php echo base_url() ?>country/country_list" class="menu-item"><i class="fas fa-flag"></i><span>Country</span></a>
											</div>
											<div class="nav-item">
												<a href="<?php echo base_url() ?>package_type/package_type_list" class="menu-item"><i class="fas fa-box-open"></i><span>Package Type</span></a>
											</div>
										</div>
									</div>
								<?php endif; ?>
							<?php endif; //Not Guest 
							?>
						</nav>
					</div>
				</div>
			</div>
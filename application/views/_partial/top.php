<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<div class="wrapper">
		<!-- <header class="header-top" header-theme="green"> -->
		<header class="header-top" style="background: #008060">
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
							<a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="<?php echo base_url(); ?>assets/img/user.jpg" alt=""></a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
								<!-- <a class="dropdown-item" href="profile.html"><i class="ik ik-user dropdown-icon"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
								<a class="dropdown-item" href="#"><span class="float-right"><span class="badge badge-primary">6</span></span><i class="ik ik-mail dropdown-icon"></i> Inbox</a>
								<a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i> Message</a> -->
								<a class="dropdown-item" href="login.html"><i class="ik ik-power dropdown-icon"></i> Logout</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</header>

		<div class="page-wrap">
			<div class="app-sidebar colored">
				<div class="sidebar-header">
					<a class="header-brand" href="index.html">
						<div class="logo-img">
						   <img src="<?php echo base_url(); ?>assets/img/logo.png" class="header-brand-img" alt="lavalite"> 
						</div>
					</a>
					<button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
					<button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
				</div>
				
				<div class="sidebar-content">
					<div class="nav-container">
						<nav id="main-menu-navigation" class="navigation-main">
							<div class="nav-lavel">Navigation</div>
							<div class="nav-item active">
								<a href="<?php echo base_url() ?>home"><i class="fas fa-home"></i><span>Dashboard</span></a>
							</div>
							<!-- <div class="nav-item">
								<a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span></a>
							</div> -->
							<div class="nav-item active">
								<a href="<?php echo base_url() ?>shipment/shipment_history_update"><i class="fas fa-history"></i><span>Shipment History Update</span></a>
							</div>
							<div class="nav-item has-sub">
								<a href="javascript:void(0)"><i class="fas fa-pallet"></i><span>Shipment</span></a>
								<div class="submenu-content">
									<a href="<?php echo base_url() ?>shipment/shipment_list" class="menu-item">Shipment List</a>
									<a href="<?php echo base_url() ?>shipment/shipment_create" class="menu-item">Create Shipment</a>
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>
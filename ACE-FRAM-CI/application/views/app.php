<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Inventory Management</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/4.2.0/css/font-awesome.min.css') ?>" />

		<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/chosen.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/toastr.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker.min.css') ?>" />

		<link rel="stylesheet" href="<?php echo base_url('assets/fonts/fonts.googleapis.com.css') ?>" />

		<link rel="stylesheet" href="<?php echo base_url('assets/css/ace.min.css') ?>" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url('assets/css/ace-part2.min.css') ?>" class="ace-main-stylesheet" />
		<![endif]-->
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url('assets/css/ace-ie.min.css') ?>" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css') ?>" />

		<script src="<?php echo base_url('assets/js/ace-extra.min.js') ?>"></script>
		<!--[if lte IE 8]>
		<script src="<?php echo base_url('assets/js/html5shiv.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/respond.min.js') ?>"></script>
		<![endif]-->

		<script src="<?php echo site_url('adapter/javascript') ?>"></script>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small><i class="fa fa-leaf"></i> Inventory Management</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
									<small>Welcome,</small>	Administrator								
								</span>
								<i class="ace-icon fa fa-caret-down"></i>							
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings									</a>								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile									</a>								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo site_url('login/logout') ?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout									</a>								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="active highlight">
						<a href="<?php echo site_url('app#dashboard'); ?>" class="ajax-link">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>						
						</a>
						<b class="arrow"></b>					
					</li>
					<li class="highlight">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">Purchase</span>
							<b class="arrow fa fa-angle-down"></b>						
						</a>
						<b class="arrow"></b>

						<ul class="submenu">
							<li class="highlight">
								<a class="ajax-link" href="<?php echo site_url('app#supplier'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text"> Supplier </span>
								</a>
								<b class="arrow"></b>							
							</li>
							<li class="highlight">
								<a class="ajax-link" href="<?php echo site_url('app#purchase'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text"> Purchase </span>
								</a>
								<b class="arrow"></b>							
							</li>							
						</ul>
					</li>					
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1> Dashboard  </h1>
						</div><!-- /.page-header -->
						
						<div class="preloader">
							<div class="progress progress-striped active">
								<div style="width: 100%" class="progress-bar pos-rel"></div>
							</div>
						</div>
						
						<div id="ajax-content"></div>
						
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>							</a>						</span>					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>			
			</a>		
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url('assets/js/jquery.2.1.1.min.js') ?>"></script>
		<!-- <![endif]-->
		<!--[if IE]>
		<script src="<?php echo base_url('assets/js/jquery.1.11.1.min.js') ?>"></script>
		<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 	window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

		<!--[if lte IE 8]>
		  <script src="<?php echo base_url('assets/js/excanvas.min.js') ?>"></script>
		<![endif]-->

		<!-- cookie scripts -->
		<script src="<?php echo base_url('assets/js/jquery.cookie.js') ?>"></script>

		<!-- form validation scripts -->
		<script src="<?php echo base_url('assets/js/jquery.validate.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/additional-methods.min.js') ?>"></script>

		<!-- modal/pop up/confirma/alert scripts -->
		<script src="<?php echo base_url('assets/js/bootbox.min.js') ?>"></script>

		<!-- masked input scripts -->
		<script src="<?php echo base_url('assets/js/jquery.maskedinput.min.js') ?>"></script>

		<!-- select 2 scripts -->
		<script src="<?php echo base_url('assets/js/select2.min.js') ?>"></script>

		<!-- select 2 scripts -->
		<script src="<?php echo base_url('assets/js/chosen.jquery.min.js') ?>"></script>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.ui.touch-punch.min.js') ?>"></script>

		<!-- toastr scripts -->
		<script src="<?php echo base_url('assets/js/toastr.min.js') ?>"></script>

		<!-- fixed table header scripts -->
		<script src="<?php echo base_url('assets/js/jquery.floatThead.min.js') ?>"></script>

		<!-- typehead / autocomplete scripts -->
		<script src="<?php echo base_url('assets/js/typeahead.jquery.min.js') ?>"></script>

		<!-- date picker scripts -->
		<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
		
		<!-- date picker scripts -->
		<script src="<?php echo base_url('assets/js/bootstrap-tagsinput.min.js') ?>"></script>

		<!-- date picker scripts -->
		<script src="<?php echo base_url('assets/js/big-integer.min.js') ?>"></script>

		<!-- date picker scripts -->
		<script src="<?php echo base_url('assets/js/jquery.number.min.js') ?>"></script>

		<!-- date picker scripts -->
		<script src="<?php echo base_url('assets/js/jquery.PrintArea.js') ?>"></script>

		<!-- ace scripts -->
		<script src="<?php echo base_url('assets/js/ace-elements.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/ace.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/spa.frame.js') ?>"></script>
	
	</body>
</html>

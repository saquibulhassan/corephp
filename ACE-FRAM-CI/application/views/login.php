<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Ace Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/4.2.0/css/font-awesome.min.css') ?>" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url('assets/fonts/fonts.googleapis.com.css') ?>" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/ace.min.css') ?>" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url('assets/css/ace-part2.min.css') ?>" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/ace-rtl.min.css') ?>" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url('assets/css/ace-ie.min.css') ?>" />
		<![endif]-->

		<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css') ?>" />

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="<?php echo base_url('assets/js/html5shiv.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/respond.min.js') ?>"></script>
		<![endif]-->

		<script src="<?php echo site_url('adapter/javascript') ?>"></script>
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">Inventory</span>
									<span class="white" id="id-text2">Management</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Source Tech</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Please Enter Your Information
											</h4>

											<div class="space-6"></div>

											<form id="login-form" action="<?php echo site_url('login/action') ?>" method="post">
												<div class="alert alert-danger hide">

												</div>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="LoginName" id="LoginName" class="form-control" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="Password" id="Password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Remember Me</span>
														</label>

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>											
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div style="width:100%; text-align:center">
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													I forgot my password
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Retrieve Password
											</h4>

											<div class="space-6"></div>
											<p>
												Enter your email and to receive instructions
											</p>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Send Me!</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												Back to login
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->
							</div><!-- /.position-relative -->
							
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
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
			window.jQuery || document.write("<script src='"+URL.getBaseAction('assets/js/jquery.min.js')+"'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='"+URL.getBaseAction('assets/js/jquery1x.min.js')+"'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='"+URL.getBaseAction('assets/js/jquery.mobile.custom.min.js')+"'>"+"<"+"/script>");
		</script>

		<!-- form validation scripts -->
		<script src="<?php echo base_url('assets/js/jquery.validate.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/additional-methods.min.js') ?>"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});

			$("#login-form").validate({
				errorElement: 'div',
				errorClass: 'help-block',
				ignore: '',
				rules: {
							LoginName 	: { required: true },
							Password 	: { required: true },
						},
				messages: {
							LoginName	: "Please enter username",
							Password	: "Please enter password"
						},
				highlight: function (e) {
					$(e).closest('label').removeClass('has-info').addClass('has-error');
				},
				success: function (e) {
					$(e).closest('label').removeClass('has-error');//.addClass('has-info');
					$(e).remove();
				},
				errorPlacement: function (error, element) {
					if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
						var controls = element.closest('div[class*="col-"]');
						if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
						else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
					}
					else if(element.is('.select2')) {
						error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
					}
					else if(element.is('.chosen-select')) {
						error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
					}
					else error.insertAfter(element.parent());
				},
				submitHandler: function (form) {

					var postData 	= $(form).serializeArray();
	                var formURL 	= $(form).attr('action');
	                
	                $.ajax({
	                    url: formURL,
	                    type: "POST",
	                    data: postData,
	                    dataType: "json",
	                    success: function(data, textStatus, jqXHR) {
							if(data.hasError) {
								$("#login-form .alert").removeClass("hide").html(data.msg);
							} else {
								location.replace(data.redirect);
							}
	                    },
	                    error: function (xhr, ajaxOptions, thrownError){
					       	console.log(thrownError);
					    }
	                });
	            },
				invalidHandler: function (form) {
				}
			});

		</script>
	</body>
</html>

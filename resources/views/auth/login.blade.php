<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>{{"HM System"}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="HM System" name="description" />
    <meta content="" name="author" />
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->
    <!--begin::Base Styles -->
    <link href="{{asset('admin/assets/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->

    <!--begin::Base Scripts -->
    <script src="{{asset('admin/assets/base/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/base/scripts.bundle.js')}}" type="text/javascript"></script>
    <!--end::Base Scripts -->

    <!-- <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" /> -->

</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

        
        
    	<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    
			
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
	<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
		<div class="m-stack m-stack--hor m-stack--desktop">
				<div class="m-stack__item m-stack__item--fluid">

					<div class="m-login__wrapper">

						<div class="m-login__logo">
							<a href="#">
							<img src="./assets/app/media/img/logos/logo-2.png">  	
							</a>
						</div>

						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">Sign In To Admin</h3>

															</div>

							<form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" id="name" name="name" placeholder="Name" autocomplete="off"/>
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" id="password" name="password" placeholder="Password"/>
								</div>
								<div class="row m-login__form-sub">
									<div class="col m--align-left">
										<label class="m-checkbox m-checkbox--focus">
										<input type="checkbox" name="remember"> Remember me
										<span></span>
										</label>
									</div>
									<div class="col m--align-right">
										<a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a>
									</div>
								</div>
								<div class="m-login__form-action">
                                <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">
                                Sign In
                            </button>
								</div>
							</form>
						</div>


						
					</div>

				</div>
				<div class="m-stack__item m-stack__item--center">  
					
					<div class="m-login__account">
						<span class="m-login__account-msg">
						Don't have an account yet ?
						</span>&nbsp;&nbsp;
						<a href="javascript:;" id="m_login_signup" class="m-link m-link--focus m-login__account-link">Sign Up</a>
					</div>
				
				</div>
		</div>
	</div>
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content m-grid-item--center" style="background-image: url(./assets/app/media/img//bg/bg-4.jpg)">
		<div class="m-grid__item">
			<h3 class="m-login__welcome">Join Our Community</h3>
			<p class="m-login__msg">
				Lorem ipsum dolor sit amet, coectetuer adipiscing<br>elit sed diam nonummy et nibh euismod
			</p>
		</div>
	</div>
</div>				
		

</div>
<!-- end:: Page -->


        <!--begin::Global Theme Bundle -->
                    <script src="./assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
                    <script src="./assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
                <!--end::Global Theme Bundle -->

        
                    <!--begin::Page Scripts -->
                            <script src="./assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
        
                    
    <!-- end::Body -->
</body>
<!-- end::Body -->
</html>

<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
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
<html lang="en">

<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>{{$title }} - HM System</title>
	<meta content="Majal Coworking Space" name="description" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="" name="author" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
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

	<!--begin::Global Theme Styles -->
	<link href="{{asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="../assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
	<link href="{{asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="../assets/demo/demo12/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

	<!--end::Global Theme Styles -->
	<!--begin::Global Theme Bundle -->
	<script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/vendors/custom/dropzone/dropzone.js')}}" type="text/javascript"></script>
	{{-- 
	<script src="{{asset('assets/vendors/custom/jquery-ui/jquery-ui.bundle.js')}}" type="text/javascript"></script> --}}

	<!--end::Global Theme Bundle -->

	<!--begin::Page Vendors Styles -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
	@yield('page_styles')
	<style>
		.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__heading .m-menu__link-text,
		.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__link .m-menu__link-text {
			color: #ffffff;
			font-weight: bold;
		}
	</style>
	<!--end::Page Vendors Styles -->
	<link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body
	class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-footer--push @if (!isset($grid)) m-brand--minimize m-aside-left--minimize m-aside-left--offcanvas m-aside--offcanvas-default @endif">
	@include('templates.admin.layout')
	<input id = "locale" hidden>
		
	<script type="text/javascript">
	var locale;
		$(document).ready(async function() {
				$('.select2picker').select2();
				$('.selectpicker').selectpicker();
				
				await get_locale();
				$('#locale').val(locale);
				if(locale == 'ar')
				$('#changed-flag').attr('src', `../assets/media/img/flags/008-saudi-arabia.svg`)
				$('.change-language').click(function(e){
					$('#changed-flag').attr('src', `../assets/media/img/flags/${e.target.id}`)
					$('#locale').val(e.target.innerText.slice(0,2).toLowerCase());
					switch_lang($("#locale").val());
					location.reload();
				})

				new ClipboardJS('.clipboard');
				// window.onload = function () {
				// 	$('#m_ver_menu').mMenu().setActiveItem($('a[href="'+window.location.pathname+'"]').parent('li'))
				// };
			});
		
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			function switch_lang(language) {
			    $.ajax({
			        type: "GET",
			        url: "{{URL::to('/admin/swith-locale')}}",
			        data: {
			            lang: language
			        },
			        dataType: "JSON",
			    });
			}
			 async function get_locale() {
			    await $.ajax({
			        type: "GET",
			        url: "{{URL::to('/admin/get-locale')}}",
					success: function (data) {
						locale =  data;
               		},
			        dataType: "JSON",
			    });
			}
	</script>

	<!--begin::Page Scripts -->
	@yield('js_script')
	<!--end::Page Scripts -->

</body>

<!-- end::Body -->

</html>
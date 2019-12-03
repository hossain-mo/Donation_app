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
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Majal Space</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Majal Co-Working Space" name="description" />
    <meta content="" name="author" />

    <title>Fairouz</title>

    <link rel="shortcut icon" type="image/png" href="{{asset('admin/images/favicon.png')}}"/>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('admin/css/components-md.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/css/coming-soon.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('admin/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset('admin/plugins/jquery.min.js')}}" type="text/javascript"></script>

    <!-- END THEME LAYOUT STYLES -->
</head>
<!-- END HEAD -->

<body class="">
<div class="header" style="text-align: right;">
    <a class="m-link m--font-boldest" href="{{route('login')}}"><h4>Login</h4></a>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 coming-soon-header">
            <a class="brand" href="index.html">
                <img src="{{asset('admin/images/logo.png')}}" alt="logo" /> </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 coming-soon-content">
            <h1>Coming Soon!</h1>
            <p> We are working on our new system, stay tuned. </p>
            <br>
            <form class="form-inline" action="#">
                <div class="input-group input-group-lg input-large">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                                <button class="btn green" type="button"> Subscribe </button>
                            </span>
                </div>
            </form>
            <ul class="social-icons margin-top-20">
                <li>
                    <a href="javascript:;" data-original-title="Feed" class="rss"> </a>
                </li>
                <li>
                    <a href="javascript:;" data-original-title="Facebook" class="facebook"> </a>
                </li>
                <li>
                    <a href="javascript:;" data-original-title="Twitter" class="twitter"> </a>
                </li>
                <li>
                    <a href="javascript:;" data-original-title="Goole Plus" class="googleplus"> </a>
                </li>
                <li>
                    <a href="javascript:;" data-original-title="Pinterest" class="pintrest"> </a>
                </li>
                <li>
                    <a href="javascript:;" data-original-title="Linkedin" class="linkedin"> </a>
                </li>
                <li>
                    <a href="javascript:;" data-original-title="Vimeo" class="vimeo"> </a>
                </li>
            </ul>
        </div>
        <div class="col-md-6 coming-soon-countdown">
            <div id="defaultCountdown"> </div>
        </div>
    </div>
    <!--/end row-->
    <div class="row">
        <div class="col-md-12 coming-soon-footer"> 2017 &copy; Majal. All Rights Reserved. </div>
    </div>
</div>

<!--[if lt IE 9]>
<script src="{{asset('admin/plugins/respond.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/plugins/excanvas.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/plugins/ie8.fix.min.js')}}" type="text/javascript"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{asset('admin/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/plugins/countdown/jquery.countdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/plugins/backstretch/jquery.backstretch.min.js')}}" type="text/javascript"></script>

<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{asset('admin/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{asset('admin/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/scripts/coming-soon.min.js')}}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(document).ready(function()
    {

    });
</script>

</body>
</html>
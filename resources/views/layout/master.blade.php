<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Home Page')</title>

    @section('headerScripts')
    <!-- Bootstrap -->
    <link href="{{ asset ('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset ('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset ('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset ('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset ('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset ('vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset ('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset ('build/css/custom.min.css') }}" rel="stylesheet">

    <style>
        .bootstrap-datetimepicker-widget table td.disabled,
        .bootstrap-datetimepicker-widget table td.disabled:hover {
            background: rgba(255, 0, 0, 0.13) !important;
            color: black;
            cursor: not-allowed;
        }

        .daterangepicker td.disabled,
        .daterangepicker option.disabled {
            background: rgba(255, 0, 0, 0.13) !important;
            text-decoration: none !important;
        }
    </style>

    <!-- jQuery -->
    <script src="{{ asset ('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset ('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset ('vendors/fastclick/lib/fastclick.js') }}"></script>
    @show

    @yield('footerScripts')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            
            {{-- Side Navbar --}}
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;background-color: purple">
                        <a href="<?= URL::to('/'); ?>" class="site_title">
                            <span>
                            {{-- pke logo maxy aja nti? --}}
                                <strong>Linkmagangku</strong>
                            </span>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?= URL::to('/'); ?>/images/user.png" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <br />
                    <!-- /menu profile quick info -->
                    
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li class="s-nav">
                                    <a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Dashboard</span></a>
                                </li>
                            </ul>

                            {{-- Master --}}
                            @if(strpos(Session::get('user_access'), 'm_bank_manage') !== false || strpos(Session::get('user_access'), 'm_bank_account_manage') !== false || strpos(Session::get('user_access'), 'm_course_type_manage') !== false || strpos(Session::get('user_access'), 'm_difficulty_type_manage') !== false || strpos(Session::get('user_access'), 'm_major_manage') !== false || strpos(Session::get('user_access'), 'm_payment_type_manage') !== false || strpos(Session::get('user_access'), 'company_manage') !== false || strpos(Session::get('user_access'), 'message_manage') !== false || strpos(Session::get('user_access'), 'member_manage') !== false || strpos(Session::get('user_access'), 'm_tutor_manage') !== false || strpos(Session::get('user_access'), 'm_page_manage') !== false)
                            <ul class="nav side-menu">
                                <li class="{{ request()->is('banks*') || request()->is('bank_accounts*') || request()->is('payment_types*') || request()->is('course_types*') || request()->is('difficulty_types*') || request()->is('tutors*') || request()->is('companies*') || request()->is('messages*') || request()->is('members*') || request()->is('pages*') ? 'active' : '' }}"><a><i class="fa fa-asterisk"></i> Master <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="{{ request()->is('banks*') || request()->is('bank_accounts*') || request()->is('payment_types*') || request()->is('course_types*') || request()->is('difficulty_types*') || request()->is('tutors*') || request()->is('companies*') || request()->is('messages*') || request()->is('members*') || request()->is('pages*') ? 'display:block;' : '' }}">
                                        @can('access', 'm_bank_manage')
                                        <li class="s-nav {{ request()->is('banks*') ? 'active' : '' }}"><a href="{{ route('banks.index') }}">Bank</a></li>
                                        @endcan
                                        @can('access', 'm_bank_account_manage')
                                        <li class="s-nav {{ request()->is('bank_accounts*') ? 'active' : '' }}"><a href="{{ route('bank_accounts.index') }}">Bank Account</a></li>
                                        @endcan
                                        @can('access', 'm_payment_type_manage')
                                        <li class="s-nav {{ request()->is('payment_types*') ? 'active' : '' }}"><a href="{{ route('payment_types.index') }}">Payment Type</a></li>
                                        @endcan
                                        @can('access', 'm_course_type_manage')
                                        <li class="s-nav {{ request()->is('course_types*') ? 'active' : '' }}"><a href="{{ route('course_types.index') }}">Course Type</a></li>
                                        @endcan
                                        @can('access', 'm_difficulty_type_manage')
                                        <li class="s-nav {{ request()->is('difficulty_types*') ? 'active' : '' }}"><a href="{{ route('difficulty_types.index') }}">Difficulty</a></li>
                                        @endcan
                                        @can('access', 'm_tutor_manage')
                                        <li class="s-nav {{ request()->is('tutors*') ? 'active' : '' }}"><a href="{{ route('tutors.index') }}">Tutor</a></li>
                                        @endcan
                                        @can('access', 'company_manage')
                                        <li class="s-nav {{ request()->is('companies*') ? 'active' : '' }}"><a href="{{ route('companies.index') }}">Company</a></li>
                                        @endcan
                                        @can('access', 'message_manage')
                                        <li class="s-nav {{ request()->is('messages*') ? 'active' : '' }}"><a href="{{ route('messages.index') }}">Message</a></li>
                                        @endcan
                                        @can('access', 'member_manage')
                                        <li class="s-nav {{ request()->is('members*') ? 'active' : '' }}"><a href="{{ route('members.index') }}">Member</a></li>
                                        @endcan
                                        @can('access', 'm_content_carousel_manage')
                                        <li class="s-nav"><a href="{{ route('content_carousels.index') }}">Content Carousel</a></li>
                                        @endcan
                                        @can('access', 'm_page_manage')
                                        <li class="s-nav {{ request()->is('pages*') ? 'active' : '' }}"><a href="{{ route('pages.index') }}">Page</a></li>
                                        @endcan
                                        @can('access', 'm_program_step_manage')
                                        <li class="s-nav"><a href="{{ route('program_steps.index') }}">Program Step</a></li>
                                        @endcan
                                        @can('access', 'm_faq_manage')
                                        <li class="s-nav"><a href="{{ route('faqs.index') }}">FaQ</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                            @endif

                            {{-- Course --}}
                            @if(strpos(Session::get('user_access'), 'course_manage') !== false || strpos(Session::get('user_access'), 'course_module_manage') !== false || strpos(Session::get('user_access'), 'course_price_manage') !== false)
                            <ul class="nav side-menu">
                                <li class="{{ request()->is('courses*') || request()->is('course_modules*') || request()->is('course_prices*') ? 'active' : ''}}"><a><i class="fa fa-book"></i> Courses <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="{{ request()->is('courses*') || request()->is('course_modules*') || request()->is('course_prices*') ? 'display:block;' : ''}}">
                                        @can('access', 'course_manage')
                                        <li class="s-nav {{ request()->is('courses*') ? 'active' : '' }}"><a href="{{ route('courses.index') }}">Course</a></li>
                                        @endcan
                                        @can('access', 'course_module_manage')
                                        <li class="s-nav {{ request()->is('course_modules*') ? 'active' : '' }}"><a href="{{ route('course_modules.index') }}">Course Module</a></li>
                                        @endcan
                                        @can('access', 'course_price_manage')
                                        <li class="s-nav {{ request()->is('course_prices*') ? 'active' : '' }}"><a href="{{ route('course_prices.index') }}">Course Price</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                            @endif
                            {{-- Transaction --}}
                            @if(strpos(Session::get('user_access'), 'promotion_manage') !== false ||strpos(Session::get('user_access'), 'order_course_manage') !== false || strpos(Session::get('user_access'), 'order_confirm_manage') !== false)
                            <ul class="nav side-menu">
                                <li class="{{ request()->is('promotions*') || request()->is('orders*') || request()->is('order_confirms*') ? 'active' : ''}}"><a><i class="fa fa-credit-card"></i> Transaction <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="{{ request()->is('promotions*') || request()->is('orders*') || request()->is('order_confirms*') ? 'display:block;' : ''}}">
                                        @can('access', 'promotion_manage')
                                        <li class="s-nav {{ request()->is('promotions*') ? 'active' : '' }}"><a href="{{ route('promotions.index') }}"> Promotion</a></li>
                                        @endcan
                                        @can('access', 'trans_order_manage')
                                        <li class="s-nav {{ request()->is('orders*') ? 'active' : '' }}"><a href="{{ route('orders.index') }}"> Order</a></li>
                                        @endcan
                                        @can('access', 'trans_order_confirm_manage')
                                        <li class="s-nav {{ request()->is('order_confirms*') ? 'active' : '' }}"><a href="{{ route('order_confirms.index') }}"> Order Confirm</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                            @endif

                            {{-- Report --}}
                            @if(strpos(Session::get('user_access'), 'trans_order_report_manage') !== false || strpos(Session::get('user_access'), 'trans_order_confirm_manage') !== false)
                            <ul class="nav side-menu">
                                <li class="{{ request()->is('reports/order_report*') || request()->is('reports/confirm_order_report*') ? 'active' : ''}}"><a><i class="fa fa-file-text-o"></i> Report <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="{{ request()->is('reports/order_report*') || request()->is('reports/confirm_order_report*') ? 'display:block;' : ''}}">
                                        @can('access', 'trans_order_report_manage')
                                        <li class="s-nav {{ request()->is('reports/order_report*') ? 'active' : '' }}"><a href="{{ route('reports.orderReport') }}"> Order</a></li>
                                        @endcan
                                        @can('access', 'trans_order_confirm_report_manage')
                                        <li class="s-nav {{ request()->is('reports/confirm_order_report*') ? 'active' : '' }}"><a href="{{ route('reports.confirmOrderReport') }}"> Confirm Order</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                            @endif

                            {{-- Manage User --}}
                            @if(strpos(Session::get('user_access'), 'access_group_manage') !== false || strpos(Session::get('user_access'), 'access_master_manage') !== false || strpos(Session::get('user_access'), 'users_manage') !== false || strpos(Session::get('user_access'), 'users_failed_attempts_manage') !== false || strpos(Session::get('user_access'), 'users_logs_manage') !== false)
                            <ul class="nav side-menu">
                                <li class="{{ request()->is('access_masters*') || request()->is('access_groups*') || request()->is('users*') || request()->is('user_failed_attemps*') || request()->is('user_logs*') ? 'active' : ''}}"><a><i class="fa fa-users"></i> Managemen User <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="{{ request()->is('access_masters*') || request()->is('access_groups*') || request()->is('users*') || request()->is('user_failed_attemps*') || request()->is('user_logs*') ? 'display:block;' : ''}}">
                                        @can('access', 'access_master_manage')
                                        <li class="s-nav {{ request()->is('access_masters*') ? 'active' : '' }}"><a href="{{ route('access_masters.index') }}">Access Master</a></li>
                                        @endcan
                                        @can('access', 'access_group_manage')
                                        <li class="s-nav {{ request()->is('access_groups*') ? 'active' : '' }}"><a href="{{ route('access_groups.index') }}">Access Group</a></li>
                                        @endcan
                                        @can('access', 'users_manage')
                                        <li class="s-nav {{ request()->is('users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}">User</a></li>
                                        @endcan
                                        @can('access', 'users_failed_attempts_manage')
                                        <li class="s-nav {{ request()->is('user_failed_attemps*') ? 'active' : '' }}"><a href="{{ route('user_failed_attempts.index') }}">User Failed Attempts</a></li>
                                        @endcan
                                        @can('access', 'users_logs_manage')
                                        <li class="s-nav {{ request()->is('user_logs*') ? 'active' : '' }}"><a href="{{ route('user_logs.index') }}">User Logs</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                            @endif

                            {{-- Setting --}}
                            @if(strpos(Session::get('user_access'), 'general_manage') !== false)
                            <ul class="nav side-menu">
                                <li class="{{ request()->is('generals*') ? 'active' : ''}}"><a><i class="fa fa-gear"></i> Setting <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="{{ request()->is('generals*') ? 'display:block;' : ''}}">
                                        @can('access', 'general_manage')
                                        <li class="s-nav {{ request()->is('generals*') ? 'active' : '' }}"><a href="{{ route('generals.index') }}"> General</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /sidebar menu -->

            <!-- top navigation? -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?= URL::to('/'); ?>/images/user.png" alt="">{{ Auth::user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="{{ route('users.changePassword') }}"> Change Password</a></li>
                                    <li><a href="<?= URL::to('/auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>
                            
                            <li role="presentation" class="dropdown">
                                <ul id="menu1" class="dropdown-menu ist-unstyled msg_list" role="menu">
                                    <li>
                                        <a>
                                            <span class="image"><img src="<?= URL::to('/'); ?>/images/user.png" alt="Profile Image" /></span>
                                            <span>
                                                <span>Toro Bintoro</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="<?= URL::to('/'); ?>/images/user.png" alt="Profile Image" /></span>
                                            <span>
                                                <span>Toro Bintoro</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="<?= URL::to('/'); ?>/images/user.png" alt="Profile Image" /></span>
                                            <span>
                                                <span>Toro Bintoro</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="<?= URL::to('/'); ?>/images/user.png" alt="Profile Image" /></span>
                                            <span>
                                                <span>Toro Bintoro</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <div class="container">
                @yield('content')
            </div>

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    ToroCMS - Copyright 2017 Toro Developer
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- NProgress -->
    <script src="{{ asset ('vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset ('vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset ('vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset ('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset ('vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset ('vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset ('vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset ('vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset ('vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset ('vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset ('vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset ('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset ('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset ('vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset ('vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset ('vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset ('vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset ('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset ('vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset ('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset ('build/js/custom.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.s-nav').each(function() {
                var link = $(this).find('a');
                var current = window.location.href;
                var href = link.attr('href');
                if (current == href) {
                    if ($(this).parent().hasClass('child_menu')) {
                        $(this).parent().css('display', 'block');
                        $(this).parent().parent().addClass('active');
                        $(this).addClass('active');
                    } else {
                        $(this).addClass('active');
                    }
                }
            });
        });
    </script>

    @yield('script')
</body>

</html>
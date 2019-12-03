<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true"
        data-menu-scrollable="false" data-menu-dropdown-timeout="500">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item " aria-haspopup="true">
                <a href="/admin/dashboard" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Dashboard
                            </span>
                            <span class="m-menu__link-badge">
                                <span class="m-badge m-badge--danger">
                                    -
                                </span>
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item " aria-haspopup="true">
                <a href="/admin/statistics" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-line-graph"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">
                                    Statistics
                                </span>
                                <span class="m-menu__link-badge">
                                    <span class="m-badge m-badge--danger">
                                        -
                                    </span>
                                </span>
                            </span>
                        </span>
                    </a>
            </li>
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Pages
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            @permission('read-users')
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-interface-7"></i>
                    <span class="m-menu__link-text">Users</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
                                <span class="m-menu__link-text">Users</span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="/admin/users" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Users Listing</span>
                            </a>
                            </li>
                        </li>
                        @permission('acl')
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="/admin/roles" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Roles</span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="/admin/permissions" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Permissions</span>
                            </a>
                        </li>
                        @endpermission @permission('allowed-login')
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('allowed_login') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Allowed Users/IPs</span>
                            </a>
                        </li>
                        @endpermission @permission('reset-password')
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('reset_password_view') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Reset User Password</span>
                            </a>
                        </li>
                        @endpermission @permission('create-posts')
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('posts') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Posts</span>
                            </a>
                        </li>
                        @endpermission
            </li>
            </ul>
            </div>
            </li>
            @endpermission
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-interface-7"></i>
                    <span class="m-menu__link-text">Structure Managements</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
                                <span class="m-menu__link-text">Structure Managements</span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                            @permission('departments')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="/admin/departments" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Departments</span>
                            </a>
                            </li>
                            @endpermission
                            @permission('branch_areas')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="/admin/branch_areas" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Branch Areas</span>
                            </a>
                            </li>
                            @endpermission
                        </li>
            </li>
            </ul>
            </div>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-interface-7"></i>
                    <span class="m-menu__link-text">Employees</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
                                <span class="m-menu__link-text">Employees</span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                            <li class="m-menu__item  m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" data-menu-submenu-toggle="hover">
                                <a href="#" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
													Instructors
												</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        @permission('read-employees')
                                        <li class="m-menu__item" aria-haspopup="true">
                                            <a href="/admin/instructors" class="m-menu__link ">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">Instructors Listing</span>
                                        </a>
                                        </li>
                                        @endpermission @permission('instructor-sessions')
                                        <li class="m-menu__item" aria-haspopup="true">
                                            <a href="/admin/instructor_sessions" class="m-menu__link ">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">Instructor Sessions</span>
                                        </a>
                                        </li>
                                        @endpermission @permission('instructor-total')
                                        <li class="m-menu__item" aria-haspopup="true">
                                            <a href="/admin/instructor_total" class="m-menu__link ">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">Instructor Total</span>
                                        </a>
                                        </li>
                                        @endpermission
                                    </ul>
                                </div>
                            </li>

                            @permission('read-employees')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="/admin/employees" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Employees Listing</span>
                            </a>
                            </li>
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="/admin/emp_bank_info" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Employees Bank Info</span>
                            </a>
                            </li>
                            @endpermission @permission('employee-leaves')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="/admin/employee_leaves" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Employee Leaves</span>
                            </a>
                            </li>
                            @endpermission @permission('employee-latency')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="/admin/employee_latency" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Employee Latency</span>
                            </a>
                            </li>
                            @endpermission @permission('employee-breaks')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('employee_breaks') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Employee Breaks</span>
                            </a>
                            </li>
                            @endpermission @permission('employee-increase-deduct')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="/admin/salary_changes" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Employee Increase/Deduction</span>
                            </a>
                            </li>
                            @endpermission @permission('advance-salary')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="/admin/advance_salary" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Advance Salary</span>
                            </a>
                            </li>
                            @endpermission @permission('employee-shifts')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="/admin/employee_shifts" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Employee Shifts</span>
                            </a>
                            </li>
                            @endpermission
                        </li>
            </li>
            </ul>
            </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-interface-7"></i>
                    <span class="m-menu__link-text">HR</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
                                <span class="m-menu__link-text">HR</span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                            <li class="m-menu__item  m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" data-menu-submenu-toggle="hover">
                                <a href="#" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
													Reports
												</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        @permission('first-attendance')
                                        <li class="m-menu__item" aria-haspopup="true">
                                            <a href="/admin/first_attendance" class="m-menu__link ">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">First Attendance</span>
                                        </a>
                                        </li>
                                        @endpermission @permission('employee-salary')
                                        <li class="m-menu__item" aria-haspopup="true">
                                            <a href="/admin/employees_salary_report" class="m-menu__link ">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">Employees Salary</span>
                                        </a>
                                        </li>
                                        @endpermission @permission('latency-pivot')
                                        <li class="m-menu__item" aria-haspopup="true">
                                            <a href="/admin/employee_latency_pivot" class="m-menu__link ">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">Latency Pivot</span>
                                        </a>
                                        </li>
                                        @endpermission
                                    </ul>
                                </div>
                            </li>
                            @permission('absence-types')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="/admin/absence_types" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Absence Types</span>
                            </a>
                            </li>
                            @endpermission @permission('latency-periods')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="/admin/latency_periods" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Latency Periods</span>
                            </a>
                            </li>
                            @endpermission
                        </li>

            </li>
            </ul>
            </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-interface-7"></i>
                    <span class="m-menu__link-text">Groups</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
                                <span class="m-menu__link-text">Groups</span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                            @permission('group-next-session')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('next_session') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Next Session</span>
                            </a>
                            </li>
                            @endpermission
                        </li>

            </li>
            </ul>
            </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-interface-7"></i>
                    <span class="m-menu__link-text">Leads</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
                                <span class="m-menu__link-text">Leads</span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                            @permission('reset-leads')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('reset_leads_view') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Reset Leads</span>
                            </a>
                            </li>
                            @endpermission @permission('followup-lead')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('followup_lead_view') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">FollowUp Lead</span>
                            </a>
                            </li>
                            @endpermission @permission('new-leads-by-branch')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('new_leads_by_branch') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">New Leads By Branch</span>
                            </a>
                            </li>
                            @endpermission
                        </li>

            </li>
            </ul>
            </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-interface-7"></i>
                    <span class="m-menu__link-text">Marketers</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
                                <span class="m-menu__link-text">Marketers</span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                            @permission('lead-ads')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('lead_ads') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Leads Ads</span>
                            </a>
                            </li>
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('ads_counter_report') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Ads Counter</span>
                            </a>
                            </li>
                            @endpermission @permission('students_by_marketer')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('marketer_total') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Marketer Total</span>
                            </a>
                            </li>
                            @endpermission
                        </li>
            </li>
            </ul>
            </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-interface-7"></i>
                    <span class="m-menu__link-text">Sales</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
                                <span class="m-menu__link-text">Sales</span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                            @permission('sales-review')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('test_call_view') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Test Calls</span>
                            </a>
                            </li>
                            @endpermission @permission('reviews-history')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('reviews_history') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">Reviews History</span>
                                </a>
                            </li>
                            @endpermission @permission('sales-options')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('sales_options_view') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">Sales Options</span>
                                </a>
                            </li>
                            @endpermission @permission('sales-counter')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('sales_counter_report') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">Sales Counter</span>
                                </a>
                            </li>
                            @endpermission @permission('students-by-sales')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('students_by_sales') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">Students By Sales</span>
                                </a>
                            </li>
                            @endpermission
                        </li>
            </li>
            </ul>
            </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-interface-7"></i>
                    <span class="m-menu__link-text">Financials</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
                                <span class="m-menu__link-text">Financials</span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                            @permission('company-total-income')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('company_total_income') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Company Income/Day</span>
                            </a>
                            </li>
                            @endpermission @permission('branch-total-income')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('branch_total_income') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Branch Total Income</span>
                            </a>
                            </li>
                            @endpermission
                        </li>
            </li>
            </ul>
            </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-interface-7"></i>
                    <span class="m-menu__link-text">SMS Campaigns</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
                                <span class="m-menu__link-text">SMS Campaigns</span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                            @permission('sms-campaigns')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('sheet_to_campaign_view') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">From Excel</span>
                            </a>
                            </li>
                            @endpermission @permission('sms-settings')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('sms_settings') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">SMS Settings</span>
                            </a>
                            </li>
                            @endpermission
                        </li>
            </li>
            </ul>
            </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-interface-7"></i>
                    <span class="m-menu__link-text">Vouchers</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
                                <span class="m-menu__link-text">Vouchers</span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                            @permission('generate-vouchers')
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('voucher_categories') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Voucher Category</span>
                            </a>
                            </li>
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('sheet_to_vouchers_view') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Generate Vouchers</span>
                            </a>
                            </li>
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('voucher_campaign_view') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Vouchers Campaign</span>
                            </a>
                            </li>
                            @endpermission
                        </li>
            </li>
            </ul>
            </div>
            </li>
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
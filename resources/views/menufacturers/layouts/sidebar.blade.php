<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <div class="user-details">
                    <span>{{ Cookie::get('loggerAccName') }}</span>
                    <span id="more-details">UX Designer<i class="ti-angle-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="#"><i class="ti-user"></i>View Profile</a>
                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>



        <ul class="pcoded-item pcoded-left-item">
            <li class="home">
                <a href="/{{ Cookie::get('loggertype') }}/dashboard">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="profile">
                <a href="/{{ Cookie::get('loggertype') }}/Set-Up-Profile">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Set Up Profile </span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>



            @if (Cookie::get('profile_status') > 0)
                {{-- <li class="products">
                    <a href="/{{ Cookie::get('loggertype') }}/Set-Up-Products">
                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>D</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Set Up Products</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li> --}}

                <li class="messages">
                    <a href="/{{ Cookie::get('loggertype') }}/Messages">
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Messages</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>

                {{-- <li class="orders">
                    <a href="/{{ Cookie::get('loggertype') }}/Orders-&-Shipments">
                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>D</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Orders & Shipments</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li> --}}

                {{-- <li class="deposit">
                <a href="/{{Cookie::get('loggertype')}}/Set-Up-Deposit-Info">
                    <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Set Up Deposit Info</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li> --}}

                {{-- <li class="custom_reqs">
                    <a href="/menufacturer/make-custom-request">
                        <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>D</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Custom Requests</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li> --}}

                {{-- <li class="rfp_requests">
                    <a href="/menufacturer/show-all-rfps">
                        <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>D</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">All RFP's</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li> --}}

                <li class="track_answers">
                    <a href="/track-my-answers">
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Track My Answers</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>

                <li class="answer_queries">
                    <a href="/answer-admin-queries">
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Reply Queries</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>

                <li class="citations">
                    <a href="/my-citations">
                        <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">My Citations</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            @endif


            {{-- <li class="resources">
                <a href="/{{ Cookie::get('loggertype') }}/Educational-Resources">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Educational
                        Resources</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li> --}}

        </ul>


    </div>
</nav>

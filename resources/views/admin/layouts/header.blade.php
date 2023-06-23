<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="{{ $sitelogo }}" alt="{{ $appname }}" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="dashboard has-sub">
                    <a class="js-arrow" href="/admin/admindashboard">
                        <i class="fa fa-home"></i>Dashboard</a>
                </li>
                <li class="managefaqs has-sub">
                    <a class="js-arrow" href="/admin/manage-faqs">
                        <i class="fa fa-question-circle"></i>Manage FAQs</a>
                </li>
                <li class="manageindustries has-sub">
                    <a class="js-arrow" href="/admin/manage-industry-options">
                        <i class="fa fa-question-circle"></i>Manage Industries</a>
                </li>
                <li class="managecats has-sub">
                    <a class="js-arrow" href="/admin/manage-categories">
                        <i class="fa fa-question-circle"></i>Set Categories</a>
                </li>
                <li class="manageresources has-sub">
                    <a class="js-arrow" href="/admin/manage-resources">
                        <i class="fa fa-question-circle"></i>Resource Setup</a>
                </li>
                <li class="manageblogs has-sub">
                    <a class="js-arrow" href="/admin/show-blogs-page">
                        <i class="fa fa-question-circle"></i>Blogs Control</a>
                </li>
                <li class="add_new_question has-sub">
                    <a class="js-arrow" href="/admin/add-new-questions">
                        <i class="fa fa-question-circle"></i>Add New Question</a>
                </li>
                <li class="questions_page has-sub">
                    <a class="js-arrow" href="/admin/manage-questions">
                        <i class="fa fa-question-circle"></i>All Questions</a>
                </li>
                <li class="questions_dashboard has-sub">
                    <a class="js-arrow" href="/admin/controller-questions">
                        <i class="fa fa-question-circle"></i>Controller Questions</a>
                </li>
                <li class="question_requests has-sub">
                    <a class="js-arrow" href="/admin/questions-requests">
                        <i class="fa fa-question-circle"></i>Question Requests</a>
                </li>
                <li class="question_controllers has-sub">
                    <a class="js-arrow" href="/admin/questions-controller">
                        <i class="fa fa-question-circle"></i>Question Controllers</a>
                </li>
                <li class="managehomepage has-sub">
                    <a class="js-arrow" href="/admin/homepage-edit">
                        <i class="fa fa-question-circle"></i>Edit Homepage</a>
                </li>
                <li class="managebrandpage has-sub">
                    <a class="js-arrow" href="/admin/edit-brand-pages">
                        <i class="fa fa-question-circle"></i>Edit Brand Pages</a>
                </li>
                <li class="manageusersactivity has-sub">
                    <a class="js-arrow" href="/admin/users-activity-management">
                        <i class="fa fa-question-circle"></i>Users Activity</a>
                </li>
                <li class="siteinfo has-sub">
                    <a class="js-arrow" href="/admin/site-information-setup">
                        <i class="fa fa-sitemap"></i>Site Information</a>
                </li>
                <li>
                    <a href="/admin/logout"><i class="fas fa-sign-out-alt"></i>
                        Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

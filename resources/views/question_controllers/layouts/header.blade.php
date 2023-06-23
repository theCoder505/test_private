<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="{{ $sitelogo }}" alt="Controler" />
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
                    <a class="js-arrow" href="/question-controller-dashboard">
                        <i class="fa fa-home"></i>Dashboard</a>
                </li>

                <li class="add_new_question_page has-sub">
                    <a class="js-arrow" href="/question-controller-add-new-question">
                        <i class="fa fa-question-circle"></i>Add New Question</a>
                </li>

                <li class="questions_page has-sub">
                    <a class="js-arrow" href="/question-controller-manage-questions">
                        <i class="fa fa-question-circle"></i>Manage Questions</a>
                </li>

                <li>
                    <a href="/question-controller/logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="/">
            <img src="{{ $sitelogo }}" alt="Cool Controler" class="weblogo" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">


            <ul class="list-unstyled navbar__list">
                <li class="dashboard has-sub">
                    <a class="js-arrow" href="/question-controller-dashboard">
                        <i class="fa fa-home"></i>Dashboard</a>
                </li>
            </ul>

            <ul class="list-unstyled navbar__list">
                <li class="add_new_question_page has-sub">
                    <a class="js-arrow" href="/question-controller-add-new-question">
                        <i class="fa fa-question-circle"></i>Add New Question</a>
                </li>
            </ul>

            <ul class="list-unstyled navbar__list">
                <li class="questions_page has-sub">
                    <a class="js-arrow" href="/question-controller-manage-questions">
                        <i class="fa fa-question-circle"></i>Manage Questions</a>
                </li>
            </ul>


        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->

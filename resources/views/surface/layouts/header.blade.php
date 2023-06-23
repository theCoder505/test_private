<section class="navigation">
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-md-5">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('website/weblogo.png') }}" alt="" class="weblogo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item home">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item blogs">
                    <a class="nav-link" href="/read-blogs">Blogs</a>
                </li>
                <li class="nav-item exstngbrands">
                    <a class="nav-link" href="/existing-brands">Existing Brands</a>
                </li>
                <li class="nav-item new_brands">
                    <a class="nav-link" href="/new-brands">New Brands</a>
                </li>
                <li class="nav-item sign_up">
                    <a class="nav-link" href="/sign-up">Sign Up </a>
                </li>
                <li class="nav-item sign_in">
                    <a class="nav-link" href="/sign-in">Login At {{ $appname }} </a>
                </li>
            </ul>
        </div>
    </nav>
</section>


<div class="navigation_after_spacer"></div>

@extends('surface.layouts.app')

@section('title')
    Visit {{ $user_acc_name }}'s Profile' at {{ $appname }}
@endsection



@section('content')
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins&display=swap");
        @import url("https://fonts.googleapis.com/css?family=Bree+Serif&display=swap");

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: #e9e9e9;
            overflow-x: hidden;
            padding-top: 90px;
            font-family: "Poppins", sans-serif;
            margin: 0 100px;
        }

        .profile-header {
            background: #fff;
            width: 100%;
            display: flex;
            height: 190px;
            position: relative;
            box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.2);
        }

        .profile-img {
            float: left;
            width: 340px;
            height: 200px;
        }

        .profile-img img {
            border-radius: 50%;
            height: 230px;
            width: 230px;
            border: 5px solid #fff;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            position: absolute;
            left: 50px;
            top: 20px;
            z-index: 5;
            background: #fff;
        }

        .profile-nav-info {
            float: left;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-top: 60px;
        }

        .profile-nav-info h3 {
            font-variant: small-caps;
            font-size: 2rem;
            font-family: sans-serif;
            font-weight: bold;
        }

        .profile-nav-info .address {
            display: flex;
            font-weight: bold;
            color: #777;
        }

        .profile-nav-info .address p {
            margin-right: 5px;
        }

        .profile-option {
            width: 40px;
            height: 40px;
            position: absolute;
            right: 50px;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.5s ease-in-out;
            outline: none;
            background: #e40046;
        }

        .profile-option:hover {
            background: #fff;
            border: 1px solid #e40046;
        }

        .profile-option:hover .notification i {
            color: #e40046;
        }

        .profile-option:hover span {
            background: #e40046;
        }

        .profile-option .notification i {
            color: #fff;
            font-size: 1.2rem;
            transition: all 0.5s ease-in-out;
        }

        .profile-option .notification .alert-message {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #fff;
            color: #e40046;
            border: 1px solid #e40046;
            padding: 5px;
            border-radius: 50%;
            height: 20px;
            width: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .main-bd {
            width: 100%;
            display: flex;
            padding-right: 15px;
        }

        .profile-side {
            width: 300px;
            background: #fff;
            box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
            padding: 90px 30px 20px;
            font-family: "Bree Serif", serif;
            margin-left: 10px;
            z-index: 99;
        }

        .profile-side p {
            margin-bottom: 7px;
            color: #333;
            font-size: 14px;
        }

        .profile-side p i {
            color: #e40046;
            margin-right: 10px;
        }

        .mobile-no i {
            transform: rotateY(180deg);
            color: #e40046;
        }

        .profile-btn {
            display: flex;
        }

        button.chatbtn,
        button.createbtn {
            border: 0;
            padding: 10px;
            width: 100%;
            border-radius: 3px;
            background: #e40046;
            color: #fff;
            font-family: "Bree Serif";
            font-size: 1rem;
            margin: 5px 2px;
            cursor: pointer;
            outline: none;
            margin-bottom: 10px;
            transition: background 0.3s ease-in-out;
            box-shadow: 0px 5px 7px 0px rgba(0, 0, 0, 0.3);
        }

        button.chatbtn:hover,
        button.createbtn:hover {
            background: rgba(288, 0, 70, 0.9);
        }

        button.chatbtn i,
        button.createbtn i {
            margin-right: 5px;
        }

        .user-rating {
            display: flex;
        }

        .user-rating h3 {
            font-size: 1.75rem;
            font-weight: 200;
            color: #666;
        }

        .user-rating .no-of-user-rate {
            font-size: 0.9rem;
        }

        .rate {
            padding-top: 6px;
        }

        .rate i {
            font-size: 0.9rem;
            color: rgba(228, 0, 70, 1);
        }

        .nav {
            width: 100%;
            z-index: -1;
        }

        .nav ul {
            display: flex;
            justify-content: space-around;
            list-style-type: none;
            height: 40px;
            background: #fff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .nav ul li {
            padding: 10px;
            width: 100%;
            cursor: pointer;
            text-align: center;
            transition: all 0.2s ease-in-out;
        }

        .nav ul li:hover,
        .nav ul li.active {
            box-shadow: 0px -3px 0px rgba(288, 0, 70, 0.9) inset;
        }

        .profile-body {
            width: 100%;
            z-index: -1;
        }

        .tab {
            display: none;
        }

        .tab {
            padding: 20px;
            width: 100%;
            text-align: center;
        }

        @media (max-width: 1100px) {
            .profile-side {
                width: 250px;
                padding: 90px 15px 20px;
            }

            .profile-img img {
                height: 200px;
                width: 200px;
                left: 50px;
                top: 50px;
            }
        }

        @media (max-width: 900px) {
            body {
                margin: 0 0px;
                padding-top: 0px;
            }

            .profile-header {
                display: flex;
                height: 100%;
                flex-direction: column;
                text-align: center;
                padding-bottom: 20px;
            }

            .profile-img {
                float: left;
                width: 100%;
                height: 200px;
            }

            .profile-img img {
                position: relative;
                height: 200px;
                width: 200px;
                left: 0px;
            }

            .profile-nav-info {
                text-align: center;
            }

            .profile-option {
                right: 20px;
                top: 75%;
                transform: translateY(50%);
            }

            .main-bd {
                flex-direction: column;
                padding-right: 0;
            }

            .profile-side {
                width: 100%;
                text-align: center;
                padding: 20px;
                margin: 5px 0;
            }

            .profile-nav-info .address {
                justify-content: center;
            }

            .user-rating {
                justify-content: center;
            }
        }

        @media (max-width: 400px) {
            body {
                margin: ;
            }

            .profile-header h3 {}

            .profile-option {
                width: 30px;
                height: 30px;
                position: absolute;
                right: 15px;
                top: 83%;
            }

            .profile-option .notification .alert-message {
                top: -3px;
                right: -4px;
                padding: 4px;
                height: 15px;
                width: 15px;
                font-size: 0.7rem;
            }

            .profile-nav-info h3 {
                font-size: 1.9rem;
            }

            .profile-nav-info .address p,
            .profile-nav-info .address span {
                font-size: 0.7rem;
            }
        }

        #see-more-bio,
        #see-less-bio {
            color: blue;
            cursor: pointer;
            text-transform: lowercase;
        }

        .tab h1 {
            font-family: "Bree Serif", sans-serif;
            display: flex;
            justify-content: center;
            margin: 20px auto;
        }

        .gallery_line {
            height: 150px;
            display: flex;
            background: #fff;
            box-shadow: 0px 0px 10px 0px #6c6c6c;
        }

        #multple_projects {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 15px;
        }

        .gallery_line img {
            width: 100%;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            margin-bottom: 5px;
            font-size: 15px;
            font-weight: 600;
        }

        .card-text:last-child {
            margin-bottom: 0;
            font-size: 12px;
        }
    </style>


    <div class="container my-5">



        @forelse ($profile_data as $data)
            <div class="container">
                <div class="profile-header">
                    <div class="profile-img">
                        <img src="{{ $data->company_logo }}" width="200" alt="Profile Image">
                    </div>
                    <div class="profile-nav-info">
                        <h3 class="user-name">{{ $data->business_name }}</h3>
                        <div class="address">
                            <p id="state" class="state">{{ $data->state }}, </p>
                            <span id="country" class="country">{{ $data->country }}</span>
                        </div>

                    </div>
                </div>

                <div class="main-bd">
                    <div class="left-side">
                        <div class="profile-side">
                            <p class="mobile-no"><i class="fa fa-phone"></i> {{ $data->phone_number }}</p>

                            <div class="social_links mb-3">
                                <a href="{{ $data->website_url }}" target="_blank" class="social_href"
                                    rel="noopener noreferrer">
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                </a>
                                <a href="{{ $data->linkedin_url }}" target="_blank" class="social_href"
                                    rel="noopener noreferrer">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                                <a href="{{ $data->insta_url }}" target="_blank" class="social_href"
                                    rel="noopener noreferrer">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                                <a href="{{ $data->fb_url }}" target="_blank" class="social_href"
                                    rel="noopener noreferrer">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a href="{{ $data->affiliate_url }}" target="_blank" class="social_href"
                                    rel="noopener noreferrer">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                </a>
                            </div>

                            <div class="user-bio">
                                <h3>Bio</h3>
                                <p class="bio">
                                    {{ $data->comp_bio }}
                                </p>
                            </div>
                            <a href="/see-vendor-profile/{{ $data->vendor_type }}/{{ $data->vendor_user_id }}">
                                <button class="createbtn w-100" id="Create-post"><i class="fa fa-comment"></i>
                                    Communicate</button>
                            </a>
                            <button class="createbtn" id="Create-post"><i class="fa fa-truck"></i>
                                {{ $data->create_n_ship_time }} Day Shipment</button>
                            <div class="user-rating">
                                <h3 class="rating">${{ $data->avg_yearly_sales }} / Year</h3>
                            </div>
                            <span
                                class="no-of-user-rate"><span>{{ $data->tot_citations }}</span>&nbsp;&nbsp;Citations</span>
                        </div>

                    </div>
                    <div class="right-side">

                        <div class="nav">
                            <ul>
                                <li onclick="tabs(0)" class="user-post active">Gallery</li>
                                <li onclick="tabs(1)" class="user-review">Services</li>
                            </ul>
                        </div>
                        <div class="profile-body">
                            <div class="profile-posts tab">
                                <h3 class="font-weight-bold text-center mb-4">PROJECT GALLERY</h3>
                                <div id="multple_projects">
                                    @php
                                        $images = explode('|', $data->project_gallery);
                                        foreach ($images as $key => $imgsrc) {
                                            echo '<div class="gallery_line"><img src="' . $imgsrc . '"/></div>';
                                        }
                                    @endphp
                                </div>
                            </div>
                            <div class="profile-reviews tab">
                                <h3 class="font-weight-bold text-center mb-4">All Services</h3>
                                <div id="multple_projects">
                                    @forelse ($all_related_products as $products)
                                        <div class="card">
                                            @php
                                                $images = explode('|', $products->project_photos);
                                                foreach ($images as $key => $imgsrc) {
                                                    if ($key < 1) {
                                                        echo '<div class="gallery_line"><img src="' . $imgsrc . '"/></div>';
                                                    }
                                                }
                                            @endphp
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $products->item_name }}</h5>
                                                <p class="card-text">Category: {{ $products->product_category }}</p>
                                            </div>
                                        </div>

                                    @empty
                                    @endforelse
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        @empty
        @endforelse



    </div>
@endsection



@section('scripts')
    <script>
        $(".nav ul li").click(function() {
            $(this)
                .addClass("active")
                .siblings()
                .removeClass("active");
        });

        const tabBtn = document.querySelectorAll(".nav ul li");
        const tab = document.querySelectorAll(".tab");

        function tabs(panelIndex) {
            tab.forEach(function(node) {
                node.style.display = "none";
            });
            tab[panelIndex].style.display = "block";
        }
        tabs(0);

        let bio = document.querySelector(".bio");
        const bioMore = document.querySelector("#see-more-bio");
        const bioLength = bio.innerText.length;

        function bioText() {
            bio.oldText = bio.innerText;

            bio.innerText = bio.innerText.substring(0, 100) + "...";
            bio.innerHTML += `<span onclick='addLength()' id='see-more-bio'>See More</span>`;
        }
        //        console.log(bio.innerText)

        bioText();

        function addLength() {
            bio.innerText = bio.oldText;
            bio.innerHTML +=
                "&nbsp;" + `<span onclick='bioText()' id='see-less-bio'>See Less</span>`;
            document.getElementById("see-less-bio").addEventListener("click", () => {
                document.getElementById("see-less-bio").style.display = "none";
            });
        }
        if (document.querySelector(".alert-message").innerText > 9) {
            document.querySelector(".alert-message").style.fontSize = ".7rem";
        }
    </script>
@endsection

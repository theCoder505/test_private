@extends('admin.layouts.app')

@section('title')
    Add New Post & See All Posts
@endsection

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">


                <div class="col-12 allAlerts">
                    @if (session()->has('alertMsg'))
                        <div class="alert text-center {{ session()->get('type') }} alert-dismissible fade show"
                            role="alert">
                            {{ session()->get('alertMsg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>




                <div class="button btn btn-dark px-5 my-3" onclick="showAddNewPost(this)">ADD POST</div>

                <div class="showAddNewPost d-none mb-5">
                   
                    <div class="add_posts_form">

                        <div class="row">
                            <div class="col">
                                <h2 class="mb-2 mb-md-4 text-center title">
                                    Add New Post
                                </h2>
                            </div>
                        </div>

                        <form action="/admin/add-new-post" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Property title</label>
                                <input type="text" class="form-control" name="prop_title" required
                                    placeholder="Enter the title of the property">
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" id="Content" required name="content" rows="3"></textarea>
                            </div>




                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Kind of property</label>
                                    <select required name="prop_kind" id="" class="form-control">
                                        <option value="Store">Store</option>
                                        <option value="Home">Home</option>
                                        <option value="Commercial">Commercial</option>
                                        <option value="Department">Department</option>
                                        <option value="Parking Lot">Parking Lot</option>
                                        <option value="Parcel">Parcel</option>
                                        <option value="Land">Land</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-4">
                                    <label>Management type</label>
                                    <select required name="management_type" id="" class="form-control">
                                        <option value="Lessor">Lessor</option>
                                        <option value="Sessional Rental">Sessional Rental</option>
                                        <option value="Leases">Leases</option>
                                        <option value="Buys">Buys</option>
                                        <option value="Sales">Sales</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label> Label</label>
                                    <select required name="label" id="" class="form-control">
                                        <option value="Exchange">Exchange</option>
                                        <option value="New Project">New Project</option>
                                        <option value="Offer">Offer</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Multimedia </label>
                                <input type="file" class="form-control" name="multimedia[]" required multiple
                                    accept="image/*" placeholder="Enter value" onchange="showMultipleImages(this)">
                            </div>


                            <div id="multple_gallery"></div>



                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Currency</label>
                                    <select required name="currency" id="" class="form-control">
                                        <option value="CLP">CLP</option>
                                        <option value="PHEW">PHEW</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Worth </label>
                                    <input type="number" class="form-control" name="worth" required
                                        placeholder="Enter the sale or lease value">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Common expenses <small>Answer no, if you do not have common expenses</small>
                                    </label>
                                    <input type="number" class="form-control" name="common_expenses" required
                                        placeholder="Enter value">
                                </div>
                            </div>





                            <div class="form-group">
                                <label>video URL</label>
                                <input type="text" class="form-control" name="video_url"
                                    placeholder="Youtuve Video Embedded / Iframe Code (not required)">
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Built surfaces (m²)</label>
                                    <input type="text" class="form-control" name="built_surface" required
                                        placeholder="Enter the title of the property">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Land area (m²) </label>
                                    <input type="text" class="form-control" name="land_area" required
                                        placeholder="Enter the title of the property">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Bathrooms (only digits)</label>
                                    <input type="number" class="form-control" name="bathrooms" required
                                        placeholder="Number of bathrooms">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Bedrooms (only digits)</label>
                                    <input type="number" class="form-control" name="bedrooms" required
                                        placeholder="Number of bedrooms">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Year Of Constructions (only digits)</label>
                                    <input type="number" class="form-control" name="years" required
                                        placeholder="Year Of Construction">
                                </div>
                            </div>




                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Country </label>
                                    <input type="text" class="form-control" name="country" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>City </label>
                                    <input type="text" class="form-control" name="city" required>
                                </div>
                            </div>


                            <h5>Additional details</h5>
                            <div class="additonal_details">
                                <div class="add_details_line row">
                                    <div class="form-group col-md-5">
                                        <label>Qualification</label>
                                        <input type="text" class="form-control" required name="qualification[]">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Additional value</label>
                                        <input type="number" class="form-control" required name="add_val[]">
                                    </div>
                                    <div class="col-md-2 pos_relative">
                                        <div class="btn btn-danger btn-sm bnt_bottom" onclick="removeIt(this)">Remove
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="btn btn-sm px-3 mb-5 btn-primary" onclick="addNew(this)">Add New</div>


                            <h5>Characteristics</h5>
                            <div class="features_inputs row">
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox1" value="Air-conditioning"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox1">Air-conditioning</label>
                                </div>
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox2" value="Grass"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox2">Grass</label>
                                </div>
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox3" value="Window Covering"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox3">Window Covering</label>
                                </div>
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox4" value="outdoor shower"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox4">outdoor shower</label>
                                </div>
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox5" value="Gym"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox5">Gym</label>
                                </div>
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox6" value="Laundry"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox6">Laundry</label>
                                </div>
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox7" value="Washing machine"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox7">Washing machine</label>
                                </div>
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox8" value="microwave"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox8">microwave</label>
                                </div>
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox9" value="Pool"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox9">Pool</label>
                                </div>
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox10" value="barbecue"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox10">barbecue</label>
                                </div>
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox111" value="Fridge"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox111">Fridge</label>
                                </div>
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox12" value="Sauna"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox12">Sauna</label>
                                </div>
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox13" value="Dryer"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox13">Dryer</label>
                                </div>
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox14" value="Cable TV"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox14">Cable TV</label>
                                </div>
                                <div class=" col-md-4">
                                    <input class="" type="checkbox" id="inlineCheckbox15" value="Wifi"
                                        name="charecteristics[]">
                                    <label class="form-check-label" for="inlineCheckbox15">Wifi</label>
                                </div>
                            </div>


                            <div class="form-group mt-3">
                                <label>Do you want to mark this property as featured?</label>
                                <select name="featured_status" required id="" class="form-control">
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>360° virtual tour</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" required name="virtual_tour_text" rows="3"
                                    placeholder="Enter the embedded / iframe code of the virtual tour"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Map Embedded Code</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" required name="map_embedded_code" rows="3"
                                    placeholder="Enter the embedded / iframe code of the particular google map"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Disclaimer</label>
                                <textarea class="form-control" id="exampleFormControlTextarea2" required name="disclaimer" rows="3"></textarea>
                            </div>




                            <button class="btn btn-primary btn-lg btn-block">SUBMIT POST</button>


                        </form>
                    </div>
                </div>





                <div class="add_posts_form mt-5">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-2 mb-md-4 text-center title">
                                All Added Posts
                            </h2>
                        </div>
                    </div>

                    <div class="all_added_projects">
                        @forelse ($all_posts as $key => $item)
                            <div class="product_line">
                                <div class="img_holder">
                                    @php
                                        $images = explode('|', $item->multimedia);
                                        foreach ($images as $key => $imgsrc) {
                                            if ($key < 1) {
                                                echo '<img src="' . $imgsrc . '" class="prod_img">';
                                            }
                                        }
                                    @endphp
                                </div>
                                <div class="prod_title">{{ Str::limit($item->prop_title, 150) }}...</div>
                                <a href="/admin/edit-post/{{ $item->serial }}" class="btn btn-dark btn-block">
                                    View Post
                                </a>
                            </div>
                        @empty
                            <h3 class="text-center font-weight-bold text-danger">No Product Yet!</h3>
                        @endforelse
                    </div>
                </div>


            </div>
        </div>
    </div>


    <script>
        $(".seeposts").addClass("active");
    </script>
@endsection

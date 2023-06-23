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





                <div class="showAddNewPost mb-5">

                    <div class="add_posts_form">

                        <div class="row">
                            <div class="col">
                                <h2 class="mb-2 mb-md-4 text-center title">
                                    Update Particular Post
                                </h2>
                            </div>
                        </div>


                        @forelse ($particular_post as $item)
                            <form action="/admin/update-particular-post" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="post_serial" value="{{ $post_serial_id }}">

                                <div class="form-group">
                                    <label>Property title</label>
                                    <input type="text" class="form-control" name="prop_title" required
                                        value="{{ $item->prop_title }}" placeholder="Enter the title of the property">
                                </div>

                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="form-control" id="Content" required name="content" rows="3">{{ $item->content }}</textarea>
                                </div>




                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Kind of property</label>
                                        <select required name="prop_kind" id="" class="form-control">
                                            <option @if ($item->property_kind == 'Store') selected @endif value="Store">Store
                                            </option>
                                            <option @if ($item->property_kind == 'Home') selected @endif value="Home">Home
                                            </option>
                                            <option @if ($item->property_kind == 'Commercial') selected @endif value="Commercial">
                                                Commercial</option>
                                            <option @if ($item->property_kind == 'Department') selected @endif value="Department">
                                                Department</option>
                                            <option @if ($item->property_kind == 'Parking Lot') selected @endif value="Parking Lot">
                                                Parking Lot</option>
                                            <option @if ($item->property_kind == 'Parcel') selected @endif value="Parcel">Parcel
                                            </option>
                                            <option @if ($item->property_kind == 'Land') selected @endif value="Land">Land
                                            </option>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label>Management type</label>
                                        <select required name="management_type" id="" class="form-control">
                                            <option @if ($item->management_type == 'Lessor') selected @endif value="Lessor">Lessor
                                            </option>
                                            <option @if ($item->management_type == 'Sessional Rental') selected @endif
                                                value="Sessional Rental">Sessional Rental</option>
                                            <option @if ($item->management_type == 'Leases') selected @endif value="Leases">Leases
                                            </option>
                                            <option @if ($item->management_type == 'Buys') selected @endif value="Buys">Buys
                                            </option>
                                            <option @if ($item->management_type == 'Sales') selected @endif value="Sales">Sales
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label> Label</label>
                                        <select required name="label" id="" class="form-control">
                                            <option @if ($item->label == 'Exchange') selected @endif value="Exchange">
                                                Exchange</option>
                                            <option @if ($item->label == 'New Project') selected @endif value="New Project">
                                                New Project</option>
                                            <option @if ($item->label == 'Offer') selected @endif value="Offer">Offer
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Multimedia </label>
                                    <input type="file" class="form-control" name="multimedia[]" multiple accept="image/*"
                                        onchange="showMultipleImages(this)">
                                </div>


                                <div id="multple_gallery">
                                    @php
                                        $images = explode('|', $item->multimedia);
                                        foreach ($images as $key => $imgsrc) {
                                            echo '<div class="gallery_line"><img src="' . $imgsrc . '"/></div>';
                                        }
                                    @endphp
                                </div>



                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Currency</label>
                                        <select required name="currency" id="" class="form-control">
                                            <option @if ($item->currency == 'CLP') selected @endif value="CLP">CLP
                                            </option>
                                            <option @if ($item->currency == 'PHEW') selected @endif value="PHEW">PHEW
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Worth </label>
                                        <input type="number" class="form-control" name="worth" required
                                            value="{{ $item->worth }}" placeholder="Enter the sale or lease value">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Common expenses <small>Answer no, if you do not have common expenses</small>
                                        </label>
                                        <input type="number" class="form-control" name="common_expenses" required
                                            value="{{ $item->common_expenses }}" placeholder="Enter value">
                                    </div>
                                </div>





                                <div class="form-group">
                                    <label>video URL</label>
                                    <input type="text" class="form-control" name="video_url"
                                        value="{{ $item->video_url }}" placeholder="Youtuve Video Embedded / Iframe Code (not required)">
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Built surfaces (m²)</label>
                                        <input type="text" class="form-control" name="built_surface" required
                                            value="{{ $item->built_surface }}"
                                            placeholder="Enter the title of the property">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Land area (m²) </label>
                                        <input type="text" class="form-control" name="land_area" required
                                            value="{{ $item->land_area }}" placeholder="Enter the title of the property">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Bathrooms (only digits)</label>
                                        <input type="number" class="form-control" name="bathrooms" required
                                            value="{{ $item->bathrooms }}" placeholder="Number of bathrooms">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Bedrooms (only digits)</label>
                                        <input type="number" class="form-control" name="bedrooms" required
                                            value="{{ $item->bedrooms }}" placeholder="Number of bedrooms">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Year Of Constructions (only digits)</label>
                                        <input type="number" class="form-control" name="years" required
                                            value="{{ $item->years }}" placeholder="Year Of Construction">
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" required
                                            value="{{ $item->address }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Country </label>
                                        <input type="text" class="form-control" name="country" required
                                            value="{{ $item->country }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>City </label>
                                        <input type="text" class="form-control" name="city" required
                                            value="{{ $item->city }}">
                                    </div>
                                </div>


                                <h5>Additional details</h5>

                                <div class="additonal_details">

                                    @php
                                        $qualify = explode(', ', $item->qualification);
                                        $add_val_qualify = explode(', ', $item->add_val);
                                    @endphp

                                    @foreach ($qualify as $index => $qualification)
                                        <div class="add_details_line row">
                                            <div class="form-group col-md-5">
                                                <label>Qualification</label>
                                                <input type="text" class="form-control" required value="{{ $qualification }}" name="qualification[]">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Additional value</label>
                                                <input type="number" class="form-control" required value="{{ $add_val_qualify[$index] }}" name="add_val[]">
                                            </div>
                                            <div class="col-md-2 pos_relative">
                                                <div class="btn btn-danger btn-sm bnt_bottom" onclick="removeIt(this)">
                                                    Remove
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                </div>

                                <div class="btn btn-sm px-3 mb-5 btn-primary" onclick="addNew(this)">Add New</div>


                                <h5>Characteristics</h5>
                                <div class="features_inputs row">
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox1"
                                            value="Air-conditioning" name="charecteristics[]"
                                            @if (strpos($item->charecteristics, 'Air-conditioning') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox1">Air-conditioning</label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox2" value="Grass"
                                            name="charecteristics[]" @if (strpos($item->charecteristics, 'Grass') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox2">Grass</label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox3"
                                            value="Window Covering" name="charecteristics[]"
                                            @if (strpos($item->charecteristics, 'Window Covering') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox3">Window Covering</label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox4"
                                            value="outdoor shower" name="charecteristics[]"
                                            @if (strpos($item->charecteristics, 'outdoor shower') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox4">outdoor shower</label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox5" value="Gym"
                                            name="charecteristics[]" @if (strpos($item->charecteristics, 'Gym') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox5">Gym</label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox6" value="Laundry"
                                            name="charecteristics[]" @if (strpos($item->charecteristics, 'Laundry') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox6">Laundry</label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox7"
                                            value="Washing machine" name="charecteristics[]"
                                            @if (strpos($item->charecteristics, 'Washing machine') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox7">Washing machine</label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox8" value="microwave"
                                            name="charecteristics[]" @if (strpos($item->charecteristics, 'CLP') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox8">microwave</label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox9" value="Pool"
                                            name="charecteristics[]" @if (strpos($item->charecteristics, 'Pool') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox9">Pool</label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox10" value="barbecue"
                                            name="charecteristics[]" @if (strpos($item->charecteristics, 'barbecue') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox10">barbecue</label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox111" value="Fridge"
                                            name="charecteristics[]" @if (strpos($item->charecteristics, 'Fridge') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox111">Fridge</label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox12" value="Sauna"
                                            name="charecteristics[]" @if (strpos($item->charecteristics, 'Sauna') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox12">Sauna</label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox13" value="Dryer"
                                            name="charecteristics[]" @if (strpos($item->charecteristics, 'Dryer') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox13">Dryer</label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox14" value="Cable TV"
                                            name="charecteristics[]" @if (strpos($item->charecteristics, 'Cable TV') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox14">Cable TV</label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="" type="checkbox" id="inlineCheckbox15" value="Wifi"
                                            name="charecteristics[]" @if (strpos($item->charecteristics, 'Wifi') !== false) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox15">Wifi</label>
                                    </div>
                                </div>


                                <div class="form-group mt-3">
                                    <label>Do you want to mark this property as featured?</label>
                                    <select name="featured_status" required id="" class="form-control">
                                        <option @if ($item->featured_status == 'No') selected @endif value="No">No
                                        </option>
                                        <option @if ($item->featured_status == 'Yes') selected @endif value="Yes">Yes
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>360° virtual tour</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" required name="virtual_tour_text" rows="3"
                                        placeholder="Enter the embedded / iframe code of the virtual tour">{{ $item->virtual_tour_text }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Map Embedded Code</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" required name="map_embedded_code" rows="3"
                                        placeholder="Enter the embedded / iframe code of the particular google map">{{ $item->map_embedded_code }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Disclaimer</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea2" required name="disclaimer" rows="3">{{ $item->disclaimer }}</textarea>
                                </div>




                                <button class="btn btn-primary btn-lg btn-block">UPDATE POST</button>


                            </form>

                        @empty
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

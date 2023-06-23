@extends('admin.layouts.app')

@section('title')
    Website Information
@endsection


@section('content')
    <h1 class="text-center pt-5 font-weight-bold mt-5 "> Mange Site Information </h1>

    @if (session()->has('alertMsg'))
        <div class="alert font-weight-bold text-center alert-{{ session()->get('type') }} alert-dismissible fade show"
            role="alert">
            {{ session()->get('alertMsg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container">
        <div id="formPart" class="darkBlueBg p-5 m-3">


            @forelse ($infodata as $siteinfo)
                <form action="/admin/edit-site-information" method="post" enctype="multipart/form-data">
                    @csrf
                    <div id="siteLogo">
                        <img src="{{ asset($siteinfo->sitelogo) }}" alt="" class="sitelogo" id="outPutImage">
                    </div>

                    <div class="form-group">
                        <label>Select Site Logo</label>
                        <input type="file" accept="images/*" class="form-control" name="sitelogo" id="logo"
                            onchange="loadFile(event)">
                    </div>

                    <div id="siteLogo">
                        <img src="{{ asset($siteinfo->siteicon) }}" alt="" class="sitelogo" id="outPutImage2">
                    </div>

                    <div class="form-group">
                        <label>Website Icon</label>
                        <input type="file" accept="images/*" class="form-control" name="siteicon" id="logo2"
                            onchange="loadFile2(event)">
                    </div>


                    <div class="form-group">
                        <label>Website Brand Name </label>
                        <input type="text" class="form-control" required name="websitename"
                            value="{{ $siteinfo->main_sitename }}">
                    </div>


                    <div class="form-group">
                        <label>Contact Email Address</label>
                        <input type="email" class="form-control" required name="contactEmail"
                            value="{{ $siteinfo->email }}">
                    </div>

                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" required name="contactnmbr"
                            value="{{ $siteinfo->phone }}">
                    </div>

                    <div class="form-group">
                        <label>Facebook Page Link</label>
                        <input type="text" class="form-control" required name="fb_link"
                            value="{{ $siteinfo->facebook }}">
                    </div>

                    <div class="form-group">
                        <label>Instagram Page Link</label>
                        <input type="text" class="form-control" required name="insta_link"
                            value="{{ $siteinfo->instagram }}">
                    </div>

                    <div class="form-group">
                        <label>Twitter Page Link</label>
                        <input type="text" class="form-control" required name="twit_link"
                            value="{{ $siteinfo->tweeter }}">
                    </div>

                    <div class="form-group">
                        <label>LinkedIn Page Link</label>
                        <input type="text" class="form-control" required name="linked_link"
                            value="{{ $siteinfo->linkedin }}">
                    </div>

                    <div class="form-group">
                        <label>Whatsapp Number</label>
                        <input type="text" class="form-control" required name="wp_nmbr"
                            value="{{ $siteinfo->whatsapp }}">
                    </div>

                    <div class="form-group">
                        <label>Youtube Link</label>
                        <input type="text" class="form-control" required name="youtube_link"
                            value="{{ $siteinfo->youtube }}">
                    </div>

                    <div class="form-group">
                        <label for="cntctaddr">Contact Address</label>
                        <textarea class="form-control" id="cntctaddr" rows="5" name="contactaddress">{{ $siteinfo->brand_location }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="cntctaddr">Terms & Conditions Page Data</label>
                        <textarea class="form-control" id="tinymce_desc" rows="5" name="terms">{{ $term_data }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="cntctaddr">Privacy & Policies Page Data</label>
                        <textarea class="form-control" id="tinymce_desc_2" rows="5" name="privacy">{{ $privacy_data }}</textarea>
                    </div>



                    <center>
                        <button type="submit" class="btn btn-lg btn-primary px-5">COMPLETE & UPLOAD</button>
                    </center>

                </form>

            @empty
            @endforelse
        </div>
    </div>








    <script>
        $(".siteinfo").addClass("active");


        tinymce.init({
            selector: '#tinymce_desc',
        });

        tinymce.init({
            selector: '#tinymce_desc_2',
        });
    </script>
@endsection

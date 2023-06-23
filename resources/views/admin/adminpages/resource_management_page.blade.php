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
                                    Resource Management For Menufacturers
                                </h2>
                            </div>
                        </div>



                        @forelse ($data as $data)
                            <form action="/admin/update-resources" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="">
                                        Training Module
                                        <a target="_blank" href="{{ $data->traning_module }}" class="mb-2">(See Current
                                            One)</a>
                                    </label>
                                    <input type="file" name="traning_module" id="" class="form-control"
                                        accept="doc,.docx,.pdf">
                                </div>

                                <div class="form-group">
                                    <label for="">
                                        Invoicing & Fulfillment
                                        <a target="_blank" href="{{ $data->invoicing_fullfilment }}" class="mb-2">(See
                                            Current One)</a>
                                    </label>
                                    <input type="file" name="invoicing_fullfilment" id="" class="form-control"
                                        accept="doc,.docx,.pdf">
                                </div>

                                <div class="form-group">
                                    <label for="">
                                        Receiving Guidelines
                                        <a target="_blank" href="{{ $data->receiving_guidelines }}" class="mb-2">(See
                                            Current One)</a>
                                    </label>
                                    <input type="file" name="receiving_guidelines" id="" class="form-control"
                                        accept="doc,.docx,.pdf">
                                </div>

                                <div class="form-group">
                                    <label for="">
                                        Set Up Business Profile
                                        <a target="_blank" href="{{ $data->setup_business_profile }}" class="mb-2">(See
                                            Current One)</a>
                                    </label>
                                    <input type="file" name="setup_business_profile" id="" class="form-control"
                                        accept="doc,.docx,.pdf">
                                </div>

                                <div class="form-group">
                                    <label for="">
                                        Orders & Shipments
                                        <a target="_blank" href="{{ $data->orders_shipments }}" class="mb-2">(See Current
                                            One)</a>
                                    </label>
                                    <input type="file" name="orders_shipments" id="" class="form-control"
                                        accept="doc,.docx,.pdf">
                                </div>

                                <center>
                                    <button class="btn btn-primary px-5">UPDATE</button>
                                </center>

                            </form>


                        @empty
                        @endforelse


                    </div>
                </div>





                <div class="showAddNewPost mb-5">
                    <div class="add_posts_form">

                        <div class="row">
                            <div class="col">
                                <h2 class="mb-2 mb-md-4 text-center title">
                                    Educational Resources For Menufacturers
                                </h2>
                            </div>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Iframe/Embedded Code</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <form action="/admin/add-new-menufacturers-resource" method="post">
                                        @csrf
                                        <th scope="row"> 0 </th>
                                        <td>
                                            <textarea class="form-control" required name="embedded_code" rows="3" placeholder="Embedded/Iframe Code"></textarea>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm px-5">Add New</button>
                                        </td>
                                        <td></td>
                                    </form>
                                </tr>
                                @forelse ($all_menufacturers_lessons as $key => $item)
                                    <tr>
                                        <form action="/admin/update-menufacturers-resource" method="post">
                                            @csrf
                                            <th scope="row">{{ $key + 1 }} </th>
                                            <td>
                                                <input type="hidden" name="serial" value="{{ $item->sno }}">
                                                <textarea class="form-control" required name="embedded_code" rows="3" placeholder="Embedded/Iframe Code">{{ $item->resource_code }}</textarea>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-sm px-5">Update</button>
                                            </td>
                                            <td>
                                                <a href="/admin/delete-resource/{{ $item->sno }}"
                                                    class="btn btn-danger btn-sm px-5">Delete</a>
                                            </td>
                                        </form>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>






                <div class="showAddNewPost mb-5">
                    <div class="add_posts_form">

                        <div class="row">
                            <div class="col">
                                <h2 class="mb-2 mb-md-4 text-center title">
                                    Educational Resources For Influencers
                                </h2>
                            </div>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Iframe/Embedded Code</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <form action="/admin/add-new-influencers-resource" method="post">
                                        @csrf
                                        <th scope="row"> 0 </th>
                                        <td>
                                            <textarea class="form-control" required name="embedded_code" rows="3" placeholder="Embedded/Iframe Code"></textarea>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm px-5">Add New</button>
                                        </td>
                                        <td></td>
                                    </form>
                                </tr>
                                @forelse ($all_influencers_lessons as $key => $item)
                                    <tr>
                                        <form action="/admin/update-influencers-resource" method="post">
                                            @csrf
                                            <th scope="row">{{ $key + 1 }} </th>
                                            <td>
                                                <input type="hidden" name="serial" value="{{ $item->sno }}">
                                                <textarea class="form-control" required name="embedded_code" rows="3" placeholder="Embedded/Iframe Code">{{ $item->resource_code }}</textarea>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-sm px-5">Update</button>
                                            </td>
                                            <td>
                                                <a href="/admin/delete-resource/{{ $item->sno }}"
                                                    class="btn btn-danger btn-sm px-5">Delete</a>
                                            </td>
                                        </form>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>







                <div class="showAddNewPost mb-5">
                    <div class="add_posts_form">

                        <div class="row">
                            <div class="col">
                                <h2 class="mb-2 mb-md-4 text-center title">
                                    Educational Resources For Entrepreneurs
                                </h2>
                            </div>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Iframe/Embedded Code</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <form action="/admin/add-new-entrepreneurs-resource" method="post">
                                        @csrf
                                        <th scope="row"> 0 </th>
                                        <td>
                                            <textarea class="form-control" required name="embedded_code" rows="3" placeholder="Embedded/Iframe Code"></textarea>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm px-5">Add New</button>
                                        </td>
                                        <td></td>
                                    </form>
                                </tr>
                                @forelse ($all_entreprenuers_lessons as $key => $item)
                                    <tr>
                                        <form action="/admin/update-entrepreneurs-resource" method="post">
                                            @csrf
                                            <th scope="row">{{ $key + 1 }} </th>
                                            <td>
                                                <input type="hidden" name="serial" value="{{ $item->sno }}">
                                                <textarea class="form-control" required name="embedded_code" rows="3" placeholder="Embedded/Iframe Code">{{ $item->resource_code }}</textarea>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-sm px-5">Update</button>
                                            </td>
                                            <td>
                                                <a href="/admin/delete-resource/{{ $item->sno }}"
                                                    class="btn btn-danger btn-sm px-5">Delete</a>
                                            </td>
                                        </form>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>



            </div>
        </div>
    </div>


    <script>
        $(".manageresources").addClass("active");
    </script>
@endsection

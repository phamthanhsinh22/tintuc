@extends('admin.layout')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="activity"></i></div>
                                Dashboard
                            </h1>
                            <div class="page-header-subtitle">Example dashboard overview and content summary</div>
                        </div>
                        <div class="col-12 col-xl-auto mt-4">
                            <button class="btn btn-white p-3" id="reportrange">
                                <i class="mr-2 text-primary" data-feather="calendar"></i>
                                <span></span>
                                <i class="ml-1" data-feather="chevron-down"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container mt-n10">
            <div class="row">
                <div class="col-xxl-4 col-xl-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body h-100 d-flex flex-column justify-content-center py-5 py-xl-4">
                            <div class="row align-items-center">
                                <div class="col-xl-8 col-xxl-12">
                                    <div class="text-center text-xl-left text-xxl-center px-4 mb-4 mb-xl-0 mb-xxl-4">
                                        <h1 class="text-primary">Welcome to SB Admin Pro!</h1>
                                        <p class="text-gray-700 mb-0">Browse our fully designed UI toolkit! Browse our
                                            prebuilt app pages, components, and utilites, and be sure to look at our
                                            full documentation!</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid"
                                        src="assets/img/illustrations/at-work.svg" style="max-width: 26rem" /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Example Colored Cards for Dashboard Demo-->
            <!-- Example Charts for Dashboard Demo-->
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card-header">
                        <h2>Edit Post</h2>
                    </div>
                    <div class="card-body">
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{ route('post.update', $data->id) }}" id="myTable"
                                    method="post">
                                    {{csrf_field()}}
                                    {{ method_field('PUT') }}
                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Nhập Title</label>
                                        <input type="text" name="title" onkeyup="ChangeToSlug()" id="slug"
                                            class="form-control" id="exampleInputEmail1" value="{{ $data->title }}">
                                        <label for="exampleInputEmail1">Nhập slugPost</label>
                                        <input type="text" id="convert_slug" name="slugpost" class="form-control"
                                            id="exampleInputEmail1" value="{{ $data->slug_post}}">
                                        <label for="exampleInputEmail1">Nhập Content</label>
                                        <textarea type="text" name="content" oninput="autoSetHeight(this)" class="form-control" id="exampleInputEmail1"
                                            row="5"> {{ $data->content }}</textarea>
                                        <label for="exampleInputEmail1">Nhập Summary</label>
                                        <input type="text" name="summary" class="form-control" id="exampleInputEmail1"
                                            value="{{ $data->summary}}">
                                        <label for="exampleInputEmail1">Images</label>
                                        <input type="file" name="images" class="form-control-file"
                                            id="exampleInputEmail1" value="{{ $data->images }}">
                                        <label for="exampleInputEmail1">Active</label>
                                        <select class="form-control fh5co_text_select_option" name="Active"
                                            id="exampleInputEmail1">
                                            
                                            @if($data->active==1)
                                            <option selected value="1" >Có</option>
                                            <option value="0">Không</option>
                                            @else
                                            <option selected value="0">Không</option>
                                            <option value="1">Có</option>                                         
                                            @endif
                                        </select>
                                        <label for="exampleInputEmail1">Featured</label>
                                        <select class="form-control fh5co_text_select_option" name="featured"
                                            id="exampleInputEmail1">
                                            @if($data->featured==1)
                                            <option selected value="1">Có </option>
                                            <option value="0">Không </option>
                                            @else
                                            <option selected value="0">Không </option>
                                            <option value="1">Có </option>
                                            @endif
                                        </select>
                                        <label for="exampleInputEmail1">Lượt xem</label>
                                        <input type="text" name="luotxem" class="form-control" id="exampleInputEmail1"
                                            placeholder="Vui lòng nhập...">
                                        <label for="exampleInputEmail1">Hot</label>
                                        <select class="form-control fh5co_text_select_option" name="hot"
                                            id="exampleInputEmail1">
                                            @if($data->hot==1)
                                            <option selected value="1">Có </option>
                                            <option value="0">Không </option>
                                            @else
                                            <option selected value="0">Không </option>
                                            <option value="1">Có </option>
                                            @endif
                                        </select>
                                        <label for="exampleInputEmail1">Popular</label>
                                        <select class="form-control fh5co_text_select_option" name="popular"
                                            id="exampleInputEmail1">
                                            @if($data->popular==1)
                                            <option selected value="1">Có </option>
                                            <option value="0">Không </option>
                                            @else
                                            <option selected value="0">Không </option>
                                            <option value="1">Có </option>
                                            @endif
                                        </select>
                                        <label for="exampleInputEmail1">Trending</label>
                                        <select class="form-control fh5co_text_select_option" name="trending"
                                            id="exampleInputEmail1">
                                            @if($data->trending==1)
                                            <option selected value="1">Có </option>
                                            <option value="0">Không </option>
                                            @else
                                            <option selected value="0">Không </option>
                                            <option value="1">Có </option>
                                            @endif
                                        </select>
                                        <label for="exampleInputEmail1">TypeID</label>
                                        <select class="form-control fh5co_text_select_option" name="typeID"
                                            id="exampleInputEmail1">
                                            <option>{{$data->type_id}}</option>
                                            @foreach($typeID as $key)
                                            @if($key->id!=$data->type_id)
                                            <option> {{$key->id}} </option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" name="" class="btn btn-info">Update</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </main>
    <footer class="footer mt-auto footer-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                <div class="col-md-6 text-md-right small">
                    <a href="#!">Privacy Policy</a>
                    &middot;
                    <a href="#!">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>

@endsection
<script>
    function autoSetHeight(element) {
        element.style.height = '1px'
        element.style.height = (element.scollHeight) +'px'
    }
</script>
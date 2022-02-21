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
                        <h2>Add Category</h2>
                    </div>
                    <div class="card-body">
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{ route('category.store') }}" id="myTable" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập CatName</label>
                                        <input type="text" onkeyup="ChangeToSlug()" id="slug" name="category_name" class="form-control"
                                            id="exampleInputEmail1" placeholder="Vui lòng nhập...">
                                     <label for="exampleInputEmail1">Nhập slugCat</label>
                                        <input type="text" id="convert_slug" name="slugCat" class="form-control" id="exampleInputEmail1"
                                            placeholder="Vui lòng nhập...">
                                       <label for="exampleInputEmail1">Active</label>
                                        <select class="form-control fh5co_text_select_option" name="Active"
                                            id="exampleInputEmail1">
                                            <option>0 </option>
                                            <option>1 </option>
                                        </select>
                                    </div>

                                    <button type="submit" name="" class="btn btn-info">Add</button>
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
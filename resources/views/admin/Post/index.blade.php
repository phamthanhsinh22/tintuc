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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="card-header">
                                        <h2>Post Management</h2>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{ route('post.create') }}">
                                        <button class="btn btn-success" style="height:65px;">Add</button>
                                    </a>
                                </div>
                                <div class="col-md-12">
                                    <h3 style="color:red; margin-top:10px; margin-left:10px;"> {{ session('message') }} </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                    <div class="card-body">
                        <div class="datatable">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Summary</th>
                                        <th>Active</th>
                                        <th>TypeID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Summary</th>
                                        <th>Active</th>
                                        <th>TypeID</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($postList as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{ strlen($post->title) > 50 ? mb_substr($post->title,0,50).'...' : $post->title }}</td>
                                      
                                        <td style="white-space: pre-wrap;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 5;-webkit-box-orient: vertical;height: 90px;">{{ strlen($post->content) > 100 ? mb_substr($post->content,0,100).'...' : $post->content }}</td>
                                        <td style="white-space: pre-wrap;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 5;-webkit-box-orient: vertical;height: 90px;">{{$post->summary}}</td>
                                        <td>{{$post->active == 1 ? 'Hoạt động' :'Không hoạt động'}}</td>
                                        <td>{{$post->type_id}}</td>
                                        <td>
                                            <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    style="width:100px;">DELETE</button>
                                            </form>
                                            <a href="{{ route('post.edit', $post->id) }}">
                                                <button class="btn btn-success" style="width:100px;">Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    
    @include('admin.layout.css')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        @include('admin.layout.sidebar')

        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('admin.layout.navbar')
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">

            @if(session()->has('success'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="width: 30px"></button>
                {{ session()->get('success') }}
                </div>
            @endif
            
            <h6 class="mb-4">Update Blog</h6>
            <form action="{{ url('updateblog', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Blog Title</label>
                    <input type="txt" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="blog_title" value="{{ $data->blog_title }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Blog Author</label>
                    <input type="txt" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="blog_author" value="{{ $data->blog_author }}" >
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Blog Data</label>
                    <input type="date" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="blog_date" value="{{ $data->blog_date }}"> 
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Old Image</label>
                    <img height="100"; width="100"; src="/uploads/product/{{ $data->image }}" >
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Blog Content</label>
                    <input type="txt" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="blog_content" value="{{ $data->blog_content }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Blog tags</label>
                    <input type="txt" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="blog_tags" value="{{ $data->blog_tags }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Blog Image</label>
                    <input type="file" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="image">
                </div>

                
                <button type="submit" class="btn btn-primary">Update Blog</button>
            </form>
        </div>
    </div>
                   
           



                </div>
            </div>
            <!-- Form End -->


            <!-- Footer Start -->
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        @include('admin.layout.script')
</body>

</html>
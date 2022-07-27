<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    
    @include('admin.layout.css')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
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
            
            <h6 class="mb-4">Add Blog</h6>
            <form action="{{ url('addnewblog') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Blog Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="blog_title">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Blog Author</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="blog_author">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Blog Content</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="blog_content">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Blog tags</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="blog_tags">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Blog Date</label>
                    <input type="date" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="blog_date">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Blog Image</label>
                    <input type="file" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="image">
                </div>

                
                <button type="submit" class="btn btn-primary">Add Blog</button>
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
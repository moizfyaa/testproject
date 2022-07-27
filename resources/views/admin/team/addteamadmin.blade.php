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
            
            <h6 class="mb-3">Add Team </h6>
            <form action="addnewmember" method="POST" enctype="multipart/form-data"  >
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Member Name</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="name">
                </div>
                        @if ($errors->has('name'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 3px;">
                            <i class="fa fa-exclamation-circle me-2"></i>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" style="padding: 10px"></button>
                            {{ $errors->first('name') }}
                        </div>
                @endif


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Member Designation</label>
                    <input type="text" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="designation">
                </div>

                @if ($errors->has('designation'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 3px;">
                    <i class="fa fa-exclamation-circle me-2"></i>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="padding: 10px"></button>
                    {{ $errors->first('designation') }}
                </div>
        @endif


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Member Image</label>
                    <input type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="image">
                </div>

                @if ($errors->has('image'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 3px;">
                    <i class="fa fa-exclamation-circle me-2"></i>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="padding: 10px"></button>
                    {{ $errors->first('image') }}
                </div>
        @endif
                
                <button type="submit" class="btn btn-danger">Add Member</button>
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
<!DOCTYPE html>
<html lang="en">
<head>

    <base href="/public">

    <style>
        #more  {display:  none;}
    </style>


    @include('admin.layout.css')
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- Spinner End -->
        <!-- Sidebar Start -->
        @include('admin.layout.sidebar')
        <!-- Sidebar End -->
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('admin.layout.navbar')
            <!-- Navbar End -->
            <!-- Table Start -->
            
  
                
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

                            <h6 class="mb-4">Showing Up All Product</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($data as $team)
                                        <th scope="row">{{ $team->id }}</th>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->designation }}</td>
                                        <td><img src="/uploads/product/{{ $team->image }}" height="100px"; width="100"></td>
                                        <td>
                                            <a type="button" href="{{ route('update_team_view', $team->id) }}" class="btn btn-lg btn-lg-rounded btn-outline-info m-2"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a type="button" href="{{ route('deleteteam', $team->id) }}"  class="btn btn-lg btn-lg-rounded btn-outline-danger m-2" onclick="return confirm('Are You Sure')" ><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-5">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        @include('admin.layout.script')

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
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
        <!-- Sidebar Start -->
      @include('admin.layout.sidebar')
        <!-- Sidebar End -->
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
          @include('admin.layout.navbar')
            <!-- Navbar End -->
            <!-- Sale & Revenue Start -->
         @include('admin.layout.body')
            <!-- Footer End -->
            @include('admin.layout.script')
</body>
</html>
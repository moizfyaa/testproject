<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    
    <?php echo $__env->make('admin.layout.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

        <?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
        <?php echo $__env->make('admin.layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">

                            <?php if(session()->has('success')): ?>
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                              <i class="fa fa-exclamation-circle me-2"></i>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="width: 30px"></button>
                                <?php echo e(session()->get('success')); ?>

                              </div>
                          <?php endif; ?>
                          
                            <h6 class="mb-4">Update Product</h6>
                            <form action="<?php echo e(route('updateproduct',['product' => $data->id])); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                    <input type="txt" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="name" value="<?php echo e($data->name); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                    <input type="txt" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="price" value="<?php echo e($data->price); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Old Product Image</label>
                                    <img height="100"; width="100"; src="/uploads/product/<?php echo e($data->image); ?>" >
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Description</label>
                                    <input type="txt" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="description" value="<?php echo e($data->description); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="image">
                                </div>

                              
                                <button type="submit" class="btn btn-primary">Update Produt</button>
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


        <?php echo $__env->make('admin.layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\MailFashion\resources\views/admin/update_product_view.blade.php ENDPATH**/ ?>
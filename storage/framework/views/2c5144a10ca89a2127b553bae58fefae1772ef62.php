<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    
    <?php echo $__env->make('admin.layout.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
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
            
            <h6 class="mb-3">Add Product</h6>
            <form action="<?php echo e(url('addproduct')); ?>" method="POST" enctype="multipart/form-data"  >
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Product Name</label>
                    <input type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="name">
                </div>

                <?php if($errors->has('name')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 3px;">
                    <i class="fa fa-exclamation-circle me-2"></i>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="padding: 10px"></button>
                    <?php echo e($errors->first('name')); ?>

                </div>
        <?php endif; ?>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Product Price</label>
                    <input type="number" class="form-control<?php echo e($errors->has('price') ? ' is-invalid' : ''); ?>" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="price">
                </div>

                <?php if($errors->has('price')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 3px;">
                    <i class="fa fa-exclamation-circle me-2"></i>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="padding: 10px"></button>
                    <?php echo e($errors->first('price')); ?>

                </div>
             <?php endif; ?>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Product Description</label>
                    <input type="text" class="form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="description">
                </div>

                <?php if($errors->has('description')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 3px;">
                    <i class="fa fa-exclamation-circle me-2"></i>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="padding: 10px"></button>
                    <?php echo e($errors->first('description')); ?>

                </div>
        <?php endif; ?>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Product Image</label>
                    <input type="file" class="form-control<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="image">
                </div>

                <?php if($errors->has('image')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 3px;">
                    <i class="fa fa-exclamation-circle me-2"></i>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="padding: 10px"></button>
                    <?php echo e($errors->first('image')); ?>

                </div>
        <?php endif; ?>

                
                <button type="submit" class="btn btn-danger">Add Produt</button>
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

</html><?php /**PATH C:\xampp\htdocs\MailFashion\resources\views/admin/addproduct.blade.php ENDPATH**/ ?>
<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Latest Blogs</span>
                    <h2>Fashion New Trends</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="/uploads/product/<?php echo e($blog->image); ?>"></div>
                    <div class="blog__item__text">
                        <span><img src="img/icon/calendar.png" alt=""> <?php echo e($blog->blog_date); ?></span>
                        <h5><?php echo e($blog->blog_title); ?></h5>
                        <a href="<?php echo e(route('blog_detail_page', $blog->id)); ?>">Read More</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\MailFashion\resources\views/latestblog.blade.php ENDPATH**/ ?>
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
            @foreach ($blogs as $blog)
        
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="/uploads/product/{{ $blog->image }}"></div>
                    <div class="blog__item__text">
                        <span><img src="img/icon/calendar.png" alt=""> {{ $blog->blog_date }}</span>
                        <h5>{{ $blog->blog_title }}</h5>
                        <a href="{{ route('blog_detail_page', $blog->id) }}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
@extends('layouts.app')
@section('content')
    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Blogs</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Our Blogs</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- blog-news-section---------------->
    <section class="latest product footer-padding">
    <div class="container">
        <div class="blog-section latest-section">
            <div class="row g-5">
                @foreach($blogPosts as $blogPost) {{-- Assuming $blogPosts contains the list of blog posts --}}
                <div class="col-lg-3 col-sm-6">
                    <div class="blogs-wrapper product-wrapper" data-aos="fade-up">
                        <div class="wrapper-img">
                            <img src="{{ asset($blogPost->featured_image) }}" alt="{{ $blogPost->title }}" >
                        </div>
                        <div class="wrapper-info">
                            <div class="wrapper-data">
                                <div class="admin wrapper-item">
                                    <span class="icon">
                                        <svg width="12" height="15" viewBox="0 0 12 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="..." fill="#AE1C9A" />
                                        </svg>
                                    </span>

                                </div>
                                <div class="comments wrapper-item">
                                    <span class="icon">
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="..." fill="#AE1C9A" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <a href="{{ route('blog.show', $blogPost->slug) }}" class="about-details wrapper-details">
                                {{ \Illuminate\Support\Str::limit($blogPost->title, 60) }}
                            </a>
                            <div class="divider"></div>
                            <a href="{{ route('blog.show', $blogPost->slug) }}" class="shop-btn">
                                Learn More
                                <span>
                                    <svg width="16" height="11" viewBox="0 0 16 11" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="..." fill="#AE1C9A" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


@endsection
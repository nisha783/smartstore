@extends('layouts.app')
@section('content')
 <!--------------- blog-tittle-section---------------->
 <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Blog details</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Blog Details</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- blog-details-section---------------->
    <section class="blog-details product footer-padding">
        <div class="container">
            <div class="blog-detail-section">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <div class="blogs-wrapper">
                            <div class="wrapper-img">
                            <img src="{{ asset($blogPost->featured_image) }}" alt="{{ $blogPost->title }}" >
                            </div>
                            <div class="wrapper-info">
                                <div class="wrapper-data">
                                    <div class="admin wrapper-item">
                                        <span class="icon">
                                            <svg width="12" height="15" viewBox="0 0 12 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.761 14.9996C1.55973 14.9336 1.35152 14.8896 1.16065 14.7978C0.397206 14.4272 -0.02963 13.6273 0.00160193 12.743C0.0397743 11.6936 0.275749 10.7103 0.765049 9.7966C1.42439 8.56373 2.36829 7.65741 3.59327 7.07767C3.67309 7.04098 3.7529 7.00428 3.85007 6.95658C2.68061 5.9512 2.17396 4.67062 2.43422 3.10017C2.58691 2.18285 3.03804 1.42698 3.72514 0.847238C5.24163 -0.42967 7.34458 -0.216852 8.60773 1.1738C9.36424 2.00673 9.70779 3.01211 9.61757 4.16426C9.52734 5.31642 9.01375 6.23374 8.14619 6.94924C8.33359 7.04098 8.50363 7.11436 8.6702 7.20609C10.1485 8.006 11.1618 9.24254 11.6997 10.9011C11.9253 11.5945 12.0328 12.3137 11.9912 13.0476C11.9357 14.0163 11.2243 14.8235 10.3151 14.9703C10.2908 14.974 10.2665 14.9886 10.2387 14.9996C7.41051 14.9996 4.58575 14.9996 1.761 14.9996ZM6.00507 13.8475C7.30293 13.8475 8.60079 13.8401 9.89518 13.8512C10.5684 13.8548 10.9571 13.3338 10.9015 12.7577C10.8807 12.5486 10.8773 12.3394 10.846 12.1303C10.6309 10.6185 9.92294 9.41133 8.72225 8.5784C7.17106 7.50331 5.50883 7.3602 3.84313 8.23349C2.05944 9.16916 1.15718 10.7506 1.09125 12.8568C1.08778 13.0072 1.12595 13.1723 1.18494 13.3044C1.36193 13.6934 1.68466 13.8438 2.08026 13.8438C3.392 13.8475 4.70027 13.8475 6.00507 13.8475ZM5.99119 6.53462C7.38969 6.54196 8.53833 5.33843 8.54527 3.85238C8.55221 2.37733 7.41745 1.16647 6.00507 1.15179C4.62046 1.13344 3.45794 2.35531 3.45099 3.8377C3.44405 5.31275 4.58922 6.52728 5.99119 6.53462Z"
                                                    fill="#AE1C9A" />
                                            </svg>
                                        </span>
                                        <span class="text">
                                            By Admin
                                        </span>
                                    </div>
                                </div>
                                <a href="{{route('blog.index')}}" class="about-details wrapper-details blog-details-heading text-dark">{{$blogPost->title}}
                                </a>
                                <div class="blog-details">
                                    <p>{{$blogPost->meta_description}}</p>
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="blogs-form-section">
                            <div class="social-item">
                                <h5>Share:</h5>
                                <a href="https://www.facebook.com/">
                                    <span>
                                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3 16V9H0V6H3V4C3 1.3 4.7 0 7.1 0C8.3 0 9.2 0.1 9.5 0.1V2.9H7.8C6.5 2.9 6.2 3.5 6.2 4.4V6H10L9 9H6.3V16H3Z" />
                                        </svg>
                                    </span>
                                </a>
                                <a href="https://twitter.com/">
                                    <span>
                                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.0722 1.60052C16.432 1.88505 15.7562 2.06289 15.0448 2.16959C15.7562 1.74278 16.3253 1.06701 16.5742 0.248969C15.8985 0.640206 15.1515 0.924742 14.3335 1.10258C13.6933 0.426804 12.7686 0 11.7727 0C9.85206 0 8.28711 1.56495 8.28711 3.48557C8.28711 3.7701 8.32268 4.01907 8.39382 4.26804C5.51289 4.12577 2.9165 2.73866 1.17371 0.604639C0.889175 1.13814 0.71134 1.70722 0.71134 2.34742C0.71134 3.5567 1.31598 4.62371 2.27629 5.26392C1.70722 5.22835 1.17371 5.08608 0.675773 4.83711V4.87268C0.675773 6.5799 1.88505 8.00258 3.48557 8.32268C3.20103 8.39382 2.88093 8.42938 2.56082 8.42938C2.34742 8.42938 2.09845 8.39382 1.88505 8.35825C2.34742 9.74536 3.62784 10.7768 5.15722 10.7768C3.94794 11.7015 2.45412 12.2706 0.818041 12.2706C0.533505 12.2706 0.248969 12.2706 0 12.2351C1.56495 13.2309 3.37887 13.8 5.37062 13.8C11.8082 13.8 15.3294 8.46495 15.3294 3.84124C15.3294 3.69897 15.3294 3.52113 15.3294 3.37887C16.0052 2.9165 16.6098 2.31186 17.0722 1.60052Z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-post-section">
                            <div class="row g-5">
                                <div class="col-lg-12">
                                    <div class="blog-post search">
                                        <h5 class="post-details">Search</h5>
                                        <hr>
                                        <div class="search-btn">
                                            <input type="text" placeholder="search">
                                            <span>
                                                <svg width="25" height="25" viewBox="0 0 25 25" fill="#AE1C9A"
                                                    xmlns="http://www.w3.org/2000/svg" class="fill-current">
                                                    <path
                                                        d="M0 9.59954C0.0526938 9.17184 0.105388 8.74414 0.184428 8.34317C0.526938 6.44524 1.34369 4.81463 2.60834 3.39787C4.08377 1.74052 5.92805 0.644534 8.0885 0.216832C10.6178 -0.291064 13.0154 0.0831754 15.2549 1.44648C17.7842 2.99689 19.3913 5.24233 19.9973 8.15605C20.5242 10.6421 20.129 13.0212 18.9171 15.2666C18.68 15.6943 18.68 15.6943 19.0225 16.0418C20.7877 17.8328 22.553 19.6238 24.3182 21.4148C24.8978 22.0029 25.1349 22.6712 24.9242 23.4731C24.529 24.9968 22.6583 25.5582 21.4727 24.3285C20.4715 23.286 19.4704 22.2969 18.4428 21.2544C17.6261 20.4257 16.8357 19.6238 16.0189 18.7951C15.9662 18.7417 15.9135 18.6882 15.8872 18.6615C15.2549 18.9823 14.6752 19.3565 14.0429 19.6238C11.3292 20.7733 8.58909 20.7465 5.90171 19.5169C3.873 18.5813 2.34487 17.1111 1.26465 15.1597C0.579632 13.9033 0.158081 12.5667 0.0526938 11.1232C0.0526938 11.043 0.0263469 10.9628 0 10.8826C0 10.4817 0 10.0272 0 9.59954ZM3.26702 10.2678C3.26702 14.0904 6.34961 17.1913 10.1172 17.1913C13.8848 17.1645 16.9147 14.0904 16.9411 10.2678C16.9411 6.47197 13.8585 3.3444 10.1172 3.3444C6.32326 3.3444 3.26702 6.44524 3.26702 10.2678Z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col-lg-12">
                                    <div class="blog-post category-post">
                                        <h5 class="post-details">Categories</h5>
                                        <hr>
                                        <ul class="category-list">
                                            <li>
                                                <a href="#">Development</a>
                                            </li>
                                            <li>
                                                <a href="#">Guide</a>
                                            </li>
                                            <li>
                                                <a href="#">Inspiration</a>
                                            </li>
                                            <li>
                                                <a href="#">Latest News</a>
                                            </li>
                                            <li>
                                                <a href="#">Revenue</a>
                                            </li>
                                            <li>
                                                <a href="#">Start Up</a>
                                            </li>
                                            <li>
                                                <a href="#">Technology</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="blog-post newsletter">
                                        <h5 class="post-details">Our Newsletter</h5>
                                        <hr>
                                        <p class="blog-paragraph">Follow our newsletter to stay updated about us.</p>
                                        <form action="{{ route('newsletter.store') }}" method="POST" class="form">
    @csrf
    
    <div class="form-group">
        <input 
            type="email" 
            name="email" 
            class="form-control @error('email') is-invalid @enderror" 
            placeholder="Enter Your Email Address" 
            value=""
            required>
            
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <button type="submit" class="shop-btn">Subscribe</button>
</form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
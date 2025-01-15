@extends('layouts.app')
@section('content')
  <!--------------- faq-tittle-section---------------->
  <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">FAQ</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">FAQ's</h1>
            </div>
        </div>
    </section>
    <div class="container">
            <div class="row gy-5">
            <div class="col-lg-6">
    <div class="faq-accordion accordion accordion-flush" id="accordionFlushExample" data-aos="fade-right">
        <h5>Frequently Asked Questions</h5>

        @foreach ($faqs as $index => $faq)
            <div class="faq-item accordion-item">
                <h2 class="accordion-header">
                    <button class="faq-button accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapse{{ $index }}" aria-expanded="false"
                        aria-controls="flush-collapse{{ $index }}">
                        <span class="faq-heading">{{ $faq->question }}</span>
                        <span class="plus">+</span>
                        <span class="minus">−</span>
                    </button>
                </h2>
                <div id="flush-collapse{{ $index }}" class="accordion-collapse collapse"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <h5 class="paragraph">{{ $faq->answer }}</h5>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

                <div class="col-lg-6">
                    <div class="question-section login-section " data-aos="fade-left">
                        <div class="review-form">
                            <h5 class="comment-title">Have Any Question</h5>
                            <div class=" account-inner-form">
                                <div class="review-form-name">
                                    <label for="fname" class="form-label">Name*</label>
                                    <input type="text" id="fname" class="form-control" placeholder="Name">
                                </div>
                                <div class="review-form-name">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" id="email" class="form-control" placeholder="user@gmail.com">
                                </div>
                                <div class="review-form-name">
                                    <label for="subject" class="form-label">Subject*</label>
                                    <input type="text" id="subject" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="review-textarea">
                                <label for="floatingTextarea">Massage*</label>
                                <textarea class="form-control" placeholder="Write Massage..........."
                                    id="floatingTextarea" rows="3"></textarea>
                            </div>
                            <div class="login-btn">
                                <a href="#" class="shop-btn">Send Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
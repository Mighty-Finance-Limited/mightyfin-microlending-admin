<div>
{{-- <x-app-layout> --}}
    <section class="breadcrumb-area">
        <div class="breadcrumb-area-bg"
            style="background-image: url('{{asset("public/box/images/wib.jpg")}}');"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                            <h2>Women In Business (Femiprise) - Soft Loan</h2>
                        </div>
                        <div class="breadcrumb-menu" data-aos="fade-left" data-aos-easing="linear"
                            data-aos-duration="500">
                            <ul>
                                <li><a href="{{route('welcome')}}">Home</a></li>
                                <li class="active">Femiprise Loan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->



    <!--Start Applying Process Area-->
    <section class="applying-process-area">
        <div class="container">
            <div class="sec-title text-center">
                <h4>Women in Business (Fermiprise) Soft Loan?</h4>
                <div class="sub-title">
                    <p>
                        As a woman entrepreneur, you have the drive, determination, and vision to succeed. 
                        But sometimes you need a little extra support to make your dreams a reality. 
                        That's where our Women in Business (Fermiprise) Soft Loan comes in. With our competitive interest rates, flexible repayment terms, and fast online application process, we make it easy to get the funding you need to grow your business. Whether you're looking to invest in new equipment, hire staff, or expand your operations, our loans are designed to meet your unique needs. And with our commitment to empowering women in business, you can trust us to be your partner in success. 
                        Apply now and take the first step towards achieving your entrepreneurial vision.
                    </p>
                </div>
            </div>
            <div class="sec-title text-center">
                <h3>How to Apply</h3>
            </div>
            @include('livewire.loans.__parts.how-to-apply')
        </div>
    </section>
    <!--End Applying Process Area-->

    <!--Start Apply Form Area-->
    <section class="apply-form-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="apply-form-box clearfix">
                        <div class="apply-form-box-bg"
                            style="background-image: url('{{ asset("public/box/images/resources/apply-form-box-bg.jpg")}}');"></div>
                        <div class="apply-form-box__content">
                            <div class="sec-title">
                                <h2>Empowering women entrepreneurs to reach new heights. Submit your Women in Business loan request today and elevate your business with Fermiprise!</h2>
                                <div class="sub-title">
                                    <p>Fill all the necessary details and Get call from experts.</p>
                                </div>
                                <div>
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @include('livewire.loans.__parts.service-contact-form')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Apply Form Area-->



    <!--Start Partner Area-->
    <section class="partner-area">
        <div class="container">
            <div class="partner-area__sec-title">
                <h3>Corporate Partnership With</h3>
            </div>
            <div class="brand-content">
                
                <div style="display: flex;
                justify-content: center;
                align-items: center;">
                    <span>
                        <a href="#"><img width="90" src="{{ asset('public/box/partners/cbu2.jpeg') }}" alt="Awesome Image"></a>
                    </span>
                    &nbsp;
                    <span>
                        <a href="#"><img width="90" height="10px" src="{{ asset('public/box/partners/mulu.jpeg') }}" alt="Awesome Image"></a>
                    </span>
                    &nbsp;
                    <span>
                        <a href="#"><img width="90" src="{{ asset('public/box/partners/muku.png') }}" alt="Awesome Image"></a>
                    </span>
                </div>
            </div>
        </div>
    </section>
{{-- </x-app-layout> --}}

</div>
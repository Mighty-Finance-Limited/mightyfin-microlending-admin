<div>
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area">
        <div class="breadcrumb-area-bg"
            style="background-image: url('{{ asset("public/box/images/backgrounds/breadcrumb-area-bg-6.jpg") }}');"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                            <h2>{{ $title }}</h2>
                        </div>
                        <div class="breadcrumb-menu" data-aos="fade-left" data-aos-easing="linear"
                            data-aos-duration="500">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Get In Touch</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->
    
    
    <!--Start Main Contact Form Area-->
    <section class="main-contact-form-area">
        <div class="container">
            <div class="row">
    
                <div class="col-xl-6">
                    <div class="contact-info-box-style1">
                        <div class="box1"></div>
                        <div class="title">
                            <h2>Get Support for<br> any Queries or Complaints</h2>
                            <p>Committed to helping you meet all your Financing needs.</p>
                        </div>
    
                        <ul class="contact-info-1">
                            <li>
                                <div class="icon">
                                    <span class="icon-map"></span>
                                </div>
                                <div class="text">
                                    <p>Corporate Office</p>
                                    <h3>
                                        {{App\Models\ContactSetting::address()}}
                                        {{-- Stand B19 CBU, Jambo Drive, Riverside, Kitwe. --}}
                                    </h3>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-clock"></span>
                                </div>
                                <div class="text">
                                    <p>Office Hours</p>
                                    <h3>{{App\Models\ContactSetting::work_days()}} : {{App\Models\ContactSetting::work_hours()}}</h3>
                                    <span></span>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-phone"></span>
                                </div>
                                <div class="text">
                                    <p>Front Desk</p>
                                    <h3><a href="tel:{{App\Models\ContactSetting::customer_care_line()}}">{{App\Models\ContactSetting::customer_care_line()}}</a></h3>
                                    <h3><a href="mailto:yourmail@email.com">{{App\Models\ContactSetting::contact_us_email()}}</a></h3>
                                </div>
                            </li>
                        </ul>
    
                        <div class="bottom-box">
                            <div class="btn-box">
                                <a href="#"><i class="fas fa-arrow-down"></i> Customer Care</a>
                            </div>
                            <div class="footer-social-link-style1">
                                <ul class="clearfix">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
    
                    </div>
                </div>
    
    
                <div class="col-xl-6">
                    <div class="contact-form">
                        <form name="contact_form" class="default-form2">
    
                            <div class="form-group">
                                <label>Name</label>
                                <div class="input-box">
                                    <input type="text" wire:model="name" id="formName" placeholder="Fullname"
                                        required="">
                                    @error('name') <span style="color:red" class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-box">
                                    <input type="email" wire:model="email" id="formEmail" placeholder="example@mail.com" required>
                                    @error('email') <span style="color:red" class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label>Phone. Num</label>
                                <div class="input-box">
                                    <input type="text" wire:model.defer="phone" value="" id="phoneNumb" placeholder="">
                                    @error('phone') <span style="color:red" class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label>Subject</label>
                                <div class="input-box">
                                    <input type="text" wire:model="subject" value="" id="formSubject"
                                        placeholder="Subject">
                                        @error('subject') <span style="color:red" class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label>Message</label>
                                <div class="input-box">
                                    <textarea wire:model="message" id="formMessage" placeholder=""required="">
                                        
                                    </textarea>
                                    @error('message') <span style="color:red" class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
    
                            
    
                        </form>
                        <div class="button-box">
                            {{-- <input id="form_botcheck" name="botcheck" class="form-control" type="hidden"
                                value=""> --}}
                            <button class="btn-one" wire:click.prevent="send()" wire:loading.attr="disabled" :disabled="isDisabled">
                                
                                <span class="txt">
                                    <span>
                                        <svg
                                        wire:loading
                                        wire:target="send()"
                                        width="20"
                                        height="20"
                                        style="color:burgundy"
                                        class="animate-spin"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        >
                                            <circle
                                                class="opacity-25"
                                                cx="12"
                                                cy="12"
                                                r="10"
                                                stroke="currentColor"
                                                stroke-width="4"
                                            ></circle>
                                            <path
                                                class="opacity-75"
                                                fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                            ></path>
                                        </svg>
                                    </span>
                                    {{-- <span wire:loading wire:target="send()">Loading...</span> --}}
                                    <span wire:loading.remove wire:target="send()">Send Message</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </section>
    <!--End Main Contact Form Area-->
    
    <!--Google Map Start-->
    <section class="google-map">
        <iframe class="google-map__one" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3890.584425154795!2d28.237393314749035!3d-12.805465259963235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x196ce628ce6a7849%3A0x2d5c09397c32e75d!2sThe%20Copperbelt%20University!5e0!3m2!1sen!2szm!4v1676302365652!5m2!1sen!2szm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="google-map-content-box">
            <div class="branch-atm-tab">
                <!--Start Branch Atm Tab Buttom-->
                {{-- <div class="branch-atm-tab__button">
                    <ul class="tabs-button-box">
                        <li data-tab="#branch" class="tab-btn-item active-btn-item">
                            <h5>Branch</h5>
                        </li>
                        <li data-tab="#atm" class="tab-btn-item">
                            <h5>atm</h5>
                        </li>
                    </ul>
                    <div class="location-search-box">
                        <div class="location-search-box__inner">
                            <form class="search-form" action="#">
                                <div class="input-box">
                                    <input placeholder="Enter Your Location" type="text">
                                    <div class="icon">
                                        <span class="icon-map"></span>
                                    </div>
                                </div>
                                <button type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div> --}}
                <!--End Branch Atm Tab Buttom-->
    
                <!--Start Tabs Content Box-->
                <div class="tabs-content-box">
                    <!--Tab-->
                    <div class="tab-content-box-item tab-content-box-item-active" id="branch">
                        <div class="branch-atm-tab-content-box-item">
                            <div class="inner-title">
                                <h3>{{App\Models\ContactSetting::name() ?? 'Bridgetrust Finance'}},<br> {{App\Models\ContactSetting::place() ?? 'Kitwe'}}</h3>
                            </div>
                            <ul>
                                {{-- <li>
                                    <h3>ifsc</h3>
                                    <p>finbif1234</p>
                                </li> --}}
                                <li>
                                    <h3>Address</h3>
                                    <p>{{App\Models\ContactSetting::address()}}</p>
                                    {{-- <p>Stand B19 CBU, Jambo Drive, <br>Riverside, Kitwe.</p> --}}
                                </li>
                                <li>
                                    <h3>Phone & Email</h3>
                                    <p><a href="tel:+{{App\Models\ContactSetting::contact_us_line()}}">{{App\Models\ContactSetting::contact_us_line()}}</a></p>
                                    <p><a href="mailto:{{App\Models\ContactSetting::contact_us_email()}}">{{App\Models\ContactSetting::contact_us_email()}}</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
    
                    <!--Tab-->
                    {{-- <div class="tab-content-box-item" id="atm">
                        <div class="branch-atm-tab-content-box-item">
                            <div class="inner-title">
                                <h3>Ndola, 23/8<br> West North Central</h3>
                            </div>
                            <ul>
                                <li>
                                    <h3>Arizona</h3>
                                    <p>finbif1234</p>
                                </li>
                                <li>
                                    <h3>Address</h3>
                                    <p>24/7, 1st Floor Global Str, 2nd Cross,<br> SF 94112.</p>
                                </li>
                                <li>
                                    <h3>Phone & Email</h3>
                                    <p><a href="tel:123456789">+415 67 890 12</a></p>
                                    <p><a href="mailto:yourmail@email.com">support@finbank1234.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
                <!--End Tabs Content Box-->
    
            </div>
        </div>
    
    </section>
    <!--Google Map End-->
    
    <!--Start Customer Care Numbers Area-->
    <section class="customer-care-numbers-area">
        <div class="container">
            <div class="title-box">
                <h2>Customer Care Numbers</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="customer-care-numbers-tab">
    
                        <div class="customer-care-numbers-tab__button">
                            <ul class="tabs-button-box clearfix">
                                <li data-tab="#personal-banking" class="tab-btn-item active-btn-item">
                                    <h4>Personal Financing</h4>
                                </li>
                                <li data-tab="#corporate-banking" class="tab-btn-item">
                                    <h4>Corporate Financing</h4>
                                </li>
                            </ul>
                        </div>
    
                        <!--Start Tabs Content Box-->
                        <div class="tabs-content-box">
                            <!--Tab-->
                            <div class="tab-content-box-item tab-content-box-item-active" id="personal-banking">
    
                                <div class="customer-care-numbers-tab-content-box-item">
                                    <div class="customer-care-numbers-table-box">
                                        <div class="table-outer">
                                            <table class="customer-care-numbers-table">
                                                <thead class="header">
                                                    <tr>
                                                        <th>Service</th>
                                                        <th>Contact Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="inner-title">
                                                            <h3>General Query/Complaint</h3>
                                                        </td>
                                                        <td class="contact-info">
                                                            <ul>
                                                                <li>
                                                                    <a href="tel:{{App\Models\ContactSetting::contact_us_line()}}">{{App\Models\ContactSetting::contact_us_line()}}</a>
                                                                    {{-- <span>(Toll Free)</span> --}}
                                                                </li>
                                                                <li>
                                                                    <a class="color2"
                                                                        href="mailto:{{App\Models\ContactSetting::contact_us_email()}}">{{App\Models\ContactSetting::contact_us_email()}}</a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="inner-title">
                                                            <h3>Loans & Payments</h3>
                                                        </td>
                                                        <td class="contact-info">
                                                            <ul>
                                                                <li>
                                                                    <a href="tel:{{App\Models\ContactSetting::contact_us_line()}}">{{App\Models\ContactSetting::contact_us_line()}}</a>
                                                                </li>
                                                                <li>
                                                                    <a class="color2"
                                                                        href="mailto:{{App\Models\ContactSetting::contact_us_email()}}">{{App\Models\ContactSetting::contact_us_email()}}</a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
    
                                        <div class="bottom-text text-center">
                                            {{-- <h3>To submit your complaint, <a href="#">Click here</a></h3> --}}
                                        </div>
    
                                    </div>
                                </div>
    
                            </div>
                            <!--Tab-->
                            <div class="tab-content-box-item" id="corporate-banking">
    
                                <div class="customer-care-numbers-tab-content-box-item">
                                    <div class="customer-care-numbers-table-box">
                                        <div class="table-outer">
                                            <table class="customer-care-numbers-table">
                                                <thead class="header">
                                                    <tr>
                                                        <th>Service</th>
                                                        <th>Contact Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="inner-title">
                                                            <h3>General Query/Complaint</h3>
                                                        </td>
                                                        <td class="contact-info">
                                                            <ul>
                                                                <li>
                                                                    <a href="tel:{{App\Models\ContactSetting::contact_us_line()}}">{{App\Models\ContactSetting::contact_us_line()}}</a>
                                                                    {{-- <span>(Charges Apply)</span> --}}
                                                                </li>
                                                                <li>
                                                                    <a class="color2"
                                                                        href="mailto:{{App\Models\ContactSetting::contact_us_email()}}">{{App\Models\ContactSetting::contact_us_email()}}</a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="inner-title">
                                                            <h3>Loans & Payments</h3>
                                                        </td>
                                                        <td class="contact-info">
                                                            <ul>
                                                                <li>
                                                                    <a href="tel:2512353256">+844 789 0123 45</a>
                                                                </li>
                                                                <li>
                                                                    <a class="color2"
                                                                        href="mailto:{{App\Models\ContactSetting::contact_us_email()}}">{{App\Models\ContactSetting::contact_us_email()}}</a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
    
                                        <div class="bottom-text text-center">
                                            {{-- <h3>To submit your complaint, <a href="#">Click here</a></h3> --}}
                                        </div>
    
                                    </div>
                                </div>
    
                            </div>
    
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Customer Care Numbers Area-->
    
    </div>
    
    <script>
    $(document).ready(function(){
        const input = document.getElementById('phoneNumb');
        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^0-9]/g, '');
            if (input.value.length > 10) {
            input.value = input.value.slice(0, 10);
            }
        });
    });
    </script>
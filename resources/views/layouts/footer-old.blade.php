<footer class="footer-area">
    <div class="right-shape">
        <img src="{{ asset('public/box/images/shapes/footer-right-shape.png') }}" alt="">
    </div>

    <!--Start Footer Top-->
    <div class="footer-top">
        <div class="lef-shape">
            <span class="icon-origami"></span>
        </div>
        <div class="container">
            <div class="row">
                <!--Start single footer widget-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 single-widget">
                    <div class="single-footer-widget single-footer-widget--link-box">
                        <div class="title">
                            <h3>Loans</h3>
                        </div>
                        <div class="footer-widget-links">
                            <ul>
                                <li><a href="{{ route('view-home-loans') }}">Home Loan</a></li>
                                <li><a href="{{ route('view-vehicle-loans') }}">Vehicle Loan</a></li>
                                <li><a href="{{ route('view-personal-loans') }}">Personal Loan</a></li>
                                <li><a href="{{ route('view-educational-loans') }}">Education Loan</a></li>
                                <li><a href="{{ route('view-sme-loans') }}">SME Loan</a></li>
                                <li><a href="{{ route('view-wib-loans') }}">Women In Business (Femiprise) Soft Loan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End single footer widget-->
                <!--Start single footer widget-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 single-widget">
                    <div class="single-footer-widget single-footer-widget--link-box">
                        <div class="title">
                            <h3>Rates & Charges</h3>
                        </div>
                        <div class="footer-widget-links">
                            <ul>
                                <li><a href="#">Interest Rates</a></li>
                                <li><a href="#">Gold Rate Today</a></li>
                                <li><a href="#">Service Charges & Fees</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-footer-widget single-footer-widget--link-box-style2">
                        <div class="title">
                            <h3>Online</h3>
                        </div>
                        <div class="footer-widget-links">
                            <ul>
                                <li><a href="#">Mobile Financing</a></li>
                                <li><a href="#">Internet Financing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End single footer widget-->

                <!--Start single footer widget-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 single-widget">
                    <div class="single-footer-widget single-footer-widget--link-box">
                        <div class="title">
                            <h3>About Us</h3>
                        </div>
                        <div class="footer-widget-links">
                            <ul>
                                <li><a href="{{ route('about.us') }}">Our Story</a></li>
                                <li><a href="{{ route('about.careers') }}">Careers</a></li>
                                {{-- <li><a href="#">Board of Directors</a></li>
                                <li><a href="#">Management Committee</a></li>
                                <li><a href="#">Media</a></li>
                                <li><a href="#">Investor Relations</a></li>
                                <li><a href="#">Awards & Recognition</a></li>
                                <li><a href="#">Careers</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End single footer widget-->

                <!--Start single footer widget-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 single-widget">
                    <div class="single-footer-widget single-footer-widget--link-box">
                        <div class="title">
                            <h3>Extras</h3>
                        </div>
                        <div class="footer-widget-links">
                            <ul>
                                <li><a href="#">Saving with us</a></li>
                                
                                <li><a href="#">Payments</a></li>
                    
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End single footer widget-->
            </div>
        </div>
    </div>
    <!--End Footer Top-->

    <!--Start Footer-->
    <div class="footer">
        <div class="container">
            <div class="row">

                <!--Start single footer widget-->
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="single-footer-widget marbtm50">
                        <div class="our-company-info">
                            <div class="footer-logo-style1">
                                <a href="index.php">
                                    <img src="{{ asset('public/box/images/footer/footer-logo-1.png') }}" alt="BTF" title="">
                                </a>
                            </div>
                            <div class="copyright-text">
                                <p>
                                    Copyright &copy; <script>
                                        document.write(new Date().getFullYear());
                                    </script> <a href="/">Bridge Trust Finance.</a> Powered by <a href="https://greenwebbtech.com" target="_blank" style="color:green;">Green</a><a href="https://greenwebbtech.com" style="color:#919191;">webb</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End single footer widget-->

                <!--Start single footer widget-->
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="single-footer-widget marbtm50">
                        <div class="footer-widget-contact-info">    
                            <ul>
                                <li>
                                    <h3>
                                        <!-- 1st Phone -->
                                        <a href="tel:{{App\Models\ContactSetting::customer_care_line()}}">{{ App\Models\ContactSetting::customer_care_line() }}</a>
                                    </h3>
                                    <p>Customer Care</p>
                                </li>
                                <li>
                                    <h3>{{App\Models\ContactSetting::work_days()}}: {{App\Models\ContactSetting::work_hours()}}</h3>
                                    <p>Working Hours</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End single footer widget-->

                <!--Start single footer widget-->
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="single-footer-widget">
                        <div class="single-footer-widget-right-colum">
                            <ul>
                                <li>
                                    <a href="#" title="Comming Soon">
                                        Download Forms
                                        <span class="icon-download"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">
                                        Register Your Complaint
                                        <span class="icon-feedback"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End single footer widget-->

            </div>
        </div>
    </div>
    <!--End Footer-->

    <div class="footer-bottom">
        <div class="container">
            <div class="bottom-inner">
                <div class="footer-menu">
                    <ul>
                        <li><a href="#">Disclaimer</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Online Security Tips</a></li>
                    </ul>
                </div>
                <div class="footer-social-link">
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

</footer>
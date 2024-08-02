<header class="main-header main-header-style1" style="margin-bottom: -2%">
    <div class="main-header-style1-top">
        <div class="auto-container">
            <div class="outer-box">
                <!--Start Main Header Style1 Top Left-->
                <div class="main-header-style1-top__left">
                    <div class="looking-banking-box ">
                        <div class="inner-title">
                            <span class="icon-binoculars"></span>
                            <p>Looking</p>
                        </div>
                        <div class="select-box clearfix">
                            <select class="wide">
                                <option data-display="Personal Financing">
                                    Personal Financing
                                </option>
                                <option value="1">Business Financing</option>
                               
                            </select>
                        </div>
                    </div>
                    <div class="nearest-branch">
                        {{-- <span class="icon-map"></span> --}}
                        {{-- <a href="#">Find Nearest Branch</a> --}}
                    </div>
                </div>
                <!--End Main Header Style1 Top Left-->
    
                <!--Start Main Header Style1 Top Right-->
                <div class="main-header-style1-top__right">
                    <div class="header-menu-style1">
                        <ul>
                            {{-- <li><a href="{{ route('about.careers') }}">Careers</a></li>
                            <li><a href="{{ route('faq') }}">Faq’s</a></li> --}}
                            {{-- <li><a href="#">Offers</a></li> --}}
                            {{-- <li><a href="#">Calendar</a></li> --}}
                        </ul>
                    </div>
                    {{-- <div class="box-search-style1">
                        <a href="#" class="search-toggler">
                            <span class="icon-search"></span>
                            Search
                        </a>
                    </div> --}}
                    <div>
                        <div>
                            @auth
                            <a class="style2 btn-box" href="{{ route('dashboard') }}">
                                <span class="icon-payment"></span>
                                <span>Dashboard</span>
                            </a>
                            @else 
                            <a href="{{ route('login') }}">
                                <span class="icon-home-button"></span>
                                <span>Login</span>
                            </a>
                            &nbsp;
                            <a style="align-items: center" class="style2" href="{{ route('register') }}">
                                <span class="icon-payment"></span>
                                <span>Open an Account</span>
                            </a>
                            @endauth
                            {{-- <form action="#">
                                <select id="polyglot-language-options">
                                    <option id="en" value="en" selected>English</option>
                                    <option id="fr" value="fr">French</option>
                                    <option id="de" value="de">German</option>
                                    <option id="it" value="it">Italian</option>
                                    <option id="es" value="es">Spanish</option>
                                </select>
                            </form> --}}
                        </div>
                    </div>
                </div>
                <!--End Main Header Style1 Top Right-->
    
            </div>
        </div>
    </div>
    <!--End Main Header Style1 Top-->
    
    <nav class="main-menu main-menu-style1">
        <div class="main-menu__wrapper clearfix">
            <div class="container">
                <div class="main-menu__wrapper-inner">
                    <div class="main-menu-style1-left">
                        <div class="logo-box-style1">
                            <a href="{{ route('welcome') }}" style="padding-top:4px;padding-bottom:4px">
                                <img width="150" src="{{ asset('public/box/images/resources/logo-11.png') }}" alt="BTF" title="">
                            </a>
                        </div>
    
                        <div class="main-menu-box">
                            <a href="{{ route('welcome')}}" class="mobile-nav__toggler">
                                <i class="icon-menu"></i>
                            </a>
    
                            <ul class="main-menu__list">
                                <li class="megamenu">
                                    <a href="{{ route('welcome') }}">Home</a>
                                   
                                </li>
    
                                <li class="dropdown">
                                    <a href="{{ route('services') }}">Services</a>
                                    <ul>                                    
                                        <li><a href="{{ route('view-personal-loans') }}">Personal Loan</a></li>
                                        <li><a href="{{ route('view-asset-loans') }}">Asset Finance Loan</a></li>
                                        <li><a href="{{ route('view-vehicle-loans') }}">Vehicle Financing Loan</a></li>
                                        <li><a href="{{ route('view-educational-loans') }}">Education Loan</a></li>
                                        <li><a href="{{ route('view-home-loans') }}">Home Improvement Loan</a></li>
                                        <li><a href="{{ route('view-sme-loans') }}">Agri Business Loan</a></li>
                                        <li><a href="{{ route('view-wib-loans')}}">Women in Business (Femiprise) Soft Loan</a></li>
                                    </ul>
                                        
                                  
                                </li>
    
                                <li class="dropdown">
                                    <a href="#">About</a>
                                    <ul>
                                        <li><a href="{{ route('about.us') }}">About Us</a></li>
                                        {{-- <li><a href="{{ route('about.team') }}">Our Team</a></li> --}}
                                        <li><a href="{{ route('about.careers') }}">Careers</a></li>
                                        
                                    </ul>
                                </li>
                                
                                <li>
                                <a href="{{ route('faq') }}">Faq’s</a>
                                </li>
    
                                <li>
                                    <a href="{{ route('contact') }}">Get In Touch</a>
                                </li>
                            </ul>
                        </div>
                    </div>
    
                    <div class="main-menu-style1-right">
                        <div class="header-btn-one">
                            {{-- <a href="#">
                                <span class="icon-home-button"></span>Login
                            </a> --}}
                            <a class="style2" href="{{ route('contact') }}">
                                <span class="icon-user"></span>Inquiry
                            </a>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </nav>
    
    <!--Start Main Header Style1 Bottom-->
    <div class="main-header-style1-bottom">
        <div class="auto-container">
            <div class="outer-box">
                <div class="update-box">
                    <div class="inner-title">
                        <span class="icon-megaphone"></span>
                        <h4>Updates:</h4>
                    </div>
                    <div class="text">
                        <p>Get low interest rates on your first loan application with Bridge Trust Finance.</p>
                        {{-- <a href="#"><span class="icon-chevron"></span>More Details</a> --}}
                    </div>
                </div>
                <div class="slogan-box">
                    <p>Dear Customer, We have launched Video KYC facility for New customer to open savings ac
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>
{{-- <div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div> --}}
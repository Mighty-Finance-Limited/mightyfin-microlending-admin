<style>
    @media (max-width:3000px) {
        .hidate {
            display: none !important;           
            *display: inline;
            right: 15px;
            top: -30px;
            position: absolute;
        }
    }
   
    @media (max-width:768px) {
        .hidate {
            display: block !important;           
            *display: inline;
            right: 15px;
            top: -30px;
            position: absolute;
        }
    }
</style>


<div class="header-standard header">
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-6 col-6">
                    <div class="logo"> <a href="{{ route('welcome') }}"> <img src="{{ asset('public/web/images/logo.png') }}" alt=""> </a> </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-9 col-sm-12 col-12">
                    <div class="quick-info"> 
                        <span class="mr10">
                            Call: <a href="tel:+260950082577">+260950082577</a>
                        </span> 
                        <span class="mr10">
                            Or: <a href="tel:+260950081545">+260950081545</a>
                        </span> 
                        <span class="mr10"><a href="#location"></a></span> 
                        @auth
                        <span>
                            <a href="{{ route('dashboard') }}" class="btn btn-default btn-sm">
                                <em style="margin-right: 6px;" class="fa fa-user"></em>Dashboard
                            </a>
                        </span>
                        @else
                        <span>
                            <a href="{{ route('login') }}" class="btn btn-default btn-sm">
                                <em style="margin-right: 6px;" class="fa fa-user"></em>Login
                            </a>
                        </span>
                        <span>
                            <a href="{{ route('register') }}" class="btn btn-default btn-sm">
                                <em style="margin-right: 6px;" class="fa fa-user"></em>Sign Up
                            </a>
                        </span> 
                        @endauth
                       
                    </span> 
                </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div style="background-image: linear-gradient(to right, #792db8, #912d73);" class="bg-light-blue">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div id="navigation">
                        <ul id="menu-primary" class="menu">
                            <li id="menu-item-845" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-845"><a id="home" href="{{ route('welcome') }}">Home</a> </li>
                            <li id="menu-item-625" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-625"><a id="about" href="{{ route('about.us') }}">About Us</a> </li>
                            <li id="menu-item-630" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-630"><a id="products" href="{{ route('services') }}">Products</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-816" class="menu-item menu-item-type-post_type menu-item-object-loan menu-item-816"><a id="personal" href="{{ route('bridging') }}">Business Funding</a></li>
                                    <li id="menu-item-818" class="menu-item menu-item-type-post_type menu-item-object-loan menu-item-818"><a id="sme" href="{{ route('credit') }}">Payday Loans</a></li>
                                    <li id="menu-item-818" class="menu-item menu-item-type-post_type menu-item-object-loan menu-item-818"><a id="business" href="{{ route('equipment') }}">Women Financing</a></li>
                                    
                                </ul>
                            </li>
                            <li id="menu-item-636" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-636"><a id="faq" href="{{ route('faq') }}">Faq</a></li>
                            <li id="menu-item-1418" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1418"><a id="contact" href="{{ route('contact') }}">Contact US</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section>

    <div style="background: url(public/web/images/slider-5.jpg) no-repeat; background-size: auto; background-size: cover; padding-top: 80px; padding-bottom: 80px;" class="lead-hero-wrapper">
        <div class="container">

            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                    <!-- hero-caption -->
                    <div class="lead-hero-caption">
                        <h1 class="lead-hero-title">Get your loan today!</h1>
                        <p>With a wide selection of packages to meet your various financial needs. </p>
                        <p class="lead mb0 text-white">Apply For <strong class="text-white">K10,000 to K2 million</strong></p>
                        <span>(Minimum loan amount k10000)</span>
                        <div class="rating-list">
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star-half"></i></span>
                            <span class="text-white">4.5 / 5 (15 Reviews)</span>
                        </div>
                        <br>
                        <br>
                        <p>
                            Our mission is to serve the 10 million small and medium sized business who are unable to gain access to the funds necessary
                            to grow their business. We are driven to leverage our automated underwriting and credit assessment tools to create a more
                            financially equitable Africa.
                        </p>
                    </div>
                    <!-- /.hero-caption -->
                </div>

                <div class="offset-xl-1 col-xl-6 offset-lg-1 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-12 col-lg-offset-3 form-box">
                    <form role="form"  action="{{ route("loan-request") }}" method="POST" id="form_calculater" class="f1">
                        @csrf
                        <div id="form_one" class="lead-calculator pinside40">
                            <h2 class="text-white mb20">Get a Loan Today</h2>
                            <p>Fill in the form to get instant access</p>
                            <div class="f1-steps">
                                <div class="f1-progress">
                                    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                                </div>
                                <div class="f1-step active">
                                    <div class="f1-step-icon"><i style="margin-left: 34%;" class="fa fa-info-circle"></i></div>
                                    <p>Details</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i style="margin-left: 34%;" class="fa fa-solid fa-calendar"></i></div>
                                    <p>Duration</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i style="margin-left: 34%;" class="fa fa-user"></i></div>
                                    <p>About You</p>
                                </div>

                            </div> <br> <br>
                        
                            <fieldset>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb10">
                                    <br>
                                    <div class="slider">
                                        <h4 class="text-white">Loan Amount</h4>
                                        <div style="margin-bottom: -60px;" id="pricipal-slide"><input value="1" oninput="this.nextElementSibling.value = this.value" onclick="checker()" step="50" type="range" min="10000" max="2000000" style="width:100%; height: 5px;" id="slidatious" title="Slide for amount">
                                            <input id="update_side" oninput="checker()" step="50" value="10000" min="10000" max="2000000" style="outline: none;border-top-style: hidden; border-right-style: hidden; border-left-style: hidden; border-bottom-style: hidden; background-color: #792db8; display: block; font-size: 20px;font-weight: bold;color: #fff;text-align: center;margin: 15px 0;width: 100%;" class="output" type="number">
                                            <output></output>
                                        </div>
                                        <div>
                                            <h6 id="pricipal" class="text-white"></h6>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="slider">
                                        <h4 class="text-white">Loan type</h4>

                                        <div class="form-group col-lg-12">
                                            <label style="width: 60vw;min-width: 360px;" class="radio-inline">
                                                <input  id="smp" value="personal" type="radio" onclick="checker()" name="package"><span class="design"></span>
                                                <span class="text">personal</span>
                                            </label>
                                            <label style="width: 60vw;min-width: 360px;" class="radio-inline">
                                                <input value="sml" type="radio" onclick="checker()" id="sml" name="package"><span class="design"></span>
                                                <span class="text">Small Business</span>
                                            </label><label style="width: 60vw;min-width: 360px;" class="radio-inline">
                                                <input value="sme" type="radio" onclick="checker()" id="sme" name="package"><span class="design"></span>
                                                <span class="text">Small-Medium <br>Enterprise businesses</span>
                                            </label>
                                            <div style="left:-14px;" class="input-group">
                                                <div id="dvPassport" style="display: none" class="slider">
                                                    <br>
                                                    <h4 class="text-white">Personal Loan</h4>
                                                    <radio>
                                                        <label class="radio-inline">
                                                            <input type="radio" onclick="checker()" id="salary_advance" name="package_personal" value="salary_advance"><span class="design"></span>
                                                            <span class="text">Salary Advance</span>
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" onclick="checker()" id="collateral" value="collateral" name="package_personal"><span class="design"></span>
                                                            <span class="text">Collateral Loan</span>
                                                        </label>
                                                    </radio>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="totalyear-slide"></div>
                                        <div>
                                            <h6 id="totalyear" class="text-white"></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next btn-default apply">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div id="duration" style="display:block;" class="slider">
                                    <h5 class="text-white">Duration</h5>
                                    <h4 id="time_frame" class="text-white"></h4>
                                    <div style="margin-bottom: -60px;" id="pricipal-slide"><input onclick="checker()" oninput="this.nextElementSibling.value = this.value" type="range" value="0" min="1" max="30" style="width:100%; height: 5px;" id="slidate" title="Slide for amount">
                                        <input required onclick="checker()" style="outline: none;border-top-style: hidden; border-right-style: hidden; border-left-style: hidden; border-bottom-style: hidden; background-color: #792db8;  display: block; font-size: 30px; font-weight: bold; color: #fff; text-align: center; margin: 20px 0; width: 100%;" class="output" value="1" id="time_duration" min="1" max="100" type="number"><output></output>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="single-total">
                                            <h5 class="lead-cal-small-text">Amount</h5>
                                            <h4 id="amountatious" class="text-white emi-price">0</h4>
                                            <h4 id="rl_zmw" class="text-white">ZMW</h4>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <div class="single-total">
                                            <h5 class="lead-cal-small-text">Duration</h5>
                                            <h4 id="result_duration" class="text-white">0</h4>
                                            <h4 id="rl_duration" class="text-white"></h4>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
                                        <div class="single-total">
                                            <h5 class="lead-cal-small-text">Repayment</h5>
                                            <h4 id="result_payment" class="text-white">0</h4>
                                            <h4 id="rl_zmww" class="text-white">ZMW</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <h4 class="text-white">About you.</h4>
                                    <radio>
                                        <label style="width: 60vw;min-width: 360px;" class="radio-inline">
                                            <input value="new_c" type="radio" onclick="national()" id="new_c" name="customer_type"><span class="design"></span><span class="text">New Customer</span>
                                        </label><label style="width: 60vw;min-width: 360px;" class="radio-inline">
                                            <input value="old_c" type="radio" onclick="national()" id="old_c" name="customer_type"><span class="design"></span><span class="text">Returning Customer</span>
                                        </label>
                                    </radio>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-light text-primary btn-previous">Previous</button>
                                    <button  type="button" class="btn btn-default btn-next apply">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb10">
                                    <h2 class="text-white mb20">Tell us about you</h2>
                                    <div class="slider">
                                        <h4 class="text-white">AGE</h4>
                                        <div style="margin-bottom: -60px;" id="age-slide"><input value="1" oninput="this.nextElementSibling.value = this.value" type="range" min="20" max="90" style="width:100%; height: 5px;" id="slider_age" title="Slide for amount">
                                            <input id="update_age" min="20" max="90" value="20" style="outline: none;border-top-style: hidden; border-right-style: hidden; border-left-style: hidden; border-bottom-style: hidden; background-color: #792db8; display: block; font-size: 20px;font-weight: bold;color: #fff;text-align: center;margin: 15px 0;width: 100%;" class="output" type="number">
                                            <output></output>
                                        </div>
                                        <div>
                                            <h6 id="pricipal" class="text-white"></h6>
                                        </div>
                                    </div>
                                    <div class="slider">
                                        <div class="form-group col-lg-12">

                                            <div style="left: -14px;" class="input-group">

                                                <div class="slider">
                                                    <br>

                                                    <radio>
                                                        <h4 class="text-white"></h4>
                                                        <label class="input-group">First Name
                                                            <input required style="outline: none; border-top-style: hidden;border-right-style: hidden;border-left-style: hidden;background-color: #792db8;display: block;color: #fff;width: 100%;height: 1.5rem" type="text" id="fname" name="name" placeholder="first name">
                                                        </label>
                                                    </radio>
                                                    <h4 class="text-white"></h4>
                                                    <label class="input-group">Last Name
                                                        <input required style="outline: none; border-top-style: hidden;border-right-style: hidden;border-left-style: hidden;background-color: #792db8;display: block;color: #fff;width: 100%;height: 1.5rem" type="text" id="lname" name="lname" placeholder="last name">
                                                    </label>
                                                    </radio>
                                                    <h4 class="text-white"></h4>
                                                    <label class="input-group">Mobile Number
                                                        <input required style="outline: none; border-top-style: hidden;border-right-style: hidden;border-left-style: hidden;background-color: #792db8;display: block;color: #fff;width: 100%;height: 1.5rem" type="tel" minlength="10" maxlength="10" id="phone" name="phone" placeholder="+260">
                                                    </label>
                                                    </radio>
                                                </div>


                                            </div>

                                        </div>

                                        <div class="slider">
                                            <div _ngcontent-c3="" class="col-xs-8 col-xs-offset-2">
                                                <h4 class="text-white">Are you Zambian</h4>
                                                <div style="width: 50%;float: left;">
                                                    <label style="width: 60vw;min-width: 360px;" class="radio-inline">
                                                        <input value="zambian" type="radio" onclick="national()" id="zed" name="nationality"><span class="design"></span>
                                                        <span class="text">Yes</span>
                                                    </label>
                                                </div>
                                                <div style="width: 50%;float: right;"><label style="width: 60vw;min-width: 360px;" class="radio-inline">
                                                        <input value="not_zambian" type="radio" onclick="national()" id="not_zed" name="nationality"><span class="design"></span>
                                                        <span class="text">No</span>
                                                    </label>
                                                </div>
                                                </radio>

                                            </div>
                                        </div>

                                    </div>
                                    <div id="totalyear-slide"></div>
                                    <div>
                                        <h6 id="totalyear" class="text-white"></h6>
                                    </div>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn text-primary btn-light btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-default btn-submit">Submit</button>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
                   
            </div>
        </div>
    </div>
    </div>
</section>


<section style="background-image: linear-gradient(to right, #792db8, #912d73);" class="wpb_row vc_row-fluid vc_custom_1530004785850 vc_row-has-fill">
    <div class="container">
        <div class="row">
            <div class="overlay-section wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper ">
                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper">
                                                <div class="card card-body pinside30">
                                                    <h2 style="text-align: center;">SME Loan</h2>
                                                    <ul>
                                                        <li>Credit Facility</li>
                                                        <li>Equipment Finance</li>
                                                        <li>Inventory Finance</li>
                                                        <li>Refinancing</li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper">
                                                <div class="card card-body pinside30">
                                                    <h2 style="text-align: center;">Personal Loan</h2>
                                                    <p style="text-align: center;">We offer collateral and MOU baked loans. We also lend to Civil Servants using PMEC system.</p>
                                                    <p>&nbsp;</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper">
                                                <div class="card card-body pinside30">
                                                    <h2 style="text-align: center;">MFS Women</h2>
                                                    <p style="text-align: center;">We are fostering digital financial inclusion for women owned and women led businesses to empower them through working capital loans.</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper ">

                        <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1530005276251">

                            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12 ">
                                <div class="mb60 text-center section-title">
                                    <h1 class="text-white">Mighty Finance Solution</h1>
                                    <p class="lead text-white">more secure text and more. </p>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-3">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="mb30">
                                            <div class="mb20"><i class="fa fa-shield fa-2x text-white"></i></div>
                                            <h3 class="text-white">Safe &amp; Secure</h3>
                                            <p><span style="color: #fdf7e6;">Your information and transactions are safe and secure with us. Your privacy matters is our priority.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-3">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="mb30">
                                            <div class="mb20"><i class="fa fa-mobile fa-2x text-white"></i></div>
                                            <h3 class="text-white">No hidden costs</h3>
                                            <p><span style="color: #fdf7e6;">We are transparent in our pricing and fees. We always show you the figures upfront.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-3">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="mb30">
                                            <div class="mb20"><i class="fa fa-plane fa-2x text-white"></i></div>
                                            <h3 class="text-white">Transform, grow and expand your business with us today!</h3>
                                            <p><span style="color: #fdf7e6;">easy to access from anywhere in the world</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-3">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="mb30">
                                            <div class="mb20"><i class="fa fa-trophy fa-2x text-white"></i></div>
                                            <h3 class="text-white">Save time for your business.</h3>
                                            <p><span style="color: #fdf7e6;">Reduce manual processing of payments. Join our online family and do grow at the speed of change.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner vc_custom_1530010218309">
                                    <div class="wpb_wrapper"> <a href="#" class="btn btn-default">Apply Now</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="wpb_row vc_row-fluid vc_custom_1530087763104 vc_row-has-fill">
    <div class="container">
        <div class="row">
            <div class="wpb_column vc_column_container vc_col-sm-6">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper ">
                        <div class="mb30">
                            <div class="circle-outline-icon float-left border-primary"><i class="fa fa-map-marker"></i></div>
                            <div class="pdl120">
                                <h3>Branch</h3>
                                <p>locate us easily with emebeded maps</p>
                                <p><a type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn-default-link" href="#">Find the locations</a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wpb_column vc_column_container vc_col-sm-6">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper ">
                        <div class="mb30">
                            <div class="circle-outline-icon float-left border-primary"><i class="fa fa-life-ring"></i></div>
                            <div class="pdl120">
                                <h3>Need Help ?</h3>


                                <p>Get in Touch with as we work constantly to help you</p>
                                <p><a type="button" data-toggle="modal" data-target="#exampleModalCenter2" class="btn-default-link" href="contact-us.php">Get in Touch</a></p>
                            </div>
                            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Instantly Get Intouch</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- AppointmentThing.com widget (begin) -->
                                            <div class="apptthingemb" data-appt-url="georgemunganga" data-appt-types="mQ15416" data-page-text="000000" data-page-link="0f5cff" data-page-details="false" data-emb-num="1" style="width:100%;"><a href="https://appointmentthing.com" title="Appointment Scheduling">Appointment Scheduling</a></div>
                                            <link rel="stylesheet" href="https://appointmentthing.com/css/meeting.embed.t1.css" type="text/css" media="all" />
                                            <script src="https://appointmentthing.com/js/meeting.embed.t1.init.js" type="text/javascript" async defer></script>
                                            <!-- AppointmentThing.com widget (end) -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!--<button type="button" class="btn btn-primary">Make appointment</button>-->
                                        </div>
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



<section class="wpb_row vc_row-fluid vc_custom_1505988686666 vc_row-has-fill">
    <div class="container">
        <div class="row">
            <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-md-offset-2 vc_col-md-8">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper ">
                        <br>
                        <h1 class="" style="text-align: center;"> Features</h1>

                    </div>
                </div>
            </div>
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="200">
                        <div class="wpb_column vc_column_container vc_col-sm-4">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper ">
                                    <div class="feature feature-bg " style="Height : 535px;">
                                        <div class="feature-icon"><i class="fa fa-bolt"></i></div>
                                        <div class="feature-content">
                                            <h3>Access</h3>
                                            <p>
                                            <ul style="list-style-type: disc;">
                                                <li>Quick application.</li>
                                                <li>Enhanced price transparency.</li>
                                                <li>minimal to nil paperwork.</li>
                                            </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-4">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper ">
                                    <div class="feature feature-bg " style="Height : 535px;">
                                        <div class="feature-icon"><i class="fa fa-refresh"></i></div>
                                        <div class="feature-content">
                                            <h3>Unique Credit Scoring Model</h3>
                                            <p>
                                            <ul style="list-style-type: disc;">
                                                <li>Decision based on risk-adjusted assessing model.</li>
                                                <li>Holistic decision engine backed by predefined algorithms.</li>
                                            </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-4">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper ">
                                    <div class="feature feature-bg ">
                                        <div class="feature-icon"><i class="fa fa-glass"></i></div>
                                        <div class="feature-content">
                                            <h3>Build Your Credit Rating</h3>
                                            <p>
                                            <ul style="list-style-type: disc;">
                                                <li>Use historical data to profitably serve the 'unbanked'.</li>
                                                <li>We use your credit score generated with us to offer on demand finance with a pay later facility.</li>
                                            </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-interval="20000">
                        <div class="wpb_column vc_column_container vc_col-sm-4">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper ">
                                    <div class="feature feature-bg " style="Height : 535px;">
                                        <div class="feature-icon"><i class="fa fa-bolt"></i></div>
                                        <div class="feature-content">
                                            <h3>Quick Approval</h3>
                                            <p>quick loan approval, typically within 24 hrs. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-4">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper ">
                                    <div class="feature feature-bg " style="Height : 535px;">
                                        <div class="feature-icon"><i class="fa fa-refresh"></i></div>
                                        <div class="feature-content">
                                            <h3>Bank Statement Analytics & Insights</h3>
                                            <p>Leverages machine learning to analyse our customers banking data,
                                                giving key insights around business cash flow, healthiness, and creditworthiness.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-4">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper ">
                                    <div class="feature feature-bg " style="Height : 535px;">
                                        <div class="feature-icon"><i class="fa fa-bolt"></i></div>
                                        <div class="feature-content">
                                            <h3> Crisis Management Focus</h3>
                                            <p>We offer rescheduling and re-amortization on a case by case basis during a crisis</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev" style="border: none; opacity: .6; height:10%; width:6%; margin-top: 265px;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next" style="border: none;opacity: .6;height:10%; width:6%; margin-top: 265px;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>
<br>

<section class="wpb_row vc_row-fluid vc_custom_1531470251213 vc_row-has-fill">
    <div class="container">
        <div class="row">
            <div class="wpb_column vc_column_container vc_col-sm-6">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper ">
                        <h1 class="vc_custom_1530094781861">Apply online within minutes!
                            The MFS APP has your application status, records, and products handy for you on the go!</h1>
                        <div class="wpb_text_column wpb_content_element vc_custom_1531470973815">
                            <div class="wpb_wrapper">
                                <p><a class="mr20" href="#"><img class="alignnone size-full wp-image-1438" src="images/app-store-img.png" alt="" width="170" height="50" /></a> <a class="mr20" href="#"><img class="alignnone size-medium wp-image-1439" src="images/google-play-img.png" alt="" width="170" height="50" /></a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include  'public/web/components/footer.php'; ?>
{{-- Map Loacation Modal --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Our Map Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                            <div class="map"><iframe class="col-md-12 col-sm-12 col-xs-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3846.0141841104164!2d28.278905714850225!3d-15.429785789278693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1940f343efb77c19%3A0xb2411d43bd35321!2sCarousel%20Shopping%20Centre!5e0!3m2!1sen!2szm!4v1614260788043!5m2!1sen!2szm" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Loan Request Summary Modal --}}
<div style="background: #7e25bb6b;" class="modal fade" id="calc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                       <h5 style="text-align:center;">Loan Summary</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="parent text-center ">
         <div class="mb40"><i class="icon-calendar-3 icon-2x icon-default"></i></div>
         <h2 class="capital-title">Apply For Loan</h2>
         <ul>
                <li>Amount: K <t id="result_amount"></t>
                </li>
                <li>Name: <t id="res_namee"></t>
                </li>
                <li>Loan package: <t id="loant"></t>
                </li>
                <li>Age: <t id="agely"></t>
                </li>
                <li>mobile: <t id="mobily"></t>
                </li>
                <li>Duration: <t id="duration_returns"></t>
                </li>
                <li>Returning: <t id="returns"></t>
                </li>
            </ul>
     </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="send()" class="btn btn-primary" data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>



<a id="to-the-top"><i class="fa fa-angle-up"></i></a>
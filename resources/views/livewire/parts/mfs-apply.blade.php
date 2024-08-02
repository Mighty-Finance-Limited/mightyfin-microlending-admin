<style>
    .input-group {
        position: relative;
        margin-bottom: 0px;
    }

    /* .input-group input {
    width: 100%;
    height: 2rem;
    padding: 0.5rem;
    border-radius: 4px;
    background-color: #792db8;
    color: #fff;
    outline: none;
    transition: background-color 0.3s ease, border 0.3s ease;
} */

    /* .input-group input:focus {
    background-color: #8344a9;
    border: 1px solid #fff;
} */

    .text-white {
        color: #fff;
    }

    /* Optional: Add a border for separation */
    .input-group input {
        border: 1px solid #fff;
    }

    .mobile-input-group {
        display: flex;
        align-items: center;
    }

    .prefix {
        width: 30% !important;
        /* Adjust the width as needed */
        padding: 0.8rem;
        border: 1px solid rgb(122, 88, 88);
        border-radius: 0px;
        background-color: rgb(64, 27, 92);
        color: #c0c0c0;
    }

    .input-group input {
        flex-grow: 1;
        width: 100%;
        height: 3rem;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 0px;
        background-color: #fff;
        color: #333;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .input-group input:focus {
        border-color: #ffc00e;
        /* Adjust the focus border color */
    }


    .custom-select-wrapper {
        position: relative;
        display: inline-block;
    }


    .prefix::-ms-expand {
        display: none;
    }

    .prefix option {
        padding: 10px;
        background-image: url('https://www.indexmundi.com/flags/za-lgflag.gif');
        background-size: 20px 15px;
        /* Adjust the size as needed */
        background-position: 10px center;
        background-repeat: no-repeat;
    }

    /*icons*/


    .wrapper {
        /* height: 50vh; */
        display: flex;
        align-items: start;
        justify-content: left;
        flex-direction: column;
        margin-bottom: 3rem;
    }


    .radio-buttons {
        width: 100%;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .custom-radio input {
        display: none;
    }

    .radio-buttons .custom-radio {
        margin: 0px !important;
    }

    .radio-btn {
        position: relative;

        width: auto;
        height: auto;
        margin: 0px;
        background-color: #2b152a47;
        border: 4px solid transparent;
        border-radius: 1.2rem;
        cursor: pointer;
    }

    .radio-btn .content {
        padding: 13px;
        display: flex;
        flex-direction: column;
        justify-content: initial;
        align-items: initial;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .radio-btn .profile-img {
        width: 80px;
        height: 80px;
        margin: 20px 0;
        border-radius: 50%;
        overflow: hidden;
    }

    .radio-btn .profile-img img {
        width: 100%;
        height: 100%;
        user-select: none;
    }

    .radio-btn h2 {
        color: #ffffff;
        margin-bottom: 0px;
        font-size: 14px;
        font-weight: 700;
        text-transform: capitalize;
    }

    .radio-btn .skill {
        display: inline-block;
        margin-bottom: 4px;
        color: #ffffff;
        font-size: 14px;
        text-transform: capitalize;
    }

    .radio-btn .check-icon {
        width: 17px;
        height: 17px;
        background-color: #1b1d28;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: absolute;
        right: 15%;
    }

    .radio-btn .check-icon .icon {
        display: inline-block;
        position: relative;
        width: 9px;
        height: 5px;
        margin-top: -2px;
        transform: rotate(-40deg);
    }

    .radio-btn .check-icon .icon::before {
        content: "";
        width: 2px;
        height: 100%;
        background-color: #ffffff;
        position: absolute;
        left: 0;
        bottom: 0;
        border-radius: 10px;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.231);
        transform: scaleY(0);
        transform-origin: top;
        transition: all 0.2s ease-in-out;
    }

    .radio-btn .check-icon .icon::after {
        content: "";
        width: 100%;
        height: 2px;
        background-color: #ffffff;
        position: absolute;
        left: 0;
        bottom: 0;
        border-radius: 10px;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.231);
        transform: scaleX(0);
        transform-origin: left;
        transition: all 0.2s ease-in-out;
        transition-delay: 0.1s;
    }

    .custom-radio input:checked+.radio-btn {
        border: 4px solid #fabe15;
    }

    .custom-radio input:checked+.radio-btn .check-icon {
        background-color: #fabe15;
    }

    .custom-radio input:checked+.radio-btn .check-icon .icon::before,
    .custom-radio input:checked+.radio-btn .check-icon .icon::after {
        transform: scale(1);
    }

    .radio-buttons .add-profile {
        width: 150px;
        height: 150px;
        margin: 10px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .radio-btn img {

        user-select: none;
        max-width: 20%;
    }

    /*sliders*/

    .range {
        display: flex;
        width: 100%x;
    }

    .range__slider {
        width: 100%;
    }

    .range__value {
        width: 35%;
        margin-left: 45px;
        text-align: center;
        border-left: #e6e4e4 1px solid;
    }






    .range__slider label {
        margin-bottom: 10px;
    }

    .range__slider [type="range"] {
        width: 100%;
        -webkit-appearance: none;
        height: 10px;
        border-radius: 6px;
        background: #f1f1f1;
        outline: none;
        padding: 0;
        margin: 0;
    }

    /* custom thumb */



    .range__slider [type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        height: 25px;
        width: 25px;
        background-color: #f9ca24;
        border-radius: 50%;
        border: none;
        transition: .2s ease-in-out;
        -webkit-transition: background .2s ease-in-out;
    }

    .range__slider [type="range"]::-moz-range-thumb {
        height: 20px;
        width: 20px;
        background-color: #f9ca24;
        border-radius: 50%;
        border: none;
        transition: .2s ease-in-out;
        -webkit-transition: background .2s ease-in-out;
    }

    .range__slider [type="range"]::-webkit-slider-thumb:hover {
        box-shadow: 0 0 0 10px rgba(255, 85, 0, .1)
    }

    .range__slider [type="range"]:active::-webkit-slider-thumb {
        box-shadow: 0 0 0 13px rgba(255, 225, 0, 0.1)
    }

    .range__slider [type="range"]:focus::-webkit-slider-thumb {
        box-shadow: 0 0 0 13px rgba(255, 225, 0, 0.1)
    }

    .range__slider [type="range"]::-moz-range-thumb:hover {
        box-shadow: 0 0 0 10px rgba(255, 225, 0, 0.1)
    }

    .range__slider [type="range"]:active::-moz-range-thumb {
        box-shadow: 0 0 0 13px rgba(255, 225, 0, 0.1)
    }

    .range__slider [type="range"]:focus::-moz-range-thumb {
        box-shadow: 0 0 0 13px rgba(255, 225, 0, 0.1)
    }

    /*inputs*/

    .form-control:focus {
        color: #7A7995;
        background-color: #F3F8FE;
        border-color: #f7ff8b50;
        outline: 0;
        box-shadow: 0 0 0 0.25rem #ffe8687d;
    }


    .dash {

        border: dashed 2px rgb(255, 255, 255);
        border-radius: 2.4rem;
    }

    .summary-container p {
        margin: 0 0 6px;
        line-height: 0.9;
        color: #792db8;
        text-align: center !important;
    }

    .tacbox {
        display: block;
        padding: 0em;
        margin: 0em;

        max-width: 800px;
    }

    #terms_conditions {
        height: 2em;
        width: 2em;
        vertical-align: middle;
    }
</style>
<form role="form" action="{{ route('loan-request') }}" method="POST" id="form_calculater" class="f1" novalidate>
    @csrf

    <div id="form_one" class="lead-calculator pinside40">
        <h2 class="text-transform: none; text-white" class="text-white mb20">Pick Your <t style="color: #fabe15;">Loan!
            </t>
        </h2>
        <p>Fill in the form to get instant access</p>
        <div class="col-12 f1-steps">
            <center>
                <div class="f1-progress">
                    <div class="f1-progress-line" data-now-value="20" data-number-of-steps="3" style="width: 20.66%;">
                    </div>
                </div>
                <div class="f1-step active">
                    <div class="f1-step-icon"><i style="margin-left: 0; margin-top: 12.5px;"
                            class="fa-solid fa-circle-info"></i></div>
                    <p>Details</p>
                </div>
                <div class="f1-step">
                    <div class="f1-step-icon"><i style="margin-left: 0; margin-top: 12px;"
                            class="fa-solid fa-calendar"></i></div>
                    <p>Credentials</p>
                </div>
                <div class="f1-step">
                    <div class="f1-step-icon"><i style="margin-left: 0; margin-top: 12px;" class="fa-solid fa-user"></i>
                    </div>
                    <p>Summary</p>
                </div>
            </center>

        </div>

        <fieldset>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb10">

                <div class="slider">
                    <h4 class="text-white">Loan type</h4>
                    <div style="margin-bottom: -50px;" id="pricipal-slide">
                        <div class="wrapper">
                            <div class="radio-buttons">
                                <div id="loan_products" class="row">

                                    <div class="col-6">
                                        <label class="custom-radio" style="opacity: 0.5;">
                                            <input disabled type="radio" name="loan_type" checker() />
                                            <div class="radio-btn">
                                                <div class="content">
                                                    <div class="mb-2">
                                                        <img width="50px"
                                                            src="{{ asset('public/web/images/1.svg') }}" />
                                                    </div>
                                                    <h2>Business Loan</h2>
                                                    <p class="skill">SME (coming soon)</p>
                                                    <span class="check-icon">
                                                        <span class="icon"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>
                    <div>
                        <h6 id="pricipal" class="text-white"></h6>
                    </div>
                </div>

                <div class="slider">
                    <h4 class="text-white">Loan Amount</h4>
                    <div v class="range" style="margin-bottom: -60px;" id="pricipal-slide">

                        <div class="form-group range__slider">
                            <input value="1" oninput="this.nextElementSibling.value = this.value"
                                onclick="checker()" step="50" type="range" min="10000" max="2000000"
                                style="width:100%;" id="slidatious" title="Slide for amount">
                            <input name="amount" id="update_side" oninput="checker()" step="50" value="10000"
                                min="10000" max="2000000"
                                style="outline: none;border-top-style: hidden; border-right-style: hidden; border-left-style: hidden; border-bottom-style: hidden; background-color: #792db8; display: block; font-size: 20px;font-weight: bold;color: #fff;text-align: center;width: 100%; border: 1px #eaff0000 solid;"
                                class="output form-control" type="number">
                            <output></output>
                        </div>
                    </div>
                    <div>
                        <h6 id="pricipal" class="text-white"></h6>
                    </div>
                </div>

                <div id="duration" style="display:block;padding: 0px 0 5px 0;" class="slider">
                    <h4 class="text-white">Duration</h4>
                    <h4 id="time_frame" class="text-white"></h4>
                    <div class="range" style="margin-bottom: -60px;" id="pricipal-slide">
                        <div class="form-group range__slider">
                            {{-- <input type="range" value="0" min="1" max="1" style="width:100%; height: 5px; " id="slidate" title="Slide for amount">
                        <input name="repayment_plan" style="outline: none;border-top-style: hidden; border-right-style: hidden; border-left-style: hidden; border-bottom-style: hidden; background-color: #792db8;  display: block; font-size: 30px; font-weight: bold; color: #fff; text-align: center; margin: 20px 0; width: 100%;" class="output" value="1" id="time_duration" min="1" max="100" type="number">
                        <output></output> --}}

                            <input onclick="checker()" oninput="this.nextElementSibling.value = this.value"
                                type="range" value="0" min="1" max="30" style="width:100%;"
                                id="loan_duration" title="Slide for amount">
                            <input name="repayment_plan" required oninput="checker()"
                                style="outline: none;border-top-style: hidden; border-right-style: hidden; border-left-style: hidden; border-bottom-style: hidden; background-color: #792db8;  display: block; font-size: 30px; font-weight: bold; color: #fff; text-align: center;; width: 100%; border: 1px #f8f8f800 solid;"
                                class="output form-control" value="1" id=   " min="1" max="100"
                                type="number">
                            <output></output>
                            <div>
                            </div>
                        </div>

                    </div>
                    <div class="f1-buttons">
                        <button id="apply" type="button"
                            class="btn btn-next btn-default btn-next ">Next</button>
                    </div>
        </fieldset>



        <fieldset>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb20">
                <br>
                <h4 style="margin-bottom: -25px;" class="text-white mb10">Tell us about you!</h4>

                <div style="padding: 0px;" class="slider">
                    <div style="padding: 0px;" class="form-group col-12">

                        <div class="input-group">

                            <div class="slider">
                                <br>

                                <div style="display: flex; gap:2px;">
                                    <radio>
                                        <h4 class="text-white"></h4>
                                        <label class="input-group">First Name *
                                            <input required type="text" id="fname" name="name"
                                                placeholder="Your first name">
                                        </label>
                                    </radio>

                                    <radio>
                                        <h4 class="text-white"></h4>
                                        <label class="input-group">Last Name *
                                            <input required id="lname" name="lname"
                                                placeholder="Your last name">
                                        </label>
                                    </radio>
                                </div>

                                <radio>

                                    <h4 class="text-white"></h4>
                                    <label class="input-group">Middle Name (optional)
                                        <input id="lname" name="mname" placeholder="Your middle name">
                                    </label>
                                </radio>

                                <radio>
                                    <h4 class="text-white"></h4>
                                    <label class="input-group">Email *
                                        <input required id="email" name="email"
                                            placeholder="Your name@email.com">
                                    </label>
                                </radio>

                                <radio>
                                    <h4 class="text-white"></h4>
                                    <label class="input-group">
                                        <div style=" width: 100%;" class="mobile-input-group">
                                            <select class="prefix" aria-label="Mobile Number Prefix">
                                                <option value="+260">
                                                    <img width="50"
                                                        src="https://www.indexmundi.com/flags/za-lgflag.gif"
                                                        alt="">
                                                    +260
                                                </option>
                                                <!-- Add more options as needed -->
                                            </select>
                                            <input required minlength="10" maxlength="10" id="phone"
                                                name="phone" placeholder="972 -- -- --">
                                        </div>
                                    </label>
                                </radio>
                                {{-- <radio>
                                    <h4 class="text-white"></h4>
                                    <label class="input-group">
                                        <div class="mobile-input-group">
                                            <select class="prefix" aria-label="Mobile Number Prefix">
                                                <option value="+260">+260</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                            <input required minlength="9" maxlength="9" id="phone" name="phone2" placeholder="975 -- -- --">
                                        </div>
                                    </label>
                                </radio> --}}
                            </div>


                        </div>

                    </div>



                </div>

                <div class="f1-buttons">
                    <button type="button" class="btn text-primary btn-light btn-previous">Previous</button>
                    <button type="button" class="btn btn-default btn btn-next">Next</button>
                </div>
            </div>

        </fieldset>

        <fieldset>
            <div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb10">

                    <br>
                    <div class="dash slider" style="padding: 5px;">
                        <div class="col-lg-12" style="margin: 0px; padding-left: 1px; padding: 0px;">
                            <div class="col-lg-12" style="padding: 0px;">

                                <div class="input-group">
                                    <style>
                                        /* Add your custom styles here */


                                        .summary-container {
                                            margin: 0;
                                            padding: 0px;
                                            0 border-radius: 10px;
                                        }

                                        hr {
                                            margin: 20px 0;
                                            border: -1.5px solid #dee2e6;
                                        }
                                    </style>

                                    <div class="slider" style="background: #ffffff; border-radius: 2.4rem;">

                                        <br>
                                        <div class="container">
                                            <div class="summary-container">
                                                <h2 class="text-center">Loan <t style="color: #fabe15;">Summary</t>
                                                </h2>
                                                <br>
                                                <p><strong>Loan Amount:</strong> <span id="loan_amt_lbl"></span> </p>
                                                <hr>

                                                <p><strong>Loan type:</strong> <span id="loan_type_lbl"></span> </p>
                                                <hr>

                                                <p><strong>Tenure (months):</strong> <span id="tenure_lbl"></span> </p>
                                                <hr>

                                                <p><strong>Service Fee:</strong> <span id="service_lbl"></span> </p>
                                                <hr>
                                                <p><strong>Approved Amount:</strong> <span id="approve_amt_lbl"></span> </p>
                                                <hr>
                                                <p><strong>Monthly Installment:</strong> <span id="monthly_inst_lbl"></span> </p>
                                                <hr>
                                                <p><strong>Next Payment:</strong> <span id="nxt_payment_lbl"></span> </p>
                                                <hr>
                                            </div>

                                            <br>
                                        </div>







                                    </div>


                                </div>

                            </div>



                        </div>

                    </div>
                    <br>
                    <div class="tacbox">
                        <input id="terms_conditions" type="checkbox"> I agree to these <a href="#">Terms and
                            Conditions</a>

                    </div> <br>
                    <div class="f1-buttons">
                        <button type="button" class="btn btn-light text-primary btn-previous">Previous</button>
                        <button type="submit" class="btn btn-default btn-submit">Submit</button>
                    </div>
                </div>



        </fieldset>

        <div class="col-12 mt25">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="single-total">
                        <h5 class="lead-cal-small-text">Total Repayment</h5>
                        <h4 id="total_repayment" class="text-white emi-price">2600</h4>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="single-total">
                        <h5 class="lead-cal-small-text">Monthly Repayment</h5>
                        <h4 id="monthly_repayment" class="text-white">K500</h4>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
                    <div class="single-total">
                        <h5 class="lead-cal-small-text">Next Repayment Date</h5>
                        <h4 id="result_payment" class="text-white">31/01/2024</h4>

                    </div>
                </div>

            </div>
        </div>
    </div>

</form>
<!-- Add this to the end of your HTML body or in the head section -->

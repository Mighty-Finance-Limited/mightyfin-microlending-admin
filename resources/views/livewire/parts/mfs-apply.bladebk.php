<style>
.input-group {
  position: relative;
  margin-bottom: 20px;
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
    width: 220px !important; /* Adjust the width as needed */
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
    border-color: #792db8; /* Adjust the focus border color */
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
    background-size: 20px 15px; /* Adjust the size as needed */
    background-position: 10px center;
    background-repeat: no-repeat;
}
</style>
<form role="form"  action="{{ route('loan-request') }}" method="POST" id="form_calculater" class="f1">
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
                        <input name="amount" id="update_side" oninput="checker()" step="50" value="10000" min="10000" max="2000000" style="outline: none;border-top-style: hidden; border-right-style: hidden; border-left-style: hidden; border-bottom-style: hidden; background-color: #792db8; display: block; font-size: 20px;font-weight: bold;color: #fff;text-align: center;margin: 15px 0;width: 100%;" class="output" type="number">
                        <output></output>
                    </div>
                    <div>
                        <h6 id="pricipal" class="text-white"></h6>
                    </div>
                </div>
                <br>
                <div class="slider">
                    <h4 class="text-white">Loan Type</h4>

                    <div class="form-group col-lg-12">
                        <label style="width: 60vw;min-width: 360px;" class="radio-inline">
                            <input  id="smp" value="personal" type="radio" onclick="checker()" name="package"><span class="design"></span>
                            <span class="text">Civil Servant Loan</span>
                        </label>
                        {{-- <label style="width: 60vw;min-width: 360px;" class="radio-inline">
                            <input value="sml" type="radio" onclick="checker()" id="sml" name="package"><span class="design"></span>
                            <span class="text">Small Business</span>
                        </label><label style="width: 60vw;min-width: 360px;" class="radio-inline">
                            <input value="sme" type="radio" onclick="checker()" id="sme" name="package"><span class="design"></span>
                            <span class="text">Small-Medium <br>Enterprise Businesses Loan</span>
                        </label> --}}
                        <div style="left:-14px;" class="input-group">
                            <div id="dvPassport" style="display: none" class="slider">
                                <br>
                                <h4 class="text-white">Civil Servant Loan Type</h4>
                                <radio>
                                    <label class="radio-inline" style="padding-left: 4%">
                                        <input type="radio" onclick="checker()" id="salary_advance" name="package_personal" value="salary_advance"><span class="design"></span>
                                        <span class="text">GRZ Loan</span>
                                    </label>
                                    {{-- <label class="radio-inline">
                                        <input type="radio" onclick="checker()" id="collateral" value="collateral" name="package_personal"><span class="design"></span>
                                        <span class="text">Collateral Loan</span>
                                    </label> --}}
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
                <div style="margin-bottom: -60px;" id="pricipal-slide">
                    {{-- <input type="range" value="0" min="1" max="1" style="width:100%; height: 5px; " id="slidate" title="Slide for amount">
                    <input name="repayment_plan" style="outline: none;border-top-style: hidden; border-right-style: hidden; border-left-style: hidden; border-bottom-style: hidden; background-color: #792db8;  display: block; font-size: 30px; font-weight: bold; color: #fff; text-align: center; margin: 20px 0; width: 100%;" class="output" value="1" id="time_duration" min="1" max="100" type="number">
                    <output></output> --}}
                    <input onclick="checker()" oninput="this.nextElementSibling.value = this.value" type="range" value="0" min="1" max="30" style="width:100%; height: 5px;" id="slidate" title="Slide for amount">
                    <input name="repayment_plan" required onclick="checker()" style="outline: none;border-top-style: hidden; border-right-style: hidden; border-left-style: hidden; border-bottom-style: hidden; background-color: #792db8;  display: block; font-size: 30px; font-weight: bold; color: #fff; text-align: center; margin: 20px 0; width: 100%;" class="output" value="1" id="time_duration" min="1" max="100" type="number">
                    <output></output>
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
            {{-- <div class="form-group col-lg-12">
                <h4 class="text-white">About you.</h4>
                <radio>
                    <label style="width: 60vw;min-width: 360px;" class="radio-inline">
                        <input value="new_c" type="radio" onclick="national()" id="new_c" name="customer_type"><span class="design"></span><span class="text">New Customer</span>
                    </label><label style="width: 60vw;min-width: 360px;" class="radio-inline">
                        <input value="old_c" type="radio" onclick="national()" id="old_c" name="customer_type"><span class="design"></span><span class="text">Returning Customer</span>
                    </label>
                </radio>
            </div> --}}
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

                                <div style="display: flex; gap:2px;">
                                    <radio>
                                        <h4 class="text-white"></h4>
                                        <label class="input-group">First Name
                                            <input required type="text" id="fname" name="name" placeholder="Your first name">
                                        </label>
                                    </radio>

                                    <radio>
                                    <h4 class="text-white"></h4>
                                    <label class="input-group">Last Name
                                        <input required  id="lname" name="lname" placeholder="Your last name">
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
                                <label class="input-group">Email
                                    <input required  id="email" name="email" placeholder="Your name@email.com">
                                </label>
                                </radio>

                                <radio>
                                    <h4 class="text-white"></h4>
                                    <label class="input-group">
                                        <div class="mobile-input-group">
                                            <select class="prefix" aria-label="Mobile Number Prefix">
                                                <option value="+260">
                                                    <img width="50" src="https://www.indexmundi.com/flags/za-lgflag.gif" alt="">
                                                    +260
                                                </option>
                                                <!-- Add more options as needed -->
                                            </select>
                                            <input required minlength="9" maxlength="9" id="phone" name="phone" placeholder="772 -- -- --">
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
<!-- Add this to the end of your HTML body or in the head section -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
      const inputGroups = document.querySelectorAll('.input-group input');

      inputGroups.forEach(input => {
        input.addEventListener('focus', function () {
          input.parentNode.classList.add('focused');
        });

        input.addEventListener('blur', function () {
          if (!input.value.trim()) {
            input.parentNode.classList.remove('focused');
          }
        });

        // Check if the input has value on page load
        if (input.value.trim()) {
          input.parentNode.classList.add('focused');
        }
      });
    });
  </script>

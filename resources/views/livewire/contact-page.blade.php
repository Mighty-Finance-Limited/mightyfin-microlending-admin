<div>
<div class="page-header" style="background:linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), rgba(0, 0, 0, 0.2) url('{{ asset("public/web/images/1images-page-header.jpg") }}') no-repeat center;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb"><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to home page" href="{{ route('welcome') }}" class="home"><span property="name">Home</span></a>
                            <meta property="position" content="1">
                        </span>
                        <li>/</li><span property="itemListElement" typeof="ListItem"><span property="name">Contact us</span>
                            <meta property="position" content="2">
                        </span>
                    </ol>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="bg-white pinside30">
                    <div class="row">
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <h1 class="page-title">Contact us</h1>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="btn-action"> <a href="{{ route('faq') }}" class="btn btn-default">How To Apply</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
<section class="wpb_row vc_row-fluid">
    <div class="container">
        <div class="row">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper " style="background-color: #ffffff ">
                        <div class="wrapper-content pinside40 ">
                            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-8 vc_col-lg-offset-2 vc_col-md-offset-2">
                                    <div class="vc_column-inner vc_custom_1482134244533">
                                        <div class="wpb_wrapper">
                                            <h1 class="" style="text-align: center;"> Get In Touch</h1>
                                            <div class="wpb_text_column wpb_content_element vc_custom_1482134248944">
                                                <div class="wpb_wrapper">
                                                    <p style="text-align: center;">Reach out to us &amp; we will respond as soon as we can.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner vc_custom_1482134684269">
                                        <div class="wpb_wrapper">
                                            <div role="form" class="wpcf7" id="wpcf7-f266-p264-o1" lang="en-US" dir="ltr">
                                                <div class="screen-reader-response">
                                                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                    <ul></ul>
                                                </div>
                                                <form id="contact_form" class="wpcf7-form init" data-status="init">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                                            <div class="form-group"><label class="sr-only control-label" for="name">name</label><span class="wpcf7-form-control-wrap names"><input required type="text" wire:model="first_name" name="first_name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control input-md" id="first_name" aria-required="true" aria-invalid="false" placeholder="First Name"></span></div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                                            <div class="form-group"><label class="sr-only control-label" for="name">Last Name</label><span class="wpcf7-form-control-wrap names"><input required type="text" wire:model="last_name" name="last_name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control input-md" id="last_name" aria-required="true" aria-invalid="false" placeholder="Last Name"></span></div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                                            <div class="form-group"><label class="sr-only control-label" for="email">Email</label><span class="wpcf7-form-control-wrap email"><input required type="email" wire:model="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control input-md" id="email" aria-required="true" aria-invalid="false" placeholder="Email"></span></div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                                            <div class="form-group"><label class="sr-only control-label" for="phone">Phone</label><span class="wpcf7-form-control-wrap phone"><input required type="tel" wire:model="phone" name="phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control input-md" id="phone" aria-required="true" aria-invalid="false" placeholder="Phone"></span></div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                                            <div class="form-group"><label class="sr-only control-label" for="purpose">Purpose</label><span class="wpcf7-form-control-wrap purpose"><select id="purpose" wire:model="subject" name="purpose" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required wide form-control" aria-required="true" aria-invalid="false">
                                                                        <option disabled selected>Select Topic</option>
                                                                        <option value="Complaint">Complaint</option>
                                                                        <option value="Enquiry">Enquire</option>
                                                                        <option value="Other">Other</option>
                                                                    </select></span></div>
                                                        </div>
                                                        <div class="col-md-12 col-xs-12">
                                                            <div class="form-group"><label class="control-label" for="message"> </label><br><span class="wpcf7-form-control-wrap message"><textarea name="message" wire:model="message" cols="40" rows="7" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" id="message" aria-required="true" aria-invalid="false" placeholder="Message"></textarea></span></div>
                                                        </div>
                                                        <div class="col-md-12 col-xs-12">
                                                            <button class="wpcf7-form-control wpcf7-submit btn btn-default" wire:click.prevent="send()" wire:loading.attr="disabled" :disabled="isDisabled">
                                                                
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
                                                    <div class="wpcf7-response-output" aria-hidden="true"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner vc_custom_1482134711588">
                                        <div class="wpb_wrapper">
                                            <h1 class="" style=""> We are here to help you </h1>
                                            <div class="wpb_text_column wpb_content_element vc_custom_1482134706402">
                                                <div class="wpb_wrapper">
                                                    <p class="lead">Contact us at any time and we will be there to help you.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                    <div class="vc_column-inner vc_custom_1482134795637">
                                        <div class="wpb_wrapper">
                                            <div class="bg-white bg-boxshadow pinside40 outline text-center mb30">
                                                <div class="mb40"><i class="icon-briefcase icon-2x icon-default"></i></div>
                                                <h2 class="capital-title">Branch Office</h2>
                                                <p>House no 13, Chikuni Road, Off Makishi Rd, Northmead,<br>Lusaka, Zambia.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                    <div class="vc_column-inner vc_custom_1482134803127">
                                        <div class="wpb_wrapper">
                                            <div class="bg-white bg-boxshadow pinside40 outline text-center mb30">
                                                <div class="mb40"><i class=" icon-phone-call icon-2x icon-default"></i></div>
                                                <h2 class="capital-title">Call us at</h2>
                                                <h1 class="text-big"><a href="tel:+260950082577">+260950082577</a></h1>OR
                                                <h1 class="text-big"><a href="tel:+260950081545">+260950081545</a></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="bg-white bg-boxshadow pinside40 outline text-center mb30">
                                                <div class="mb40"><i class="icon-letter icon-2x icon-default"></i></div>
                                                <h2 class="capital-title">Email Address</h2>
                                                <p><a href="mailto:info@mightyfinance.co.zm">info@mightyfinance.co.zm</a></p>
                                                <p><a href="mailto: admin@mightyfinance.co.zm">admin@mightyfinance.co.zm</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="map"><iframe class="col-md-12 col-sm-12 col-xs-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3846.0141841104164!2d28.278905714850225!3d-15.429785789278693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1940f343efb77c19%3A0xb2411d43bd35321!2sCarousel%20Shopping%20Centre!5e0!3m2!1sen!2szm!4v1614260788043!5m2!1sen!2szm" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
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
</div>
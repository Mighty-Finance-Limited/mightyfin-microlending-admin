<!--Start breadcrumb area-->
<section class="breadcrumb-area">
    <div class="breadcrumb-area-bg"
    style="background-image: url('{{ asset("public/box/images/careers-1.jpg") }}');"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content">
                    <div class="title" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                        <h2>Careers</h2>
                    </div>
                    <div class="breadcrumb-menu" data-aos="fade-left" data-aos-easing="linear"
                        data-aos-duration="500">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Careers</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

<!--Start Intro Style2 Area-->
<section class="intro-style2-area">
    <div class="container">

        <div class="row">
            <div class="col-xl-6">
                <div class="">
                    <div class="inner">
                        <img src="{{ asset('public/box/images/careers-team.jpg') }}" alt="">
                        <div class="shape-1">
                            <img src="assets/images/shapes/intro-style2-img-box-shape-1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="intro-style2-content-box">
                    <div class="sec-title">
                        <h2>Mountains Move<br> for a Determined Team</h2>
                    </div>
                    <div class="text">
                        <p>Looking for a career where you can grow, learn, and make an impact? 
                            Our careers page is the place to be. We're always on the lookout for 
                            talented and passionate individuals to join our team and help us make
                             a difference in the world. Whether you're just starting out or have 
                             years of experience, we offer a variety of opportunities to suit your 
                             skills and interests. From marketing to engineering, finance to customer 
                             service, we have a diverse range of roles that can help you take your 
                             career to the next level. And with a dynamic and supportive work culture, 
                             you'll have the resources you need to thrive. 
                             So what are you waiting for? Check out our careers page now and 
                             find your next big opportunity.</p>
                    </div>
                    <div class="send-resume-box">
                        <div class="icon">
                            <span class="icon-cv"></span>
                        </div>
                        <div class="title">
                            <h4><a href="#">Send Resume</a></h4>
                            <h3><a href="mailto:info@templatepath.com">info@bridgetrustfinance.co.zm</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-12">
                <div class="job-list-table-box">

                    <div class="table-outer">
                        <table class="job-list-table">

                            <thead class="header">
                                <tr>
                                    <th>Department</th>
                                    <th>Job Role</th>
                                    <th>Location</th>
                                    <th>Last Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($careers as $career)
                                <tr>
                                    <td class="department">
                                        <h3>{{ $career->dept }}</h3>
                                    </td>
                                    <td class="job-role">
                                        <h3>{{ $career->job_role }}</h3>
                                    </td>
                                    <td class="location">
                                        <p>{{ $career->location }}</p>
                                    </td>
                                    <td class="last-date">
                                        <p>{{ $career->last_date }}</p>
                                    </td>
                                    <td>
                                        <div class="btn-box">
                                            <a class="btn-one" href="mailto:{{App\Models\ContactSetting::contact_us_email()}}">
                                                <span class="txt">Apply</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <p>No positions currently available.</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>


        {{-- <div class="row">
            <div class="col-xl-12">
                <div class="subscribe-box-style1 subscribe-box-style1--style2">
                    <div class="icon">
                        <img src="{{asset('box/images/icon/subscribe-3.png')}}" alt="">
                    </div>
                    <div class="inner-title">
                        <h3>Subscribe us to<br> Recieve Career Updates</h3>
                    </div>
                    <form class="subscribe-form-style1" action="#">
                        <div class="input-box">
                            <input type="email" name="email" placeholder="Email address">
                            <div class="inner-icon">
                                <i class="far fa-envelope-open"></i>
                            </div>
                        </div>
                        <button class="btn-one" type="submit">
                            <span class="txt">Subscribe</span>
                        </button>
                    </form>
                </div>
            </div>
        </div> --}}

    </div>
</section>
<!--End Intro Style2 Area-->

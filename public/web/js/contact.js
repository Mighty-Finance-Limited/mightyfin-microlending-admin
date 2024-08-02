const my_form = document.getElementById("contact_form");
my_form.addEventListener("submit", contact_form);
var loader = document.getElementById("loadery");

function contact_form(e) {
    e.preventDefault();
    loader.style.display = "block";
    var first_name = document.getElementById("first_name").value;
    var last_name = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var purpose = document.getElementById("purpose").value;
    var message = document.getElementById("message").value;

    var params =
        "first_name=" +
        first_name +
        "&last_name=" +
        last_name +
        "&email=" +
        email +
        "&phone=" +
        phone +
        "&purpose=" +
        purpose +
        "&message=" +
        message +
        "&submit";

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/logic/contact.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send(params);
    //my_form.reset();
    xhr.onload = function() {
        //console.log(this.response);


        if (this.readyState == 4) {
            if (this.status >= 200 && xhr.status < 304) {

                let requestObject = null;
                if (this.response == 'successsuccess') {
                    console.warn(this.response);
                    loader.style.display = "none";
                    Swal.fire({
                            title: '<strong>Hello ' + first_name + '</strong>',
                            icon: 'success',
                            html: '<b>Your Email has been successfully sent!</b> ' +
                                'we will get back to you soon.',
                            showCloseButton: true,
                            showCancelButton: true,
                            focusConfirm: false,
                            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                            confirmButtonAriaLabel: 'Thumbs up, great!',
                            cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
                            cancelButtonAriaLabel: 'Thumbs down'
                        })
                        // alert("success");
                    my_form.reset();
                } else {
                    //loader.style.display = "none";
                    loader.style.display = "none";
                    //alert(this.response);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!:  Is your internet connectivity still active ? ',
                        footer: '<a href="faq.php">Why do I have this issue?</a>'
                    })
                }


            } else {
                //loader.style.display = "none";
                loader.style.display = "none";

                Swal.fire(
                    'The Internet?',
                    'Please check your Internet. That thing is still around?',
                    'question'
                )

            }
        } else {
            //loader.style.display = "none";
            loader.style.display = "none";

            Swal.fire(
                'error?',
                'Please check your Internet or browser settings!',
                'error'
            )
        };
    }
}
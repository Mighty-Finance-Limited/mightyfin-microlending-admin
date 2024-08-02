let loader, fname, lname, amount;

function scroll_to_class(element_class, removed_height) {
    var scroll_to = $(element_class).offset().top - removed_height;
    if ($(window).scrollTop() != scroll_to) {
        $("html, body").stop().animate({ scrollTop: scroll_to }, 0);
    }
}

function bar_progress(progress_line_object, direction) {
    var number_of_steps = progress_line_object.data("number-of-steps");
    var now_value = progress_line_object.data("now-value");
    var new_value = 0;
    if (direction == "right") {
        new_value = now_value + 100 / number_of_steps;
    } else if (direction == "left") {
        new_value = now_value - 100 / number_of_steps;
    }
    progress_line_object
        .attr("style", "width: " + new_value + "%;")
        .data("now-value", new_value);
}

jQuery(document).ready(function () {
    loader = $("#loadery");

    /*
        Form
    */
    $(".f1 fieldset:first").fadeIn("slow");

    $(".f1 input[required]").on("focus", function () {
        $(this).removeClass("input-error");
    });

    let countr = 0;
    // next step
    $(".f1 .btn-next").on("click", function () {
        countr++;
        var parent_fieldset = $(this).parents("fieldset");
        var next_step = true;
        // navigation steps / progress steps
        var current_active_step = $(this)
            .parents(".f1")
            .find(".f1-step.active");
        var progress_line = $(this).parents(".f1").find(".f1-progress-line");
        if(countr === 2){
            // summary
            var loanTypeRadio = document.querySelector('input[name="loan_type"]:checked');
            var repaymentPlanInput = document.querySelector('input[name="repayment_plan"]');

            var loan_amount = document.getElementById("update_side");
            var loanAmtLabel = document.getElementById("loan_amt_lbl");
            var loanTypeLabel = document.getElementById("loan_type_lbl");
            var repaymentLabel = document.getElementById("tenure_lbl");
            var serviceLabel = document.getElementById("service_lbl");
            // Init:
            loanAmtLabel.textContent = '';
            loanTypeLabel.textContent = '';
            repaymentLabel.textContent = '';
            serviceLabel.textContent = '';
            // Use:
            loanAmtLabel.textContent = 'K'+loan_amount.value;
            loanTypeLabel.textContent = loanTypeRadio.getAttribute('data-name')
            repaymentLabel.textContent = repaymentPlanInput.value;
            serviceLabel.textContent = 'K4.5';

        
        }
        // fields validation
        parent_fieldset.find("input[required]").each(function () {
            var inputValue = $(this).val();
            var inputType = $(this).attr("type");
            var isValid = true;

            // Validate based on input type
            switch (inputType) {
                case "text":
                    // Add your custom validation for text input type
                    // Example: Check if it contains only alphabets
                    isValid = /^[a-zA-Z]+$/.test(inputValue);
                    break;

                case "number":
                    // Add your custom validation for number input type
                    // Example: Check if it is a valid number
                    isValid = !isNaN(inputValue);
                    break;

                case "tel":
                    // Add your custom validation for phone input type
                    // Example: Check if it is a valid phone number
                    isValid = /^\d{9}$/.test(inputValue);
                    break;

                case "email":
                    // Add your custom validation for email input type
                    // Example: Check if it is a valid email address
                    isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(inputValue);
                    break;
            }

            if (inputValue === "" || !isValid) {
                $(this).addClass("input-error");
                next_step = false;
            } else {
                $(this).removeClass("input-error");
            }
        });

        // fields validation

        if (next_step) {
            parent_fieldset.fadeOut(400, function () {
                // change icons
                current_active_step
                    .removeClass("active")
                    .addClass("activated")
                    .next()
                    .addClass("active");
                // progress bar
                bar_progress(progress_line, "right");
                // show next step
                $(this).next().fadeIn();
                // scroll window to beginning of the form
                scroll_to_class($(".f1"), 20);
            });
        }
    });

    // previous step
    $(".f1 .btn-previous").on("click", function () {
        // navigation steps / progress steps
        var current_active_step = $(this)
            .parents(".f1")
            .find(".f1-step.active");
        var progress_line = $(this).parents(".f1").find(".f1-progress-line");

        $(this)
            .parents("fieldset")
            .fadeOut(400, function () {
                // change icons
                current_active_step
                    .removeClass("active")
                    .prev()
                    .removeClass("activated")
                    .addClass("active");
                // progress bar
                bar_progress(progress_line, "left");
                // show previous step
                $(this).prev().fadeIn();
                // scroll window to beginning of the form
                scroll_to_class($(".f1"), 20);
            });
    });

    // submit
    $(".f1").on("submit", function (e) {
        // Fields validation
        let isValid = true;
        $(this)
            .find("input[required]")
            .each(function () {
                if ($(this).val() == "") {
                    e.preventDefault();
                    $(this).addClass("input-error");
                    isValid = false;
                } else {
                    $(this).removeClass("input-error");
                }
            });

        // If all inputs are valid, proceed to submit the form data to the API
        if (isValid) {
            e.preventDefault(); // Prevent the default form submission

            // Gather data from the form
            const formData = {};
            $(this)
                .find("input")
                .each(function () {
                    formData[$(this).attr("name")] = $(this).val();
                });

            // Convert the formData object to JSON
            const jsonData = JSON.stringify(formData);
            console.log(jsonData);

            // Your API endpoint URL
            const apiUrl = "api/request-for-loan";
            loader.show();
            // Make a POST request to the API using fetch
            fetch(apiUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    // Add any additional headers if needed
                },
                body: jsonData,
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(
                            `HTTP error! Status: ${response.status}`
                        );
                    }
                    return response.json();
                })
                .then((data) => {


                    // Accessing the value of the input with name "fname"


                    console.log("Here: " + data.status);

                    // console.log(data.hasOwnProperty('amount'));
                    // Handle the success response from the API
                    if (data.status === 200) {
                        loader.hide();
                        amount = data.amount;
                        fname = data.fname;
                        lname = data.lname;

                        // Access the 'loan_id' key in the 'data' object

                        Swal.fire({
                            title: "<strong>Hello " + fname + "</strong>",
                            icon: "success",
                            html:
                                "<b>Your loan application has been successfully submitted!</b> " +
                                "Please check your email for further instructions. " +
                                "Download the attached pre-approval and letter of introduction, sign them, and upload them back to your dashboard to complete the loan application process.",

                            showCloseButton: true,
                            showCancelButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                '<i class="fa fa-thumbs-up"></i> Great!',
                            confirmButtonAriaLabel: "Thumbs up, great!",
                            cancelButtonText:
                                '<i class="fa fa-thumbs-down"></i>',
                            cancelButtonAriaLabel: "Thumbs down",
                            // footer: '<a href="/login">Sign In</a>'
                        });
                    } else {
                        loader.hide();
                        Swal.fire({
                            icon: "error",
                            title: "Oh Sorry... ",
                            text:
                                "It seems that you already have an existing loan of K" +
                                amount +
                                ". " +
                                "To proceed with a new loan application, please complete the current loan process. " +
                                "You can check your dashboard for details on your existing loan and follow the instructions there. " +
                                "If you have any questions, feel free to reach out to our customer support. Call: +260950082577 Or: +260950081545.",

                            // footer: '<a href="//login">Payback Loan</a>'
                        });
                    }
                    // console.log("API Response:", data);
                })
                .catch((error) => {
                    loader.hide();
                    // Handle errors
                    console.error("API Error:", error);
                    Swal.fire({
                        icon: "error",
                        title: "Network Error... ",
                        text: "Please check your internet connection and reload your page!",

                        // footer: '<a href="//login">Payback Loan</a>'
                    });
                });
        }
    });
});

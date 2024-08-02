//Scope
let apply_btn,
    duration,
    time_frame,
    slider_amount,
    update_side_amount,
    result_amount,
    result_duration,
    slider_duration,
    loan_id,
    loantype,
    activeLoanType, // Variable to store the active loan type
    //amount
    max_loan_amount,
    min_loan_amount,
    step_loan_amount,
    //duration
    max_loan_duration,
    min_loan_duration,
    total_repayment,
    monthly_repayment,
    result_payment,
    input_duration;

//API Handler
class LoanService {
    constructor(baseUrl, apiEndpoint) {
        this.apiUrl = `${baseUrl}${apiEndpoint}`;
    }

    handleErrors(response) {
        if (!response.ok) {
            throw Error(response.statusText);
        }
        return response;
    }

    async fetchLoanProducts() {
        try {
            const response = await fetch(this.apiUrl);
            const data = await response.json();
            return data;
        } catch (error) {
            console.error("Error fetching data:", error.message);
            throw error;
        }
    }
}

/* LAUNCH CALCULATOR BEHAVIOR */
document.addEventListener("DOMContentLoaded", async function () {
    // UI VARIABLES
    apply_btn = document.querySelector("#apply");
    duration = document.getElementById("duration");
    time_frame = document.getElementById("time_frame");
    slider_amount = document.getElementById("slidatious");
    update_side_amount = document.getElementById("update_side");
    result_amount = document.getElementById("amountatious");
    result_duration = document.getElementById("result_duration");
    slider_duration = document.getElementById("loan_duration");
    input_duration = document.getElementById("time_duration");
    total_repayment = document.getElementById("total_repayment");
    monthly_repayment = document.getElementById("monthly_repayment");
    result_payment = document.getElementById("result_payment");

    let loan_products = document.getElementById("loan_products");

    // BASE URL
    const baseUrl =
        window.location.protocol +
        "//" +
        window.location.hostname +
        (window.location.port ? ":" + window.location.port : "") +
        window.location.pathname;

    // INITIAL UI BEHAVIOR
    duration.style.display = "block";
    apply_btn.disabled = true;
    apply_btn.innerHTML = "INPUT DETAILS ABOVE";
    duration.style.display = "block";

    // Function to fetch loan products
    const loanApiEndpoint = "api/get-loan-products";

    const loanService = new LoanService(baseUrl, loanApiEndpoint);
    try {
        const loanProducts = await loanService.fetchLoanProducts();

        let radioGroupHtml = "";

        let foundActiveProduct = false;

        if (loanProducts.length === 0) {
            // Handle the case when no loan products are available
            const noProductsSVG = encodeURIComponent(`
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <line x1="8" y1="8" x2="16" y2="16" />
                <line x1="8" y1="16" x2="16" y2="8" />
            </svg>
        `);

            radioGroupHtml = `
            <div class="col-12">
                <label class="custom-radio" style="opacity: 0.5;">
                    <input disabled type="radio" name="loan_type" value="no_product" onclick="checker()">
                    <div class="radio-btn">
                        <div class="content">
                            <div class="mb-2">
                                <!-- Use the data URI in the img tag -->
                                <img width="50" src="data:image/svg+xml,${noProductsSVG}" />
                            </div>
                            <h2>No Products Available</h2>
                            <p class="skill">We're sorry, but there are no loan products available at the moment.</p>

                        </div>
                    </div>
                </label>
            </div>`;
        } else {
            localStorage.setItem("loanProducts", JSON.stringify(loanProducts));

            loanProducts.forEach((product) => {
                const isActiveProduct = product.status === 1;
                const isChecked = isActiveProduct && !foundActiveProduct;

                // Use different SVG for checked and unchecked radio buttons
                const productIconSVG = isChecked
                    ? encodeURIComponent(product.icon_alt)
                    : encodeURIComponent(product.icon);

                radioGroupHtml += `
                    <div class="col-6">
                        <label class="custom-radio" style="opacity: ${
                            isActiveProduct ? "1" : "0.5"
                        };">
                            <input ${
                                isActiveProduct ? "enabled" : "disabled"
                            } type="radio" data-name="${product.name}"
                                   name="loan_type" value="${product.id}"
                                   onclick="checker()" ${
                                       isActiveProduct ? "checked" : ""
                                   }>
                            <!-- Add product details dynamically here --><div class="radio-btn">
                            <div class="content">
                                <div class="mb-2">
                                    <img width="50px" src="data:image/svg+xml,${productIconSVG}" />
                                </div>
                                <h2>${product.name}</h2>
                                <p class="skill">${
                                    product.description
                                } ${isActiveProduct ? "(Available)" : "<br>(Coming Soon)"}</p>
                                <span class="check-icon">
                                    <span class="icon"></span>
                                </span>
                            </div>
                        </div>
                        </label>
                    </div>`;

                if (isActiveProduct && !foundActiveProduct) {
                    foundActiveProduct = true;
                    activeLoanType = product.id;
                    max_loan_amount = product.max_principal_amount;
                    min_loan_amount = product.min_principal_amount;
                    max_loan_duration = product.max_loan_duration;
                    min_loan_duration = product.min_loan_duration;
                }
            });
        }

        loan_products.innerHTML = radioGroupHtml;
    } catch (error) {
        // Handle errors if needed
    }

    window.checker = function checker() {
        loantype = document.querySelector('input[name="loan_type"]:checked');

        if (loantype) {
            // Check if a loan type is selected
            loan_id = loantype.value;
            //loantype.setAttribute('src', 'test.img')

            // Check if the selected loan type is the active one
            if (loan_id) {
                apply_btn.disabled = false;
                apply_btn.innerHTML = "APPLY NOW";

                // Assign other UI variables based on the selected loan type
                populate(loan_id, slider_amount, slider_duration);
            } else {
                apply_btn.disabled = true;
                apply_btn.innerHTML = "FINISH ENTERING DETAILS!";
            }
        } else {
            // Handle the case when no loan type is selected
            apply_btn.disabled = true;
            apply_btn.innerHTML = "SELECT A LOAN TYPE";
        }
    };

    checker();
});

// Function to populate UI based on selected loan type
// Function to update the slider background
function updateSliderBackground(sliderElement) {
    const tempSliderValue = sliderElement.value;
    const min = parseInt(sliderElement.min, 10);
    const max = parseInt(sliderElement.max, 10);

    // Calculate the progress percentage based on the dynamic range (min to max)
    const progress = ((tempSliderValue - min) / (max - min)) * 100;

    sliderElement.style.background = `linear-gradient(to right, #f9ca24 ${progress}%, #ccc ${progress}%)`;
}

// Original script for updating slider background
const sliderEl = document.querySelectorAll(
    ".range__slider input[type='range']"
);

sliderEl.forEach((sliderElement) => {
    sliderElement.addEventListener("input", (event) => {
        updateSliderBackground(event.target);
    });
});

// Script for updating sliders based on loan information
window.populate = function (loan_id, slider_amount, slider_duration) {
    const approvedAmtLbl = document.getElementById("approve_amt_lbl");
    const monthlyInstLbl = document.getElementById('monthly_inst_lbl');
    const nextPaymentLbl = document.getElementById('nxt_payment_lbl');

    const storedLoanProducts = localStorage.getItem("loanProducts");
    const parsedLoanProducts = JSON.parse(storedLoanProducts);
    const loanIdNumber = parseInt(loan_id, 10);
    const matchingProduct = parsedLoanProducts.find(
        (product) => product.id === loanIdNumber
    );

    if (matchingProduct) {
        // Update slider values based on the selected loan type
        slider_amount.max = matchingProduct.max_principal_amount;
        slider_amount.min = matchingProduct.min_principal_amount;

        slider_duration.max = matchingProduct.max_loan_duration;
        slider_duration.min = matchingProduct.min_loan_duration;

        update_side_amount.value = slider_amount.value;

        // Update slider backgrounds
        updateSliderBackground(slider_amount);
        updateSliderBackground(slider_duration);

        const principal = parseFloat(slider_amount.value);
        const loanTermMonths = parseInt(slider_duration.value);
        const serviceFee = 0;//parseFloat(document.getElementById('serviceFee').value);

        const monthlyInterestRate = matchingProduct.def_loan_interest / 12 / 100;
        const numPayments = loanTermMonths;

        // Calculate monthly payment without considering fees
        const monthlyPayment = (principal * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -numPayments));

        // Calculate total repayment, adding the service fee
        const totalRepayment = monthlyPayment * loanTermMonths + serviceFee;

        // Determine the next repayment date based on the current date
        const currentDate = new Date();
        const loanStartDate = new Date(currentDate);

        // Check if the current date is after the 5th of the month
        if (currentDate.getDate() > 5) {
            // If yes, move to the next month
            loanStartDate.setMonth(loanStartDate.getMonth() + 1);
        }

        // Set the loan start date to the 1st of the month
        loanStartDate.setDate(1);

        // Calculate the next repayment date based on the loan duration
        const nextRepaymentDate = new Date(loanStartDate);
        nextRepaymentDate.setMonth(nextRepaymentDate.getMonth() + loanTermMonths);

        // Format the next repayment date as needed
        const lastDayOfMonth = new Date(nextRepaymentDate.getFullYear(), nextRepaymentDate.getMonth() + 1, 0).getDate();
        nextRepaymentDate.setDate(lastDayOfMonth);

        const nextRepaymentDateString = nextRepaymentDate.toISOString().split('T')[0];

        // Update the UI elements
        total_repayment.textContent = totalRepayment.toFixed(2);
        monthly_repayment.textContent = monthlyPayment.toFixed(2);
        result_payment.textContent = nextRepaymentDateString;

        approvedAmtLbl.textContent = '';
        monthlyInstLbl.textContent = '';
        nextPaymentLbl.textContent = '';
        approvedAmtLbl.textContent = 'K'+totalRepayment.toFixed(2);
        monthlyInstLbl.textContent = 'K'+monthlyPayment.toFixed(2);
        nextPaymentLbl.textContent = nextRepaymentDateString;

    } else {
        // Handle the case when no matching product was found
        console.error("Product not found for loan ID:", loanIdNumber);
    }
};




//

    // Calculate total repayment, monthly repayment, and next repayment date


// Function to calculate total repayment
function calculateTotalRepayment(amount, duration, interestRate) {
    // Perform your calculation here based on the loan amount, duration, and interest rate
    // For example, you can use a formula like: totalRepayment = amount * (1 + interestRate) * duration;
    return parseFloat(amount) * (1 + parseFloat(interestRate)) * parseInt(duration);
}

// Function to calculate monthly repayment
function calculateMonthlyRepayment(amount, duration, interestRate) {
    // Perform your calculation here based on the loan amount, duration, and interest rate
    // For example, you can use a formula like: monthlyRepayment = (amount * (1 + interestRate)) / duration;
    return (parseFloat(amount) * (1 + parseFloat(interestRate))) / parseInt(duration);
}

// Function to calculate the next repayment date
function calculateLoanRepayment(principal, annualInterestRate, loanTermMonths, serviceFee, startDate, currentDate) {
    const monthlyInterestRate = annualInterestRate / 12 / 100;
    const numPayments = loanTermMonths;

    // Calculate monthly payment without considering fees
    const monthlyPayment = (principal * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -numPayments));

    // Calculate total repayment, adding the service fee
    const totalRepayment = monthlyPayment * loanTermMonths + serviceFee;

    // Determine the next repayment date based on the loan start date and current date
    const loanStartDate = new Date(startDate);
    const currentDay = currentDate.getDate();

    // Check if the current date is after the 5th of the month
    if (currentDay > 5) {
        // If yes, move to the next month
        loanStartDate.setMonth(loanStartDate.getMonth() + 1);
    }

    // Set the loan start date to the 1st of the month
    loanStartDate.setDate(1);

    // Calculate the next repayment date based on the loan duration
    const nextRepaymentDate = new Date(loanStartDate);
    nextRepaymentDate.setMonth(nextRepaymentDate.getMonth() + loanTermMonths);

    // Format the next repayment date as needed
    const nextRepaymentDateString = nextRepaymentDate.toISOString().split('T')[0];

    return {
        totalRepayment: totalRepayment,
        monthlyRepayment: monthlyPayment,
        nextRepaymentDate: nextRepaymentDateString,
    };
}



// ... (remaining code)

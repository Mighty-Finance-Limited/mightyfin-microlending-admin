{{-- Loan Product Name --}}
$product->name

{{-- Default Interest Value --}}
$product->def_loan_interest 

{{-- Default Duration --}}
$product->default_loan_duration

{{-- Interest type of product --}}
$product->interest_types->first()->interest_type->name

{{-- Release Date bool --}}
$product->auto_payment
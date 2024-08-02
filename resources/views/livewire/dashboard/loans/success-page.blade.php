<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Congratulations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #682a93">
    <div class="container d-flex justify-content-center align-items-center vh-90">
        <div class="col-12 message text-center">
            <div class="col-12 picture">
                <img src="{{ asset('public/mfs/images/c.PNG') }}" alt="">
            </div>
            <!-- Your message content goes here -->
        </div>
    </div>
</body>
<script>
    setTimeout(function() {
        window.location.href = "{{ route('view-loan-requests') }}";
    }, 5000);
</script>
</html>

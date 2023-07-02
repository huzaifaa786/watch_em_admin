<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class='row'>
        <div class='col d-flex align-items-center justify-content-center'>
            <div class='card mt-5' style='width: 18rem;'>
                <a href='{{ $connectUri }}'>
                    <img src="{{ asset('images/connect-purple.png') }}" class='img-thumbnail' alt='Connect With Stripe' />
                </a>
            </div>
        </div>
    </div>
</body>
</html>

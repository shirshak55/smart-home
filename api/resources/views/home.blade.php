<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Automation Using IOT Device</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/titatoggle/2.1.2/titatoggle-dist-min.css" type="text/css">

    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <link href="css/freelancer.css" rel="stylesheet">

    <style type="text/css">
        input:focus, textarea:focus, select:focus{
            outline: none;
        }
    </style>

    <script src="{{mix('/js/app.js')}}"></script>
</head>
    <body id="page-top">
        <div id="app">
            <section class="portfolio" id="portfolio">
                <div class="container">
                    <h2 class="text-center text-uppercase text-secondary mb-0">Control Panel</h2>
                    <hr class="star-dark mb-5">
                    <form class="form-horizontal">

                        @foreach($smart_powers as $smart_power)
                            <div class="form-group">
                                <div class="form-check checkbox-slider--b">
                                    <label>
                                        <input type="checkbox" {{($smart_power->pin_status == true) ? 'checked':''}} id='bulb_input'><span>{{ $smart_power->name }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </form>
                </div>
            </section>
        </div>
    </body>
</html>

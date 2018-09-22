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


</head>
    <body id="page-top">
        <div id="app">
            <layout-header></layout-header>
            <section class="portfolio" id="portfolio">
                <div class="container">
                    <smart-powers></smart-powers>
                </div>
            </section>
            <layout-about></layout-about>
            <layout-footer></layout-footer>
            <layout-copyright></layout-copyright>
            <scroll-to-top></scroll-to-top>
        </div>
    </body>

    <script src="{{mix('/js/app.js')}}"></script>
</html>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>OOPS.. Error</title>

        {{-- Include Css --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:500,800" rel="stylesheet">
        <link rel="stylesheet" href="css/errors.css">
    </head>
    <body>
        <div class="container">
            <div class="center">
                <h1 class="error-code">
                    @php
                        /** @var $exception Exception*/
                        echo $exception->getCode();
                    @endphp
                </h1>
                <h2 class="error-message">
                    @php
                        /** @var $exception Exception*/
                        echo $exception->getMessage();
                    @endphp
                </h2>
                <div class="button-center">
                    <a class='button-back' href="#" onclick="goBack()">Go Back to previous page</a>
                </div>
            </div>
        </div>
        {{-- Incluce Javascript --}}
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>
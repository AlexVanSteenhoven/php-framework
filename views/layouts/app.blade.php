<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APP</title>

    {{-- Link CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5">
    <a class="navbar-brand" href="#">APP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact">contact</a>
            </li>
        </ul>
        @if (\app\core\Application::isGuest())
        <ul class="navbar-nav ml-auto">
            <li class="nav-item pr-2">
                <a class="nav-link" href="/login">
                    <i class="fas fa-sign-in-alt"></i>
                    Login
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">
                    <i class="fas fa-user-plus"></i>
                    Register
                </a>
            </li>
        </ul>
        @else
            <ul class="navbar-nav ml-auto"
                <li class="nav-item">
                    <a class="nav-link" href="/account"
                        <i class="fas fa-user"></i>
                        Welkom @php echo \app\core\Application::$app->user->getDisplayName(); @endphp
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </li>
            </ul>
        @endif
    </div>
</nav>
<main class="py-5">
    @yield('content')
</main>

{{-- include JS Scripts --}}
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
<script src="js/script.js"></script>
</body>
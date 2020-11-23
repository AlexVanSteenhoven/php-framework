@extends('layouts.app')

@section('content')
    <div class="container">
        @if (\app\core\Application::$app->session->getFlashMessage('success'))
        <div class="alert alert-success fade show" role="alert">
            @php echo \app\core\Application::$app->session->getFlashMessage('success'); @endphp
        </div>
        @endif

        @if (!\app\core\Application::isGuest())
            <h1 class="text-center">Welkom @php echo \app\core\Application::$app->user->getDisplayName(); @endphp </h1>
        @else
            <h1 class="text-center">Welkom Gebruiker</h1>
        @endif
    </div>
@endsection

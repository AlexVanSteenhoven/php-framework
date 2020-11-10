@extends('layouts.app')

@section('content')
    <div class="container">
        @if (\app\core\Application::$app->session->getFlashMessage('success'))
        <div class="alert alert-success fade show" role="alert">
            @php echo \app\core\Application::$app->session->getFlashMessage('success'); @endphp
        </div>
        @endif

        <h1 class="text-center">Welcome {{ $name }}</h1>
    </div>
@endsection
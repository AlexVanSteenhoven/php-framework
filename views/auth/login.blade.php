@extends('layouts.auth')

@section('content')
    <div class="container w-25 mx-auto">
        <div class="py-5">
            <div class="card">
                <div class="card-header">
                    <b>Login</b>
                </div>
                <div class="card-body">
                    @php
                    use \app\core\form\Form;
                    use \app\models\UserModel;
                    
                    $form = Form::begin('', 'POST');
                        echo $form->field($model, 'email')->emailField();
                        echo $form->field($model, 'password')->passwordField();
                        echo "<button type='submit' class='btn btn-primary'>Submit</button>";
                    Form::end();
                    @endphp
                </div>
            </div>
        </div>
    </div>
@endsection
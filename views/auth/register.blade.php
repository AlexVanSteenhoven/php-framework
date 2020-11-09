@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="py-5">
            <div class="card">
                <div class="card-header">
                    <b>Register</b>
                </div>
                <div class="card-body">
                    @php
                    use \app\core\form\Form;
                    $form = Form::begin('', 'POST');
                        echo "<div class='form-row'>";
                            echo "<div class='col'>";
                                echo $form->field($model, 'firstname');
                            echo "</div>";
                            echo "<div class='col'>";
                                echo $form->field($model, 'lastname');
                            echo "</div>";
                        echo "</div>";
                        echo $form->field($model, 'email')->emailField();
                        echo "<div class='form-row'>";
                            echo "<div class='col'>";
                                echo $form->field($model, 'password')->passwordField();
                            echo "</div>";
                            echo "<div class='col'>";
                                echo $form->field($model, 'confirmPassword')->passwordField();
                            echo "</div>";
                        echo "</div>";
                        echo "<button type='submit' class='btn btn-primary'>Submit</button>";
                    Form::end();
                    @endphp
                </div>
            </div>
        </div>
    </div>
@endsection
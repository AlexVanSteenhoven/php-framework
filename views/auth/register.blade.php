@extends('layouts.auth')

@section('content')
    <div class="container">
    <div class="py-5">
        <div class="card">
            <div class="card-header">
                <b>Register</b>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="input" class="form-control" id="firstname" name="firstname" placeholder="firstname">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Lastname</label>
                                <input type="input" class="form-control" id="lastname" name="lastname" placeholder="lastname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    </div>
                    <div class="form-group">
                      <label for="confirmPassword">Confirm Password</label>
                      <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="confirm password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
    </div>
@endsection
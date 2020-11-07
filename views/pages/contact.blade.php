@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Contact form</h1>
        <div class="py-5">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="subject">Password</label>
                          <input type="email" class="form-control" id="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                          <label for="message">Message</label>
                          <textarea class="form-control" name="message" id="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
@endsection
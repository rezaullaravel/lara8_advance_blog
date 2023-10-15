@extends('frontend.frontend_master')

@section('title')
    Contact Page
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                @if (Session('info-message'))
                    <div class="alert alert-success">
                        <span class="text-center">{{ Session::get('info-message') }}</span>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header" style="background: #223A66;">
                        <h4 class="text-center text-white">Contact</h4>
                    </div>

                    <div class="card-body" style="background: #0000001f;">
                    <form method="POST" action="{{ route('message.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input  type="text" name="name" class="form-control"  required >
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input  type="email" name="email" class="form-control"  required >
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input  type="text" name="phone" class="form-control"  required >
                        </div>

                        <div class="form-group">
                            <label>Subject</label>
                            <input  type="text" name="subject" class="form-control"  required >
                        </div>

                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control"  required rows="6"></textarea>
                        </div>



                        <div class="form-group">

                            <input type="submit" name="submit" value="Send Message" class="btn btn-success btn-block">


                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

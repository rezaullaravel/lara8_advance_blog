@extends('frontend.frontend_master')

@section('title')
    User Dashboard
@endsection

<style>
        .vertical-menu {
        width: 200px;
        }

        .vertical-menu a {
        background-color: #eee;
        color: black;
        display: block;
        padding: 12px;
        text-decoration: none;
        }

        .vertical-menu a:hover {
        background-color: #ccc;
        }

        .vertical-menu a.active {
        background-color: #2c396c;
        color: white;
        }

        .tasklist{
            padding-left: 17rem;

           }

    </style>

@section('main-content')
   <div class="container" style="margin-bottom: 10px;">
      <div class="row">
         <div class="col-sm-4">
           @include('frontend.user.menu')
         </div>
         <div class="col-sm-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <h4 class="text-center text-success">Hello! {{ Auth::user()->name }}. Welcome to your dashboard.</h4>
                    <p class="text-center">You can do the following tasks from here.</p>
                    <ul class="tasklist">

                        <li>Profile Update</li>
                        <li>Password Change</li>
                        <li>New Blog Post Create</li>
                        <li>See Blog Post List</li>
                        <li>Update And Delete Blog Post</li>
                    </ul>
                </div>
            </div>
         </div>
      </div>
   </div>
@endsection


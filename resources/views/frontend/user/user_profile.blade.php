@extends('frontend.frontend_master')

@section('title')
    User Dashboard
@endsection

<style>
        .vertical-menu {
        /* width: 300px; */
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

        .user_img{
            padding: 6px;
            border-radius: 74px;
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
                <div class="card-header">
                    <p class="text-center">My Profile</p>
                </div>
                <div class="card-body">
                    <p class="text-center">
                        <img src="{{ asset($user->image) }}" alt="user_image" width="150" height="150" class="user_img">
                    </p>
                    <p class="text-center">Name: <span>{{  $user->name }}</span></p>
                    <p class="text-center">Email: <span>{{  $user->email }}</span></p>
                </div>
            </div>
         </div>
      </div>
   </div>
@endsection


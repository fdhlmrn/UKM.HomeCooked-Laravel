@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Pesan Makanan</h2>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-10">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
          </div>
            <form method="POST" action="/profiles/{{ $profile->id }}/like" style="display: inline-block;">
            {{ csrf_field() }}
            <button class="btn {{ Auth::check() && Auth::user()->alreadyliked($profile) ? 'btn-success' : 'btn-default'}}" style="width: 3em">
            {{ $profile->likes->count() }}
            </button>
            </form>
            <div class="col-sm-6 col-md-8">
              <h2>{{$profile->user->name}}</h2>    
              <br> 
              <h4><i class="glyphicon glyphicon-envelope"></i>    {{$profile->user->email}}</h4>
              <br>
              <h4><i class="glyphicon glyphicon-earphone"></i>{{$profile->no_phone}}</h4>
              <br>
              <h4><i class=" glyphicon glyphicon-home"></i>{{$profile->address}},
              <br>
              {{$profile->district}},
              <br>
              {{$profile->state}}
            </div>
               <div class="form-group">
                <div class="col-sm-offset-10 col-sm-10">
                @if ($profile->user_id == Auth::user()->id)
                  <a href="{{ action('ProfilesController@edit', $profile->user_id) }}" class="btn btn-success">Edit</a>

                @else
                  <a href="{{ action('ReviewController@index', $profile->id) }}" class="btn btn-success">Comment</a>


                @endif

               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
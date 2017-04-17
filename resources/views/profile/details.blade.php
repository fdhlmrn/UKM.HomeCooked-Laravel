@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Profil </h2>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
          </div>
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
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <div class="form-group">
                <div class="col-sm-offset-9 col-sm-9 ">
                @if ($profile->user_id == Auth::user()->id)
                  <a href="{{ action('ProfilesController@edit', $profile->user_id) }}" class="btn btn-success">Edit</a>

                @else
               </div>
            </div>
            </div>
         </div>
        </div>

      <div class="col-md-offset-11">

              <form method="POST" action="/profiles/{{ $profile->id }}/like" style="display: inline-block;">
                    {{ csrf_field() }}
                    <button class="btn btn-default btn-sm {{ Auth::check() && Auth::user()->alreadyliked($profile) ? 'btn-success' : 'btn-default'}}" style="width: 3em"><span class="glyphicon glyphicon-thumbs-up"></span>
                    {{ $profile->likes->count() }}
                    </button>
                  </form>
      </div>
    </div>
  @endif
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class=" form-group col-sm-12 col-md-12">

            <div class="col-md-6"><h2 class="pull-left">Leave a comment</h2></div>
            <div class="col-md-6"><a href="{{ action('ReviewController@index', $profile->id) }}" class="btn btn-success pull-right">Comment</a>
            </div>
            </div>

        
        <div class="list-group notes-group">

        <!--note1 -->

        @foreach($reviews as $review)

        <div class="col-md-12 card card-block">
              <hr style="background:#F87431; border:0; height:2px" />
                <h3 class="card-title">
                    {{ $review->title }}
                </h3>                
                <h6 class="pull-right"> {{$review->created_at->diffForHumans() }}</h6> 
                <h6>By:  {{ $review->user->name }}</h6>
            <p class="card-text">
                    {{$review->content}}
            </p>
            

            @if ($profile->user_id == Auth::user()->id)

            <a class="btn btn-sm btn-info pull-xs-left" href="{{ action('ReviewController@edit', $review->id) }}">
                Edit
            </a>
            <form action="{{ action('ReviewController@destroy',$review->id) }}" class="pull-xs-right" method="POST">
                {{ csrf_field() }}
                {{method_field('DELETE')}}
                <input class="btn btn-sm btn-danger" type="submit" value="Delete">
            @endif

            </form>
        </div>

        @endforeach
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  @endsection
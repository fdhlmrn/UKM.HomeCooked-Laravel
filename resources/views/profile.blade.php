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
          @foreach ($profiles as $profile)
            <div class="col-sm-6 col-md-8">
              <h2>{{$profile->user->name}}</h2>    
              <br> 
              <h4><i class="glyphicon glyphicon-envelope"></i>    {{$profile->user->email}}</h4>
              <br>
              <h4><i class="glyphicon glyphicon-earphone"></i>{{$profile->no_phone}}</h4>
              <br>
             {{--  <h4><i class=" glyphicon glyphicon-home"></i>{{$profile->user->address}}
              </h4>{{$profile->user->state}}</h4>
              </h4>{{$profile->user->subdistrict}}</h4> --}}
          @endforeach

            </div>
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-10">
                @if ($profile->user_id == Auth::user()->id)
                  <a href="{{ action('ProfilesController@edit', $profile->user_id) }}" class="btn btn-default">Edit</a>
                  <button type="submit" class="btn btn-success">Save</button>
                @endif

                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
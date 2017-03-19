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
        

      <form class="form-horizontal" action="{{ action('ProfilesController@update', $profile->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH')}}
          <div class="col-sm-6 col-md-4">

            <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
          </div>
            <div class="col-sm-6 col-md-8">
              <h2><input class="form-control" type="text" value="{{$profile->user->name}}" name="name"></h2>    
              <br> 
              <h4><input class="form-control" type="text" value="{{$profile->user->email}}" name="email"></h4>
              <br>
              <h4><input class="form-control" type="text" value="{{$profile->no_phone}}" name="no_phone"></h4>
              <br>
{{--               <h4><input class="form-control" type="text" value="{{$profile->address}}" name="address"></h4><br>
              </h4><input class="form-control" type="text" value="{{$profile->state}}" name="state"></h4><br>
              </h4><input class="form-control" type="text" value="{{$profile->subdistrict}}" name="subdistrict"></h4> --}}

              </div>
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-10">
                  <a href="{{ action('ProfilesController@index') }}" class="btn btn-default">Edit</a>
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
          </form>



        </div>
      </div>
    </div>
  </div>
</div>
@endsection
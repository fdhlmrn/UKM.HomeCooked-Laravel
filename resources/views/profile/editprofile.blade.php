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
          <div class="form-group">
            <label class="col-md-4 control-label">Nama
            </label>
            <div class="col-sm-6 col-md-8">
              <div class="form-group">
                <input class="form-control" type="text" value="{{$profile->user->name}}" name="name">
                </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Email
            </label>
            <div class="col-sm-6 col-md-8">
              <div class="form-group">
                <input class="form-control" type="text" value="{{$profile->user->email}}" name="email">
                </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Phone
            </label>
            <div class="col-sm-6 col-md-8">
              <div class="form-group">
                <input class="form-control" type="text" value="{{$profile->no_phone}}" name="no_phone">
                </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Address
            </label>
            <div class="col-sm-6 col-md-8">
              <div class="form-group">
                <input class="form-control" type="text" value="{{$profile->address}}" name="address">
                </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">State
            </label>
            <div class="col-sm-6 col-md-8">
              <div class="form-group">
              <select class="form-control input-sm" name="state" id="states">
                  @foreach($states as $state )
                  <option value="{{ $state->id }}">{{ $state->name }}</option>
                  @endforeach
                  </select>
                </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">State
            </label>
            <div class="col-sm-6 col-md-8">
              <div class="form-group">
              <select class="form-control input-sm" name="district" id="district">
                  <option value="null">Semua Daerah</option>
                  </select>
                </div>
            </div>
          </div>
          </div>    
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-10">
                  <a href="{{ action('ProfilesController@index') }}" class="btn btn-danger">Cancel</a>
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
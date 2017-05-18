@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Cari Makanan</h2>
          </div>
    <div class="panel-body"> 
      <div class="row">
        <div class="col-md-10">
          <form class="form-horizontal" action="{{ action('SearchController@find') }}" method="get" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-md-4 control-label">Perincian Makanan</label>
              <div class="col-md-8">
                <div class="form-group">
                  <input class="form-control" type="text" name="keyword" placeholder="Nama Makanan">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Location</label>
              <div class="col-md-8">
                <div class="form-group">
                  <input class="form-control" id="location" type="text" name="location">
                </div>
              </div>
            </div>      
            <div class="form-group">
              <div class="col-sm-offset-10">
              
                <a href="{{ url('/home') }}" class="btn btn-info" role="button">List All</a>

              <button type="submit" class="btn btn-success">Search</button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- csrf_field tu perlu untuk post, put, delete sahaja. --}}


  @endsection

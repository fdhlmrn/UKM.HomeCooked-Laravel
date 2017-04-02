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
              <label class="col-md-4 control-label">Negeri</label>
              <div class="col-md-8">
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
              <label class="col-md-4 control-label"></label>
              <div class="col-md-8">
                <div class="form-group">
                  <select class="form-control input-sm" name="district" id="district">
                  <option value="null" selected>Semua Daerah</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-11">

              <button type="submit" class="btn btn-success">Search</button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- csrf_field tu perlu untuk post, put, delete sahaja. --}}


  @endsection

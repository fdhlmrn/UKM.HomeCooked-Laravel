@extends('layouts.app')
@include('modal.destroy-modal')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Cari Makanan</h2>

      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Makanan</th>
                        <th>Siaz Hidangan</th>
                        <th>Harga(RM)</th>
                        <th>Lokasi</th>
                        <th></th>
                    </tr>
                </thead>
                <!--/Table head-->

                <!--Table body-->
                <tbody>
                  @forelse ($foods as $food)
                    <!--First row-->
                    <tr>
                        <th scope="row">
                            <img style="height: 120px; width: 120px;" src="{{$food->image}}" alt="" class="img-fluid">
                        </th>
                        <td>
                            <h5><strong>{{$food->nama_makanan}}</strong></h5>
                            <p class="text-muted">by <a href="{{ action('ProfilesController@show', $food->user->id)}}"> {{ $food->user->name }}</p></a>
                            <small class="">{{ $food->created_at->diffForHumans() }}</small>

                        </td>
                        <td>{{ $food->saiz_hidangan }}</td>
                        <td>{{ $food->harga }}</td>
                        <td>{{ $food->location}} </td>
                        <td>
                        @if( $food->user_id == Auth::user()->id)
                               <a href="{{ action('FoodsController@edit', $food->id) }}" class="btn btn-info btn-sm">Edit</a>
                               <a href="{{ action('FoodsController@destroy', $food->id) }}" class="btn btn-danger btn-sm" id="confirm-modal">Delete</a>
                        @else
                                <a href="{{ action('FoodsController@getReduceByOneHome', $food->id) }}"
                                class="btn btn-danger btn-sm">-</a>
                                <a href="{{ action('FoodsController@cart', $food->id) }}"
                                class="btn btn-success btn-sm">+</a>
                        @endif
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="6">Looks like there is no post available.</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                  <div class="pagination-bar text-center">
                    {{ $foods->render() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="{{ asset('js/warning.js') }}"></script>
      @endsection

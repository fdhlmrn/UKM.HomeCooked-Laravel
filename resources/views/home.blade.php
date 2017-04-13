@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Senarai Makanan</h2>

      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="35%">Makanan</th>
                    <th width="15%">By</th>
                    <th width="15%">Saiz Hidangan</th>
                    <th width="15%">Harga(RM)</th>
                    <th width="15%">Lokasi</th>
                    <th width="15%">Action</th>
                  </tr>
                </thead>
                <tbody pull-{right}>
{{--                 @php
                  dd($foods);
                @endphp --}}
                  @forelse($foods as $food)
                    <tr>
                      <td>{{ $food->nama_makanan }}</td>
                      <td><a href="{{ action('ProfilesController@show', $food->user->id)}}"> {{ $food->user->name }}</td>
                      <td>{{ $food->saiz_hidangan }}</td>
                      <td>{{ $food->harga }}</td>
                      <td>{{ $food->state->name }}, {{ $food->district->name}}</td>

                      <td>
                        @if( $food->user_id == Auth::user()->id)
                            <a href="{{ action('FoodsController@edit', $food->id) }}"
                            class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ action('FoodsController@destroy', $food->id) }}"
                             class="btn btn-danger btn-sm" id="confirm-modal">Delete</a>
                        @else
                            <a href="{{ action('FoodsController@buy', $food->id) }}"
                            class="btn btn-primary btn-sm">Buy</a>
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
                  {{-- {{ $sale->links() }} --}}
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="{{ asset('js/warning.js') }}"></script>
      @endsection

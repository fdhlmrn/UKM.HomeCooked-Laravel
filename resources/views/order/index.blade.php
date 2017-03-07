@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Pesanan Makanan<a href="{{ url('/orders/create') }}" class="btn btn-info pull-right"
        role="button">Pesanan Baru</a></h2>

      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th width="55%">Makanan</th>
                    <th width="15%">Quantity</th>
                    <th width="15%">Action</th>
                  </tr>
                </thead>
                <tbody pull-{right}>
                  <?php $i = 0 ?>
                  @forelse($orders as $order)
                    <tr>
                      <td>{{ $orders->firstItem() + $i }}</td>
                      <td>{{$order->nama_makanan}}</td>
                      <td>{{ $order->saiz_hidangan }}</td>
                      <td>
                        @if( $order->user_id == Auth::user()->id)
                          <a href="{{ action('OrdersController@edit', $food->id) }}"
                            class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ action('OrdersController@destroy', $food->id) }}"
                              class="btn btn-danger btn-sm" id="confirm-modal">Delete</a>
                            @endif
                          </td>
                        </tr>
                        <?php $i++ ?>
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

@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Jualan<a href="{{ url('/jual/create') }}" class="btn btn-info pull-right"
        role="button">Jualan Baru</a></h2>

      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th width="65%">Makanan</th>
                    <th width="15%">Tarikh</th>
                    <th width="15%">Quantity</th>
                  </tr>
                </thead>
                <tbody pull-{right}>
                  <?php $i = 0 ?>
                  @forelse($sales as $sale)
                    <tr>
                      <td>{{ $sales->firstItem() + $i }}</td>
                      {{-- <td>
                        {{-- <form method="POST" action="/sale/{{ $sale->id }}/like"
                          style="display: inline-block;">
                          {{ csrf_field() }}
                          <button class="btn {{ Auth::check() &&
                            Auth::user()->alreadyliked($post) ? 'btn-success' : 'btn-default' }}" style="width: 3em">
                            {{ $post->likes->count() }}
                          </button>
                        </form> --}}
                        &nbsp&nbsp{{ $sale->food->nama_makanan }}
                        <small class="pull-right">
                          {{ $sale->created_at->diffForHumans() }}
                        </small>
                      </td> --}}
                      <td>{{ $sale->user->name }}</td>
                      <td>
                        @if( $sale->user_id == Auth::user()->id)
                          <a href="{{ action('PostController@edit', $post->id) }}"
                            class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ action('PostController@destroy', $post->id) }}"
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

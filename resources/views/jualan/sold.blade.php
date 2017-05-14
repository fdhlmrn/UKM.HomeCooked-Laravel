@extends('layouts.app')

@section('content')


        @foreach($boughts as $bought)
        <div class="card card-block">

                <h4 class="card-title">
				<strong>{{ $buyer->name }}</strong>
				<strong>{{ $food->nama_makanan }}</strong>
				<strong>{{ $bought->quantity }}</strong>
				<strong>{{ $bought->totalPrice }}</strong>
                </h4>
            </a>

        </div>
       <td><a href="{{ action('FoodsController@getEmel', $bought->id) }}" class="btn btn-success" role="button">Start</a>

        @endforeach


{{-- 
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>My Orders</h1>
			@foreach ($orders as $order)
			<div class="panel panel-default">
				<div class="panel-body">
					<ul class="list-group">
						@foreach ($order->cart->foods as $food)
						{{ dd($food) }}
						<li class="list-group=item"></li>
							<span class="badge">{{ $food['harga'] }} RM</span> {{ $food['food']['nama_makanan'] }} | {{ $food['qty'] }}
						@endforeach

					</ul>					
				</div>	
			</div>
			<div class="panel-footer">
			</div>
		</div>
		@endforeach
	</div> --}}
@endsection
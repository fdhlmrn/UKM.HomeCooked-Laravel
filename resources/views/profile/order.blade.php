@extends('layouts.app')

@section('content')


        @foreach($orders as $order)
        <div class="card card-block">

                <h4 class="card-title">
				<strong>Total Price: RM {{ $order->totalPrice }}</strong>
                </h4>
            </a>
            {{-- {{ dd($order->cart)}} --}}

		@foreach ($order->cart->foods as $food)

            <p class="card-text">
                    {{ $food['harga'] }} RM</span> {{ $food['food']['nama_makanan'] }} | {{ $food['qty'] }}
            </p>
		@endforeach

        </div>

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
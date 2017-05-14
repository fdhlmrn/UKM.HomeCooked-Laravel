@extends('layouts.app')
@section('content')
	@if (Session::has('cart'))
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<ul class="list-group">
					@foreach ($foods as $food)
						<li class="list-group-item">
							<span class="badge">
								{{ $food['qty'] }}
							</span>
							<strong>
								{{ $food['food']['nama_makanan'] }}
							</strong>
							<span class="label label-success">
								{{ $food['harga'] }}
							</span>
							<div class="btn-group">
								<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="{{ route('food.reduce', ['id' =>  $food['food']['id']]) }}">Reduce by 1</a></li>
									<li><a href="{{ route('food.remove', ['id' =>  $food['food']['id']]) }}">Reduce All</a></li>
								</ul>
							</div>
						</li>
						
					@endforeach
				</ul>
			</div>			
		</div><div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<strong>Total: {{ $totalPrice }}</strong>
			</div>			
		</div>
		</div><div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
			</div>			
		</div>
	@else
		</div><div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<h2>No Items</h2>
			</div>			
		</div>
	@endif

@stop
@if( $message = Session::get('success'))
	<div style="background-color: green">
		<p>{{$message}}</p>
	</div>
@endif
@if( $message = Session::get('danger'))
	<div style="background-color: red">
		<p>{{$message}}</p>
	</div>
@endif

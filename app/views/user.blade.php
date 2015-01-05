@extends('layouts/layout')
@section('content')

@if (isset($data))
	<div class="media">
		<a class="pull-left" href="#">
			<img class="media-object" src="{{ $data->pictureUrl }}" alt="Profile image">
		</a>
		<div class="media-body">
			<h1> Following Data is saved to database </h1>
				<h4 class="media-heading">First Name: </h4>
					<p>{{$data->firstName}} </p>
				<h4 class="media-heading"> Last Name: </h4>
					<p>{{$data->lastName}}</p>
				<h4 class="media-heading">URL: </h4>
					<p>{{$data->publicProfileUrl}}</p>
				<h4 class="media-heading">Location: </h4>
					<p>{{$data->location->country->code .' ,'.$data->location->name }}</p>
				<h1 class="media-heading">All info captured from LinkedIn: </h1>
					<pre>{{var_dump($data)}}</pre>
		</div>
	</div>
@else
	<div class="jumbotron">
		<h1 class="text-center" style="color: #000000;">
			<img class="img-circle"  src="https://d1qb2nb5cznatu.cloudfront.net/startups/i/528040-e21ffc0377df2340f9ccd24e18659bc6-medium_jpg.jpg?buster=1415248160" alt="BiteTogether" width="100" height="100">
				Login With LinkedIn
		</h1>
		<p class="text-center">
			<a class="linkedinBtn smGlobalBtn" href="{{url('login/linkedin')}}" ></a>
		</p>
	</div>
@endif

@stop
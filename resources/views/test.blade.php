<form method="post" action="{{url('test')}}" enctype="multipart/form-data">
	@csrf
	<input type="text" name="name">
	<input type="file" name="photo">
	<button>Kirim</button>
</form>

<a href="{{url('/logout')}}">Logout</a>

@foreach($test as $item)	
	<ul>
		<li>{{$item->name}}</li>
		<li>
			<img src="{{asset('images/'.$item->photo)}}"
			 style="width:10px;height:10px">
		</li>
		<li>
			<a href="{{url('/test/'.$item->id)}}">Delete</a>
		</li>
	</ul>
@endforeach

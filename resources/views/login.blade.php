<form method="post" action="{{url('login')}}">
	@csrf
	<input type="text" name="email">
	<input type="text" name="password">
	<button>Kirim</button>
</form>
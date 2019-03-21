	<a href="javascript:onopenmylink();" class="btn btn-primary">+ Add</a>
	<table class="table">
		<thead> 
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Company</th>
			</tr>	
		</thead>
		<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{$user->user_name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->name}}</td>
			</tr>
		@endforeach
		</tbody>
	</table>

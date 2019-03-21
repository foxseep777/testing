				<table class="table">
						<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Company</th>
							<th></th><th></th>
						</tr>	
						</thead>
						<tbody>
							@foreach($list as $users)
							<tr>
								<td>{{$users->user_name}}</td>
								<td>{{$users->email}}</td>
								<td>{{$users->limit}}</td>
								<td><a href="">edit</a></td>
								<td><a href="">delete</a></td>
							</tr>
						@endforeach
						</tbody>
				</table>



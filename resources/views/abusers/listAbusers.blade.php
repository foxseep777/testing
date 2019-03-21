<hr>
				<h3>Abusers of company {{$companyName->name}}</h3>
			
				<table class="table">
						<thead>
						<tr>
							<th>User</th>
							<th>Date/Time</th>
							<th>Resource</th>
							<th>Tranfered</th>
							<th></th>
						</tr>	
						</thead>
						<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{$user->user_name}}</td>
								<td>{{$user->date}}</td>
								<td>{{$user->resource}}</td>
								<td>{{$user->transfer}}</td>
								
							</tr>
						@endforeach
						</tbody>
				</table>



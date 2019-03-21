<a href="javascript:onopenmylink();"  class="btn btn-primary">+ Add</a>
				<table class="table">
						<thead>
						<tr>
							<th>Company</th>
							<th>Quota</th>

						</tr>	
						</thead>
						<tbody>
						@foreach($companies as $company)
							<tr>
								<td>{{$company->name}}</td>
								<td>{{$company->quota}}</td>
							</tr>
						@endforeach
						</tbody>
				</table>

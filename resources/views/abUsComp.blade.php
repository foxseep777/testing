<table class="table">
	<thead>
		<tr>
			<th>Company</th>
			<th>Quota</th>
			<th>Used</th>
			<th></th>
		</tr>	
	</thead>
	<tbody>
		@foreach($list as $company)
			<tr>
				<td>{{$company->name}}</td>
				<td>{{$company->quota}}</td>
				<td>{{$company->limit}}</td>
				<td><a href="#" onclick="companyAdd('{{$company->id}}','{{$company->month}}');">Abusers</a></td>
			</tr>
		@endforeach
	</tbody>
</table>
	 



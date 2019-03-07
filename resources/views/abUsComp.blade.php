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
				<td><a href="#" onclick="$.ajax({type: `GET`, url: `/reportAbusers`,
					data:'month={{$company->month}}&id={{$company->id}}', 
					success:function(response){$('#resSearch').html(response)}});">Abusers</a></td>
			</tr>
		@endforeach
	</tbody>
</table>
	



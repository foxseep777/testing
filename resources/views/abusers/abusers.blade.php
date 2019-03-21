@extends('layouts.app')


@section('title', 'Page Title')


@section('content')
<h1>Abusers</h1>

		<hr>
       <div class="flex-center position-ref full-height">
    

            <div class="content">
			<div id="preloader_malc" style="display:none">

	<div>

		Please wait, data is generated ...

	</div>

</div>	
               
               <div class="title m-b-md">
			   <form  id="month">
			   <div>
						<label>Select the reporting month</label>
					</div>
					<div>
						<select class="form-control form-control-sm" name="month">
							<option value="">Select month</option>
						@foreach($min as $k=>$m)
							<option value="{{$k.-$m}}">{{$k}}</option>
							
						@endforeach	
						</select>
					</div>
					
					<div>	
					<input type="submit" value="Show report" class="btn btn-primary">
					</div>
				</form>		
				<a href="/generate" class="btn btn-primary" id="generate">Generate Data</a>
				
		<div id="resSearch"> 
		@if(isset($resGen)) 
			<h2><span>{{$resGen}}</span></h2>
		@endif
		</div>	
              



            </div>
			</div>
        </div>
@endsection
    


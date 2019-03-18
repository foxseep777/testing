@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Test Models
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($testModels, ['route' => ['testModels.update', $testModels->id], 'method' => 'patch']) !!}

                        @include('test_models.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Instandart Models
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($instandartModels, ['route' => ['instandartModels.update', $instandartModels->id], 'method' => 'patch']) !!}

                        @include('instandart_models.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
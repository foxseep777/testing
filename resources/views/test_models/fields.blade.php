<!-- User Name <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_name', 'User Name <span class="required">*</span>:') !!}
    {!! Form::text('user_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Company <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_company', 'Id Company <span class="required">*</span>:') !!}
    {!! Form::text('id_company', null, ['class' => 'form-control']) !!}
</div>

<!-- Email <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email <span class="required">*</span>:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('testModels.index') !!}" class="btn btn-default">Cancel</a>
</div>

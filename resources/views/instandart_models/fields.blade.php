<!-- Name <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name <span class="required">*</span>:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Quota <span class="required">*</span> Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quota', 'Quota <span class="required">*</span>:') !!}
    {!! Form::number('quota', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('instandartModels.index') !!}" class="btn btn-default">Cancel</a>
</div>

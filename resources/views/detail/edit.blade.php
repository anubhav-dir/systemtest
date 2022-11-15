@extends('layouts.main')

@push('title')
    <title>Detail</title>
@endpush


@section('main-section')

<h1 class="text-center">Detail</h1>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card p-2 shadow-sm">
            {!! Form::model($model, ['route' => ['detail.update', $model->id], 'method' =>'PUT', 'id' => 'user-form', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                {!! Form::text('name', $model->name, ['class' => 'form-control rounded-0', 'placeholder' => 'Name', 'id' => 'name']) !!}
                @error('name')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('book', 'Book', ['class' => 'form-label']) !!}
                {!! Form::text('book', $model->book, ['class' => 'form-control rounded-0', 'placeholder' => 'Book', 'id' => 'book']) !!}
                @error('book')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('color', 'Color', ['class' => 'form-label']) !!}
                {!! Form::text('color', $model->color, ['class' => 'form-control rounded-0', 'placeholder' => 'Color', 'id' => 'color']) !!}
                @error('color')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'form-control btn btn-md btn-primary rounded-0']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

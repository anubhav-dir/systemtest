@extends('layouts.main')

@push('title')
    <title>Detail</title>
@endpush


@section('main-section')

<h1 class="text-center">Detail</h1>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card p-2 shadow-sm">
            {!! Form::model($model, ['route' => ['user.update', $model->id], 'method' =>'PUT', 'id' => 'user-form', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                {!! Form::text('name', $model->name, ['class' => 'form-control rounded-0', 'placeholder' => 'Name', 'id' => 'name']) !!}
                @error('name')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                {!! Form::text('email', $model->email, ['class' => 'form-control rounded-0', 'placeholder' => 'Email', 'id' => 'email']) !!}
                @error('email')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('mobile', 'Mobile No', ['class' => 'form-label']) !!}
                {!! Form::text('mobile', $model->mobile, ['class' => 'form-control rounded-0', 'placeholder' => 'Mobile No', 'id' => 'mobile', 'maxlength' => 10]) !!}
                @error('mobile')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('profile_photo', 'Profile Photo', ['class' => 'form-label']) !!}
                {!! Form::file('profile_photo', ['class' => 'form-control rounded-0', 'placeholder' => 'Profile Photo', 'id' => 'profile_photo']) !!}
                @error('profile_photo')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('address', 'Address', ['class' => 'form-label']) !!}
                {!! Form::textarea('address', $model->address, ['class' => 'form-control rounded-0', 'rows' => 2, 'placeholder' => 'Address', 'id' => 'address']) !!}
                @error('address')
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

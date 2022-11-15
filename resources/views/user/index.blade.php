@extends('layouts.main')

@push('title')
    <title>User</title>
@endpush


@section('main-section')

<h1 class="text-center">Users</h1>

<div class="row">
    <div class="col-md-9 col-sm-12">
        <div class="card table-responsive shadow-sm p-2">
            <table class="table table-bordered shadow-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Address </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (empty($model))
                        No record found.
                    @endif
                    @foreach ($model as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->mobile}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->address}}</td>
                            <td>
                                {!! Form::open(['method'=>'DELETE', 'url' =>route('user.destroy', $user->id)]) !!}
                                <a href="{{route('user.show', ['user'=>$user->id])}}" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i></a>
                                <a href="{{route('user.edit', ['user'=>$user->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                {!! Form::button('<i class="fa fa-trash-alt"></i>', ['type' => 'submit','class' => 'btn btn-sm btn-danger','title' => 'Delete','onclick'=>'return confirm("Move to trash?")']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="card p-1 shadow-sm">
            {!! Form::model($model, ['route' => ['user.store'], 'id' => 'user-form', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                {!! Form::text('name', '', ['class' => 'form-control rounded-0', 'placeholder' => 'Full Name', 'id' => 'name']) !!}
                @error('name')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                {!! Form::text('email', '', ['class' => 'form-control rounded-0', 'placeholder' => 'Email', 'id' => 'email']) !!}
                @error('email')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('mobile', 'Mobile No', ['class' => 'form-label']) !!}
                {!! Form::text('mobile', '', ['class' => 'form-control rounded-0', 'placeholder' => 'Mobile No', 'id' => 'mobile', 'maxlength' => 10]) !!}
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
                {!! Form::textarea('address', '', ['class' => 'form-control rounded-0', 'rows' => 2, 'placeholder' => 'Address', 'id' => 'address']) !!}
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

@extends('layouts.main')
@push('title')
    <title>{{$model->name}}</title>
@endpush

@section('main-section')
<div class="card m-3 p-3 rounded-0 shadow-sm">
    <h1 class="">{{$model->name}}</h1>
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <a href="{{route('user.index')}}" class="btn btn-sm btn-primary m-1"><i class="fa fa-list"></i> Index</a>
            <a href="{{route('user.edit', ['user'=>$model->id])}}" class="btn btn-sm btn-primary m-1"><i class="fa fa-pen"></i> Update</a>
            <a href="{{route('user.compress', ['id'=>$model->id])}}" class="btn btn-sm btn-primary m-1"><i class="fa fa-pen"></i> Compress</a>
            {!! Form::open(['method'=>'DELETE', 'url' =>route('user.destroy', $model->id)]) !!}
            {!! Form::button('<i class="fa fa-trash-alt"></i> Delete', ['type' => 'submit','class' => 'btn btn-defult btn-sm btn-danger m-1','title' => 'Delete','onclick'=>'return confirm("Confirm delete?")']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="card m-3 rounded-0 shadow-sm">
    <div class="card-header">
        <i class="fa fa-list me-1"></i>Details
    </div>
    <div class="card-body">
        <table id="" class="table table-bordered shadow-sm">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{$model->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$model->email}}</td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>{{$model->mobile}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{$model->address}}</td>
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{$model->created_at}}</td>
                </tr>
                <tr>
                    <th>Updated at</th>
                    <td>{{$model->updated_at}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card m-1 p-1">
        {{$model->alldetails}}
    </div>
</div>

@endsection

@extends('layouts.main')

@push('title')
    <title>Detail</title>
@endpush


@section('main-section')
    <h1 class="text-center">Detail</h1>

    <form action="">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="form-group">
                    {!! Form::text('search', $search, ['class' => 'form-control rounded-0', 'placeholder' => 'Search', 'id' => 'search']) !!}
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <div class="form-group">
                    {!! Form::submit('Search', ['class' => 'form-control btn btn-md btn-secondary rounded-0']) !!}
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <a href="{{route('detail.create')}}" class="btn btn-md w-100 btn-primary rounded-0">Add</a>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card table-responsive shadow-sm p-2">
                <table class="table table-bordered shadow-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Book</th>
                            <th>Color</th>
                            <th>Create Date</th>
                            <th>Update Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $detail)
                            <tr>
                                <td>{{ $detail->id }}</td>
                                <td>{{ $detail->name }}</td>
                                <td>{{ $detail->book }}</td>
                                <td>{{ $detail->color }}</td>
                                <td>{{ $detail->created_at }}</td>
                                <td>{{ $detail->updated_at }}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'url' => route('detail.destroy', $detail->id)]) !!}
                                    <a href="{{route('detail.show', ['detail'=>$detail->id])}}" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('detail.edit', ['detail'=>$detail->id])}}" class="btn btn-sm btn-primary m-1"><i class="fa fa-pen"></i></a>
                                    {!! Form::button('<i class="fa fa-trash-alt"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-sm btn-danger',
                                        'title' => 'Delete',
                                        'onclick' => 'return confirm("Move to trash?")',
                                    ]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

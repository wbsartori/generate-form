@extends('layout.layout')
@section('title','TITLE_NAME')
@section('content')
    @if (session('danger'))
        <div class="alert alert-danger text-center">
            <ul>
                {{ session('danger') }}
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success text-center">
            <ul>
                {{ session('success') }}
            </ul>
        </div>
    @endif
    <hr>
    <div class="row">
        <div class="col-md-4">
            <a href="{{route('page.add')}}" class="btn btn-secondary">New</a>
        </div>
    </div>
    <hr class="bg-dark">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <table id="order-listing" class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($registers as $register)
                            <tr>
                                <td>{{$register->id}}</td>
                                <td>
                                    <div class="input-group mb-3">
                                        <a href="{{route('page.editar',$register->id)}}" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delete{{$register->id}}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <div class="modal fade" id="delete{{$register->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <p>Are you sure you want to delete the record?<span class="text-center font-weight-bold"> {{$register->id}} ?</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('page.delete',$register->id)}}" class="btn btn-secondary">Confirm</a>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach()

                        </tbody>
                    </table>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="pagination justify-content-end">
                    {{$register->links('layout.shared.pagination')}}
                </ul>
            </nav>
            <hr>
        </div>
    </div>
@endsection()
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
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('page.save')}}" method="post">
                {{ csrf_field() }}
                @include('page._form')
                <hr>
                <button type="submit" class="btn btn-secondary mr-2">Save</button>
                <a href="/page" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
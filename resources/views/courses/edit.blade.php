@extends('admin.layout.master')
@section('content')
    <div class="container">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                @foreach ($errors->all() as	$error)
                    <p class="alert alert-danger">{{ $error}}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                {!! csrf_field() !!}
                <fieldset>
                    <legend>Edit course</legend>
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                                   value="{{ $course->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" id="content" name="description" rows="10" type="textarea"></textarea>
                        </div>
                    </div>
                    @foreach ($categories as $category)
                        <div class="form-check-label">
                            <input type="checkbox" class="form-check-inline" id="category_id" name="category_id[]"
                                   value=" {{ $category->id }} ">
                            <label class="form-check-label" for="customCheck1">{{ $category->name }}</label>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Price</label>
                        <div class="col-lg-10">
                            <input type="text" step="0.01" class="form-control" id="price" placeholder="Price"
                                   name="price" value="{{ $course->price }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-lg-2 control-label">Image</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <a href="{{route('course.index')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-primary" href={{route("coursedelete", ['id'=>$course->id])}} role="button">Delete</a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection

@extends('backend.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/event" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">

                        <form action="/event" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title<span class="text-danger">*</span></label>
                                <input id="title" class="form-control" type="text" name="title" value="{{old('title')}}" required/>
                            </div>
                            @error('title')
                               <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div class="form-group">
                                <label for="description">Description<span class="text-danger">*</span></label>
                               <textarea id="summernote" name="description" class="form-control" rows="50" value="" required>{{old('description')}}</textarea>
                            </div>
                            @error('description')
                               <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="startdate">Start Date<span class="text-danger">*</span></label>
                                        <input id="startdate" class="form-control" type="date" name="start_date" value="{{old('start_date')}}" required >
                                    </div>
                                    @error('start_date')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="enddate">End Date<span class="text-danger">*</span></label>
                                        <input id="enddate" class="form-control" type="date" name="end_date" value="{{old('end_date')}}" required>
                                    </div>
                                    @error('end_date')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Save Record</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('backend.app')
@section('heading')
    Event
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="col-md-12">
                <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header border-transparent">
                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endif


                  <a href="/event/create" class="btn btn-primary"><i class="fas fa-plus-square"></i> Add Event</a>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <form action="{{route('event.index')}}" method="GET">
                            <div class="form-group d-flex justify-content-center">
                                <select class="form-control select2bs4" name="search_by_event" style="width: 100%;">
                                  <option selected="selected">Filter by Event</option>
                                  <option value="finished">Finished Event</option>
                                  <option value="upcoming">Upcoming Event</option>
                                  <option value="7upcoming">Upcoming events within 7 days</option>
                                  <option value="7finished"> Finished events of the last 7 days</option>
                                </select>
                                <button class="btn btn-primary ml-1" type="submit">Search</button>
                              </div>
                        </form>
                      </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="example2">
                      <thead>
                      <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($events as $e)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $e->title}}</td>
                            <td>{!! $e->description!!}</td>
                            <td>{{ $e->startdate }}</td>
                            <td>{{ $e->enddate }}</td>

                            <td class="d-flex">
                                <a href="event/{{$e->id}}/edit" class="btn-primary btn-sm"><i></i><i class="fa fa-edit"></i></a>
                                <button id="delete" data-id="{{$e->id}}" data-token="{{ csrf_token() }}" class="btn btn-danger btn-sm ml-1" data-route="{{route('event.destroy',$e->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>

                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>

              </div>
              <!-- /.card -->
            </div>
           {{-- end renew --}}


        </div>
    </div>
@endsection

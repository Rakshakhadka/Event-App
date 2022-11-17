@extends('backend.app')
@section('heading')
    Post Tag
@endsection
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header border-transparent">
                  <a href="/posttag/create" class="btn btn-primary"><i class="fas fa-plus-square"></i> Add Post</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                      <tr>
                        <th>SN</th>
                        <th>Post Id</th>
                        <th>Tag Id </th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($posttags as $p)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $p->post->id}}</td>
                            <td>{{ $p->tag->id}}</td>
                            <td>
                                <a href="posttag/{{$p->id}}/edit" class="btn-primary btn-sm"><i></i>Edit</a>
                                    <form action="{{route('posttag.destroy',$p->id)}}" method="POST">
                                        {{method_field('DELETE')}}
                                        @csrf
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
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

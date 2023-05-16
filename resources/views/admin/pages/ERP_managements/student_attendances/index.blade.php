@extends('admin.layouts.main')
@section('content')

<div class="row justify-content-center">

<div class="col-10 ">
 <div class="card border-bottom border-primary">
    <div class="card-body p-0 p-3">
        <div class="row">
            <div class="col-10">

                <h3 class="m-0">{{$title ?? 'title'}}</h3>
            </div>
            {{-- <div class="col-2">
                <a href="{{route('plans.create')}}" class="btn btn-success">Create</a>
            </div> --}}
        </div>
    </div>
 </div>
</div>
<div class="col-12 mt-5">
    <div class="card border-bottom border-primary">
        <div class="card-body">
            <table class="table table-striped  table-hover table-borderless pt-3 " id="myTable">
                <thead class="">
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Present</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($data)>0)
                    @foreach ($data as $key => $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name??'-'}}</td>
                        <td>{{$item->class->name??'-'}}</td>
                        <td>{!!$item->attendance[0]?->present==1?'<span class="badge bg-success">Present</span>':'<span class="badge bg-danger">Absent</span>'!!}</td>
                        <td>
                            <div class="form-check form-switch">
                                <form action="{{route('student_attendances.update',$item->attendance[0]?->id)}}" method="POST">
                                   @csrf
                                   @method('PUT')
                                <input class="form-check-input {{$item->attendance[0]?->present==1?'bg-success':'bg-danger'}}" type="checkbox" id="flexSwitchCheckDefault"{{$item->attendance[0]?->present==1 ?'checked':''}} onchange="submit()" >
                                <label class="form-check-label" for="flexSwitchCheckDefault">Attendance</label>
                            </form>
                              </div>

                    </td>
                      </tr>

                    @endforeach
                @endif
                </tbody>
              </table>
        </div>
    </div>
</div>
</div>
@endsection


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
            <div class="col-2">
                <a href="{{route('student_transfers.create')}}" class="btn btn-success">Transfer Request</a>
            </div>
        </div>
    </div>
 </div>
</div>
<div class="col-12 mt-5">
    <div class="card border-bottom border-primary">
        <div class="card-body">
            @php
                $school_id=4;
            @endphp
            <table class="table table-striped  table-hover table-borderless pt-3 " id="myTable">
                <thead class="">
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student Id</th>
                    <th scope="col">From School</th>
                    <th scope="col"> Transfer School</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($data)>0)
                    @foreach ($data as $key => $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->student->name??'-'}}</td>
                        <td>{{$item->student->unique_id??'-'}}</td>
                        <td>{{$item->fromSchool->name??'-'}}</td>
                        <td>{{$item->toSchool->name??'-'}}</td>
                        <td>
                            @if ($item->status=='success')
                            <span class="badge bg-success">Transfer</span>
                            @elseif($item->status=='rejected')
                            <span class="badge bg-danger">Rejected</span>
                            @else
                            <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->from_school_id==$school_id)
                            <form action="{{route('student_transfers.update',$item->id)}}"  method="POST">
                                @csrf
                                @method('PUT')
                                  <button type="submit" name="submit" value="success" class="btn rounded-pill btn-sm btn-success d-inline-block" onclick="return (!confirm('Are you sure to transfer the student?'))?event.preventDefault():submit()" @if ($item->status!='pending')
                                      disabled
                                  @endif >Transfer</button>
                                  <button type="submit" name="submit" value="rejected" class="btn rounded-pill btn-sm btn-danger d-inline-block" onclick="return (!confirm('Are you sure to reject the transfer request of the student?'))?event.preventDefault():submit()"
                                  @if ($item->status!='pending')
                                    disabled
                                @endif >Rejected</button>
                            </form>
                            @endif
                            <div >
                        </div></td>
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

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
                <a href="{{route('students.create')}}" class="btn btn-success">Create</a>
            </div>
        </div>
    </div>
 </div>
</div>
<div class="col-10 text-center">
    <p class="text-danger">
        @error('newpassword')
        <p class="text-danger pt-2">
            {{$message}} {!!"<button class='d-inline-block rounded btn btn-danger btn-sm p-0 'onclick='this.parentNode.remove()' ><i class='bx bx-x' ></i></button>"!!}
               </p>
        @enderror
    </p>

        @error('confirm_password')

        <p class="text-danger pt-2">
     {{$message}} {!!"<button class='d-inline-block rounded btn btn-danger btn-sm p-0 'onclick='this.parentNode.remove()' ><i class='bx bx-x' ></i></button>"!!}
        </p>
        @enderror

        @if (Session::has('change'))
            <p class="text-success pt-2">
             {{Session::get('change')}} {!!"<button class='d-inline-block rounded btn btn-success btn-sm p-0 'onclick='this.parentNode.remove()' ><i class='bx bx-x' ></i></button>"!!}
            </p>
        @endif

</div>
<div class="col-12 mt-5">
    <div class="card border-bottom border-primary">
        <div class="card-body">
            <table class="table table-striped  table-hover table-borderless pt-3 " id="myTable">
                <thead class="">
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($data)>0)
                    @foreach ($data as $key => $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name??'-'}}</td>
                        <td>{{$item->email??'-'}}</td>
                        <td>{{$item->phone??'-'}}</td>
                        <td class="uppercase">{{$item->gender??'-'}}</td>
                        <td>{!!$item->status==1?'<span class="badge bg-success">Active</span>':'<span class="badge bg-danger">De-active</span>'!!}</td>
                        <td><div>
                            <a href="{{route('students.edit',$item->id)}}" class="btn rounded-pill btn-sm btn-warning">Edit</a>
                            <button class="btn rounded-pill btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$item->id}}">Delete</button>
                            <button class="btn rounded-pill btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#changePassword{{$item->id}}">Change Password</button>
                                <!-- Modal -->
                        </div></td>
                      </tr>
                      <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" aria-labelledby="delete{{$item->id}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                            <div class="modal-body text-center pt-0">
                   <img src="{{asset('admin_assets/assets/img/delete-img.png')}}" style="max-width:25%" alt="">
                   <h1>Are you sure?</h1>
                            </div>
                            <div class="modal-footer border-bottom border-danger">
                                <form action="{{route('students.destroy',$item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"class='btn btn-danger' >Delete</button>
                                   </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal fade" id="changePassword{{$item->id}}" tabindex="-1" aria-labelledby="changePassword{{$item->id}}Label" aria-hidden="true">
                        <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <h4 class="m-2 px-2">Change Password</h4>
                              <form  action="{{route('students.update',$item->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                             <div class="row m-2">
                                <div class="col-12">
                                <div class="mb-3">
                               <label for="password" class="form-label">New Password</label>
                               <input class="form-control"  type="password" id="password" name='newpassword' placeholder="New Password" required value="" minlength="8">
                                </div>
                             </div>

                                <div class="col-12">
                               <div class="mb-3">
                              <label for="confirm_password" class="form-label">Confirm Password</label>
                              <input class="form-control"  type="password" id="confirm_password" name='confirm_password' placeholder="Confirm Password" minlength="8" required value="">
                            </div>
                        </div>
                        </div>
                            <div class="modal-footer border-bottom border-success">


                                    <button type="submit"class='btn btn-success' >Change</button>
                                   </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                </tbody>
              </table>
        </div>
    </div>
</div>
</div>
@endsection

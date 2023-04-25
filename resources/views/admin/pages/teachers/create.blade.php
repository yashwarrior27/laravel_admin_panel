@extends('admin.layouts.main')
@section('content')
<div class="row justify-content-center">
    <div class="col-10 ">
        <div class="card border-bottom {{explode(' ',$title)[1]=='Edit'?'border-warning':'border-success'}}">
           <div class="card-body p-0 p-3">
               <div class="row">
                   <div class="col-10">
                       <h3 class="m-0">{{$title ?? 'title'}}</h3>
                   </div>
               </div>
           </div>
        </div>
       </div>
       <div class="col-12 mt-5">
        <div class="card border-bottom {{explode(' ',$title)[1]=='Edit'?'border-warning':'border-success'}}">
            <div class="card-body">
                <div class="row">
                    <form class="validate-form" action="{{route('teachers.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$result->id ?? ''}}">
                        <input type="hidden" name="unique_id" value="{{$result->unique_id ?? ''}}">
                        <input type="hidden" name="p_image" value="{{$result->profile_image ?? ''}}">
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input class="form-control"  type="text" id="name" name='name' placeholder="Name" required value="{{old('name',$result->name??'')}}">
                          <span class="text-danger">@error('name')
                              {{$message}}
                          @enderror</span>
                        </div>
                          <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input class="form-control"  type="email" id="email" name='email' placeholder="Email" required value="{{old('email',$result->email??'')}}">
                          <span class="text-danger">@error('email')
                              {{$message}}
                          @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input class="form-control"  type="text" id="phone" name='phone' placeholder="Phone" required value="{{old('phone',$result->phone??'')}}" minlength="10" maxlength="12">
                            <span class="text-danger">@error('phone')
                                {{$message}}
                            @enderror</span>
                          </div>
                          <div class="row">
                            <div class="col-6">
                                 <div class="mb-3">
                                <label for="dob" class="form-label">Date Of Birth</label>
                                <input class="form-control"  type="date" id="dob" name='dob' placeholder="Date Of Birth" required value="{{old('dob',$result->dob??'')}}">
                                <span class="text-danger">@error('dob')
                                    {{$message}}
                                @enderror</span>
                              </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label>Gender</label>
                                    <select name="gender" class="form-select" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male" {{isset($result) && $result->gender=="male"?'selected':''}}> Male
                                        </option>
                                        <option value="female" {{isset($result) && $result->gender=="female"?'selected':''}}>Female
                                        </option>
                                        <option value="other" {{isset($result) && $result->gender=="other"?'selected':''}}>Other
                                        </option>
                                    </select>
                                </div>
                            </div>
                            @if (!isset($result->password))
                            <div class="col-6">
                                <div class="mb-3">
                               <label for="password" class="form-label">Password</label>
                               <input class="form-control"  type="password" id="password" name='password' placeholder="Password" required value="">
                               <span class="text-danger">@error('password')
                                   {{$message}}
                               @enderror</span>
                             </div>
                           </div>
                           <div class="col-6">
                               <div class="mb-3">
                              <label for="confirm_password" class="form-label">Confirm Password</label>
                              <input class="form-control"  type="password" id="confirm_password" name='confirm_password' placeholder="Confirm Password" required value="">
                              <span class="text-danger">@error('confirm_password')
                                  {{$message}}
                              @enderror</span>
                            </div>
                          </div>
                            @endif

                          </div>

                          <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                               <label for="profile_image" class="form-label">Profile Image</label>
                               <input class="form-control"  type="file" id="profile_image" name='profile_image' placeholder="Profile Image"  accept='image/*'>
                               <span class="text-danger">@error('profile_image')
                                   {{$message}}
                               @enderror</span>
                             </div>
                           </div>
                           <div class="col-6 ">
                            @if (isset($result) && !empty($result->profile_image))

                            <img src="{{url('images/profile_images').'/'.$result->profile_image}}" style="max-width: 50%" alt="">
                            @endif
                           </div>

                          </div>
                          <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="1" {{isset($result) && $result->status=="1"?'selected':''}}> Active
                                </option>
                                <option value="0" {{isset($result) && $result->status=="0"?'selected':''}}>De-Active
                                </option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('teachers.index') }}" class="btn btn-sm btn-danger">back</a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                      </form>
             </div>
            </div>
        </div>
       </div>
</div>
@endsection

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
                    <form class="validate-form" action="{{route('school_managements.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$result->id ?? ''}}">
                        <input type="hidden" name="user_id" value="{{$result->user_id ?? ''}}">
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input class="form-control"  type="text" id="name" name='name' placeholder="Name" required value="{{old('name',$result->name??'')}}">
                          <span class="text-danger">@error('name')
                              {{$message}}
                          @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            @if (isset($result->email))
                            <input type="text" class="form-control" disabled value="{{old('email',$result->email??'')}}" >
                            @endif
                            <input class="form-control"  type="{{isset($result->email)?'hidden':'email'}}" id="email" name='email' placeholder="Email" required value="{{old('email',$result->email??'')}}">
                            <span class="text-danger">@error('email')
                                {{$message}}
                            @enderror</span>
                          </div>
                          <div class="mb-3">
                              <label for="phone" class="form-label">Phone</label>
                              @if (isset($result->phone))
                              <input type="text" class="form-control" disabled value="{{old('phone',$result->phone??'')}}">
                              @endif
                              <input class="form-control"  type="{{isset($result->phone)?'hidden':'text'}}" id="phone" name='phone' placeholder="Phone" required value="{{old('phone',$result->phone??'')}}" minlength="10" maxlength="12" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                              <span class="text-danger">@error('phone')
                                  {{$message}}
                              @enderror</span>
                            </div>
                            @if (!isset($result))
                            <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                               <label for="password" class="form-label">Password</label>
                               <input class="form-control"  type="password" id="password" name='password' placeholder="Password" required value="" minlength="8">
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
                        </div>
                            @endif
                          <div class="mb-3">
                          <label for="address" class="form-label">Address</label>
                          <textarea class="form-control"  type="text" id="address" name='address' placeholder="address" required >{{old('address',$result->address??'')}}</textarea>
                          <span class="text-danger">@error('address')
                              {{$message}}
                          @enderror</span>
                        </div>
                          <div class="row">
                            <div class="col-6">
                                 <div class="mb-3">
                                <label for="open_time" class="form-label">Open Time</label>
                                <input class="form-control"  type="time" id="open_time" name='open_time' placeholder="Open Time" required value="{{old('open_time',$result->open_time??'')}}">
                                <span class="text-danger">@error('open_time')
                                    {{$message}}
                                @enderror</span>
                              </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                               <label for="close_time" class="form-label">Close Time</label>
                               <input class="form-control"  type="time" id="close_time" name='close_time' placeholder="Close Time" required value="{{old('close_time',$result->close_time??'')}}">
                               <span class="text-danger">@error('close_time')
                                   {{$message}}
                               @enderror</span>
                             </div>
                           </div>
                          </div>

                          @php

                             $info= isset($result)?json_decode($result->info,true):'';
                             $top_students=isset($result)?json_decode($result->top_students,true):'';
                             $achievements=isset($result)?json_decode($result->achievements,true):'';
                             $gallery=isset($result)?json_decode($result->gallery,true):'';
                             $fee_structure=isset($result)?json_decode($result->fee_structure,true):'';
                             $image=isset($result)?json_decode($result->image,true):'';

                          @endphp

                          <div class="row mt-3">
                            <h4>Info</h4>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="about_us" class="form-label">About Us</label>
                                    <textarea class="form-control"  type="text" id="about_us" name="info[about_us]" placeholder="About Us" required >{{old("info[about_us]",$info['about_us']??'')}}</textarea>
                                    <span class="text-danger">@error("info[about_us]")
                                        {{$message}}
                                    @enderror</span>
                                  </div>
                            </div>

                            <div class="{{isset($result)?'col-4':'col-6'}}">
                                <div class="mb-3">
                                    <label for="principal_image" class="form-label">Principal Image</label>
                                    <input class="form-control"  type="file" id="principal_image" name="info[principal_image]" placeholder="Principal Image"  accept='image/*' @if (!isset($result))
                                    required
                                    @endif >
                                    <span class="text-danger">@error("info[principal_image]")
                                        {{$message}}
                                    @enderror</span>
                                  </div>
                            </div>
                            @if (isset($result))
                                <div class="col-2" style="align-self: center;">

                                    <input type="hidden" name="old_principal_image" value="{{$info['principal_image']}}">
                                    <img src="{{$info['principal_image']}}" style="max-width:50%; " alt="">
                                </div>
                            @endif
                            <div class="col-6">
                                <label for="principal_detail" class="form-label">Principal Detail</label>
                                <textarea class="form-control"  type="text" id="principal_detail" name="info[principal_detail]" placeholder="Principal Detail" required >{{old("info[principal_detail]",$info['principal_detail']??'')}}</textarea>
                                <span class="text-danger">@error("info[principal_detail]")
                                    {{$message}}
                                @enderror</span>
                              </div>
                            </div>
                            <div class="row mt-5">
                            <div class="col-6">

                                <div class="row" id="addFacility">
                                    <div class="col-12 d-flex" >
                                        <h5 class="d-inline-block">Facilities</h5>
                                       <div class="px-3"> <a type="button" class=" d-inline-block btn btn-primary rounded-pill btn-sm text-white mb-3" onclick="addFacility(this)">Add Facilities</a></div>
                                    </div>
                                    <div class="col-4 ">
                                        <input type="text" class="form-control mt-4" name="info[facilities][]" placeholder="Facility" required value="{{old("info[facilities][0]",$info['facilities'][0]??'')}}">
                                    </div>
                                    @if (isset($result))

                                    @php
                                        $a=1;
                                    @endphp
                                    @foreach ($info['facilities'] as $key=>$value )
                                    @php
                                        if($key==0)
                                        continue;
                                    @endphp
                                    <div class="col-4">
                                        <div class="float-end"><i class='bx bx-x' style="transform: translate(-1px, 20px);cursor: pointer;" onclick="removeElmt(this)"></i></div><input type="text" class="form-control" name="info[facilities][{{$a++}}]" placeholder="Facility"
                                        value="{{$value}}" required>
                                    </div>

                                    @endforeach

                                    @endif

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row" id="addFeature">
                                    <div class="col-12 d-flex" >
                                        <h5 class="d-inline-block">Features</h5>
                                       <div class="px-3"> <a type="button" class=" d-inline-block btn btn-primary rounded-pill btn-sm text-white mb-3" onclick="addFeature(this)">Add Features</a></div>
                                    </div>
                                    <div class="col-4 ">
                                        <input type="text" class="form-control mt-4" name="info[features][0]" placeholder="Feature" required value="{{old("info[features][0]",$info['features'][0]??'')}}">
                                    </div>
                                    @if (isset($result))

                                    @php
                                        $b=1;
                                    @endphp
                                    @foreach ($info['features'] as $key=>$value )
                                    @php
                                        if($key==0)
                                        continue;
                                    @endphp
                                    <div class="col-4">
                                        <div class="float-end"><i class='bx bx-x' style="transform: translate(-1px, 20px);cursor: pointer;" onclick="removeElmt(this)"></i></div><input type="text" class="form-control" name="info[features][{{$b++}}]" placeholder="Feature"
                                        value="{{$value}}" required>
                                    </div>

                                    @endforeach

                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 d-flex" >
                                <h4 class="d-inline-block">Top Student</h4>
                               <div class="px-3"> <a type="button" class=" d-inline-block btn btn-primary rounded-pill btn-sm text-white mb-3" onclick="addStudent(this)">Add Top Students</a></div>
                            </div>

                            <div class="col-12" id="addStudent">
                                <div class="row">
                                    <div class="{{isset($result)?'col-4':'col-6'}}">
                                        <div class="mb-3">
                                            <label for="top_students_image" class="form-label">Student Image</label>
                                            <input class="form-control"  type="file" id="top_students_image" name="top_students[image][0]" placeholder="Principal Image"  accept='image/*'
                                            @if (!isset($result))
                                            required
                                            @endif
                                          >
                                          </div>
                                    </div>

                                    @if (isset($result))

                                    <div class="col-2"  style="align-self: center;">
                                        <input type="hidden" name="old_top_students[image][0]" value="{{$top_students[0]['image']}}">
                                      <img src="{{$top_students[0]['image']}}" style="max-width:50%; " alt="">
                                    </div>
                                    @endif

                                    <div class="col-4">
                                        <label for="student_name" class="form-label">Student Name</label>
                                        <input class="form-control"  type="text" id="student_name" name="top_students[name][0]" placeholder="Student Name" required value="{{old("top_students[name][0]",$top_students[0]['name']??'')}}">
                                    </div>
                                    <div class="col-2">
                                        <label for="student_class" class="form-label">Student Class</label>
                                        <input class="form-control"   type="text" id="student_class" name="top_students[class][0]" placeholder="Student Class" oninput="this.value = this.value.toUpperCase()" pattern="^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$" required value="{{old("top_students[class][0]",$top_students[0]['class']??'')}}">
                                    </div>
                                    </div>

                                    @if (isset($result))
                                    @php
                                    $c=1;
                                @endphp

                                 @foreach ($top_students as $key=> $value)

                                 @php
                                     if($key==0)
                                     continue;
                                 @endphp
                                 <div class="row">
                                    <div class=""><i class='bx bx-x float-end' style="transform: translate(-1px, 10px);cursor: pointer;" onclick="removeElmt(this)"></i></div>
                                    <div class="{{isset($result)?'col-4':'col-6'}}">
                                        <div class="mb-3">
                                            <label for="top_students_image" class="form-label">Student Image</label>
                                            <input class="form-control"  type="file" id="top_students_image" name="top_students[image][{{$c}}]" placeholder="Principal Image"  accept='image/*'
                                            @if (!isset($result))
                                            required
                                            @endif
                                          >
                                          </div>
                                    </div>

                                    @if (isset($result))

                                    <div class="col-2" style="align-self: center;">
                                        <input type="hidden" name="old_top_students[image][{{$c}}]" value="{{$value['image']}}">
                                      <img src="{{$value['image']}}" style="max-width:50%;" alt="">
                                    </div>
                                    @endif

                                    <div class="col-4">
                                        <label for="student_name" class="form-label">Student Name</label>
                                        <input class="form-control"  type="text" id="student_name" name="top_students[name][{{$c}}]" placeholder="Student Name" required value="{{old("top_students[name][$key]",$value['name']??'')}}">
                                    </div>
                                    <div class="col-2">
                                        <label for="student_class" class="form-label">Student Class</label>
                                        <input class="form-control"   type="text" id="student_class" name="top_students[class][{{$c}}]" placeholder="Student Class" oninput="this.value = this.value.toUpperCase()" pattern="^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$" required value="{{old("top_students[class][0]",$value['class']??'')}}">
                                    </div>
                                    </div>
                                    @php
                                        $c++;
                                    @endphp

                                 @endforeach

                                    @endif
                            </div>
                        </div>

                            <div class="row mt-5">
                                <div class="col-12 d-flex" >
                                    <h4 class="d-inline-block">Achievements</h4>
                                   <div class="px-3"> <a type="button" class=" d-inline-block btn btn-primary rounded-pill btn-sm text-white mb-3" onclick="addAchivement(this)">Add Achievements</a></div>
                                </div>

                                <div class="col-12 mt-2" id="addAchivement">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="achievement_image" class="form-label">Achievement Image</label>
                                                <input class="form-control"  type="file" id="achievement_image" name="achievements[image][0]"   accept='image/*' @if (!isset($result))
                                                required
                                                @endif>
                                              </div>
                                        </div>
                                        @if (isset($result))
                                        <div class="col-2"  style="align-self: center;">
                                            <input type="hidden" name="old_achievements[image][0]" value="{{$achievements[0]['image']}}">
                                            <img src="{{$achievements[0]['image']}}" style="max-width:50%;" alt="">
                                        </div>
                                        @endif

                                        <div class="col-3">
                                            <label for="achievement_name" class="form-label">Achievement Title</label>
                                            <input class="form-control"  type="text" id="achievement_name" name="achievements[name][0]" placeholder="Achievement Title" required value="{{old("achievements[name][0]",$achievements[0]['name']??'')}}" >
                                        </div>
                                        <div class="col-3">
                                            <label for="achievement_date" class="form-label">Achievement Year</label>
                                            <input class="form-control"   type="number" id="achievement_date" name="achievements[year][0]" placeholder="YYYY" min="1980" max="{{date('Y')}}"  required value="{{old("achievements[year][0]",$achievements[0]['year']??'')}}"  >
                                        </div>
                                        <div class="col-3">
                                            <label for="achievement_description" class="form-label">Achievement Description</label>
                                            <textarea class="form-control" id="achievement_description" name="achievements[description][0]" placeholder="Achievement Description" required >{{old("achievements[description][0]",$achievements[0]['description']??'')}}</textarea>
                                        </div>


                                        </div>
                                        @if (isset($result))
                                        @php
                                        $d=1;
                                    @endphp

                                    @foreach ($achievements as $key=>$value)
                                    @php
                                    if($key==0)
                                    continue;
                                @endphp
                                    <div class="row">
                                        <div class=""><i class='bx bx-x float-end' style="transform: translate(-1px, 10px);cursor: pointer;" onclick="removeElmt(this)"></i></div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="achievement_image" class="form-label">Achievement Image</label>
                                                <input class="form-control"  type="file" id="achievement_image" name="achievements[image][{{$d}}]"   accept='image/*' @if (!isset($result))
                                                required
                                                @endif>
                                              </div>
                                        </div>
                                        @if (isset($result))
                                        <div class="col-2"  style="align-self: center;">
                                            <input type="hidden" name="old_achievements[image][{{$d}}]" value="{{$value['image']}}">
                                            <img src="{{$value['image']}}" style="max-width:50%;" alt="">
                                        </div>
                                        @endif

                                        <div class="col-3">
                                            <label for="achievement_name" class="form-label">Achievement Title</label>
                                            <input class="form-control"  type="text" id="achievement_name" name="achievements[name][{{$d}}]" placeholder="Achievement Title" required value="{{old("achievements[name][$d]",$value['name']??'')}}" >
                                        </div>
                                        <div class="col-3">
                                            <label for="achievement_date" class="form-label">Achievement Year</label>
                                            <input class="form-control"   type="number" id="achievement_date" name="achievements[year][{{$d}}]" placeholder="YYYY" min="1980" max="{{date('Y')}}"  required value="{{old("achievements[year][$d]",$value['year']??'')}}"  >
                                        </div>
                                        <div class="col-3">
                                            <label for="achievement_description" class="form-label">Achievement Description</label>
                                            <textarea class="form-control" id="achievement_description" name="achievements[description][{{$d}}]" placeholder="Achievement Description" required >{{old("achievements[description][$d]",$value['description']??'')}}</textarea>
                                        </div>


                                        </div>
                                        @php
                                         $d++;
                                        @endphp

                                    @endforeach
                                    @endif



                                </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12 d-flex" >
                                <h4 class="d-inline-block">Gallery</h4>
                               <div class="px-3"> <a type="button" class=" d-inline-block btn btn-primary rounded-pill btn-sm text-white mb-3" onclick="addGallery(this)">Add Image</a></div>
                            </div>

                            <div class="col-12 mt-2" id="addGallery">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="gallery_image" class="form-label">Gallery Image</label>
                                            <input class="form-control"  type="file" id="gallery_image" name="gallery[url][0]"   accept='image/*'
                                               @if (!isset($result))
                                               required>
                                               @endif
                                          </div>
                                    </div>
                                </div>
                                @if (isset($result))
                                     <div class="col-6 py-3" style="align-self: center">
                                        <input type="hidden" name="old_gallery[url][0]" value="{{$gallery[0]['url']}}" >
                                       <img src="{{$gallery[0]['url']}}" style="max-width: 25%" alt="">
                                     </div>
                                @endif
                            </div>
                            @if (isset($result))
                            @php
                            $e=1;
                        @endphp

                        @foreach ($gallery as $key=>$value)

                        @php
                            if($key==0)
                            continue;
                        @endphp
                        <div class="row">
                            <div class="col-6"><div class="float-end"><i class='bx bx-x' style="transform: translate(-1px, 30px);cursor: pointer;" onclick="this.parentNode.parentNode.parentNode.remove()"></i></div>
                                <div class="mb-3">
                                    <label for="gallery_image" class="form-label">Gallery Image</label>
                                    <input class="form-control"  type="file" id="gallery_image" name="gallery[url][{{$e++;}}]"   accept='image/*' @if (!isset($result))
                                    required
                                    @endif >
                                  </div>
                            </div>
                            <div class="col-6" style="align-self: center">
                                <input type="hidden" name="old_gallery[url][{{$e}}]" value="{{$value['url']}}" >
                       <img src="{{$value['url']}}" style="max-width: 25%" alt="">
                            </div>
                        </div>

                        @endforeach
                            @endif



                        </div>
                         <div class="row mt-5">
                            <div class="col-12 d-flex" >
                                <h4 class="d-inline-block">Header Images</h4>
                               <div class="px-3"> <a type="button" class=" d-inline-block btn btn-primary rounded-pill btn-sm text-white mb-3" onclick="addImage(this)">Add Image</a></div>
                            </div>

                            <div class="col-12 mt-2" id="addImage">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="header_image" class="form-label">Header Image</label>
                                            <input class="form-control"  type="file" id="header_image" name="image[0]"   accept='image/*'
                                               @if (!isset($result))
                                               required>
                                               @endif
                                          </div>
                                    </div>
                                </div>
                                @if (isset($result))
                                     <div class="col-6 py-3" style="align-self: center">
                                        <input type="hidden" name="old_image[0]" value="{{$image[0]}}" >
                                       <img src="{{$image[0]}}" style="max-width: 25%" alt="">
                                     </div>
                                @endif
                            </div>
                            @if (isset($result))
                            @php
                            $g=1;
                        @endphp

                        @foreach ($image as $key=>$value)

                        @php
                            if($key==0)
                            continue;
                        @endphp
                        <div class="row">
                            <div class="col-6"><div class="float-end"><i class='bx bx-x' style="transform: translate(-1px, 30px);cursor: pointer;" onclick="this.parentNode.parentNode.parentNode.remove()"></i></div>
                                <div class="mb-3">
                                    <label for="header_image" class="form-label">Header Image</label>
                                    <input class="form-control"  type="file" id="header_image" name="image[{{$e++;}}]"   accept='image/*' @if (!isset($result))
                                    required
                                    @endif >
                                  </div>
                            </div>
                            <div class="col-6" style="align-self: center">
                                <input type="hidden" name="old_image[{{$e}}]" value="{{$value}}" >
                       <img src="{{$value}}" style="max-width: 25%" alt="">
                            </div>
                        </div>

                        @endforeach
                            @endif


                            </div>

                    <div class="row mt-5">
                        <div class="col-12 d-flex" >
                            <h4 class="d-inline-block">Fees Structure</h4>
                           <div class="px-3"> <a type="button" class=" d-inline-block btn btn-primary rounded-pill btn-sm text-white mb-3" onclick="addFees(this)">Add Fees Structure</a></div>
                        </div>

                        <div class="col-12 mt-2" id="addFees">
                            <div class="row">
                                <div class="col-4">
                                    <label for="fee_structure_title" class="form-label"> Title</label>
                                    <input class="form-control"  type="text" id="fee_structure_title" name="fee_structure[title][0]" placeholder="Title" required value="{{old("fee_structure[title][0]",$fee_structure[0]['title']??'')}}" >
                                </div>
                                <div class="col-4">
                                    <label for="fee_structure_content" class="form-label">Content</label>
                                    <textarea class="form-control" id="fee_structure_content" name="fee_structure[content][0]" placeholder="Content" required>{{old("fee_structure[content][0]",$fee_structure[0]['content']??'')}}</textarea>
                                </div>
                                <div class="col-4">
                                    <label for="fess_structure_registration" class="form-label">Registration</label>
                                    <input class="form-control"  type="number" id="fess_structure_registration" name="fee_structure[registration][0]" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" placeholder="Registration" required value="{{old("fee_structure[registration][0]",$fee_structure[0]['registration']??'')}}" >
                                </div>
                                <div class="col-4">
                                    <label for="fess_structure_quarter1" class="form-label">Quarter 1</label>
                                    <input class="form-control"  type="number" id="fess_structure_quarter1" name="fee_structure[quarter1][0]" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" placeholder="Quarter 1" required value="{{old("fee_structure[quarter1][0]",$fee_structure[0]['quarter1']??'')}}" >
                                </div>
                                <div class="col-4">
                                    <label for="fess_structure_quarter2" class="form-label">Quarter 2</label>
                                    <input class="form-control"  type="number" id="fess_structure_quarter2" name="fee_structure[quarter2][0]" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" placeholder="Quarter 2" required value="{{old("fee_structure[quarter2][0]",$fee_structure[0]['quarter2']??'')}}" >
                                </div>
                                <div class="col-4">
                                    <label for="fess_structure_quarter3" class="form-label">Quarter 3</label>
                                    <input class="form-control"  type="number" id="fess_structure_quarter3" name="fee_structure[quarter3][0]" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" placeholder="Quarter 3" required value="{{old("fee_structure[quarter3][0]",$fee_structure[0]['quarter3']??'')}}">
                                </div>

                                </div>

                          @if (isset($result))

                          @php
                              $f=1;
                          @endphp

                          @foreach ($fee_structure as $key=>$value)

                          @php
                              if($key==0)
                              continue;
                          @endphp
                               <div class="row mt-3">
                                <div class=""><i class='bx bx-x float-end' style="transform: translate(-1px, 20px);cursor: pointer;" onclick="removeElmt(this)"></i></div>
                                <div class="col-4">
                                    <label for="fee_structure_title" class="form-label"> Title</label>
                                    <input class="form-control"  type="text" id="fee_structure_title" name="fee_structure[title][{{$f}}]" placeholder="Title" required value="{{old("fee_structure[title][$f]",$value['title']??'')}}" >
                                </div>
                                <div class="col-4">
                                    <label for="fee_structure_content" class="form-label">Content</label>
                                    <textarea class="form-control" id="fee_structure_content" name="fee_structure[content][{{$f}}]" placeholder="Content" required>{{old("fee_structure[content][$f]",$value['content']??'')}}</textarea>
                                </div>
                                <div class="col-4">
                                    <label for="fess_structure_registration" class="form-label">Registration</label>
                                    <input class="form-control"  type="number" id="fess_structure_registration" name="fee_structure[registration][{{$f}}]" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" placeholder="Registration" required value="{{old("fee_structure[registration][$f]",$value['registration']??'')}}" >
                                </div>
                                <div class="col-4">
                                    <label for="fess_structure_quarter1" class="form-label">Quarter 1</label>
                                    <input class="form-control"  type="number" id="fess_structure_quarter1" name="fee_structure[quarter1][{{$f}}]" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" placeholder="Quarter 1" required value="{{old("fee_structure[quarter1][$f]",$value['quarter1']??'')}}" >
                                </div>
                                <div class="col-4">
                                    <label for="fess_structure_quarter2" class="form-label">Quarter 2</label>
                                    <input class="form-control"  type="number" id="fess_structure_quarter2" name="fee_structure[quarter2][{{$f}}]" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" placeholder="Quarter 2" required value="{{old("fee_structure[quarter2][$f]",$value['quarter2']??'')}}" >
                                </div>
                                <div class="col-4">
                                    <label for="fess_structure_quarter3" class="form-label">Quarter 3</label>
                                    <input class="form-control"  type="number" id="fess_structure_quarter3" name="fee_structure[quarter3][{{$f}}]" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" placeholder="Quarter 3" required value="{{old("fee_structure[quarter3][$f]",$value['quarter3']??'')}}">
                                </div>

                                </div>

                                @php
                                 $f++;
                                 @endphp

                          @endforeach



                          @endif

                        </div>

                </div>

                          <div class="mb-3 mt-3">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="1" {{isset($result) && $result->status=="1"?'selected':''}}> Active
                                </option>
                                <option value="0" {{isset($result) && $result->status=="0"?'selected':''}}>De-Active
                                </option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('school_managements.index') }}" class="btn btn-sm btn-danger">back</a>
                            <button type="submit" class="btn btn-sm btn-success" id='test-submit'>Submit</button>
                        </div>
                      </form>
             </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>

    var a={{isset($a)?$a-1:0}};
    var b={{isset($b)?$b-1:0}};
    var c={{isset($c)?$c-1:0}};
    var d={{isset($d)?$d-1:0}};
    var e={{isset($e)?$e-1:0}};
    var f={{isset($f)?$f-1:0}};
    var g={{isset($g)?$g-1:0}};

    function addFacility(){
              a++;
        let parent=document.getElementById('addFacility');
        const newElement = document.createElement('div');
        newElement.classList.add('col-4');
         newElement.innerHTML=`<div class="float-end"><i class='bx bx-x' style="transform: translate(-1px, 20px);cursor: pointer;" onclick="removeElmt(this)"></i></div><input type="text" class="form-control" name="info[facilities][${a}]" placeholder="Facility" required>`;
         parent.appendChild(newElement);
    }
    function addFeature(){
        b++;
        let parent=document.getElementById('addFeature');
        const newElement = document.createElement('div');
        newElement.classList.add('col-4');
         newElement.innerHTML=`<div class="float-end"><i class='bx bx-x' style="transform: translate(-1px, 20px);cursor: pointer;" onclick="removeElmt(this)"></i></div><input type="text" class="form-control" name="info[features][${b}]" placeholder="Feature" required>`;
         parent.appendChild(newElement);
    }

    function addStudent(){
        c++;
        let parent=document.getElementById('addStudent');
        const newElement = document.createElement('div');
        newElement.classList.add('row');
         newElement.innerHTML=`  <div class=""><i class='bx bx-x float-end' style="transform: translate(-1px, 10px);cursor: pointer;" onclick="removeElmt(this)"></i></div><div class="col-6">
                                        <div class="mb-3">
                                            <label for="top_students_image" class="form-label">Student Image</label>
                                            <input class="form-control"  type="file" id="top_students_image" name="top_students[image][${c}]" placeholder="Principal Image"  accept='image/*' required>
                                          </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="student_name" class="form-label">Student Name</label>
                                        <input class="form-control"  type="text" id="student_name" name="top_students[name][${c}]" placeholder="Student Name" required value="">
                                    </div>
                                    <div class="col-2">
                                        <label for="student_class" class="form-label">Student Class</label>
                                        <input class="form-control"   type="text" id="student_class" name="top_students[class][${c}]" placeholder="Student Class" oninput="this.value = this.value.toUpperCase()" pattern="^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$" required value="">
                                    </div>`;
         parent.appendChild(newElement);
    }
    function addAchivement(){
        d++;
        let parent=document.getElementById('addAchivement');
        const newElement = document.createElement('div');
        newElement.classList.add('row');
         newElement.innerHTML=`  <div class=""><i class='bx bx-x float-end' style="transform: translate(-1px, 10px);cursor: pointer;" onclick="removeElmt(this)"></i></div> <div class="col-3">
                                            <div class="mb-3">
                                                <label for="achievement_image" class="form-label">Achievement Image</label>
                                                <input class="form-control"  type="file" id="achievement_image" name="achievements[image][${d}]"   accept='image/*' required>
                                              </div>
                                        </div>
                                        <div class="col-3">
                                            <label for="achievement_name" class="form-label">Achievement Title</label>
                                            <input class="form-control"  type="text" id="achievement_name" name="achievements[name][${d}]" placeholder="Achievement Title" required >
                                        </div>
                                        <div class="col-3">
                                            <label for="achievement_date" class="form-label">Achievement Year</label>
                                            <input class="form-control"   type="number" id="achievement_date" name="achievements[year][${d}]" placeholder="YYYY" min="1980" max="{{date('Y')}}"  required >
                                        </div>
                                        <div class="col-3">
                                            <label for="achievement_description" class="form-label">Achievement Description</label>
                                            <textarea class="form-control" id="achievement_description" name="achievements[description][${d}]" placeholder="Achievement Description" required></textarea>
                                        </div>`;
         parent.appendChild(newElement);
    }

    function addGallery(){
        e++;
        let parent=document.getElementById('addGallery');
        const newElement = document.createElement('div');
        newElement.classList.add('row');
         newElement.innerHTML=`<div class="col-6"><div class="float-end"><i class='bx bx-x' style="transform: translate(-1px, 30px);cursor: pointer;" onclick="removeElmt(this)"></i></div>
                                        <div class="mb-3">
                                            <label for="gallery_image" class="form-label">Gallery Image</label>
                                            <input class="form-control"  type="file" id="gallery_image" name="gallery[url][${e}]"   accept='image/*' required>
                                          </div>
                                    </div>`;
         parent.appendChild(newElement);
    }

    function addFees(){
        f++;
        let parent=document.getElementById('addFees');
        const newElement = document.createElement('div');
        newElement.classList.add('row','mt-3');
         newElement.innerHTML=`  <div class=""><i class='bx bx-x float-end' style="transform: translate(-1px, 20px);cursor: pointer;" onclick="removeElmt(this)"></i></div>  <div class="col-4">
                                    <label for="fee_structure_title" class="form-label"> Title</label>
                                    <input class="form-control"  type="text" id="fee_structure_title" name="fee_structure[title][${f}]" placeholder="Title" required >
                                </div>
                                <div class="col-4">
                                    <label for="fee_structure_content" class="form-label">Content</label>
                                    <textarea class="form-control" id="fee_structure_content" name="fee_structure[content][${f}]" placeholder="Content" required></textarea>
                                </div>
                                <div class="col-4">
                                    <label for="fess_structure_registration" class="form-label">Registration</label>
                                    <input class="form-control"  type="number" id="fess_structure_registration" name="fee_structure[registration][${f}]" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" placeholder="Registration" required >
                                </div>
                                <div class="col-4">
                                    <label for="fess_structure_quarter1" class="form-label">Quarter 1</label>
                                    <input class="form-control"  type="number" id="fess_structure_quarter1" name="fee_structure[quarter1][${f}]" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" placeholder="Quarter 1" required >
                                </div>
                                <div class="col-4">
                                    <label for="fess_structure_quarter2" class="form-label">Quarter 2</label>
                                    <input class="form-control"  type="number" id="fess_structure_quarter2" name="fee_structure[quarter2][${f}]" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" placeholder="Quarter 2" required >
                                </div>
                                <div class="col-4">
                                    <label for="fess_structure_quarter3" class="form-label">Quarter 3</label>
                                    <input class="form-control"  type="number" id="fess_structure_quarter3" name="fee_structure[quarter3][${f}]" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" placeholder="Quarter 3" required >
                                </div>`;
         parent.appendChild(newElement);
    }

    function addImage(){
        e++;
        let parent=document.getElementById('addImage');
        const newElement = document.createElement('div');
        newElement.classList.add('row');
         newElement.innerHTML=`<div class="col-6"><div class="float-end"><i class='bx bx-x' style="transform: translate(-1px, 30px);cursor: pointer;" onclick="removeElmt(this)"></i></div>
                                     <div class="mb-3">
                                    <label for="header_image" class="form-label">Header Image</label>
                                    <input class="form-control"  type="file" id="header_image" name="image[${g}]"   accept='image/*'
                                    required
                                     >
                                  </div>
                                    </div>`;
         parent.appendChild(newElement);
    }
    function removeElmt(e){
         e.parentNode.parentNode.remove();
    }
</script>
@endsection

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
                   <div class="col-2">
                    <form action="{{route('addmissions.update',$result->id)}}" class=" d-inline-block" method="post">
                        @csrf
                        @method('PATCH')
                    <button class="btn rounded-pill btn-sm btn-primary d-inline-block" @if ($result->status==1)
                        disabled
                    @endif>Convert</button>
                    </form>
                   </div>
               </div>
           </div>
        </div>
       </div>
       <div class="col-12 mt-5">
        <div class="card border-bottom {{explode(' ',$title)[1]=='Edit'?'border-warning':'border-success'}}">
            <div class="card-body">
               <div class="row ">
                <div class="col-3 mt-3">
                    <label for="applied_for" class="form-label">Applied Type</label>
                    <input type="text" id="applied_for" class="form-control" disabled value="{{$result->applied_for??''}}">
                </div>
                <div class="col-6 mt-3">
                    <label for="AppliedForname" class="form-label">Applied For</label>
                    <input type="text" id="AppliedForname" class="form-control" disabled value="{{$result->AppliedFor->name??''}}">
                </div>
                <div class="col-3 mt-3">
                    <label for="Username" class="form-label">User Name</label>
                    <input type="text" id="Username" class="form-control" disabled value="{{$result->User->name??''}}">
                </div>
                <div class="col-3 mt-3">
                    <label for="created_at" class="form-label">Date</label>
                    <input type="text" id="created_at" class="form-control" disabled value="{{ date('Y-m-d',strtotime($result->created_at))??''}}">
                </div>
                <div class="col-3 mt-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" id="status" class="form-control" disabled value="{{$result->status==1?'Converted':'Pending'}}">
                </div>
               </div>
               <h5 class="mt-5">Student Information</h5>
            <div class="row">
                <div class="col-4 mt-3">
                    <label for="student_info['name']" class="form-label">Student Name</label>
                    <input type="text" id="student_info['name']" class="form-control" disabled value="{{$result->student_info['name']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="student_info['father_name']" class="form-label">Father's Name</label>
                    <input type="text" id="student_info['father_name']" class="form-control" disabled value="{{$result->student_info['father_name']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="student_info['mother_name']" class="form-label">Mother's Name</label>
                    <input type="text" id="student_info['mother_name']" class="form-control" disabled value="{{$result->student_info['mother_name']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="student_info['gender']" class="form-label">Gender</label>
                    <input type="text" id="student_info['gender']" class="form-control" disabled value="{{$result->student_info['gender']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="student_info['category']" class="form-label">Category</label>
                    <input type="text" id="student_info['category']" class="form-control" disabled value="{{$result->student_info['category']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="student_info['mother_toungue']" class="form-label">Mother Toungue</label>
                    <input type="text" id="student_info['mother_toungue']" class="form-control" disabled value="{{$result->student_info['mother_tounge']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="student_info['dob']" class="form-label">Date Of Birth</label>
                    <input type="text" id="student_info['dob']" class="form-control" disabled value="{{$result->student_info['dob']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="student_info['adhar_no']" class="form-label">Aadhar No.</label>
                    <input type="text" id="student_info['adhar_no']" class="form-control" disabled value="{{$result->student_info['adhar_no']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="student_info['blood_group']" class="form-label">Blood Group</label>
                    <input type="text" id="student_info['blood_group']" class="form-control" disabled value="{{$result->student_info['blood_group']??''}}">
                </div>
            </div>
            <h5 class="mt-5 ">Residential Information</h5>
            <div class="row">
                <div class="col-4 mt-3">
                    <label for="residential_info['religion']" class="form-label">Religion</label>
                    <input type="text" id="residential_info['religion']" class="form-control" disabled value="{{$result->residential_info['religion']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="residential_info['nationality']" class="form-label">Nationality</label>
                    <input type="text" id="residential_info['nationality']" class="form-control" disabled value="{{$result->residential_info['nationality']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="residential_info['state']" class="form-label">State</label>
                    <input type="text" id="residential_info['state']" class="form-control" disabled value="{{$result->residential_info['state']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="residential_info['city']" class="form-label">City</label>
                    <input type="text" id="residential_info['city']" class="form-control" disabled value="{{$result->residential_info['city']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="residential_info['address']" class="form-label">address</label>
                    <textarea type="text" id="residential_info['address']" class="form-control" disabled>{{$result->residential_info['address']??''}}</textarea>
                </div>
                <div class="col-4 mt-3">
                    <label for="residential_info['pincode']" class="form-label">pincode</label>
                    <input type="text" id="residential_info['pincode']" class="form-control" disabled value="{{$result->residential_info['pincode']??''}}">
                </div>
            </div>
            <h5 class="mt-5 ">Previous School Information</h5>
            <div class="row">
                <div class="col-4 mt-3">
                    <label for="prev_school_info['school_name']" class="form-label">School Name</label>
                    <input type="text" id="prev_school_info['school_name']" class="form-control" disabled value="{{$result->prev_school_info['school_name']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="prev_school_info['class']" class="form-label">Class</label>
                    <input type="text" id="prev_school_info['class']" class="form-control" disabled value="{{$result->prev_school_info['class']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="prev_school_info['years']" class="form-label">Years of Study in that School</label>
                    <input type="text" id="prev_school_info['years']" class="form-control" disabled value="{{$result->prev_school_info['years']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="prev_school_info['grade']" class="form-label">Grade</label>
                    <input type="text" id="prev_school_info['grade']" class="form-control" disabled value="{{$result->prev_school_info['grade']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="prev_school_info['location']" class="form-label">Location</label>
                    <textarea type="text" id="prev_school_info['location']" class="form-control" disabled>{{$result->prev_school_info['location']??''}}</textarea>
                </div>
            </div>
            <h5 class="mt-5">Father's Information</h5>
             <div class="row">
                <div class="col-4 mt-3">
                    <label for="father_info['qualification']" class="form-label">Qualification</label>
                    <input type="text" id="father_info['qualification']" class="form-control" disabled value="{{$result->father_info['qualification']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="father_info['occupation']" class="form-label">Occupation</label>
                    <input type="text" id="father_info['occupation']" class="form-control" disabled value="{{$result->father_info['occupation']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="father_info['organization']" class="form-label">Organzation</label>
                    <input type="text" id="father_info['organization']" class="form-control" disabled value="{{$result->father_info['organization']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="father_info['mobile_no']" class="form-label">Mobile No.</label>
                    <input type="text" id="father_info['mobile_no']" class="form-control" disabled value="{{$result->father_info['mobile_no']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="father_info['adhar_no']" class="form-label">Aadhar No.</label>
                    <input type="text" id="father_info['adhar_no']" class="form-control" disabled value="{{$result->father_info['adhar_no']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="father_info['email']" class="form-label">Email</label>
                    <input type="text" id="father_info['email']" class="form-control" disabled value="{{$result->father_info['email']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="father_info['annual_income']" class="form-label">Annual Income</label>
                    <input type="text" id="father_info['annual_income']" class="form-control" disabled value="{{$result->father_info['annual_income']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="father_info['landline_no']" class="form-label">Landline No.</label>
                    <input type="text" id="father_info['landline_no']" class="form-control" disabled value="{{$result->father_info['landline_no']??''}}">
                </div>

             </div>
             <h5 class="mt-5">Mother's Information</h5>
             <div class="row">
                <div class="col-4 mt-3">
                    <label for="mother_info['qualification']" class="form-label">Qualification</label>
                    <input type="text" id="mother_info['qualification']" class="form-control" disabled value="{{$result->mother_info['qualification']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="mother_info['occupation']" class="form-label">Occupation</label>
                    <input type="text" id="mother_info['occupation']" class="form-control" disabled value="{{$result->mother_info['occupation']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="mother_info['organization']" class="form-label">Organzation</label>
                    <input type="text" id="mother_info['organization']" class="form-control" disabled value="{{$result->mother_info['organization']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="mother_info['mobile_no']" class="form-label">Mobile No.</label>
                    <input type="text" id="mother_info['mobile_no']" class="form-control" disabled value="{{$result->mother_info['mobile_no']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="mother_info['adhar_no']" class="form-label">Aadhar No.</label>
                    <input type="text" id="mother_info['adhar_no']" class="form-control" disabled value="{{$result->mother_info['adhar_no']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="mother_info['email']" class="form-label">Email</label>
                    <input type="text" id="mother_info['email']" class="form-control" disabled value="{{$result->mother_info['email']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="mother_info['annual_income']" class="form-label">Annual Income</label>
                    <input type="text" id="mother_info['annual_income']" class="form-control" disabled value="{{$result->mother_info['annual_income']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="mother_info['landline_no']" class="form-label">Landline No.</label>
                    <input type="text" id="mother_info['landline_no']" class="form-control" disabled value="{{$result->mother_info['landline_no']??''}}">
                </div>

             </div>

             <h5 class="mt-5">Sibling's Information</h5>
             <div class="row justify-content-center">
                @if (count($result->sibling_info)>0)
                  @foreach ($result->sibling_info as $item=>$value)
                  <div class="col-4 mt-3">
                    <label for="sibling_name" class="form-label">Name</label>
                    <input type="text" id="sibling_name" class="form-control" disabled value="{{$value['name']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="sibling_class" class="form-label">Class</label>
                    <input type="text" id="sibling_class" class="form-control" disabled value="{{$value['class']??''}}">
                </div>
                <div class="col-4 mt-3">
                    <label for="currentlyStudy" class="form-label">Currently Study</label>
                    <input type="text" id="currentlyStudy" class="form-control" disabled value="{{$value['currentlyStudy']??''}}">
                </div>

                  @endforeach
                @else
                <div class="col-10 text-center">
                    <p>NO Data</p>
                </div>
                @endif
             </div>



             <div class="row mt-5">
                <div class="col-3">
                    <a href="{{ route('addmissions.index') }}" class="btn btn-sm btn-danger">back</a>
                </div>
             </div>
        </div>
        </div>
       </div>
</div>
@endsection

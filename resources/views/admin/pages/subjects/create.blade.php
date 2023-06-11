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
                    <form class="validate-form" action="{{route('subjects.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$result->id ?? ''}}">
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input class="form-control"  type="text" id="name" name='name' rows="2" placeholder="Name" required value="{{old('name',$result->name??'')}}">
                          <span class="text-danger">@error('name')
                              {{$message}}
                          @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control"  type="text" id="description" name='description' rows="2" placeholder="Description" >{{old('description',$result->description??'')}}</textarea>
                            <span class="text-danger">@error('description')
                                {{$message}}
                            @enderror</span>
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
                            <a href="{{ route('subjects.index') }}" class="btn btn-sm btn-danger">back</a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>

                      </form>
             </div>
            </div>
        </div>
       </div>
</div>

@endsection

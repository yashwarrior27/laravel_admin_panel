@extends('admin.layouts.main')
@section('content')
<div class="row justify-content-center">
    <div class="col-10 ">
        <div class="card border-bottom {{explode(' ',$title)[2]=='Edit'?'border-warning':'border-success'}}">
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
        <div class="card border-bottom {{explode(' ',$title)[2]=='Edit'?'border-warning':'border-success'}}">
            <div class="card-body">
                <div class="row">
                    <form class="validate-form" action="{{route('static_pages.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$result->id ?? ''}}">
                        @if (isset($result))
                        <input type="hidden" name="title" value="{{$result->title ?? ''}}">
                        @endif
                        <div class="mb-3">
                          <label for="title" class="form-label">Title</label>
                          <input class="form-control"  type="text" id="title" name='title' placeholder="title" required value="{{old('title',$result->title??'')}}" @if (isset($result))
                              disabled
                          @endif>
                          <span class="text-danger">@error('title')
                              {{$message}}
                          @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea    id="content" name='content'  placeholder="content" required>{{old('content',$result->content??'')}}</textarea>
                            <span class="text-danger">@error('content')
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
                            <a href="{{ route('static_pages.index') }}" class="btn btn-sm btn-danger">back</a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                      </form>
             </div>
            </div>
        </div>
       </div>
</div>
@endsection

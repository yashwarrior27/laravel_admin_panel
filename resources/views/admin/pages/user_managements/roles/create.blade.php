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
                    <form class="validate-form" action="{{route('roles.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$result->id ?? ''}}">
                        <div class="mb-3">
                          <label for="title" class="form-label">title</label>
                          <input class="form-control"  type="text" id="name" name='title' rows="2" placeholder="title" required value="{{old('title',$result->title??'')}}">
                          <span class="text-danger">@error('title')
                              {{$message}}
                          @enderror</span>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('roles.index') }}" class="btn btn-sm btn-danger">back</a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>

                      </form>
             </div>
            </div>
        </div>
       </div>
</div>

@endsection

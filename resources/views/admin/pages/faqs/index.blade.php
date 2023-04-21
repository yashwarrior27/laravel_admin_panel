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
                <a href="{{route('faqs.create')}}" class="btn btn-success">Create</a>
            </div>
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
                    <th scope="col">Questions</th>
                    <th scope="col">Answers</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($data)>0)
                    @foreach ($data as $key => $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->question??'-'}}</td>
                        <td>{{$item->answer??'-'}}</td>
                        <td>{!!$item->status==1?'<span class="badge bg-success">Active</span>':'<span class="badge bg-danger">De-active</span>'!!}</td>
                        <td><div>
                            <a href="{{route('faqs.edit',$item->id)}}" class="btn rounded-pill btn-sm btn-warning">Edit</a>
                            <button class="btn rounded-pill btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$item->id}}">Delete</a>
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
                                <form action="{{route('faqs.destroy',$item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"class='btn btn-danger' >Delete</button>
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

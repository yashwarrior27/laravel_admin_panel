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
                <a href="{{route('addmissions.create')}}" class="btn btn-success">Create</a>
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
                    <th scope="col">Applied For</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($data)>0)
                    @foreach ($data as $key => $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->AppliedFor->name??'-'}}</td>
                        <td>{{$item->User->name??'-'}}</td>
                        <td>{{(date('Y-m-d',strtotime($item->created_at)))??'-'}}</td>
                        <td>{!!$item->status==1?'<span class="badge bg-success">Converted</span>':'<span class="badge bg-danger">Pending</span>'!!}</td>
                        <td><div >
                            <a href="{{route('addmissions.show',$item->id)}}" class="btn rounded-pill btn-sm btn-warning d-inline-block">View</a>
                            @if ($item->status==1)
                            <button class="btn rounded-pill btn-sm btn-primary d-inline-block" disabled>Convert</button>
                            @else
                            <form action="{{route('addmissions.update',$item->id)}}" class=" d-inline-block" method="post">
                                @csrf
                                @method('PATCH')
                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{ env('RAZORPAY_KEY') }}"
                            data-amount="{{env('Amount',100)}}00"
                            data-buttontext="Convert"
                            data-name="{{env('APP_NAME')}}"
                            data-description="Razorpay payment"
                            data-image="{{url('/images/logo.jpeg')}}"
                            data-prefill.name="{{Auth::user()->name??'school'}}"
                            data-prefill.email="{{Auth::user()->email ??'school@gmail.com'}}"
                            data-theme.color="#91c846">
                      </script>
                            </form>
                            @endif

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
@section('script')
<script>
    $('.razorpay-payment-button').addClass('btn rounded-pill btn-sm btn-primary d-inline-block');
</script>
@endsection

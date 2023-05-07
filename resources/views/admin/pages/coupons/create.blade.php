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
                    <form class="validate-form" action="{{route('coupons.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$result->id ?? ''}}">
                        <div class="mb-3">
                          <label for="coupon_code" class="form-label">Coupon Code</label>
                          <input class="form-control"  type="text" id="coupon_code" name='coupon_code' placeholder="Coupon Code" required value="{{old('coupon_code',$result->coupon_code??'')}}" oninput="this.value = this.value.toUpperCase()">
                          <span class="text-danger">@error('coupon_code')
                              {{$message}}
                          @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="coupon_details" class="form-label">coupon_details</label>
                            <textarea    id="coupon_details" name='coupon_details'  placeholder="coupon_details" required>{{old('coupon_details',$result->coupon_details??'')}}</textarea>
                            <span class="text-danger">@error('coupon_details')
                                {{$message}}
                            @enderror</span>
                          </div>
                          <div class="row">
                            <div class="col-6">
                                 <div class="mb-3">
                                <label for="valid_from" class="form-label">Valid From</label>
                                <input class="form-control"  type="date" id="valid_from" name='valid_from' placeholder="valid_from" required value="{{old('valid_from',$result->valid_from??'')}}">
                                <span class="text-danger">@error('valid_from')
                                    {{$message}}
                                @enderror</span>
                              </div>
                            </div>
                            <div class="col-6">
                                 <div class="mb-3">
                                <label for="valid_to" class="form-label">Valid To</label>
                                <input class="form-control"  type="date" id="valid_to" name='valid_to' placeholder="valid_to" required value="{{old('valid_to',$result->valid_to??'')}}">
                                <span class="text-danger">@error('valid_to')
                                    {{$message}}
                                @enderror</span>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label>discount_type</label>
                                    <select name="discount_type" class="form-select" required>
                                        <option value="" disabled selected>Select Discount Type</option>
                                        <option value="P" {{isset($result) && $result->discount_type=="P"?'selected':''}}> Percentage
                                        </option>
                                        <option value="F" {{isset($result) && $result->discount_type=="F"?'selected':''}}>Fixed
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input class="form-control"  type="text" id="amount" name='amount' placeholder="Amount" required value="{{old('amount',$result->amount??'')}}" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                    <span class="text-danger">@error('amount')
                                        {{$message}}
                                    @enderror</span>
                                  </div>
                            </div>
                          </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="max_reedem" class="form-label">Max Reedem</label>
                                        <input class="form-control"  type="text" id="max_reedem" name='max_reedem' placeholder="Max Reedem" value="{{old('max_reedem',$result->max_reedem??'')}}" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                        <span class="text-danger">@error('max_reedem')
                                            {{$message}}
                                        @enderror</span>
                                      </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="max_user" class="form-label">Max User</label>
                                        <input class="form-control"  type="text" id="max_user" name='max_user' placeholder="Max User" value="{{old('max_user',$result->max_user??'')}}" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                        <span class="text-danger">@error('max_user')
                                            {{$message}}
                                        @enderror</span>
                                      </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="max_discount" class="form-label">Max Discount</label>
                                        <input class="form-control"  type="text" id="max_discount" name='max_discount' placeholder="Max Discount" value="{{old('max_discount',$result->max_discount??'')}}" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                        <span class="text-danger">@error('max_discount')
                                            {{$message}}
                                        @enderror</span>
                                      </div>
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
                            <a href="{{ route('coupons.index') }}" class="btn btn-sm btn-danger">back</a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                      </form>
             </div>
            </div>
        </div>
       </div>
</div>
@endsection

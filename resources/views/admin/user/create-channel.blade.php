@extends('admin.layout.app')

@section('content')

    <div class="card">
{{--        <div class="card-header">--}}
{{--            <h5 class="card-title">create new radio channel</h5>--}}
{{--        </div>--}}
        <div class="card-body">
            <div class="col-8 mx-auto">
                <form method="post" action="{{url('/radio-channel/store')}}" class="form" id="kt_form" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Wizard Step 1-->
                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                        <h3 class="mb-10 font-weight-bold text-dark border-bottom mb-5"><span class="mb-2">Add Radio Info</span></h3>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>Radio Name *</label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" name="radio_name" placeholder="Please enter radio name" value="{{old('radio_name', @$customer->name)}}"/>
                                    <span class="text-danger">{{ $errors->first('radio_name')}}</span>
                                    {{--                                                        <span class="form-text text-muted">Please enter customer name.</span>--}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>Details *</label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" name="details" placeholder="write something about this channel" value="{{old('details', @$customer->details->refer_name)}}"/>
                                    <span class="text-danger">{{ $errors->first('details')}}</span>
                                    {{--                                                        <span class="form-text text-muted">Please enter customer name.</span>--}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>Channel Url *</label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" name="channel_url" placeholder="write something about this channel" value="{{old('channel_url', @$customer->details->refer_name)}}"/>
                                    <span class="text-danger">{{ $errors->first('channel_url')}}</span>
                                    {{--                                                        <span class="form-text text-muted">Please enter customer name.</span>--}}
                                </div>
                            </div>
                        </div>
{{--                        <div class="row">--}}
{{--                            <div class="col-xl-6">--}}
{{--                                <!--begin::Input-->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>User Phone Number</label>--}}
{{--                                    <input type="text" class="form-control form-control-solid form-control-lg" name="phone_number" placeholder="Phone Number" value="{{old('phone_number', @$customer->phone)}}"/>--}}
{{--                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>--}}
{{--                                    --}}{{--                                                        <span class="form-text text-muted">Please enter customer phone number.</span>--}}
{{--                                </div>--}}
{{--                                <!--end::Input-->--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-6">--}}
{{--                                <!--begin::Input-->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>User Email Address</label>--}}
{{--                                    <input type="text" class="form-control form-control-solid form-control-lg" name="email_address" placeholder="Email Address" value="{{old('email_address', @$customer->email)}}"/>--}}
{{--                                    <span class="text-danger">{{ $errors->first('email_address')}}</span>--}}
{{--                                    --}}{{--                                                        <span class="form-text text-muted">Please enter customer email.</span>--}}
{{--                                </div>--}}
{{--                                <!--end::Input-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>

                    <div class="d-flex justify-content-between border-top mt-5 pt-5">
                        <div class="mr-2">
{{--                            <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>--}}
                        </div>
                        <div>
{{--                            <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>--}}
                            <button type="submit" class="btn btn-success btn-md mt-2" data-wizard-type="action-submit">Submit</button>
{{--                            <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>--}}
                        </div>
                    </div>
                    <!--end::Wizard Actions-->
                </form>
            </div>

        </div>
    </div>
@endsection

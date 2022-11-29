@extends('dashboard.layouts.dashboard')

@section('title','Details')


@push('style')

@endpush

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Order Detail</h4>
                        <form class="forms-sample">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">Meal</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-radio form-radio-flat">
                                            <label class="form-check-label">Price</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-radio form-radio-flat">
                                            <label class="form-check-label">Person</label>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($order_details as $order_detail)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-check form-check-flat">
                                                <label class="form-check-label">{{$order_detail->food}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-radio form-radio-flat">
                                                <label class="form-check-label">{{$order_detail->price}} TL</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-radio form-radio-flat">
                                                <label class="form-check-label"><a href="{{route('dashboard.order.person.show',$order_detail->persone)}}">{{$order_detail->persone}}</a></label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-radio form-radio-flat">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-radio form-radio-flat">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-radio form-radio-flat">
                                            <label class="form-check-label">Total : {{$order->total}} TL</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@push('script')

@endpush

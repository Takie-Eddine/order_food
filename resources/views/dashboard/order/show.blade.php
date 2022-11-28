@extends('dashboard.layouts.dashboard')

@section('title','Order')


@push('style')

@endpush

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class=" text-center">{{request()->person}}</h2>

                        <br>
                        <br>

                        <form action="{{URL::current()}}" method="GET" class="form-inline">
                            @csrf
                            <div class="form-group">
                                <div class="form-group mb-4 mx-2">
                                    <label class="control-label mx-2">From</label>
                                    <input type="date" class="form-control inpust-sm" name="date_started" value="{{request('date_started')}}">
                                </div>
                                <div class="form-group mb-4 mx-2">
                                    <label class="control-label mx-2">To</label>
                                    <input type="date" class="form-control inpust-sm" name="date_endded" value="{{request('date_endded')}}">
                                </div >
                                <div class="form-group mb-4 mx-2">
                                    <button class="btn btn-info"  value="filter" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Filter</button>
                                </div>
                            </div>
                        </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th> Order Id </th>
                                    <th>Date</th>
                                    <th>Meal</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($person_orders as $order)
                                    <tr>
                                        <td><a href="{{route('dashboard.order.details',$order->order_id)}}">{{$order->order_id}}</a></td>
                                        <td>{{$order->reference}}</td>
                                        <td>{{$order->food}}</td>
                                        <td>{{$order->price}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total : {{$person_orders_total->total}}</td>
                                </tr>
                            </tbody>
                        </table>
                        {{$person_orders->withQueryString()->links()}}
                    </div>

                    <div class="card-body">

                        <br>
                        <br>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <h5>Error Occured!</h5>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection



@push('script')

@endpush

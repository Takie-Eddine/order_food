@extends('dashboard.layouts.dashboard')

@section('title','Order')


@push('style')

@endpush

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold"> {{$monthly_tolal->total}} TL</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary"> Total This Month </h5>
                                    </div>
                                    {{-- <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                                    </div> --}}
                                </div>
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold"> {{$last_month->total}} TL</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary"> Total Last Month </h5>
                                    </div>
                                    {{-- <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Order</h4>

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
                                    <button class="btn btn-info" name="action" value="filter" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Filter</button>
                                </div>
                                {{-- <div class="form-group mb-4 mx-2">
                                    <button class="btn btn-dark" name="action" value="archive" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>archive</button>
                                </div> --}}
                            </div>
                        </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->total}} TL</td>
                                        <td>
                                            <form action="{{route('dashboard.order.details',$order->id)}}" method="POST">
                                                @csrf
                                                <button  class="btn btn-primary">Details</button>
                                            </form>
                                            <br>
                                            <form action="{{route('dashboard.order.delete',$order->id)}}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button  class="btn btn-danger">Delete</button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total : {{$total->total}} TL</td>
                                </tr>
                            </tbody>
                        </table>
                        {{$orders->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection



@push('script')

@endpush

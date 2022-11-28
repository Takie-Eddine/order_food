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
                        <h4 class="card-title">Order</h4>

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
                                        <td>{{$order->total}}</td>
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

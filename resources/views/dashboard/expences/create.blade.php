@extends('dashboard.layouts.dashboard')

@section('title','Expenses')


@push('style')

@endpush

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 stretch-card">
                <div class="card">

                    <div class="card-body">
                        <h3 class="card-title">Expenses</h3>
                        <p class="card-description"> Create Expense </p>
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
                        @include('alerts.errors')
                        @include('alerts.success')
                        <form class="forms-sample" action="{{route('dashboard.expences.store')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Type</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="type" id="">
                                        <option value="cash_in">Cash in</option>
                                        <option value="cash_out">Cash out</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Price" name="price" value="{{old('price')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="description" id="exampleTextarea1" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                <input type="date" class="form-control" id="exampleInputPassword2" placeholder="" name="date" value="{{old('date')}}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
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

@extends('dashboard.layouts.dashboard')

@section('title','Edit')


@push('style')

@endpush

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 stretch-card">
                <div class="card">

                    <div class="card-body">
                        <h3 class="card-title">Meal</h3>
                        <p class="card-description"> Edit Meal </p>
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
                        <form class="forms-sample" action="{{route('dashboard.food.update',$meal->id)}}" method="POST">
                            @method('patch')
                            @csrf
                            <input type="hidden" name="id" value="{{$meal->id}}">
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Name" name="name" value="{{$meal->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputPassword2" placeholder="price" name="price" value="{{$meal->price}}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>


    </div>
</div>
@endsection



@push('script')

@endpush

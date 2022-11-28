@extends('dashboard.layouts.dashboard')

@section('title','Person')


@push('style')

@endpush

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 stretch-card">
                <div class="card">

                    <div class="card-body">
                        <h3 class="card-title">Person</h3>
                        <p class="card-description"> Create Person </p>
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
                        <form class="forms-sample" action="{{route('dashboard.persone.store')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Name" name="name" value="{{old('name')}}">
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

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Person</h4>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($persones as $persone)
                                    <tr>
                                        <td>{{$persone->id}}</td>
                                        <td><a href="{{route('dashboard.order.person.show', $persone->name)}}">{{$persone->name}}</a></td>
                                        <td>
                                            <form action="{{route('dashboard.persone.delete',$persone->id)}}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button  class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$persones->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection



@push('script')

@endpush

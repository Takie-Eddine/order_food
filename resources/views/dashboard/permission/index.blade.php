@extends('dashboard.layouts.dashboard')

@section('title','Permission')


@push('style')

@endpush

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 stretch-card">
                <div class="card">

                    <div class="card-body">
                        <h3 class="card-title">Permission</h3>
                        <p class="card-description"> Create Permission </p>
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
                        <form class="forms-sample" action="{{route('dashboard.permission.store')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Name" name="name" value="{{old('name')}}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                @foreach (config('global.permissions') as $name => $value)
                                    <div class="form-group col-sm-2">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" class="chk-box" name="permissions[]" value="{{ $name }}">  {{ $value }}
                                        </label>
                                    </div>
                                @endforeach
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
                                @isset($roles)
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role -> name}}</td>
                                            <td>
                                                @foreach($role -> permissions as $permission)
                                                    {{$permission}} ,
                                                @endforeach
                                            </td>
                                            <td>
                                                <form action="{{route('dashboard.permission.delete',$role->id)}}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button  class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                        {{$roles->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection



@push('script')

@endpush

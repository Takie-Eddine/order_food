@extends('dashboard.layouts.dashboard')

@section('title','Expenses')


@push('style')

@endpush

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Expenses</h4>
                        <br>
                        <div class="mb-5">
                            <a href="{{route('dashboard.expences.create')}}" class="btn btn-primary">Create</a>
                            {{-- <a href="{{route('dashboard.expences.edit')}}" class="btn btn-dark">Edit</a> --}}
                        </div>
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
                                    <button class="btn btn-info" name="action" value="filter" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Filter</button>
                                </div>
                                <div class="form-group mb-4 mx-2">
                                    <button class="btn btn-success" name="action"  value="export" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Export</button>
                                </div>
                            </div>
                        </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Old</th>
                                    <th>New</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expences as $expence)
                                    <tr>
                                        <td>{{$expence->id}}</td>
                                        <td>{{$expence->created_at}}</td>
                                        <td>{{$expence->description}}</td>
                                        @if ($expence->type == 'cash_in')
                                            <td class="bg-success">{{$expence->type}}</td>
                                        @else
                                            <td class="bg-danger">{{$expence->type}}</td>
                                        @endif
                                        <td>{{$expence->price}} TL</td>
                                        <td>{{$expence->old}} TL</td>
                                        <td>{{$expence->total}} TL</td>
                                        {{-- <td>
                                            <form action="{{route('dashboard.expences.delete',$expence->id)}}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button  class="btn btn-danger">Delete</button>
                                            </form>
                                            <br>
                                            <form action="{{route('dashboard.expences.edit',$expence->id)}}" method="POST">
                                                @csrf
                                                <button  class="btn btn-info">Edit</button>
                                            </form>

                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$expences->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection



@push('script')

@endpush

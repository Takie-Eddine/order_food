@extends('dashboard.layouts.dashboard')

@section('title','Dashboard')


@push('style')

@endpush

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                        <ul class="quick-links">

                        </ul>
                        <ul class="quick-links ml-auto">

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="page-header-toolbar">
                    {{-- <div class="btn-group toolbar-item" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-left"></i></button>
                        <button type="button" class="btn btn-secondary">03/02/2019 - 20/08/2019</button>
                        <button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-right"></i></button>
                    </div> --}}
                    <div class="filter-wrapper">
                        {{-- <div class="dropdown toolbar-item">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownsorting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Day</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownsorting">
                                <a class="dropdown-item" href="">Last Day</a>
                                <a class="dropdown-item" href="">Last Month</a>
                                <a class="dropdown-item" href="">Last Year</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="sort-wrapper">
                        {{-- <div class="dropdown ml-lg-auto ml-3 toolbar-item">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownexport">
                                <a class="dropdown-item" href="">Export as PDF</a>
                                <a class="dropdown-item" href="">Export as DOCX</a>
                                <a class="dropdown-item" href="">Export as CDR</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">{{$meals->total ?? 0}} TL</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary"><a href="{{route('dashboard.order')}}"> Food </a></h5>
                                    </div>
                                    {{-- <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">{{$cash_in->total ?? 0}} TL</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary"><a href="{{route('dashboard.expences')}}"> Cash In </a></h5>
                                    </div>
                                    {{-- <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-2"></canvas>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">{{$cash_out->total ?? 0}} TL</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary"><a href="{{route('dashboard.expences')}}"> Cash Out </a> </h5>
                                    </div>
                                    {{-- <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-3"></canvas>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@push('script')

@endpush

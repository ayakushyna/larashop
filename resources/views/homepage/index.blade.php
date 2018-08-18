@extends('layouts.master')

@section('content')
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left media media-middle">
                        <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2>{{ $revenue }}</h2>
                        <p class="m-b-0">Total Revenue</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left media media-middle">
                        <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2>{{ $sales }}</h2>
                        <p class="m-b-0">Sales</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left media media-middle">
                        <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2>{{ $storages }}</h2>
                        <p class="m-b-0">Storages</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left media media-middle">
                        <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2>{{ $customers }}</h2>
                        <p class="m-b-0">Customers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row bg-white m-l-0 m-r-0 box-shadow ">

        <!-- column -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Extra Area Chart</h4>
                    <div id="extra-area-chart"></div>
                </div>
            </div>
        </div>
        <!-- column -->

        <!-- column -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body browser">

                    @foreach($products as $index => $product)
                        <p class="m-t-30 f-w-600">{{ $product['name'] }} <span class="pull-right">{{ $product['percent'] }}%</span></p>
                        <div class="progress ">

                            @if($index % 3 == 0)
                                <div role="progressbar" style="width: {{ $product['percent'] }}%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only">{{ $product['percent'] }}% Complete</span> </div>
                            @elseif($index % 2 == 0)
                                <div role="progressbar" style="width: {{ $product['percent'] }}%; height:8px;" class="progress-bar bg-success wow animated progress-animated"> <span class="sr-only">{{ $product['percent'] }}% Complete</span> </div>
                            @else
                                <div role="progressbar" style="width: {{ $product['percent'] }}%; height:8px;" class="progress-bar bg-warning wow animated progress-animated"> <span class="sr-only">{{ $product['percent'] }}% Complete</span> </div>
                            @endif

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- column -->
    </div>
@endsection

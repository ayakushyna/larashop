@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-two">
                            <header>
                                <h3>{{ $supplier->name }}</h3>
                            </header>
                            <div class="desc">
                                {{ $supplier->country }}
                            </div>
                            <div class="dl > dt desc">
                                <dl>
                                    <dt>Email:</dt>
                                    <dd>{{ $supplier->email }}</dd>
                                    <dt>Контактный номер:</dt>
                                    <dd>{{ $supplier->phone }}</dd>
                                </dl>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-12">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home" role="tab">Timeline</a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings" role="tabpanel">
                            <div class="card-body">
                                <h3 class="card-title m-t-15">Person Info</h3>
                                <hr>
                                <form class="form-material" method="POST" action="/suppliers/{{ $supplier->id }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12 col-form-label" for="name">ФИО</label>
                                        <div class="col-md-12">
                                            <input type="text" value="{{ $supplier->name }}" class="form-control form-control-line" name="name" id="name" required>
                                        </div>
                                    </div>

                                    <div class="row col-md-12" >
                                            <div class="form-group">
                                                <label class="col-md-12 col-form-label" for="credit">Кредит, $</label>
                                                <div class="col-md-12">
                                                    <input type="number" step="0.01" value="{{ $supplier->credit }}" class="form-control form-control-line" id="credit" name="credit" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12 col-form-label" for="prepayment">Предоплата, $</label>
                                                <div class="col-md-12">
                                                    <input type="number" step="0.01" value="{{ $supplier->prepayment }}" class="form-control form-control-line" id="prepayment" name="prepayment" required>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 col-form-label" for="email">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="{{ $supplier->email }}" class="form-control form-control-line" name="email" id="email" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 col-form-label" for="phone">Контактный номер</label>
                                        <div class="col-md-12">
                                            <input type="text" value="{{ $supplier->phone }}" class="form-control form-control-line" name="phone" id="phone" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 col-form-label" for="country">Выберите страну</label>
                                        <div class="col-md-12">
                                            <select class="form-control form-control-line" name="country" id="country">
                                                @foreach($countries as $country)
                                                    @if($country == $supplier->country)
                                                        <option selected>{{ $country }}</option>
                                                    @else <option>{{ $country }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Обновить</button>
                                        </div>
                                    </div>
                                    @include('layouts.errors')
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane" id="home" role="tabpanel">
                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Продукт</th>
                                            <th>Склад</th>
                                            <th>Цена за тонну, $</th>
                                            <th>Тонны</th>
                                            <th>Стоимость доставки, $</th>
                                            <th>Дата</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($supplier->arrivals as $index => $arrival)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>{{ $arrival->product->name }}</td>
                                                <td>{{ $arrival->storage->name }}</td>
                                                <td>{{ $arrival->price_per_tonne }}</td>
                                                <td>{{ $arrival->tonnes }}</td>
                                                <td>{{ $arrival->shipping_cost }}</td>
                                                <td>{{ $arrival->created_at->toFormattedDateString() }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>

        <!-- End PAge Content -->
    </div>
@endsection
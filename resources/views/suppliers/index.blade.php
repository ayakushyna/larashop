@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Table</h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>ФИО</th>
                        <th>Кредит, $</th>
                        <th>Предоплата, $</th>
                        <th>Количество поставок</th>
                        <th>Страна</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($suppliers as $index => $supplier)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>
                                <a href="/suppliers/{{ $supplier->id }}">
                                    {{ $supplier->name }}
                                </a>
                            </td>
                            <td>{{ $supplier->credit }}</td>
                            <td>{{ $supplier->prepayment }}</td>
                            <td>{{ count($supplier->arrivals) }}</td>
                            <td>{{ $supplier->country }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection('content')
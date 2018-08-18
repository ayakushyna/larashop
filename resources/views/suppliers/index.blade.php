@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Table</h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <table id="example23" class="table table-bordered table-striped display nowrap table-hover" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Full Name</th>
                        <th>Credit, $</th>
                        <th>Prepayment, $</th>
                        <th>Supplies amount</th>
                        <th>Country</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>№</th>
                        <th>Full Name</th>
                        <th>Credit, $</th>
                        <th>Prepayment, $</th>
                        <th>Supplies amount</th>
                        <th>Country</th>
                    </tr>
                    </tfoot>
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
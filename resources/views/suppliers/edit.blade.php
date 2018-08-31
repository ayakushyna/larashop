@foreach($suppliers as $supplier)
    <div class="fixed-overlay">
        <div class="modal fade" id="myModal{{$supplier['id']}}" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editForm{{$supplier['id']}}"
                          class="form-horizontal form-label-left"
                          method="POST"
                          {{--action="{{route('suppliers.update', ['supplier' => $supplier])}}"--}}>
                        @csrf
                        <div class="form-group col-md-12">
                            <div class="modal-header row justified align-items-center">
                                <div><h3>Edit Info</h3></div>
                                <div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" style="font-family:'Georgia'; font-size:26px; font-weight:bold;"  >&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="name{{$supplier['id']}}">Full Name</label>
                                    <input type="text" value="{{ $supplier->name }}" class="form-control form-control-line" id="name{{$supplier['id']}}" name="name" required>
                                    <span class="text-danger">
                                        <strong id="name-error{{$supplier['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="credit{{$supplier['id']}}">Credit, $</label>
                                    <input type="number" step="0.01" min="0" value="{{ $supplier->credit }}" class="form-control form-control-line" id="credit{{$supplier['id']}}" name="credit" required>
                                    <span class="text-danger">
                                        <strong id="credit-error{{$supplier['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="prepayment{{$supplier['id']}}">Prepayment, $</label>
                                    <input type="number" step="0.01" min="0" value="{{ $supplier->prepayment }}" class="form-control form-control-line" id="prepayment{{$supplier['id']}}" name="prepayment" required>
                                    <span class="text-danger">
                                        <strong id="prepayment-error{{$supplier['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="email{{$supplier['id']}}">Email</label>
                                    <input type="email" value="{{ $supplier->email }}" class="form-control form-control-line" id="email{{$supplier['id']}}" name="email" required>
                                    <span class="text-danger">
                                        <strong id="email-error{{$supplier['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="phone{{$supplier['id']}}">Phone</label>
                                    <input type="text" value="{{ $supplier->phone }}" class="form-control form-control-line" id="phone{{$supplier['id']}}" name="phone" required>
                                    <span class="text-danger">
                                        <strong id="phone-error{{$supplier['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="country{{$supplier['id']}}">Select Country</label>
                                    <select class="form-control form-control-line" id="country{{$supplier['id']}}" name="country">
                                        @foreach($countries as $country)
                                            @if($country == $supplier->country)
                                                <option selected>{{ $country }}</option>
                                            @else <option>{{ $country }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"  id="submit{{$supplier['id']}}" >Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('suppliers.editscript')
@endforeach




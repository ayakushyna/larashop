@foreach($buyers as $buyer)
    <div class="fixed-overlay">
        <div class="modal fade" id="myModal{{$buyer['id']}}" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editForm{{$buyer['id']}}"
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
                                    <label class="control-label" for="name{{$buyer['id']}}">Full Name</label>
                                    <input type="text" value="{{ $buyer->name }}" class="form-control form-control-line" id="name{{$buyer['id']}}" name="name" required>
                                    <span class="text-danger">
                                        <strong id="name-error{{$buyer['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="credit{{$buyer['id']}}">Credit, $</label>
                                    <input type="number" step="0.01" min="0" value="{{ $buyer->credit }}" class="form-control form-control-line" id="credit{{$buyer['id']}}" name="credit" required>
                                    <span class="text-danger">
                                        <strong id="credit-error{{$buyer['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="prepayment{{$buyer['id']}}">Prepayment, $</label>
                                    <input type="number" step="0.01" min="0" value="{{ $buyer->prepayment }}" class="form-control form-control-line" id="prepayment{{$buyer['id']}}" name="prepayment" required>
                                    <span class="text-danger">
                                        <strong id="prepayment-error{{$buyer['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="email{{$buyer['id']}}">Email</label>
                                    <input type="email" value="{{ $buyer->email }}" class="form-control form-control-line" id="email{{$buyer['id']}}" name="email" required>
                                    <span class="text-danger">
                                        <strong id="email-error{{$buyer['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="phone{{$buyer['id']}}">Phone</label>
                                    <input type="text" value="{{ $buyer->phone }}" class="form-control form-control-line" id="phone{{$buyer['id']}}" name="phone" required>
                                    <span class="text-danger">
                                        <strong id="phone-error{{$buyer['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="country{{$buyer['id']}}">Select Country</label>
                                    <select class="form-control form-control-line" id="country{{$buyer['id']}}" name="country">
                                        @foreach($countries as $country)
                                            @if($country == $buyer->country)
                                                <option selected>{{ $country }}</option>
                                            @else <option>{{ $country }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"  id="submit{{$buyer['id']}}" >Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('buyers.editscript')
@endforeach




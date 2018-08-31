@foreach($arrivals as $arrival)
    <div class="fixed-overlay">
        <div class="modal fade" id="myModal{{$arrival['id']}}" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editForm{{$arrival['id']}}"
                          class="form-horizontal form-label-left"
                          method="POST"
                          {{--action="{{route('arrivals.update', ['arrival' => $arrival['id']])}}"--}}>
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
                                    <label class="control-label">Product</label>
                                    <select class="form-control custom-select" data-placeholder="Choose a Product" tabindex="1" id="product{{$arrival['id']}}" name="product">
                                        @foreach($products as $product)
                                            @if($product == $arrival->product)
                                                <option value="{{$product->id}}" selected>{{ $product->name }}</option>
                                            @else <option value="{{$product->id}}">{{ $product->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label">Supplier</label>
                                    <select class="form-control custom-select" data-placeholder="Choose a Supplier" tabindex="1" id="supplier{{$arrival['id']}}" name="supplier">
                                        @foreach($suppliers as $supplier)
                                            @if($supplier == $arrival->supplier)
                                                <option value="{{$supplier->id}}" selected>{{ $supplier->name }}</option>
                                            @else <option value="{{$supplier->id}}">{{ $supplier->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label">Storage</label>
                                    <select class="form-control custom-select" data-placeholder="Choose a Storage" tabindex="1" id="storage{{$arrival['id']}}" name="storage">
                                        @foreach($storages as $storage)
                                            @if($storage == $arrival->storage)
                                                <option value="{{$storage->id}}" selected>{{ $storage->name }}</option>
                                            @else <option value="{{$storage->id}}">{{ $storage->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="price_per_tonne">Price per Tonne, $</label>
                                    <input type="number" min="0" step="0.01" value="{{ $arrival->price_per_tonne }}" class="form-control form-control-line" id="price_per_tonne{{$arrival['id']}}" name="price_per_tonne" required>
                                    <span class="text-danger">
                                        <strong id="price_per_tonne-error{{$arrival['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="tonnes">Tonnes</label>
                                    <input type="number" min="0" step="0.1" value="{{ $arrival->tonnes }}" class="form-control form-control-line" id="tonnes{{$arrival['id']}}" name="tonnes" required>
                                    <span class="text-danger">
                                        <strong id="tonnes-error{{$arrival['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="shipping_cost">Shipping cost, $</label>
                                    <input type="number" min="0" step="0.01" value="{{ $arrival->shipping_cost }}" class="form-control form-control-line" id="shipping_cost{{$arrival['id']}}" name="shipping_cost" required>
                                    <span class="text-danger">
                                        <strong id="shipping_cost-error{{$arrival['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label">Date</label>
                                    <input type="date" value="{{ $arrival->created_at->toDateString()}}" class="form-control  form-control-line" id="created_at{{$arrival['id']}}" name="created_at" placeholder="dd/mm/yyyy">
                                    <span class="text-danger">
                                        <strong id="date-error{{$arrival['id']}}"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="submit{{$arrival['id']}}">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('arrivals.editscript')
@endforeach

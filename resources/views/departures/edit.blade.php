@foreach($departures as $departure)
    <div class="fixed-overlay">
        <div class="modal fade" id="edit-departure{{$departure['id']}}" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editForm{{$departure['id']}}"
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
                                    <label class="control-label" for="product-departure{{$departure['id']}}">Product</label>
                                    <select class="form-control custom-select" data-placeholder="Choose a Product" tabindex="1" id="product-departure{{$departure['id']}}" name="product">
                                        @foreach($products as $product)
                                            @if($product == $departure->product)
                                                <option value="{{$product->id}}" selected>{{ $product->name }}</option>
                                            @else <option value="{{$product->id}}">{{ $product->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="buyer-departure{{$departure['id']}}">Buyer</label>
                                    <select class="form-control custom-select" data-placeholder="Choose a Buyer" tabindex="1" id="buyer-departure{{$departure['id']}}" name="buyer">
                                        @foreach($buyers as $buyer)
                                            @if($buyer == $departure->buyer)
                                                <option value="{{$buyer->id}}" selected>{{ $buyer->name }}</option>
                                            @else <option value="{{$buyer->id}}">{{ $buyer->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="storage-departure{{$departure['id']}}">Storage</label>
                                    <select class="form-control custom-select" data-placeholder="Choose a Storage" tabindex="1" id="storage-departure{{$departure['id']}}" name="storage">
                                        @foreach($storages as $storage)
                                            @if($storage == $departure->storage)
                                                <option value="{{$storage->id}}" selected>{{ $storage->name }}</option>
                                            @else <option value="{{$storage->id}}">{{ $storage->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="price_per_tonne-departure{{$departure['id']}}">Price per Tonne, $</label>
                                    <input type="number" min="0" step="0.01" value="{{ $departure->price_per_tonne }}" class="form-control form-control-line" id="price_per_tonne-departure{{$departure['id']}}" name="price_per_tonne" required>
                                    <span class="text-danger">
                                        <strong id="price_per_tonne-error-departure{{$departure['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="tonnes-departure{{$departure['id']}}">Tonnes</label>
                                    <input type="number" min="0" step="0.1" value="{{ $departure->tonnes }}" class="form-control form-control-line" id="tonnes-departure{{$departure['id']}}" name="tonnes" required>
                                    <span class="text-danger">
                                        <strong id="tonnes-error-departure{{$departure['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="shipping_cost-departure{{$departure['id']}}">Shipping cost, $</label>
                                    <input type="number" min="0" step="0.01" value="{{ $departure->shipping_cost }}" class="form-control form-control-line" id="shipping_cost-departure{{$departure['id']}}" name="shipping_cost" required>
                                    <span class="text-danger">
                                        <strong id="shipping_cost-error-departure{{$departure['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="created_at-departure{{$departure['id']}}">Date</label>
                                    <input type="date" value="{{ $departure->created_at->toDateString()}}" class="form-control  form-control-line" id="created_at-departure{{$departure['id']}}" name="created_at" placeholder="dd/mm/yyyy">
                                    <span class="text-danger">
                                        <strong id="date-error-departure{{$departure['id']}}"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="submit-edit-departure{{$departure['id']}}">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('departures.editscript')
@endforeach

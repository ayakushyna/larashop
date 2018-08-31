
<div class="fixed-overlay">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="createForm"
                      class="form-horizontal form-label-left"
                      method="POST"
                        {{--action="{{route('arrivals.store')}}"--}}>
                    @csrf
                    <div class="form-group col-md-12">
                        <div class="modal-header row justified align-items-center">
                            <div><h3>Add Info</h3></div>
                            <div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-family:'Georgia'; font-size:26px; font-weight:bold;"  >&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group col-md-12">
                                <label class="control-label" for="product">Product</label>
                                <select class="form-control custom-select" data-placeholder="Choose a Product" tabindex="1" id="product" name="product">
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label" for="buyer">Buyer</label>
                                <select class="form-control custom-select" data-placeholder="Choose a Buyer" tabindex="1" id="buyer" name="buyer">
                                    @foreach($buyers as $buyer)
                                        <option value="{{$buyer->id}}">{{ $buyer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label" for="storage">Storage</label>
                                <select class="form-control custom-select" data-placeholder="Choose a Storage" tabindex="1" id="storage" name="storage">
                                    @foreach($storages as $storage)
                                        <option value="{{$storage->id}}">{{ $storage->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label" for="price_per_tonne">Price per Tonne, $</label>
                                <input type="number" min="0" step="0.01" value="0" class="form-control form-control-line" id="price_per_tonne" name="price_per_tonne" required>
                                <span class="text-danger">
                                        <strong id="price_per_tonne-error"></strong>
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label" for="tonnes">Tonnes</label>
                                <input type="number" min="0" step="0.1" value="0" class="form-control form-control-line" id="tonnes" name="tonnes" required>
                                <span class="text-danger">
                                        <strong id="tonnes-error"></strong>
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label" for="shipping_cost">Shipping cost, $</label>
                                <input type="number" min="0" step="0.01" value="0" class="form-control form-control-line" id="shipping_cost" name="shipping_cost" required>
                                <span class="text-danger">
                                        <strong id="shipping_cost-error"></strong>
                                    </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label" for="created_at">Date</label>
                                <input type="date" value="{{ date("Y-m-d")}}" class="form-control  form-control-line" id="created_at" name="created_at" placeholder="dd/mm/yyyy">
                                <span class="text-danger">
                                        <strong id="date-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('departures.createscript')

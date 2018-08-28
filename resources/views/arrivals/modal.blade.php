<div id="myModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Contact Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="contactForm" name="contact" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Product</label>
                        <select class="form-control custom-select" data-placeholder="Choose a Product" tabindex="1">
                            @foreach($products as $product)
                                @if($product == $arrival->product)
                                    <option selected>{{ $product->name }}</option>
                                @else <option>{{ $product->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Supplier</label>
                        <select class="form-control custom-select" data-placeholder="Choose a Supplier" tabindex="1">
                            @foreach($suppliers as $supplier)
                                @if($supplier == $arrival->supplier)
                                    <option selected>{{ $supplier->name }}</option>
                                @else <option>{{ $supplier->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Storage</label>
                        <select class="form-control custom-select" data-placeholder="Choose a Storage" tabindex="1">
                            @foreach($storages as $storage)
                                @if($storage == $arrival->storage)
                                    <option selected>{{ $storage->name }}</option>
                                @else <option>{{ $storage->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="row col-md-12 col-lg-6 justify-content-between" >
                        <div class="form-group">
                            <label class="col-md-12 col-form-label" for="price_per_tonne">Price per Tonne, $</label>
                            <div class="col-md-12">
                                <input type="number" step="0.01" value="{{ $arrival->price_per_tonne }}" class="form-control form-control-line" id="price_per_tonne" name="price_per_tonne" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 col-form-label" for="tonnes">Tonnes</label>
                            <div class="col-md-12">
                                <input type="number" step="0.1" value="{{ $arrival->tonnes }}" class="form-control form-control-line" id="tonnes" name="tonnes" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shipping_cost">Shipping cost</label>
                        <input type="number" step="0.01" value="{{ $arrival->tonnes }}" class="form-control form-control-line" id="shipping_cost" name="shipping_cost" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Date</label>
                        <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

>
<div class="fixed-overlay">
    <div class="modal" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal form-label-left"
                      method="POST"
                      {{--action="{{route('suppliers.store')}}"--}}>
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
                                <label class="control-label" for="name">Full Name</label>
                                <input type="text" placeholder="Enter Full Name" class="form-control form-control-line" name="name" id="name" required>
                                <span class="text-danger">
                                        <strong id="name-error"></strong>
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label" for="credit">Credit, $</label>
                                <input type="number" min="0" step="0.01" value="0" class="form-control form-control-line" id="credit" name="credit" required>
                                <span class="text-danger">
                                        <strong id="credit-error"></strong>
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label" for="prepayment">Prepayment, $</label>
                                <input type="number" min="0" step="0.01" value="0" class="form-control form-control-line" id="prepayment" name="prepayment" required>
                                <span class="text-danger">
                                        <strong id="prepayment-error"></strong>
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label" for="email">Email</label>
                                <input type="email" placeholder="Enter Email" class="form-control form-control-line" name="email" id="email" required>
                                <span class="text-danger">
                                        <strong id="email-error"></strong>
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label" for="phone">Phone</label>
                                <input type="text" placeholder="Enter Phone" class="form-control form-control-line" name="phone" id="phone" required>
                                <span class="text-danger">
                                        <strong id="phone-error"></strong>
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label" for="country">Select Country</label>
                                <select class="form-control form-control-line" name="country" id="country">
                                    @foreach($countries as $country)
                                        <option selected>{{ $country }}</option>
                                    @endforeach
                                </select>
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
@include('suppliers.createscript')
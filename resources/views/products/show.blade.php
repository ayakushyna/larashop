@extends('layouts.master')

@section('content')
    <!-- Start Page Content -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-two">
                        <header>
                            <h3>{{ $product->name }}</h3>
                        </header>
                        <div class=" desc">
                            {{ $product->description }}
                        </div>
                        <div class="dl > dt desc">
                            <dl>
                                <dt>Material:</dt>
                                <dd>{{ $product->material }}</dd>
                                <dt>Sold Tonnes:</dt>
                                <dd>{{ $product->soldTonnes() }}</dd>
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
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#edit" role="tab">Edit</a> </li>

                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="edit" role="tabpanel">
                        <div class="card-body">
                            <h3 class="card-title m-t-15">Product Info</h3>
                            <hr>
                            <form class="form-material"
                                  method="POST"
                                  action="{{route('products.update', ['product' => $product['id']])}}">
                                @csrf
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name{{$product['id']}}">Name</label>
                                    <input type="text" value="{{ $product->name }}" class="form-control form-control-line" name="name" id="name{{$product['id']}}" required>
                                    <span class="text-danger">
                                        <strong id="name-error{{$product['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="material{{$product['id']}}">Material</label>
                                    <input type="text" value="{{ $product->material }}" class="form-control form-control-line" name="material" id="material{{$product['id']}}" required>
                                    <span class="text-danger">
                                        <strong id="material-error{{$product['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="description{{$product['id']}}">Description</label>
                                    <textarea class="form-control form-control-line" name="description" id="description{{$product['id']}}" required>{{ $product->description }}  </textarea>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success"  id="submit-edit{{$product['id']}}" >Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    @include('products.editscript')
    <!-- End PAge Content -->
@endsection('content')
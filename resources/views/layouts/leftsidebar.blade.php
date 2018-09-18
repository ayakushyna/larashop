<!-- Left Sidebar  -->
<?php
use App\Role;
$role = new Role();
?>
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                {{--<li class="nav-devider"></li>--}}
                {{--<li class="nav-label">Home</li>--}}
                {{--<li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard <span class="label label-rouded label-primary pull-right">2</span></span></a>--}}
                    {{--<ul aria-expanded="false" class="collapse">--}}
                        {{--<li><a href="index.html">Ecommerce </a></li>--}}
                        {{--<li><a href="index1.html">Analytics </a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}

                <li class="nav-label">Info</li>

                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Tables</span></a>
                    <ul aria-expanded="false" class="collapse">
                        @if(Role::isAdmin())
                        <li><a href="/arrivals">Arrivals</a></li>
                        @endif
                        @if(Role::isAdmin() || Role::isManager())
                            <li><a href="/suppliers">Suppliers</a></li>
                            <li><a href="/buyers">Buyers</a></li>
                            <li><a href="/departures">Departures</a></li>
                        @endif
                        @if(Role::isAdmin() || Role::isStorekeeper())
                        <li><a href="#" class="has-arrow">Products  <span class="label label-rounded label-success">{{ count($products) }}</span></a>
                            <ul aria-expanded="false" class="collapse">
                                @foreach($products as $product)
                                    <li><a href="/products/{{$product['id']}}">{{ $product->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="#" class="has-arrow">Storages  <span class="label label-rounded label-warning">{{ count($storages) }}</span></a>
                            <ul aria-expanded="false" class="collapse">
                                @foreach($storages as $storage)
                                    <li><a href="/storages/{{$storage['id']}}">{{ $storage->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                         @endif
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>

<!-- End Left Sidebar  -->
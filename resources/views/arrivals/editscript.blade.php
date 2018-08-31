<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#submit-edit-arrival{{$arrival['id']}}").click(function(e){
            e.preventDefault();

            $( "#price_per_tonne-error-arrival{{$arrival['id']}}" ).html( "" );
            $( "#tonnes-error-arrival{{$arrival['id']}}" ).html( "" );
            $( "#shipping_cost-error-arrival{{$arrival['id']}}" ).html( "" );
            $( "#created_at-error-arrival{{$arrival['id']}}" ).html( "" );

            $.ajax({
                url: "{{route('arrivals.update', ['arrival' => $arrival['id']])}}",
                type: 'POST',
                data: {
                    product: $("#product-arrival{{$arrival['id']}}").val(),
                    supplier: $("#supplier-arrival{{$arrival['id']}}").val(),
                    storage: $("#storage-arrival{{$arrival['id']}}").val(),
                    price_per_tonne: $("#price_per_tonne-arrival{{$arrival['id']}}").val(),
                    tonnes: $("#tonnes-arrival{{$arrival['id']}}").val(),
                    shipping_cost: $("#shipping_cost-arrival{{$arrival['id']}}").val(),
                    created_at: $("#created_at-arrival{{$arrival['id']}}").val(),
                    _token: '{{csrf_token()}}',
                },
                success:function(data) {
                    console.log(data);
                    if(data.errors) {
                        if(data.errors.price_per_tonne){
                            $( "#price_per_tonne-error-arrival{{$arrival['id']}}" ).html( data.errors.price_per_tonne[0] );
                        }
                        if(data.errors.tonnes){
                            $( "#tonnes-error-arrival{{$arrival['id']}}" ).html( data.errors.tonnes[0] );
                        }
                        if(data.errors.shipping_cost){
                            $( "#shipping_cost-error-arrival{{$arrival['id']}}" ).html( data.errors.shipping_cost[0] );
                        }
                        if(data.errors.created_at){
                            $( "#created_at-error-arrival{{$arrival['id']}}" ).html( data.errors.created_at[0] );
                        }
                    }
                    if(data.success) {
                        $("#edit-arrival{{$arrival['id']}}").modal('hide');
                        swal({
                            title: "Hey!",
                            text: data.success,
                            type: "success"
                        }, function () {
                            location.reload();
                        });
                    }
                }
            });
        })
    });
</script>
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
        $("#submit").click(function(e){
            e.preventDefault();

            $( "#price_per_tonne-error" ).html( "" );
            $( "#tonnes-error" ).html( "" );
            $( "#shipping_cost-error" ).html( "" );
            $( "#created_at-error" ).html( "" );
            $.ajax({
                url: "{{route('arrivals.store')}}",
                type: 'POST',
                data: {
                    product: $("#product").val(),
                    supplier: $("#supplier").val(),
                    storage: $("#storage").val(),
                    price_per_tonne: $("#price_per_tonne").val(),
                    tonnes: $("#tonnes").val(),
                    shipping_cost: $("#shipping_cost").val(),
                    created_at: $("#created_at").val(),
                    _token: '{{csrf_token()}}',
                },
                success:function(data) {
                    console.log(data);
                    if(data.errors) {
                        if(data.errors.price_per_tonne){
                            $( "#price_per_tonne-error" ).html( data.errors.price_per_tonne[0] );
                        }
                        if(data.errors.tonnes){
                            $( "#tonnes-error" ).html( data.errors.tonnes[0] );
                        }
                        if(data.errors.shipping_cost){
                            $( "#shipping_cost-error" ).html( data.errors.shipping_cost[0] );
                        }
                        if(data.errors.created_at){
                            $( "#created_at-error" ).html( data.errors.created_at[0] );
                        }
                    }
                    if(data.success) {
                        $("#myModal").modal('hide');
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
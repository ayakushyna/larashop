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
        $("#submit-edit-departure{{$departure['id']}}").click(function(e){
            e.preventDefault();

            $( "#price_per_tonne-error-departure{{$departure['id']}}" ).html( "" );
            $( "#tonnes-error-departure{{$departure['id']}}" ).html( "" );
            $( "#shipping_cost-error-departure{{$departure['id']}}" ).html( "" );
            $( "#created_at-error-departure{{$departure['id']}}" ).html( "" );

            $.ajax({
                url: "{{route('departures.update', ['departure' => $departure['id']])}}",
                type: 'POST',
                data: {
                    product: $("#product-departure{{$departure['id']}}").val(),
                    buyer: $("#buyer-departure{{$departure['id']}}").val(),
                    storage: $("#storage-departure{{$departure['id']}}").val(),
                    price_per_tonne: $("#price_per_tonne-departure{{$departure['id']}}").val(),
                    tonnes: $("#tonnes-departure{{$departure['id']}}").val(),
                    shipping_cost: $("#shipping_cost-departure{{$departure['id']}}").val(),
                    created_at: $("#created_at-departure{{$departure['id']}}").val(),
                    _token: '{{csrf_token()}}',
                },
                success:function(data) {
                    console.log(data);
                    if(data.errors) {
                        if(data.errors.price_per_tonne){
                            $( "#price_per_tonne-error-departure{{$departure['id']}}" ).html( data.errors.price_per_tonne[0] );
                        }
                        if(data.errors.tonnes){
                            $( "#tonnes-error-departure{{$departure['id']}}" ).html( data.errors.tonnes[0] );
                        }
                        if(data.errors.shipping_cost){
                            $( "#shipping_cost-error-departure{{$departure['id']}}" ).html( data.errors.shipping_cost[0] );
                        }
                        if(data.errors.created_at){
                            $( "#created_at-error-departure{{$departure['id']}}" ).html( data.errors.created_at[0] );
                        }
                    }
                    if(data.success) {
                        $("#edit-departure{{$departure['id']}}").modal('hide');
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
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
        $("#submit-edit{{$product['id']}}").click(function(e){
            e.preventDefault();

            $( "#name-error{{$product['id']}}" ).html( "" );
            $( "#material-error{{$product['id']}}" ).html( "" );
            $( "#description-error{{$product['id']}}" ).html( "" );

            $.ajax({
                url: "{{route('products.update', ['product' => $product['id']])}}",
                type: 'POST',
                data: {
                    name: $("#name{{$product['id']}}").val(),
                    material: $("#material{{$product['id']}}").val(),
                    description: $("#description{{$product['id']}}").val(),
                    _token: '{{csrf_token()}}',
                },
                success:function(data) {
                    console.log(data);
                    if(data.errors) {
                        if(data.errors.name){
                            $( "#name-error{{$product['id']}}" ).html( data.errors.name[0] );
                        }
                        if(data.errors.material){
                            $( "#material-error{{$product['id']}}" ).html( data.errors.material[0] );
                        }
                        if(data.errors.description){
                            $( "#description-error{{$product['id']}}" ).html( data.errors.description[0] );
                        }
                    }
                    if(data.success) {
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
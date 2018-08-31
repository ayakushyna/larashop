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
        $("#submit{{$supplier['id']}}").click(function(e){
            e.preventDefault();

            $( "#name-error{{$supplier['id']}}" ).html( "" );
            $( "#credit-error{{$supplier['id']}}" ).html( "" );
            $( "#prepayment-error{{$supplier['id']}}" ).html( "" );
            $( "#email-error{{$supplier['id']}}" ).html( "" );
            $( "#phone-error{{$supplier['id']}}" ).html( "" );

            $.ajax({
                url: "{{route('suppliers.update', ['supplier' => $supplier['id']])}}",
                type: 'POST',
                data: {
                    name: $("#name{{$supplier['id']}}").val(),
                    credit: $("#credit{{$supplier['id']}}").val(),
                    prepayment: $("#prepayment{{$supplier['id']}}").val(),
                    email: $("#email{{$supplier['id']}}").val(),
                    phone: $("#phone{{$supplier['id']}}").val(),
                    country: $("#country{{$supplier['id']}}").val(),
                    _token: '{{csrf_token()}}',
                },
                success:function(data) {
                    console.log(data);
                    if(data.errors) {
                        if(data.errors.name){
                            $( "#name-error{{$supplier['id']}}" ).html( data.errors.name[0] );
                        }
                        if(data.errors.credit){
                            $( "#credit-error{{$supplier['id']}}" ).html( data.errors.credit[0] );
                        }
                        if(data.errors.prepayment){
                            $( "#prepayment-error{{$supplier['id']}}" ).html( data.errors.prepayment[0] );
                        }
                        if(data.errors.email){
                            $( "#email-error{{$supplier['id']}}" ).html( data.errors.email[0] );
                        }
                        if(data.errors.phone){
                            $( "#phone-error{{$supplier['id']}}" ).html( data.errors.phone[0] );
                        }
                    }
                    if(data.success) {
                        $("#myModal{{$supplier['id']}}").modal('hide');
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
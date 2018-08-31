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

            $( "#name-error" ).html( "" );
            $( "#credit-error" ).html( "" );
            $( "#prepayment-error" ).html( "" );
            $( "#email-error" ).html( "" );
            $( "#phone-error" ).html( "" );

            $.ajax({
                url: "{{route('suppliers.store')}}",
                type: 'POST',
                data: {
                    name: $("#name").val(),
                    credit: $("#credit").val(),
                    prepayment: $("#prepayment").val(),
                    email: $("#email").val(),
                    phone: $("#phone").val(),
                    country: $("#country").val(),
                    _token: '{{csrf_token()}}',
                },
                success:function(data) {
                    console.log(data);
                    if(data.errors) {
                        if(data.errors.name){
                            $( "#name-error" ).html( data.errors.name[0] );
                        }
                        if(data.errors.credit){
                            $( "#credit-error" ).html( data.errors.credit[0] );
                        }
                        if(data.errors.prepayment){
                            $( "#prepayment-error" ).html( data.errors.prepayment[0] );
                        }
                        if(data.errors.email){
                            $( "#email-error" ).html( data.errors.email[0] );
                        }
                        if(data.errors.phone){
                            $( "#phone-error" ).html( data.errors.phone[0] );
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
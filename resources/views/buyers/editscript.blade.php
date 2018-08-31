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
        $("#submit{{$buyer['id']}}").click(function(e){
            e.preventDefault();

            $( "#name-error{{$buyer['id']}}" ).html( "" );
            $( "#credit-error{{$buyer['id']}}" ).html( "" );
            $( "#prepayment-error{{$buyer['id']}}" ).html( "" );
            $( "#email-error{{$buyer['id']}}" ).html( "" );
            $( "#phone-error{{$buyer['id']}}" ).html( "" );

            $.ajax({
                url: "{{route('buyers.update', ['buyer' => $buyer['id']])}}",
                type: 'POST',
                data: {
                    name: $("#name{{$buyer['id']}}").val(),
                    credit: $("#credit{{$buyer['id']}}").val(),
                    prepayment: $("#prepayment{{$buyer['id']}}").val(),
                    email: $("#email{{$buyer['id']}}").val(),
                    phone: $("#phone{{$buyer['id']}}").val(),
                    country: $("#country{{$buyer['id']}}").val(),
                    _token: '{{csrf_token()}}',
                },
                success:function(data) {
                    console.log(data);
                    if(data.errors) {
                        if(data.errors.name){
                            $( "#name-error{{$buyer['id']}}" ).html( data.errors.name[0] );
                        }
                        if(data.errors.credit){
                            $( "#credit-error{{$buyer['id']}}" ).html( data.errors.credit[0] );
                        }
                        if(data.errors.prepayment){
                            $( "#prepayment-error{{$buyer['id']}}" ).html( data.errors.prepayment[0] );
                        }
                        if(data.errors.email){
                            $( "#email-error{{$buyer['id']}}" ).html( data.errors.email[0] );
                        }
                        if(data.errors.phone){
                            $( "#phone-error{{$buyer['id']}}" ).html( data.errors.phone[0] );
                        }
                    }
                    if(data.success) {
                        $("#myModal{{$buyer['id']}}").modal('hide');
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
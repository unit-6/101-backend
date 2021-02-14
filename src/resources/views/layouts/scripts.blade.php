<script type="text/javascript">
    var text = '<?=Auth::user()->username?>';
    var body = document.getElementById('watermarked');
    var bg = "url(\"data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' version='1.1' height='100px' width='100px'>" +
        "<text transform='translate(20, 100) rotate(-45)' fill='rgb(211,211,211)' font-size='20' >" + text + "</text></svg>\")";
    body.style.backgroundImage = bg
</script>

<script type="text/javascript">
/** Merchant Deactivation */
$(document).on('click', '.merchant-deactive', function (e) {
    e.preventDefault();
    var id = $(this).data('id');

    Swal.fire({
        title: "Are you sure to DEACTIVE this Merchant ?",
        icon: 'warning',
        confirmButtonColor: '#e3342f',
        confirmButtonText: 'Deactive',
        showCancelButton: true,
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "{{url('/merchant_deactive')}}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    id:id
                },
                success: function (data) {
                    console.log(data);
                    if (data.success) {
                        Swal.fire({
                            title: 'Succesfully Deactive Merchant',
                            icon: 'success',
                            allowOutsideClick: false
                        }).then(function() { location.reload(); });
                    }
                }
            });
        }
    });
});
/** Merchant Activation */
$(document).on('click', '.merchant-active', function (e) {
    e.preventDefault();
    var id = $(this).data('id');

    Swal.fire({
        title: "ACTIVATE this Merchant ?",
        icon: 'warning',
        confirmButtonColor: '#008000',
        confirmButtonText: 'Active',
        showCancelButton: true,
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "{{url('/merchant_active')}}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    id:id
                },
                success: function (data) {
                    console.log(data);
                    if (data.success) {
                        Swal.fire({
                            title: 'Succesfully Active Merchant',
                            icon: 'success',
                            allowOutsideClick: false
                        }).then(function() { location.reload(); });
                    }
                }
            });
        }
    });
});
</script>
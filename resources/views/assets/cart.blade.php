<script>
    function addTocart() {
        event.preventDefault();
        let urlCart = $(this).data('url');
        $.ajax({
            type: "GET",
            url: urlCart,
            dataType: 'json',
            success: function(data) {
                if (data.code === 200) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Thêm mới thành công",
                        showConfirmButton: false,
                        timer: 1500,
                        customClass: 'swal-height'
                    });
                }
                location.reload();
            },
            error: function() {

            }
        })
    }
    $(function() {
        $('.add_to_cart').on('click', addTocart);
    });
</script>



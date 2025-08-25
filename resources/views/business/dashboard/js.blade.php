@include('layouts.commonjs')
<script>
    $('#logoutBtn').on('click', function () {
    $.ajax({
        url: '/api/logout',
        type: 'POST',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token'), // your saved token
            'Accept': 'application/json'
        },
        success: function (response) {
            if (response.status) {
                Swal.fire({
                    icon: 'success',
                    title: 'Logged out!',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false
                });
                // remove token and redirect
                localStorage.removeItem('token');
                window.location.href = '/';
            } else {
                Swal.fire('Error', response.message, 'error');
            }
        },
        error: function () {
            Swal.fire('Error', 'Unable to logout, please try again.', 'error');
        }
    });
});

</script>
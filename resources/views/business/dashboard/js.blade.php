@include('layouts.commonjs')
<script>
    function openModal(modalId) {
        document.getElementById(modalId).style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    const modals = document.querySelectorAll('.modal');
    const closeModalButtons = document.querySelectorAll('.close-modal');
    // Close modal when clicking on X or cancel button
    closeModalButtons.forEach(button => {
        button.addEventListener('click', function() {
            const modal = this.closest('.modal');
            closeModal(modal.id);
        });
    });

    // Close modal when clicking outside the modal content
    modals.forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal(this.id);
            }
        });
    });
    $(document).ready(function() {
        // Add product button
        $('#add-product-btn').click(function() {
            $('#product_id').val('');
            $('#product-form')[0].reset();
            openModal('productModal');
        });
        $('#product-form').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "/api/business/products/store",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.status) {
                        Swal.fire({
                            icon: 'success',
                            title: res.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#product-form')[0].reset();
                        $('#productModal').hide(); // hide custom modal
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: res.message
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Server Error',
                        text: 'Something went wrong!'
                    });
                }
            });
        });
    });
</script>

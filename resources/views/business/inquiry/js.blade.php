@include('layouts.commonjs')
<script>
     // Modal functionality
            const modals = document.querySelectorAll('.modal');
            const closeModalButtons = document.querySelectorAll('.close-modal');

            function openModal(modalId) {
                document.getElementById(modalId).style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }

            function closeModal(modalId) {
                document.getElementById(modalId).style.display = 'none';
                document.body.style.overflow = 'auto';
            }

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
    $(document).ready(function () {
        var table;
        table = $('#inquiries-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('business.inquiries.data') }}",
                data: function (d) {
                    d.status = $('#inquiry-status-filter').val();
                }
            },
            columns: [
                { data: 'created_at', name: 'created_at' },
                { data: 'company', name: 'company' },
                { data: 'contact', name: 'contact' },
                { data: 'product', name: 'product' },
                { data: 'quantity', name: 'quantity' },
                { data: 'status_badge', name: 'status_badge', orderable: false, searchable: false },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ],
            dom: 'Bfrtip', // enable buttons extension
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'Export CSV',
                    className: 'd-none' // hide default CSV button
                }
            ]
        });

        // Filter by status
        $('#inquiry-status-filter').change(function () {
            table.ajax.reload();
        });

                // custom export button
        $('#export-inquiries-btn').on('click', function () {
            table.button('.buttons-csv').trigger(); 
        });


        $(document).on('click', '.view-inquiry-btn', function () {
            let inquiryId = $(this).data('id');

            $.ajax({
                url: `{{ route('business.inquiries.show', '') }}/${inquiryId}`,
                type: 'GET',
                success: function (data) {
                    // Fill modal fields
                    $('#inquiry-company').val(data.company);
                    $('#inquiry-email').val(data.email);
                    $('#inquiry-product').val(data.product);
                    $('#inquiry-quantity').val(data.quantity);
                    $('#inquiry-message').val(data.message);
                    $('#inquiry-status').val(data.status);

                    // Attach ID for saving later
                    $('#save-inquiry-btn').data('id', data.id);

                    // Show modal
                    openModal('view-inquiry-modal');
                    // $('#view-inquiry-modal').fadeIn();
                }
            });
        });

        // Close modal
        $(document).on('click', '.close-modal, .btnCancel', function () {
            $('#view-inquiry-modal').fadeOut();
        });

        // Save changes
        $('#save-inquiry-btn').on('click', function () {
            let inquiryId = $(this).data('id');
            let status = $('#inquiry-status').val();

            $.ajax({
                url: `{{ route('business.inquiries.update', '') }}/${inquiryId}`,
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    status: status
                },
                success: function (res) {
                    alert(res.message);
                    $('#view-inquiry-modal').fadeOut();
                    table.ajax.reload(null, false); // reload table without reset pagination
                }
            });
        });

    });



</script>
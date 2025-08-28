<script>
    $(document).ready(function () {

        $("#saveBusinessProfile").on("click", function (e) {
            e.preventDefault();

            let formData = new FormData($("#businessProfileForm")[0]);

            $.ajax({
                url: "/api/business/update-profile", // encryptedId
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res.success) {
                        showAlert('success', res.message || 'Profile updated successfully.');
                    } else {
                        showAlert('error', res.message || 'Validation error');
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    showAlert('error', "Something went wrong.");
                }
            });
        });

        $("#cancelBusinessProfile").on("click", function () {
            $("#businessProfileForm")[0].reset();
        });

    });
</script>
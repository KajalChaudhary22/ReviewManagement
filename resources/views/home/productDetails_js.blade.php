@include('layouts.commonjs')
<script>
    $(document).ready(function () {
        const requestQuoteBtn = document.getElementById('request-quote-btn');
        const quoteModalOverlay = document.getElementById('quote-modal-overlay');
        const closeQuoteModal = document.getElementById('close-quote-modal');

        // ✅ Define globally (within document.ready scope)
        const closeQuoteModalHandler = () => {
            if (quoteModalOverlay) {
                quoteModalOverlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        };

        // Quote Request Modal Functionality
        if (requestQuoteBtn && quoteModalOverlay) {
            const openQuoteModal = () => {
                quoteModalOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            };

            requestQuoteBtn.addEventListener('click', openQuoteModal);
            closeQuoteModal.addEventListener('click', closeQuoteModalHandler);
            quoteModalOverlay.addEventListener('click', (e) => {
                if (e.target === quoteModalOverlay) {
                    closeQuoteModalHandler();
                }
            });
        }

        // Quote form submission via AJAX
        $("#quote-form").on("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "/api/product/quote",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,

                success: function (response) {
                    if (response.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: response.message || "Your quote request has been submitted successfully!"
                        });

                        $("#quote-form")[0].reset();
                        closeQuoteModalHandler(); // ✅ Works now!
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: response.message || "Something went wrong!"
                        });
                    }
                },

                error: function (xhr) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Server error occurred. Please try again later!"
                    });
                }
            });
        });
    });

    $(document).ready(function () {
        const contactSpecialistBtn = document.getElementById('contact-specialist-btn');
        const specialistModalOverlay = document.getElementById('specialist-modal-overlay');
        const closeSpecialistModal = document.getElementById('close-specialist-modal');

        // ✅ Define globally (within document.ready scope)
        const closeSpecialistModalHandler = () => {
            if (specialistModalOverlay) {
                specialistModalOverlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        };

        // Specialist Contact Modal Functionality
        if (contactSpecialistBtn && specialistModalOverlay) {
            const openSpecialistModal = () => {
                specialistModalOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            };

            contactSpecialistBtn.addEventListener('click', openSpecialistModal);
            closeSpecialistModal.addEventListener('click', closeSpecialistModalHandler);
            specialistModalOverlay.addEventListener('click', (e) => {
                if (e.target === specialistModalOverlay) {
                    closeSpecialistModalHandler();
                }
            });
        }

        $("#specialist-form").on("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "/api/product/specialist", // your Laravel route
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,

                success: function (response) {
                    if (response.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: response.message || "Your specialist request has been submitted successfully!",
                        });

                        // Reset the form
                        $("#specialist-form")[0].reset();

                        // Optional: close modal if you have one
                        if (typeof closeSpecialistModalHandler === "function") {
                            closeSpecialistModalHandler();
                        }
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: response.message || "Something went wrong!",
                        });
                    }
                },

                error: function (xhr) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Server error occurred. Please try again later!",
                    });
                    console.error(xhr.responseText);
                }
            });
        });
    });

</script>
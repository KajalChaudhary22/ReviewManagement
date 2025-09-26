@include('layouts.commonjs')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    // Mobile menu toggle
    // document.getElementById('mobile-menu-button').addEventListener('click', function () {
    //     const menu = document.getElementById('mobile-menu');
    //     menu.classList.toggle('hidden');
    // });

    // // Smooth scrolling for anchor links
    // document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    //     anchor.addEventListener('click', function (e) {
    //         e.preventDefault();

    //         const targetId = this.getAttribute('href');
    //         if (targetId === '#') return;

    //         const targetElement = document.querySelector(targetId);
    //         if (targetElement) {
    //             targetElement.scrollIntoView({
    //                 behavior: 'smooth'
    //             });
    //         }
    //     });
    // });


    // // JavaScript for Popup Review Form
    // const reviewPopup = document.getElementById('review-popup');
    // const writeReviewBtn = document.getElementById('write-review-btn');
    // const closePopupBtn = document.getElementById('close-popup');
    // const stars = document.querySelectorAll('.star');

    // // Show the popup when the "Write a Review" button is clicked
    // writeReviewBtn.addEventListener('click', () => {
    //     reviewPopup.classList.add('active');
    // });

    // // Hide the popup when the close button is clicked
    // closePopupBtn.addEventListener('click', () => {
    //     reviewPopup.classList.remove('active');
    // });

    // // Hide the popup when clicking outside of it
    // reviewPopup.addEventListener('click', (e) => {
    //     if (e.target === reviewPopup) {
    //         reviewPopup.classList.remove('active');
    //     }
    // });

    // // Star Rating Functionality
    // stars.forEach(star => {
    //     star.addEventListener('click', () => {
    //         const value = parseInt(star.dataset.value);
    //         stars.forEach(s => {
    //             s.classList.toggle('selected', parseInt(s.dataset.value) <= value);
    //         });
    //     });
    // });

    // // Expandable Categories Section
    // const toggleCategoriesBtn = document.getElementById('toggleCategories');
    // const categoriesContainer = document.getElementById('categoriesContainer');
    // const additionalCategories = document.querySelectorAll('.additional-category');
    // let categoriesExpanded = false;

    // toggleCategoriesBtn.addEventListener('click', function () {
    //     categoriesExpanded = !categoriesExpanded;

    //     if (categoriesExpanded) {
    //         // Expand
    //         additionalCategories.forEach(cat => cat.classList.remove('hidden'));
    //         categoriesContainer.style.height = 'auto';
    //         toggleCategoriesBtn.textContent = 'Show Less Categories';
    //     } else {
    //         // Collapse
    //         additionalCategories.forEach(cat => cat.classList.add('hidden'));
    //         categoriesContainer.style.height = 'auto';
    //         toggleCategoriesBtn.textContent = 'Browse All Categories';
    //     }
    // });

    // // Horizontal Navigation for Top Rated Companies
    // const scrollLeftBtn = document.getElementById('scrollLeft');
    // const scrollRightBtn = document.getElementById('scrollRight');
    // const companiesContainer = document.getElementById('companiesContainer');

    // scrollLeftBtn.addEventListener('click', function () {
    //     companiesContainer.scrollBy({
    //         left: -300,
    //         behavior: 'smooth'
    //     });
    // });

    // scrollRightBtn.addEventListener('click', function () {
    //     companiesContainer.scrollBy({
    //         left: 300,
    //         behavior: 'smooth'
    //     });
    // });

    // // Show/hide arrows based on scroll position
    // companiesContainer.addEventListener('scroll', function () {
    //     const scrollLeft = companiesContainer.scrollLeft;
    //     const maxScroll = companiesContainer.scrollWidth - companiesContainer.clientWidth;

    //     scrollLeftBtn.style.display = scrollLeft > 0 ? 'block' : 'none';
    //     scrollRightBtn.style.display = scrollLeft < maxScroll - 10 ? 'block' : 'none';
    // });

    // // Initial check for arrows
    // companiesContainer.dispatchEvent(new Event('scroll'));

    // // Expandable Recent Reviews
    // const viewAllReviewsBtn = document.getElementById('viewAllReviews');
    // const reviewsContainer = document.getElementById('reviewsContainer');
    // const additionalReviews = document.querySelectorAll('.additional-review');
    // let reviewsExpanded = false;

    // viewAllReviewsBtn.addEventListener('click', function () {
    //     reviewsExpanded = !reviewsExpanded;

    //     if (reviewsExpanded) {
    //         // Expand
    //         additionalReviews.forEach(review => review.classList.remove('hidden'));
    //         reviewsContainer.classList.add('grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-3');
    //         viewAllReviewsBtn.textContent = 'Show Less Reviews';
    //     } else {
    //         // Collapse
    //         additionalReviews.forEach(review => review.classList.add('hidden'));
    //         reviewsContainer.classList.add('grid-cols-1', 'md:grid-cols-2');
    //         viewAllReviewsBtn.textContent = 'View All Reviews';
    //     }

    // });
    $(document).ready(function () {
        $("#contact_usForm").on("submit", function (e) {
            e.preventDefault(); // stop default submit

            let formData = new FormData(this);

            $.ajax({
                url: "/api/contact/store",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: data.message
                        });
                        $("#contact_usForm")[0].reset(); // reset form
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Something went wrong!"
                        });
                    }
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Server error occurred!"
                    });
                    console.error(xhr.responseText);
                }
            });
        });
    });

</script>
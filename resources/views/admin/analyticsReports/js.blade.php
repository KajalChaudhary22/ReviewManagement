<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Mobile Menu Toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const sidebar = document.querySelector('.sidebar');

        if (menuToggle) {
            menuToggle.addEventListener('click', function () {
                sidebar.classList.toggle('active');
            });
        }

        function checkScreenSize() {
            if (window.innerWidth <= 576) {
                if (menuToggle) menuToggle.classList.remove('hidden');
                sidebar.classList.remove('active');
            } else {
                if (menuToggle) menuToggle.classList.add('hidden');
                sidebar.classList.remove('active');
            }
        }

        checkScreenSize();
        window.addEventListener('resize', checkScreenSize);
        

        
        // ===================================================================
        // NEWLY ADDED: Analytics Chart Buttons Functionality
        // ===================================================================
        document.querySelectorAll('.chart-actions button').forEach(button => {
            button.addEventListener('click', function () {
                // Remove primary class from sibling buttons
                this.parentNode.querySelectorAll('button').forEach(btn => {
                    btn.classList.remove('btn-primary');
                    btn.classList.add('btn-secondary');
                });

                // Add primary class to the clicked button
                this.classList.remove('btn-secondary');
                this.classList.add('btn-primary');

                const chartType = this.getAttribute('data-chart');
                console.log(`Switched to ${chartType} view. In a real app, chart data would now be updated.`);
                // You would add chart-updating logic here
            });
        });

        // --- Other Functionalities (Export, Report, etc.) ---
        document.querySelectorAll('[id^="export"]').forEach(button => {
            button.addEventListener('click', () => alert('Exporting data...'));
        });
        document.querySelectorAll('[id^="generateReport"]').forEach(button => {
            button.addEventListener('click', () => alert('Generating report...'));
        });
        document.getElementById('saveSettings')?.addEventListener('click', () => alert('Settings saved!'));

    });
</script>
// Put this in a <script> before your jQuery code that calls openModal()
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) return;
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) return;
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    
    // hookup close buttons + click-outside after DOM loaded
    document.addEventListener('DOMContentLoaded', function() {
        const modalCloseButtons = document.querySelectorAll(
            '.modal-close, .btn-secondary[id^="cancel"], .btn-secondary[id^="close"]'
        );
    
        modalCloseButtons.forEach(button => {
            button.addEventListener('click', function() {
                const modal = this.closest('.modal');
                if (modal) closeModal(modal.id);
            });
        });
    
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) closeModal(this.id);
            });
        });
    });
    
// Main modal coordination script

// Initialize modal system
document.addEventListener('DOMContentLoaded', function() {
    console.log('Modal system initialized');
    
    // Add any global modal event listeners here
    setupGlobalModalEvents();
});

function setupGlobalModalEvents() {

    // Example: Close modal when clicking outside
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal')) {
            const modal = bootstrap.Modal.getInstance(event.target);
            if (modal) {
                modal.hide();
            }
        }
    });
}

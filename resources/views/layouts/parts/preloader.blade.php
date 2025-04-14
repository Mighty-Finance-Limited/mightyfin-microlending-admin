<style>
    /* Preloader Overlay Styles */
    .preloader-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .preloader-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .preloader-spinner {
        width: 70px;
        height: 70px;
        position: relative;
    }

    .preloader-spinner:before,
    .preloader-spinner:after {
        content: '';
        border-radius: 50%;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .preloader-spinner:before {
        box-shadow: 0 0 20px 5px rgba(135, 66, 225, 0.2);
        animation: pulse 1.5s ease-in-out infinite;
    }

    .preloader-spinner:after {
        border: 2px solid transparent;
        border-top-color: #b442e1;
        border-bottom-color: #9442e1;
        animation: spin 1s linear infinite;
    }

    .preloader-text {
        position: absolute;
        bottom: -40px;
        color: white;
        font-family: sans-serif;
        font-size: 14px;
        letter-spacing: 1px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    @keyframes pulse {
        0% { transform: scale(0.8); opacity: 0.8; }
        50% { transform: scale(1.2); opacity: 0.5; }
        100% { transform: scale(0.8); opacity: 0.8; }
    }

    /* Demo styles (not needed for the preloader functionality) */
    .btnclicky {
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btnclicky:hover {
        background-color: #f5f5f5;
    }

    .action-icon.bg-light-success {
        color: #38a169;
        background-color: #d7f9db;
        padding: 8px;
        border-radius: 5px;
    }

    .action-content {
        margin-left: 10px;
    }

    .action-label {
        display: block;
        font-weight: bold;
        font-size: 14px;
    }

    .action-description {
        display: block;
        font-size: 12px;
        color: #666;
    }
</style>



    <!-- Preloader Overlay (Initially hidden) -->
    <div class="preloader-overlay" id="preloaderOverlay">
    <div class="preloader-spinner">
        <div class="preloader-text">Processing...</div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Create preloader if it doesn't exist
        if (!document.getElementById('preloaderOverlay')) {
            const preloader = document.createElement('div');
            preloader.id = 'preloaderOverlay';
            preloader.className = 'preloader-overlay';
            preloader.innerHTML = `
                <div class="preloader-spinner">
                    <div class="preloader-text">Processing...</div>
                </div>
            `;
            document.body.appendChild(preloader);
        }

        // Get all elements with the btnclicky class
        const buttons = document.querySelectorAll('.btnclicky');

        // Add click event listener to each button
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                // If this is just triggering the wire:click, don't interfere with Livewire
                // Just show the preloader
                const preloader = document.getElementById('preloaderOverlay');
                preloader.classList.add('active');

                // For demo purposes, hide the preloader after 3 seconds
                // In a real app, you would hide it when your operation completes
                setTimeout(() => {
                    preloader.classList.remove('active');
                }, 4000);
            });
        });

        // If you're using Livewire, you might want to listen for events
        // This is pseudo-code and would need to be adapted to your Livewire setup
        document.addEventListener('livewire:load', function() {
            Livewire.hook('message.sent', () => {
                // Show preloader when a Livewire action starts
                document.getElementById('preloaderOverlay').classList.add('active');
            });

            Livewire.hook('message.processed', () => {
                // Hide preloader when a Livewire action completes
                document.getElementById('preloaderOverlay').classList.remove('active');
            });
        });
    });
</script>
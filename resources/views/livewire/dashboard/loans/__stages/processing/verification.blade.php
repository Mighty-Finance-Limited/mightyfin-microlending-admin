<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">
               @include('livewire.dashboard.loans.__stages.processing.ui.approval-side-menu')
               @include('livewire.dashboard.loans.__stages.processing.ui.verification-content')
                <!--end::Content-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <style>
        /* World-Class Loan Actions and Navigation Styling */

/* Action Button and Menu */
.loan-actions-container {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 2rem;
    position: relative;
}

.action-controls {
    position: relative;
}

.action-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #6a3093 0%, #8E54E9 100%);
    color: white;
    border: none;
    border-radius: 0.5rem;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.2s ease;
    box-shadow: 0 4px 10px rgba(71, 118, 230, 0.2);
    cursor: pointer;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(71, 118, 230, 0.25);
}

.action-btn:active {
    transform: translateY(0);
}

.action-btn-text {
    padding-right: 0.25rem;
}

.action-dropdown-menu {
    position: absolute;
    top: calc(100% + 0.75rem);
    right: 0;
    width: 280px;
    background: white;
    border-radius: 0.75rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    padding: 0.75rem;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.3s ease;
    z-index: 10;
    overflow: hidden;
}

.action-dropdown-menu.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.action-dropdown-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.875rem;
    border-radius: 0.5rem;
    cursor: pointer;
    transition: all 0.2s ease;
}

.action-dropdown-item:hover {
    background-color: #f9fafb;
}

.action-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 0.5rem;
    flex-shrink: 0;
}

.action-icon svg {
    stroke-width: 2;
}

.bg-light-warning {
    background-color: rgba(255, 170, 0, 0.15);
    color: #FFAA00;
}

.bg-light-danger {
    background-color: rgba(255, 84, 84, 0.15);
    color: #FF5454;
}

.bg-light-success {
    background-color: rgba(46, 202, 106, 0.15);
    color: #2ECA6A;
}

.action-content {
    display: flex;
    flex-direction: column;
}

.action-label {
    font-weight: 600;
    font-size: 0.95rem;
    color: #1e293b;
    margin-bottom: 0.25rem;
}

.action-description {
    font-size: 0.8rem;
    color: #64748b;
}

/* Enhanced Tabs */
.loan-tabs-container {
    position: relative;
    margin-bottom: 2rem;
}

.loan-tabs {
    display: flex;
    gap: 1rem;
    padding-bottom: 0.25rem;
    border-bottom: 1px solid #e2e8f0;
    overflow-x: auto;
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE/Edge */
}

.loan-tabs::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
}

.loan-tab {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem 0.5rem 0 0;
    cursor: pointer;
    transition: all 0.2s ease;
    white-space: nowrap;
    position: relative;
    color: #64748b;
}

.loan-tab::after {
    content: '';
    position: absolute;
    bottom: -0.25rem;
    left: 0;
    width: 100%;
    height: 3px;
    background: transparent;
    transform: scaleX(0.7);
    transition: all 0.3s ease;
}

.loan-tab.active {
    color: #6a3093;
}

.loan-tab.active::after {
    background: linear-gradient(90deg, #6a3093 0%, #8E54E9 100%);
    transform: scaleX(1);
}

.loan-tab:hover {
    color: #6a3093;
}

.loan-tab-icon {
    opacity: 0.8;
}

.loan-tab.active .loan-tab-icon {
    opacity: 1;
}

.loan-tab-text {
    font-weight: 600;
    font-size: 0.9rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .loan-tabs {
        gap: 0.5rem;
    }

    .loan-tab {
        padding: 0.625rem 0.75rem;
    }

    .loan-tab-text {
        font-size: 0.8rem;
    }
}
    </style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".loan-tab");
    const tabContents = document.querySelectorAll(".tab-pane");

    tabs.forEach(tab => {
        tab.addEventListener("click", function () {
            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove("active"));

            // Add active class to the clicked tab
            this.classList.add("active");

            // Get target tab content ID
            const targetId = this.getAttribute("href");

            // Hide all tab contents
            tabContents.forEach(content => content.classList.remove("show", "active"));

            // Show the selected tab content
            document.querySelector(targetId).classList.add("show", "active");
        });
    });
});

</script>
</div>

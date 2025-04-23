<div class="mx-8 breadcrumb-wrapper">
    <div class="breadcrumb-container">
        <nav aria-label="breadcrumb" class="animated-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-link">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="breadcrumb-item" active aria-current="page">
                    <i class="fas fa-file"></i>
                    <span>{{ $title }}</span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<style>
/* Professional Breadcrumb Styling */
.breadcrumb-wrapper {
    padding: 0.75rem 0;
    background: linear-gradient(90deg, rgba(248,249,250,1) 0%, rgba(233,236,239,1) 100%);
    border-radius: 8px;
    margin-bottom: 1rem;
    position: relative;
    overflow: hidden;
}

.breadcrumb-container {
    padding: 0 1rem;
    max-width: 1200px;
    margin: 0 auto;
}

.animated-breadcrumb .breadcrumb {
    background: transparent;
    margin: 0;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.animated-breadcrumb .breadcrumb-item {
    position: relative;
    padding: 0;
    margin: 0;
    display: flex;
    align-items: center;
}

.animated-breadcrumb .breadcrumb-item + .breadcrumb-item {
    padding-left: 1.5rem;
}

.animated-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
    content: '';
    padding-right: 1.5rem;
    color: #6c757d;
    position: relative;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f054";
    font-size: 0.75rem;
    top: 0;
}

.animated-breadcrumb .breadcrumb-link {
    display: flex;
    align-items: center;
    color: #3a3a3a;
    text-decoration: none;
    font-weight: 500;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    transition: all 0.25s ease;
}

.animated-breadcrumb .breadcrumb-link:hover {
    color: #6a3093;
    background-color: rgba(13, 110, 253, 0.1);
    transform: translateY(-1px);
}

.animated-breadcrumb .breadcrumb-item.active {
    color: #6c757d;
    font-weight: 600;
    display: flex;
    align-items: center;
}

.animated-breadcrumb .breadcrumb-item i {
    margin-right: 0.5rem;
    font-size: 0.9rem;
}

.animated-breadcrumb .breadcrumb-item.active i {
    color: #6a3093;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .animated-breadcrumb .breadcrumb-item span {
        display: none;
    }

    .animated-breadcrumb .breadcrumb-item.active span {
        display: inline;
    }

    .animated-breadcrumb .breadcrumb-item i {
        margin-right: 0;
        font-size: 1rem;
    }

    .animated-breadcrumb .breadcrumb-item + .breadcrumb-item {
        padding-left: 1rem;
    }

    .animated-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
        padding-right: 1rem;
    }

    .animated-breadcrumb .breadcrumb-link {
        padding: 0.25rem;
    }
}

/* Optional: Dark Mode Support */
@media (prefers-color-scheme: dark) {
    .breadcrumb-wrapper {
        background: linear-gradient(90deg, rgba(33,37,41,1) 0%, rgba(52,58,64,1) 100%);
    }

    .animated-breadcrumb .breadcrumb-link {
        color: #e9ecef;
    }

    .animated-breadcrumb .breadcrumb-item.active {
        color: #adb5bd;
    }

    .animated-breadcrumb .breadcrumb-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .animated-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
        color: #6c757d;
    }
}
</style>

<script>
// Optional JavaScript for enhanced interactivity
document.addEventListener('DOMContentLoaded', function() {
    const breadcrumbItems = document.querySelectorAll('.breadcrumb-item');

    breadcrumbItems.forEach((item, index) => {
        item.style.animation = `fadeInRight 0.5s ease forwards ${index * 0.1}s`;
        item.style.opacity = '0';
    });

    // Add animation keyframes
    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    `;
    document.head.appendChild(style);
});
</script>

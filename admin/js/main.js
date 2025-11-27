// Initialize all functionality when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    setupSidebarToggle();
    setupNavigation();
    setupProfileDropdown();
    setupChart();
});

// Sidebar Toggle for Mobile
function setupSidebarToggle() {
    const hamburger = document.getElementById('hamburger');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('mobileOverlay');

    hamburger.addEventListener('click', function() {
        sidebar.classList.toggle('mobile-open');
        overlay.classList.toggle('active');
    });

    overlay.addEventListener('click', function() {
        sidebar.classList.remove('mobile-open');
        overlay.classList.remove('active');
    });

    // Close sidebar when a link is clicked on mobile
    const sidebarLinks = sidebar.querySelectorAll('.sidebar-menu a');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth < 768) {
                sidebar.classList.remove('mobile-open');
                overlay.classList.remove('active');
            }
        });
    });
}

// Navigation Section Switching
function setupNavigation() {
    const navLinks = document.querySelectorAll('.sidebar-menu a');

    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove active class from all links
            navLinks.forEach(l => l.classList.remove('active'));

            // Add active class to clicked link
            this.classList.add('active');

            // Get the section name
            const section = this.getAttribute('data-section');

            // Hide all sections
            const sections = document.querySelectorAll('.section-content');
            sections.forEach(s => s.style.display = 'none');

            // Show the selected section
            const selectedSection = document.getElementById(section + 'Section');
            if (selectedSection) {
                selectedSection.style.display = 'block';
            }

            // Update topbar title on mobile
            const title = this.textContent.trim();
            const mobileTitle = document.querySelector('.md\\:hidden h2');
            if (mobileTitle) {
                mobileTitle.textContent = title;
            }
        });
    });
}

// Profile Dropdown Toggle
function setupProfileDropdown() {
    const profileBtn = document.getElementById('profileBtn');
    const dropdown = document.getElementById('profileDropdown');

    profileBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        dropdown.classList.toggle('active');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!profileBtn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.remove('active');
        }
    });

    // Close dropdown when clicking inside
    dropdown.addEventListener('click', function(e) {
        if (e.target.tagName === 'A' || e.target.tagName === 'BUTTON') {
            dropdown.classList.remove('active');
        }
    });
}

// Initialize Chart.js
function setupChart() {
    const canvas = document.getElementById('salesChart');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: '2024 Sales',
                    data: [12000, 19000, 15000, 25000, 22000, 30000, 28000, 35000, 32000, 38000, 42000, 45000],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: '#3b82f6',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointHoverRadius: 6
                },
                {
                    label: '2023 Sales',
                    data: [8000, 12000, 10000, 18000, 15000, 22000, 20000, 25000, 23000, 28000, 30000, 32000],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.05)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: '#10b981',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointHoverRadius: 6
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 15,
                        font: {
                            size: 12,
                            weight: 'bold'
                        },
                        color: '#6b7280'
                    }
                },
                filler: {
                    propagate: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(229, 231, 235, 0.5)',
                        drawBorder: false
                    },
                    ticks: {
                        color: '#6b7280',
                        font: {
                            size: 12
                        },
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        color: '#6b7280',
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    });
}
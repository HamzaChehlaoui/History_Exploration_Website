
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const target = this.getAttribute('data-target');

        // Update active tab
        document.querySelectorAll('.nav-link').forEach(el => {
            el.classList.remove('bg-amber-800/50');
            el.classList.add('hover:bg-amber-800/50');
        });
        this.classList.add('bg-amber-800/50');
        this.classList.remove('hover:bg-amber-800/50');

        // Show target content
        document.querySelectorAll('.tab-content').forEach(el => {
            el.classList.remove('active');
        });
        document.getElementById(target).classList.add('active');
    });
});

document.querySelectorAll('button:contains("Edit")').forEach(btn => {
    btn.addEventListener('click', function() {
        document.getElementById('userModal').classList.remove('hidden');
    });
});

document.getElementById('closeUserModal').addEventListener('click', function() {
    document.getElementById('userModal').classList.add('hidden');
});

document.querySelectorAll('button:contains("Review")').forEach(btn => {
    btn.addEventListener('click', function() {
        document.getElementById('articleModal').classList.remove('hidden');
    });
});

document.getElementById('closeArticleModal').addEventListener('click', function() {
    document.getElementById('articleModal').classList.add('hidden');
});

const profileImg = document.querySelector('img[alt="Admin Profile"]');
const profileDropdown = document.getElementById('profileDropdown');

profileImg.addEventListener('click', function() {
    profileDropdown.classList.toggle('hidden');
});

document.addEventListener('click', function(e) {
    if (!profileImg.contains(e.target)) {
        profileDropdown.classList.add('hidden');
    }
});

const ctx = document.getElementById('activityChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'New Users',
            data: [65, 59, 80, 81, 56, 55, 40],
            borderColor: '#92400e',
            tension: 0.4
        }, {
            label: 'New Articles',
            data: [28, 48, 40, 19, 86, 27, 90],
            borderColor: '#b45309',
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
new Chart(userGrowthCtx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'User Growth',
            data: [12500, 13200, 14100, 14800, 15300, 15847],
            borderColor: '#92400e',
            backgroundColor: 'rgba(146, 64, 14, 0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            }
        },
        scales: {
            y: {
                beginAtZero: false
            }
        }
    }
});

const contentDistributionCtx = document.getElementById('contentDistributionChart').getContext('2d');
new Chart(contentDistributionCtx, {
    type: 'doughnut',
    data: {
        labels: ['Ancient', 'Medieval', 'Renaissance', 'Modern', 'Contemporary'],
        datasets: [{
            data: [583, 721, 492, 357, 300],
            backgroundColor: [
                '#92400e',
                '#b45309',
                '#d97706',
                '#f59e0b',
                '#fbbf24'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'right',
            }
        }
    }
});

document.querySelectorAll('button').forEach(btn => {
    if (btn.textContent.includes('Edit')) {
        btn.addEventListener('click', function() {
            document.getElementById('userModal').classList.remove('hidden');
        });
    }
    if (btn.textContent.includes('Review')) {
        btn.addEventListener('click', function() {
            document.getElementById('articleModal').classList.remove('hidden');
        });
    }
});
function confirmDelete(userId) {
    Swal.fire({
        title: 'Are you sure you want to delete this user?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + userId).submit();
        }
    });
}

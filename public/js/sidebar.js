document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('toggle-sidebar');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    if(toggleBtn && sidebar && mainContent) {
        toggleBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (window.innerWidth > 768) {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
            } else {
                sidebar.classList.toggle('show-mobile');
            }
        });
        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 768) {
                const isSidebarOpen = sidebar.classList.contains('show-mobile');
                const isClickOutsideSidebar = !sidebar.contains(event.target);
                if (isSidebarOpen && isClickOutsideSidebar) {
                    sidebar.classList.remove('show-mobile');
                }
            }
        });
        const sidebarLinks = sidebar.querySelectorAll('.sidebar-menu a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('show-mobile');
                }
            });
        });

    }
});
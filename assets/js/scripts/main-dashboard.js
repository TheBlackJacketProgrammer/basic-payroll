payroll.controller('ngCtrlMainDashboard', function($scope, $http) {

    $scope.init = function() {
        console.log('Main Dashboard Script Initialized');
        checkSavedTheme();
        initSidebarToggle();
    }

    // Theme toggle functionality
    $scope.toggleTheme = function() {
        const body = document.body;
        const icon = document.getElementById('theme-icon');
        
        body.classList.toggle('dark-mode');
        
        // Save preference to localStorage
        const isDarkMode = body.classList.contains('dark-mode');
        localStorage.setItem('darkMode', isDarkMode);
        
        // Toggle icon
        icon.classList.toggle('fa-moon');
        icon.classList.toggle('fa-sun');
    }

    // Check for saved theme preference
    function checkSavedTheme() {
        const isDarkMode = localStorage.getItem('darkMode') === 'true';
        const icon = document.getElementById('theme-icon');
        
        if (isDarkMode) {
            document.body.classList.add('dark-mode');
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        }
    }

    // Sidebar toggle functionality
    $scope.toggleSidebar = function(e) {
        e.preventDefault();
        document.getElementById('wrapper').classList.toggle('toggled');
    }

    // Initialize sidebar toggle
    function initSidebarToggle() {
        const menuToggle = document.getElementById('menu-toggle');
        if (menuToggle) {
            menuToggle.addEventListener('click', $scope.toggleSidebar);
        }
    }

    // Logout functionality
    $scope.logout = function() {
        $http.post(window.appUrl + 'Controller_Main/logout')
            .then(function(response) {
                if (response.data.success) {
                    location.reload();
                }
            })
            .catch(function(error) {
                console.error('Logout error:', error);
            });
    }

    // Page navigation
    $scope.loadPage = function(page) {
        $http.get(window.appUrl + 'Controller_Main/load_page/' + page)
            .then(function(response) {
                if (response.data) {
                    $scope.section = response.data;
                }
            })
            .catch(function(error) {
                console.error('Page load error:', error);
            });
    }

}); 
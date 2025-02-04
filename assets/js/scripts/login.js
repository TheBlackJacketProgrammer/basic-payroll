payroll.controller('ngCtrlLogin', function($scope, $http) {

    // Initialize Login Script
    $scope.init = function() {
        console.log('Login Script Initialized');
        $scope.isDarkMode = false;
        $scope.loginData = {
            username: '',
            password: ''
        };
        $scope.errorMessage = '';
    }

    $scope.login = function() {
        $scope.errorMessage = ''; // Clear previous errors
        
        $http.post('controller_main/auth_login', $scope.loginData)
            .then(function(response) {
                if (response.data.success) {
                    location.reload();
                } else {
                    $scope.errorMessage = response.data.message || 'Login failed. Please try again.';
                }
            })
            .catch(function(error) {
                $scope.errorMessage = 'An error occurred. Please try again later.';
                console.error('Login error:', error);
            });
    };

    $scope.toggleDarkMode = function() {
        $scope.isDarkMode = !$scope.isDarkMode;
        document.body.classList.toggle('dark-mode');
    }

    // Password visibility toggle
    $scope.togglePassword = function(event) {
        const button = event.currentTarget;
        const passwordInput = document.getElementById('password');
        const eyeIcon = button.querySelector('i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }

});

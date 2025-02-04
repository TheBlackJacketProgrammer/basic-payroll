payroll.controller('ngCtrlEmployees', function($scope, $http, DTOptionsBuilder, DTColumnBuilder) {
    var vm = this;
    
    // DataTable options
    $scope.dtOptions = {
        // Configure DataTable options here
        dom:    "<'row mb-3'<'col-sm-12 col-md-6 d-flex justify-content-start'f><'col-sm-12 col-md-6 d-flex justify-content-end'<'mr-2'>B>>" +
                "<'row'<'col-sm-6'l><'col-sm-6 d-flex justify-content-end'i>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row mt-3'<'col-sm-12 text-center d-flex justify-content-center'p>>",
        buttons: [
            {
                text: '<i class="fas fa-user-plus"></i>',
                className: 'btn btn-primary btn-sm',
                titleAttr: 'Add New Employee',
                action: function (e, dt, node, config) {
                    $scope.$apply(function() {
                        $scope.addEmployee();
                    });
                }
            },
            {
                text: '<i class="fas fa-user-edit"></i>',
                className: 'btn btn-warning btn-sm',
                titleAttr: 'Edit Selected Employees',
                action: function (e, dt, node, config) {
                    $scope.$apply(function() {
                        $scope.editSelectedEmployees();
                    });
                }
            },
            {
                text: '<i class="fas fa-user-minus"></i>',
                className: 'btn btn-danger btn-sm',
                titleAttr: 'Delete Selected Employee',
                action: function (e, dt, node, config) {
                    var selectedData = dt.rows({ selected: true }).data();
                    if (selectedData.length === 0) {
                        alert('Please select an employee to delete');
                        return;
                    }
                    if (confirm('Are you sure you want to delete this employee?')) {
                        $scope.$apply(function() {
                            $scope.deleteEmployee(selectedData[0]);
                        });
                    }
                }
            },
            {
                extend: 'print',
                className: 'btn btn-secondary btn-sm',
                text: '<i class="fas fa-print"></i>',
                titleAttr: 'Print',
                exportOptions: {
                    columns: [0, ':visible']
                }
            },
            {
                extend: 'excelHtml5',
                className: 'btn btn-secondary btn-sm',
                text: '<i class="fas fa-file-excel"></i>',
                titleAttr: 'Excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                className: 'btn btn-secondary btn-sm',
                text: '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'PDF',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'colvis',
                className: 'btn btn-secondary btn-sm',
                text: '<i class="fas fa-columns"></i>',
                titleAttr: 'Column Visibility'
            }
        ],
            paging: true,
            ordering: true,
            withOption: {
                autoWidth: false,
                scrollX: false
            }
    };


    $scope.loadEmployees = function() {
        $http({
            method: 'GET',
            url: window.appUrl + 'controller_employees/get_employees'
        }).then(function(response) {
            if (response.data.success) {
                $scope.filteredData = response.data.employees;
                console.log('Employees loaded:', $scope.filteredData); // Debug log
            } else {
                console.error('Error loading employees:', response.data.message);
            }
        }, function(error) {
            console.error('HTTP Error:', error);
        });
    }

    // Call loadEmployees when controller initializes
    $scope.loadEmployees();

    $scope.addEmployee = function() {
        $scope.isEditing = false;
        $scope.employee = {
            e_num: '',
            e_lastname: '',
            e_firstname: '',
            e_middlename: '',
            e_designation: '',
            e_status: 'Active'
        };
        $('#modalEmployee').modal('show');
    };

    $scope.editEmployee = function(employee) {
        $scope.isEditing = true;
        $scope.employee = angular.copy(employee);
        $('#modalEmployee').modal('show');
    };

    $scope.saveEmployee = function() {
        var url = $scope.isEditing ? 
            window.appUrl + 'controller_employees/update_employee' :
            window.appUrl + 'controller_employees/add_employee';

        var data = {
            employee: $scope.employee,
            image: {
                img_employee: $scope.employee.imageData
            }
        };

        console.log('Saving employee:', data);

        $http({
            method: 'POST',
            url: url,
            data: data
        }).then(function(response) {
            if (response.data.success) {
                $('#modalEmployee').modal('hide');
                $scope.loadEmployees();
                toastr.success(response.data.message);
            } else {
                toastr.error(response.data.message);
            }
        }, function(error) {
            toastr.error('An error occurred while saving the employee');
            console.error('Error:', error);
        });
    };

    $scope.deleteEmployee = function(employeeData) {
        // Your delete employee logic
        console.log('Delete Employee button clicked for employee:', employeeData);
    };

    // Initialize array to store selected row data
    $scope.selectedRows = [];
    $scope.selectAll = false;
    
    $scope.toggleAll = function() {
        // First update all rows with the OPPOSITE of current selectAll state
        angular.forEach($scope.filteredData, function(row) {
            row.selected = !$scope.selectAll;
        });
        
        // Then update selectAll state
        $scope.selectAll = !$scope.selectAll;
        
        // Update the selection
        $scope.updateSelection();
        
        console.log('Toggle All - New State:', $scope.selectAll);
    };

    $scope.updateSelection = function() {
        // Update selectedRows array with the data of checked rows
        $scope.selectedRows = $scope.filteredData.filter(function(row) {
            return row.selected;
        });
        
        // Check if all rows are selected
        var allSelected = $scope.filteredData.every(function(row) {
            return row.selected;
        });
        
        // Explicitly set selectAll based on allSelected state
        $scope.selectAll = allSelected;  // Will be false if not all rows are selected
        
        console.log('Selected Rows:', $scope.selectedRows);
        console.log('Number of selected rows:', $scope.selectedRows.length);
        console.log('All Selected:', allSelected);
    };

    // Example function to use the selected rows
    $scope.deleteSelectedEmployees = function() {
        if ($scope.selectedRows.length === 0) {
            alert('Please select employees to delete');
            return;
        }
        
        if (confirm('Are you sure you want to delete ' + $scope.selectedRows.length + ' employee(s)?')) {
            console.log('Deleting these employees:', $scope.selectedRows);
            // Your delete logic here using $scope.selectedRows
        }
    };

    // Add this function to handle row selection
    $scope.toggleSelection = function(row, event) {
        // Ignore if clicking on buttons or checkbox
        if (event.target.type === 'checkbox' || 
            event.target.tagName === 'BUTTON' || 
            event.target.tagName === 'I') {
            return;
        }
        
        row.selected = !row.selected;
        $scope.updateSelection();
    };

    $scope.editSelectedEmployees = function() {
        if ($scope.selectedRows.length === 0) {
            toastr.warning('Please select employees to edit');
            return;
        }

        // Initialize modal data
        $scope.isEditing = true;
        $scope.isMultiEdit = true;
        $scope.currentIndex = 0;
        $scope.selectedEmployees = $scope.selectedRows;
        
        // Load first employee data
        $scope.loadEmployeeData($scope.currentIndex);
        
        // Show modal
        $('#modalEmployee').modal('show');
    };
    

    $scope.loadEmployeeData = function(index) {
        var currentEmployee = $scope.selectedEmployees[index];
        console.log('Loading employee:', currentEmployee); // Debug log

        // Format the date
        var birthDate = dateFormatter(currentEmployee.e_birthdate);
        var employmentDate = dateFormatter(currentEmployee.e_employmentdate);
        
        // Employee Data
        $scope.employee = {
            e_id: currentEmployee.e_id,
            e_num: currentEmployee.e_num,
            e_lastname: currentEmployee.e_lastname,
            e_firstname: currentEmployee.e_firstname,
            e_middlename: currentEmployee.e_middlename,
            e_fullname: currentEmployee.e_fullname,
            e_alias: currentEmployee.e_alias,
            e_birthdate: new Date(birthDate),
            e_gender: currentEmployee.e_gender,
            e_civilstatus: currentEmployee.e_civilstatus,
            e_address: currentEmployee.e_address,
            e_tin: currentEmployee.e_tin,
            e_sss: currentEmployee.e_sss,
            e_philhealth: currentEmployee.e_philhealth,
            e_pagibig: currentEmployee.e_pagibig,
            e_designation: currentEmployee.e_designation,
            e_employmentdate: new Date(employmentDate),
            e_type: currentEmployee.e_type,
            e_status: currentEmployee.e_status

        };
        
        $scope.currentIndex = index;

        // Then load the employee image
        $http({
            method: 'GET',
            url: window.appUrl + 'controller_employees/get_employee_image/' + currentEmployee.e_id
        }).then(function(response) {
            if (response.data.success && response.data.image) {
                $scope.employee.imageUrl = 'data:image/jpeg;base64,' + response.data.image;
                $scope.employee.imageData = response.data.image;
            }
        });
    };

    $scope.previousEmployee = function() {
        if ($scope.currentIndex > 0) {
            $scope.loadEmployeeData($scope.currentIndex - 1);
        }
    };

    $scope.nextEmployee = function() {
        if ($scope.currentIndex < $scope.selectedEmployees.length - 1) {
            $scope.loadEmployeeData($scope.currentIndex + 1);
        }
    };

    $scope.closeModal = function() {
        $('#modalEmployee').modal('hide');
    };

    // Add these new functions
    $scope.handleImageUpload = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $scope.$apply(function() {
                    $scope.employee.imageUrl = e.target.result;
                    $scope.employee.imageData = e.target.result.split(',')[1]; // Base64 data
                });
            };
            reader.readAsDataURL(input.files[0]);
        }
    };
});

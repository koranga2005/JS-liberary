<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .main-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 2rem auto;
            padding: 2rem;
            max-width: 1200px;
        }
        
        .page-header {
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .page-header h1 {
            color: #2c3e50;
            font-weight: 600;
            margin: 0;
            font-size: 1.8rem;
        }
        
        .stats-row {
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            padding: 1.5rem;
            text-align: center;
            transition: box-shadow 0.2s ease;
        }
        
        .stat-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card h3 {
            color: #2c3e50;
            font-size: 1.8rem;
            margin: 0 0 0.5rem 0;
            font-weight: 600;
        }
        
        .stat-card p {
            color: #6c757d;
            margin: 0;
            font-size: 0.9rem;
        }
        
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .table-header h4 {
            color: #2c3e50;
            margin: 0;
            font-weight: 600;
        }
        
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 6px;
            font-weight: 500;
            padding: 0.5rem 1.2rem;
        }
        
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        
        .table-container {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            overflow: hidden;
        }
        
        .table {
            margin: 0;
        }
        
        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
            color: #2c3e50;
            font-weight: 600;
            padding: 1rem 0.75rem;
            font-size: 0.9rem;
        }
        
        .table tbody td {
            padding: 1rem 0.75rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f3f4;
        }
        
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        .badge {
            font-size: 0.75rem;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            font-weight: 500;
        }
        
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: #007bff;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 600;
            margin-right: 0.75rem;
        }
        
        .user-info {
            display: flex;
            align-items: center;
        }
        
        .action-buttons {
            display: flex;
            gap: 0.25rem;
        }
        
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
            border-radius: 4px;
        }
        
        .modal-content {
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }
        
        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
            border-radius: 8px 8px 0 0;
        }
        
        .modal-title {
            color: #2c3e50;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .form-label {
            color: #2c3e50;
            font-weight: 500;
            margin-bottom: 0.4rem;
        }
        
        .form-control, .form-select {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 0.6rem 0.75rem;
            font-size: 0.9rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        
        .modal-footer {
            border-top: 1px solid #e9ecef;
            background-color: #f8f9fa;
        }
        
        .alert {
            border-radius: 6px;
            border: none;
            font-size: 0.9rem;
        }
        .text-danger{
            cursor: pointer;
        }
        .text-primary{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="main-container">
            <!-- Page Header -->
            <div class="page-header">
                <h1><i class="bi bi-people me-2"></i>User Management</h1>
            </div>
            
            <!-- Table Header -->
            <div class="table-header">
                <h4>All Users</h4>
                <button type="button" id="add_user" class="btn btn-primary">
                    <i class="bi bi-plus me-1"></i>Add User
                </button>
            </div>
            
            <!-- Users Table -->
            <div class="table-container">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add AddUser Modal -->
    <div class="modal fade" id="addUserModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">
                        <i class="bi bi-person-plus me-2"></i>Add New User
                    </h5>
                    <button type="button" class="btn-close" id="closeUser"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email address" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Enter phone number" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" id="role" required>
                                        <option value="">Select role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Employee">Employee</option>
                                        <option value="Intern">Intern</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" required>
                                        <option value="Active" selected>Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select class="form-select" id="department">
                                <option value="">Select department</option>
                                <option value="IT">Information Technology</option>
                                <option value="HR">Human Resources</option>
                                <option value="Finance">Finance</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Operations">Operations</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary updateData" id="submit">Add User</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add UpdateUser Modal -->
    <div class="modal fade" id="updateUserModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateUserModalLabel">
                        <i class="bi bi-person-plus me-2"></i>Add New User
                    </h5>
                    <button type="button" class="btn-close" id="closeUser"></button>
                </div>
                <div class="modal-body">
                    <form id="UpdateUserForm">
                        <input type="hidden" id="unique_id">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="editFullName" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="editEmail" placeholder="Enter email address" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="editPhone" placeholder="Enter phone number" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" id="editRole" required>
                                        <option value="">Select role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Employee">Employee</option>
                                        <option value="Intern">Intern</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="editStatus" required>
                                        <option value="Active" selected>Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select class="form-select" id="editDepartment">
                                <option value="">Select department</option>
                                <option value="IT">Information Technology</option>
                                <option value="HR">Human Resources</option>
                                <option value="Finance">Finance</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Operations">Operations</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="updateData"> Update User</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        
    <script>
        // Open Modal Form For Creating New User
        $('#add_user').on('click', function(){
            $('#addUserModal').modal('show');
        });

        // Close Modal
        $('#closeUser').on('click', function(){
            $('#addUserModal').modal('hide');
        });

        // Show Data on Table
        $(document).ready(function() {
            $.ajax({
                url: "functions/code.php",
                method: "POST",
                data: {
                    chutiya: true
                },
                success: function(res) {
                    let data = JSON.parse(res);
                    // console.log(res);
                    // console.log(data);

                    let tbody = $('#userTableBody');
                    if(!data[0].message){
                        tbody.empty();
                        allData = data;
                        let j=0;
                        for(i=0; i<data.length; i++) {
                            j++
                            let row = `
                                <tr>
                                    <td>${j}</td>
                                    <td>${data[i].Name}</td>
                                    <td>${data[i].Email}</td>
                                    <td>${data[i].Phone}</td>
                                    <td>${data[i].Role}</td>
                                    <td>${data[i].status}</td>
                                    <td>${data[i].Department}</td>
                                    <td>
                                        <i class="fas fa-edit text-primary me-2 editUser" 
                                        data-eid="${data[i].Uid}" 
                                        data-bs-toggle="tooltip" 
                                        data-bs-placement="top" 
                                        title="Edit User"></i>

                                        <i class="fas fa-trash text-danger deleteUser" 
                                        data-did="${data[i].Uid}" 
                                        data-bs-toggle="tooltip" 
                                        data-bs-placement="top" 
                                        title="Delete User"></i>
                                    </td>

                            </tr>`
                            tbody.append(row);
                        }
                    }
                },
            });
        }); 

        //  Insert Data in Database
        $('#submit').on('click', function() {
            let fullName = $('#fullName').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let role = $('#role').val();
            let status = $('#status').val();
            let department = $('#department').val();

            $.ajax({
                url: "functions/code.php",
                method: 'POST',
                data: {
                    user: true,
                    fullName : fullName,
                    email : email,
                    phone : phone,
                    role : role,
                    status : status,
                    department : department
                },
                success: function(rahulchutiya) {
                    alert(rahulchutiya);
                    $('#addUserModal').modal('hide');
                    location.reload();
                },
            });
        })

        // Open Modal Form and Data Show OR EDIT USER
        $(document).on('click', '.editUser' ,function() {
            let editId = $(this).data('eid');

            $('#updateUserModal').modal('show');
            $.ajax({
                url: "functions/code.php",
                method: "POST",
                data: {
                    editbhai: true,
                    editId:editId
                },
                success: function(response){
                    let data = JSON.parse(response);
                    // console.log(data);


                    $('#unique_id').val(data[0].Uid); 
                    $('#editFullName').val(data[0].Name); 
                    $('#editEmail').val(data[0].Email); 
                    $('#editPhone').val(data[0].Phone);
                    $('#editRole').val(data[0].Role); 
                    $('#editStatus').val(data[0].Status); 
                    $('#editDepartment').val(data[0].Department); 
                },
            });


            $('#updateData').on('click', function() {
                let Uid = $('#unique_id').val();
                let fullName = $('#editFullName').val();
                let email = $('#editEmail').val();
                let phone = $('#editPhone').val();
                let role = $('#editRole').val();
                let status = $('#editStatus').val();
                let department = $('#editDepartment').val();

                if(confirm("Are You Sure you want to Update This User")) {
                    $.ajax({
                        url: "functions/code.php",
                        method: "POST",
                        data: {
                            updateUserData: true,
                            Uid: Uid,
                            fullName: fullName,
                            email: email,
                            phone: phone,
                            role: role,
                            status: status,
                            department: department
                        },
                        success: function(response) {
                            alert(response);
                            location.reload();
                        },
                    });
                }
            });
        })

        // Delete User Code
        $(document).on('click', '.deleteUser' ,function() {
            let deleteId = $(this).data('did');
            // alert(deleteId);

            if(confirm("Are You Sure you want to Delete This User")) {
                $.ajax({
                    url: 'functions/code.php',
                    method: 'POST',
                    data: {
                        ganduChutiya: true,
                        deleteId, deleteId
                    },
                    success: function(response) {
                        alert(response);
                        location.reload();
                    },
                });
            }
        })
    </script>
</body>
</html>
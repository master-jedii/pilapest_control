<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/app.js') <!-- เรียกใช้ Vite JS สำหรับ Vue -->
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div id="app">
        <Navbar /> 
    </div>
    <!-- Navbar ที่คุณสร้างไว้แล้ว -->
    <div class="container mt-5">
        <h2>Company Reports</h2>
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createEmployeeModal">
            Import from excel
        </button>
        <!-- Table สำหรับแสดงข้อมูล Company -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->address }}</td>
                        <td>
                            <!-- Edit Button - เปิด Modal -->
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editCompany({{ $company->id }}, '{{ $company->name }}', '{{ $company->email }}', '{{ $company->address }}')">Edit</button>

                            <!-- Delete Button - SweetAlert2 -->
                            <button class="btn btn-danger btn-sm" onclick="deleteCompany({{ $company->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Edit Company -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Company</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="companyName" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="companyName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="companyEmail" class="form-label">Company Email</label>
                            <input type="email" class="form-control" id="companyEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="companyAddress" class="form-label">Company Address</label>
                            <input type="text" class="form-control" id="companyAddress" name="address" required>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary" onclick="confirmSaveChanges(event)">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 Script -->
    <script>
        // ฟังก์ชันเพื่อเปิด Modal และใส่ข้อมูลที่ต้องการแก้ไข
        function editCompany(id, name, email, address) {
            document.getElementById('editForm').action = '/companies/' + id;
            document.getElementById('companyName').value = name;
            document.getElementById('companyEmail').value = email;
            document.getElementById('companyAddress').value = address;
        }
        // ฟังก์ชันในการลบข้อมูล
        // ฟังก์ชันในการลบข้อมูล
        function deleteCompany(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/companies/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Deleted!',
                                'The company has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload(); // รีเฟรชหน้าเพื่อให้ข้อมูลแสดงผลใหม่
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                        );
                    });
                }
            });
        }

        // ฟังก์ชันยืนยันการบันทึกข้อมูล (Save Changes) พร้อม SweetAlert
        function confirmSaveChanges(event) {
            event.preventDefault(); // ป้องกันการ submit ฟอร์มโดยตรง

            Swal.fire({
                title: 'Are you sure you want to save changes?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save changes!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // ใช้ Fetch API ในการส่งข้อมูลไปยังเซิร์ฟเวอร์
                    const form = document.getElementById('editForm');
                    const formData = new FormData(form);

                    fetch(form.action, {
                        method: 'POST', // หรือ PUT ถ้าต้องการอัปเดต
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Saved!',
                                'The changes have been saved.',
                                'success'
                            ).then(() => {
                                location.reload();
                                $('#editModal').modal('hide'); // ปิด modal หลังจากบันทึกเสร็จ
                            });
                        } else {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        }
                    })
                    .catch(error => {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    });
                }
            });
        }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

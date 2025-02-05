<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/app.js') <!-- เรียกใช้ Vite JS สำหรับ Vue -->
</head>
<body>
    <div id="app">
        <Navbar /> 
    </div>
    <div class="container mt-5" style="margin-left: 270px;"> <!-- ให้ช่องว่างสำหรับ Navbar -->
        <div class="row">
            <div class="col-lg-12">
                <h2>Add Company</h2>
            </div>

            <!-- Success message -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <strong>Company Name</strong>
                            <input type="text" name="name" class="form-control" placeholder="Company Name" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <strong>Company Email</strong>
                            <input type="email" name="email" class="form-control" placeholder="Company Email" value="{{ old('email') }}">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <strong>Company Address</strong>
                            <input type="text" name="address" class="form-control" placeholder="Company Address" value="{{ old('address') }}">
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System - Student Module</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: bold;
            font-size: 1.3rem;
        }
        
        .card {
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border: none;
            margin-bottom: 30px;
        }
        
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 8px 8px 0 0 !important;
            padding: 20px;
        }
        
        .card-header h2 {
            margin: 0;
            font-size: 1.5rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #5568d3 0%, #67408a 100%);
        }
        
        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }
        
        .container {
            max-width: 1200px;
            margin-top: 40px;
        }
        
        .text-danger {
            color: #dc3545;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #6c757d;
            border-top: 1px solid #dee2e6;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">🎓 SMS - Student Module</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.index') }}">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2026 School Management System. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

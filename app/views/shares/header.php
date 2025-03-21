<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sinh Viên</title>
    <!-- Thêm liên kết tới Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Thay đổi màu nền và màu chữ của header */
        .custom-header {
            background-color: #343a40; /* Màu nền */
            color: #ffffff; /* Màu chữ */
        }
        .custom-header .nav-link {
            color: #ffffff; /* Màu chữ của các liên kết */
        }
        .custom-header .nav-link:hover {
            color: #ffc107; /* Màu chữ khi hover */
        }
    </style>
</head>
<body>
    <header class="custom-header py-3">
        <div class="container">
            <h1 class="text-center">Quản lý SINH VIÊN</h1>
            <nav>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?url=Sinhvien/index">Sinh viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?url=Hocphan/index">Học phần</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?url=Dangky/index">Đăng ký học phần</a>
                    </li>
                    <?php if (isset($_SESSION['loggedin'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?url=Dangnhap/logout">Đăng xuất</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?url=Dangnhap/login">Đăng nhập</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Thêm nội dung trang ở đây -->
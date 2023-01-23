<?php 
session_start();
include"functions.php";

if($_SESSION['legitUser'] != 'qwerty'){
    die(header("location: 404.html"));
}

?>

<?php

 ?>

<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Reklap</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- End layout styles -->
</head>

<style type="text/css">
#home {
    text-align: center;
    background-image: url("https://image.myanimelist.net/ui/qZ_8jcwPFtYxKx-4xT6ZrruSqz37nZYqAJuKv91B00EgtWa1Fzpw7uOcMvoZIF_VmrOIW8XkYQxBKl2LiQPUJwZw6dYl9M9xbZ2ftNMwZOM64OZhvbPY2gB4elov7hWZz5C44KqcjG8XUNwbN4B4fA");
    background-size: cover;
}

p {
    font-size: 20px;
}

input[type="reset"] {
    margin-bottom: 28px;
    width: 120px;
    height: 32px;
    background: #F44336;
    border: none;
    border-radius: 2px;
    color: #fff;
    font-family: sans-serif;
    text-transform: uppercase;
    transition: 0.2s ease;
    cursor: pointer;
}

input[type="submit"] {
    margin-bottom: 28px;
    width: 120px;
    height: 32px;
    background: #39f436;
    border: none;
    border-radius: 2px;
    color: #fff;
    font-family: sans-serif;
    text-transform: uppercase;
    transition: 0.2s ease;
    cursor: pointer;
}

font2 {
    font-size: 17px;
    padding-left: 50px;
}

body {
    background: orange;
}

h1 {
    text-shadow: 5px 2px blue;
}

a {
    color: inherit;
}

a:hover {
    color: inherit;
}
</style>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <h3>Reklap</h3>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <a href="logout.php"><button type="button" class="btn btn-primary btn-lg">
                                Logout
                            </button></a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
                            <span class="menu-title">Kriteria Laptop</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3 class="text-light card-title mb-0">
                                                Selamat Datang Admin !<br> Pengaturan Kriteria Laptop
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <form method='POST' action="process.php">
                                                <div class="form-row align-items-center">
                                                    <div class="col-auto my-1 input-group">
                                                        <select name='kriteria' class="custom-select mr-sm-1"
                                                            id="inlineFormCustomSelect" required>
                                                            <option value="">Choose...</option>
                                                            <?php
                                                                    $daftar_kriteria = mysqli_query($conn,"SELECT * from daftar_kriteria_static");
                                                                        
                                                                    while($data = mysqli_fetch_array($daftar_kriteria)):
                                                                        $status = "false";
                                                                        $daftar_kriteria_aktif = mysqli_query($conn,"SELECT * from daftar_kriteria");
                                                                        while($data_aktif = mysqli_fetch_array($daftar_kriteria_aktif)):
                                                                            if($data['kriteria'] == $data_aktif['kriteria']){
                                                                                $status = "true";
                                                                            }
                                                                        endwhile;
                                                                        if($status == "true"){
                                                            ?>
                                                            <option value="<?=$data['kriteria'];?>">
                                                                <?=$data['kriteria'];?> (Aktif)</option>
                                                            <?php       }else{
                                                            ?> <option value="<?=$data['kriteria'];?>">
                                                                <?=$data['kriteria'];?></option>
                                                            <?php		}
                                                                    endwhile;
                                                            ?>
                                                        </select>
                                                        <button type="submit" class="btn btn-success float ml-2"
                                                            name="submit">Aktifkan
                                                            Kriteria</button>
                                                        <button type="submit" class="btn btn-danger float ml-2"
                                                            name="submit-del">Hapus
                                                            Kriteria</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <table class='table table-bordered'>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kriteria</th>
                                                        <th>Nilai Bawah</th>
                                                        <th>Nilai Tengah</th>
                                                        <th>Nilai Atas</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                        $daftar_kriteria = mysqli_query($conn,"SELECT * from daftar_kriteria");
                                                        $num = 1;
                                                        while($data = mysqli_fetch_array($daftar_kriteria)):
                                                    ?>
                                                    <tr>
                                                        <th><?=$num;?></th>
                                                        <th><?=$data['kriteria'];?></th>
                                                        <th><?=$data['bawah'];?></th>
                                                        <th><?=$data['tengah'];?></th>
                                                        <th><?=$data['atas'];?></th>
                                                        <th><a
                                                                href="delete.php?id=<?php echo $data['id']; ?>&item=kriteria"><button
                                                                    class="btn btn-danger">Non-aktifkan</button></a>
                                                        </th>
                                                    </tr>
                                                    <?php $num++; endwhile;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row" id="proBanner">
                        <div class="col-12">
                            <div class='container mt-5'>
                                <div class="main-menu mt-5">
                                    <a href="data_lokasi_wisata.php"><button type="button"
                                            class="btn btn-info btn-lg btn-block mt-4 mb-4">Pengaturan
                                            Data Laptop</button></a>
                                    <a href="admin_page.php"><button type="button"
                                            class="btn btn-info btn-lg btn-block mt-4 mb-5">Pengaturan
                                            Kriteria Laptop</button></a>
                                </div>

                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="footer-inner-wraper">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright
                                ©
                                krisnawahyudi2017@gmail.com 2022</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                                kelompok 1</span>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

</body>

</html>
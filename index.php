<?php
session_start();
include "functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="krisna_wahyudi" />
    <title>REKLAP - Home</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet" />
    <style>
    .button1 {
        width: 100%;
        background-color: #0000FF;
        color: white;
        border: none;
        padding: 15px 32px;
        text-align: center;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    </style>
</head>

<body id="page-top">
    <div class='container mt-5'>
        <?php
        if (isset($_SESSION['legitUser'])) {
            echo '<a href="logout.php"><button type="button" class="btn btn-primary btn-lg btn-block mt-4 mb-4">Logout</button></a>';
            echo '<a href="admin.php"><button type="button" class="btn btn-info btn-lg btn-block mt-4 mb-4">Kembali ke Menu Admin</button></a>';
        } else {
            ?>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">REKLAP</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded"
                    type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="#deskripsi">Deskripsi</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="#rekomendasi">Rekomendasi</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="#hasil">Hasil</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="login_form.html">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <?php
        }
        ?>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" width="100" src="assets/img/laptop.png" alt="..." />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">REKOMENDASI LAPTOP</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Daerah Bengkulu </br> Menggunakan Algoritma Fuzzy
                Tahani</p>
        </div>
    </header>
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="deskripsi">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Deskripsi</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div class="col-lg-4 ms-auto">
                    <p class="lead">REKLAP merupakan singkatan dari Rekomendasi Laptop. Yang bertujuan untuk membantu
                        seseorang dalam memilih Laptop berdasarkan kriteria tertentu. Ada beberapa kriteria yang akan
                        digunakan yaitu seperti harga, ram dan lain-lain.</p>
                </div>
                <div class="col-lg-4 me-auto">
                    <p class="lead">"Sistem Pendukung Keputusan Berbasis Web ini merupakan aplikasi web yang dapat
                        membantu para pengguna dalam menentukan suatu keputusan dengan memberikan rekomendasi terbaik
                        berdasarkan kriteria yang diinginkan."
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="rekomendasi">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">Mulai </h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-line"></div>
            </div>
            <?php
            $krit_aktif = mysqli_query($conn, "SELECT * from daftar_kriteria");
            $baris = mysqli_num_rows($krit_aktif);
            if ($baris == 0) {
                echo "<p align='center'><b>Mohon maaf, tidak ada kriteria wisata yang aktif, silahkan hubungi admin.</b></p>";
            } else {
                echo "<h3 class='text-center text-uppercase text-white'>Silahkan Masukan Kriteria Laptop</h3>";
            ?>
            <!-- Input Rekomendasi-->
            <form method='GET' action="#hasil">
                <div class="form-row align-items-center">
                    <?php
                    $daftar_kriteria = mysqli_query($conn, "SELECT * from daftar_kriteria");
                    $num = 1;
                    while ($data = mysqli_fetch_array($daftar_kriteria)) :
                    ?>
                    <div class="col-auto my-1">
                        <label for="inlineFormCustomSelect"><?= $data['kriteria']; ?></label>
                        <select class="form-select mt-1" id="inputGroupSelect01"
                            name='<?= strtolower($data['kriteria']); ?>' required>
                            <option value="">--- Pilih Kriteria <?= $data['kriteria']; ?> ---</option>
                            <option value="<?= strtolower($data['bawah']); ?>"><?= $data['bawah']; ?></option>
                            <option value="<?= strtolower($data['tengah']); ?>"><?= $data['tengah']; ?></option>
                            <option value="<?= strtolower($data['atas']); ?>"><?= $data['atas']; ?></option>
                        </select>
                    </div>
                    <?php $num++;
                    endwhile; ?>
                </div>
                <button type="submit" name='submit' class="button1 mt-4 mb-4" value='and'>Lihat
                    Rekomendasi logika And</button>
                <button type="submit" name='submit' class="button1 mt-4 mb-4" value='or'>Lihat Rekomendasi Logika Or
                </button>
            </form>
        </div>
    </section>
    <section class="page-section" id="hasil">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Hasil Rekomendasi</h2>
            <?php
      }
			if(isset($_GET['submit'])){
			  $submit = $_GET['submit'];

        $daftar_kriteria = mysqli_query($conn,"SELECT * from daftar_kriteria");
				$list_kriteria = array();
				while($data = mysqli_fetch_array($daftar_kriteria)):
            array_push($list_kriteria, strtolower($data['kriteria']));
        endwhile;
        
        $inputUser = array();
        foreach ($list_kriteria as &$value) {
          array_push($inputUser, $_GET[$value]); 
        }

        echo "<br>Pilihan anda:";
        $it=0;
        $daftar_kriteria = mysqli_query($conn,"SELECT * from daftar_kriteria");
        while($data = mysqli_fetch_array($daftar_kriteria)):
          $str=" -> ";
          $str.=$data['kriteria'];
          $str.=": " ;
          echo $str; echo $inputUser[$it];
          $it++;
        endwhile;
        echo "<br>";
		?>

            <h4 class="mt-3 mb-1">Berikut adalah saran laptop berdasarkan kriteria yang anda inputkan:</h4>
            <h6 class="mt-1 mb-3">Keterangan : Harga(Rp.), Hardisk(GB), Processor(MHz), Ram(GB), Layar(Inch), Berat
                (Gram)
            </h6>
            <table class='table table-bordered'>
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Laptop</th>
                        <?php
						$daftar_kriteria = mysqli_query($conn,"SELECT * from daftar_kriteria");
						while($data = mysqli_fetch_array($daftar_kriteria)):
					?>
                        <th><?=$data['kriteria'];?></th>
                        <?php endwhile;?>
                        <th>Fire Strength</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
           $daftar_kriteria = mysqli_query($conn,"SELECT * from daftar_kriteria");
           $thekrit5 = array();
           $array_bobot = array();
           $it=0;
           while($data = mysqli_fetch_array($daftar_kriteria)):
             $krit = strtolower($data['kriteria']);
             array_push($thekrit5, $krit);
             $tname = "fuzzy_";
             $tname .= $krit;
             $sub1 = strtolower($data['bawah']); $sub2 = strtolower($data['tengah']); $sub3 = strtolower($data['atas']);
           
             if($inputUser[$it] == $sub1){
               $bobot = mysqli_query($conn,"SELECT {$sub1} from {$tname}");
               array_push($array_bobot, $bobot);
             }else if($inputUser[$it] == $sub2){
               $bobot = mysqli_query($conn,"SELECT {$sub2} from {$tname}");
               array_push($array_bobot, $bobot);
             }else if($inputUser[$it] == $sub3){
               $bobot = mysqli_query($conn,"SELECT {$sub3} from {$tname}");
               array_push($array_bobot, $bobot);
             }else{
               echo "<h1>Terjadi Masalah Pada Baris Program 153, test.php</h1>";
             }
             $it++;
           endwhile;
          

          $result = mysqli_query($conn,"SELECT * from laptop_tb");
          $rowcount=mysqli_num_rows($result);
          $result2 = mysqli_query($conn,"SELECT * from daftar_kriteria");
          $rowcount2=mysqli_num_rows($result2);
					
          function get_arrbot($list_arrbot, $rowcount){
            $temp_array = array();
            if($list_arrbot != "null"){
              $arbot = mysqli_fetch_all($list_arrbot);
              foreach ($arbot as &$value){
                array_push($temp_array, $value[0]);
              }
            }else{
              for ($x = 0; $x < $rowcount; $x++){
                array_push($temp_array, 1);
              }
            }
            return $temp_array;
          }
          
          $temp_array = array();

          $it=0;
          $arrofarrbot = array();
          $daftar_kriteria = mysqli_query($conn,"SELECT * from daftar_kriteria");
          while($data = mysqli_fetch_array($daftar_kriteria)):        
            $arbot = get_arrbot($array_bobot[$it], $rowcount);
            array_push($arrofarrbot, $arbot);
            $it++;
          endwhile;
					
					$fire_strength = array();
					$it2 = 0;
          for ($x = 0; $x < $rowcount; $x++){
            $it1 = 0;
            if($submit == 'and'){$value = 1;} else{$value = 0;}
            for ($y = 0; $y < $rowcount2; $y++){
              if($submit == 'and'){
                $value = $value * $arrofarrbot[$it1][$it2];
              }else{
                $value = $value + $arrofarrbot[$it1][$it2];
              }
              $it1++;
            }
						$it2++;
            array_push($fire_strength, $value);
          }
					
					
					if(array_sum($fire_strength) == 0){
						echo "<br><h1>TIDAK ADA REKOMENDASI</h1>";
					}else{
          
            
          $newliskrit = array(); $new_arrofarrbot = array();
          $it=0;
          foreach ($thekrit5 as &$valkrit){
            array_push($newliskrit, $valkrit);
            array_push($new_arrofarrbot,$arrofarrbot[$it]);
            $it++; 
          }
          if($it<5){
            $temp = array();
            for ($x = $it; $x < 5; $x++) {
              array_push($newliskrit, "kosong");
              for ($x = 0; $x < $rowcount; $x++){
                array_push($temp, "kosong");
              }
              array_push($new_arrofarrbot, $temp);
            }
          }

          if($rowcount2 == 1){
            //create rekomendasi_tb untuk menampung yg direkomendasikan
          $result = mysqli_query($conn, "CREATE TABLE rekomendasi_tb(
            id INT NOT NULL AUTO_INCREMENT,
            merek VARCHAR(30) NOT NULL,
            {$newliskrit[0]} varchar(20) NOT NULL,
            fire_strength float(20) NOT NULL,
            PRIMARY KEY ( id )
         )");
          //create penghitungan_bobot_tb untuk menampung bobot2 rekomendasi
          $result = mysqli_query($conn, "CREATE TABLE penghitungan_bobot_tb(
            id INT NOT NULL AUTO_INCREMENT,
            merek VARCHAR(30) NOT NULL,
            {$newliskrit[0]} float(20) NOT NULL,
            fire_strength float(20) NOT NULL,
            PRIMARY KEY ( id )
          )");
          }elseif($rowcount2 == 2){
                        //create rekomendasi_tb untuk menampung yg direkomendasikan
          $result = mysqli_query($conn, "CREATE TABLE rekomendasi_tb(
            id INT NOT NULL AUTO_INCREMENT,
            merek VARCHAR(30) NOT NULL,
            {$newliskrit[0]} varchar(20) NOT NULL,
            {$newliskrit[1]} varchar(20) NOT NULL,
            fire_strength float(20) NOT NULL,
            PRIMARY KEY ( id )
         )");
          //create penghitungan_bobot_tb untuk menampung bobot2 rekomendasi
          $result = mysqli_query($conn, "CREATE TABLE penghitungan_bobot_tb(
            id INT NOT NULL AUTO_INCREMENT,
            merek VARCHAR(30) NOT NULL,
            {$newliskrit[0]} float(20) NOT NULL,
            {$newliskrit[1]} float(20) NOT NULL,
            fire_strength float(20) NOT NULL,
            PRIMARY KEY ( id )
          )");
          }elseif($rowcount2 == 3){
            //create rekomendasi_tb untuk menampung yg direkomendasikan
            $result = mysqli_query($conn, "CREATE TABLE rekomendasi_tb(
            id INT NOT NULL AUTO_INCREMENT,
            merek VARCHAR(30) NOT NULL,
            {$newliskrit[0]} varchar(20) NOT NULL,
            {$newliskrit[1]} varchar(20) NOT NULL,
            {$newliskrit[2]} varchar(20) NOT NULL,
            fire_strength float(20) NOT NULL,
            PRIMARY KEY ( id )
            )");

            //create penghitungan_bobot_tb untuk menampung bobot2 rekomendasi
            $result = mysqli_query($conn, "CREATE TABLE penghitungan_bobot_tb(
            id INT NOT NULL AUTO_INCREMENT,
            merek VARCHAR(30) NOT NULL,
            {$newliskrit[0]} float(20) NOT NULL,
            {$newliskrit[1]} float(20) NOT NULL,
            {$newliskrit[2]} float(20) NOT NULL,
            fire_strength float(20) NOT NULL,
            PRIMARY KEY ( id )
            )");

          }elseif($rowcount2 == 4){
            //create rekomendasi_tb untuk menampung yg direkomendasikan
            $result = mysqli_query($conn, "CREATE TABLE rekomendasi_tb(
            id INT NOT NULL AUTO_INCREMENT,
            merek VARCHAR(30) NOT NULL,
            {$newliskrit[0]} varchar(20) NOT NULL,
            {$newliskrit[1]} varchar(20) NOT NULL,
            {$newliskrit[2]} varchar(20) NOT NULL,
            {$newliskrit[3]} varchar(20) NOT NULL,
            fire_strength float(20) NOT NULL,
            PRIMARY KEY ( id )
            )");
            //create penghitungan_bobot_tb untuk menampung bobot2 rekomendasi
            $result = mysqli_query($conn, "CREATE TABLE penghitungan_bobot_tb(
            id INT NOT NULL AUTO_INCREMENT,
            merek VARCHAR(30) NOT NULL,
            {$newliskrit[0]} float(20) NOT NULL,
            {$newliskrit[1]} float(20) NOT NULL,
            {$newliskrit[2]} float(20) NOT NULL,
            {$newliskrit[3]} float(20) NOT NULL,
            fire_strength float(20) NOT NULL,
            PRIMARY KEY ( id )
            )");
          }
          elseif($rowcount2 == 5){
            //create rekomendasi_tb untuk menampung yg direkomendasikan
            $result = mysqli_query($conn, "CREATE TABLE rekomendasi_tb(
            id INT NOT NULL AUTO_INCREMENT,
            merek VARCHAR(30) NOT NULL,
            {$newliskrit[0]} varchar(20) NOT NULL,
            {$newliskrit[1]} varchar(20) NOT NULL,
            {$newliskrit[2]} varchar(20) NOT NULL,
            {$newliskrit[3]} varchar(20) NOT NULL,
            {$newliskrit[4]} varchar(20) NOT NULL,
            fire_strength float(20) NOT NULL,
            PRIMARY KEY ( id )
            )");
            //create penghitungan_bobot_tb untuk menampung bobot2 rekomendasi
            $result = mysqli_query($conn, "CREATE TABLE penghitungan_bobot_tb(
            id INT NOT NULL AUTO_INCREMENT,
            merek VARCHAR(30) NOT NULL,
            {$newliskrit[0]} float(20) NOT NULL,
            {$newliskrit[1]} float(20) NOT NULL,
            {$newliskrit[2]} float(20) NOT NULL,
            {$newliskrit[3]} float(20) NOT NULL,
            {$newliskrit[4]} float(20) NOT NULL,
            fire_strength float(20) NOT NULL,
            PRIMARY KEY ( id )
            )");
          }elseif($rowcount2 == 6){
            //create rekomendasi_tb untuk menampung yg direkomendasikan
            $result = mysqli_query($conn, "CREATE TABLE rekomendasi_tb(
            id INT NOT NULL AUTO_INCREMENT,
            merek VARCHAR(30) NOT NULL,
            {$newliskrit[0]} varchar(20) NOT NULL,
            {$newliskrit[1]} varchar(20) NOT NULL,
            {$newliskrit[2]} varchar(20) NOT NULL,
            {$newliskrit[3]} varchar(20) NOT NULL,
            {$newliskrit[4]} varchar(20) NOT NULL,
            {$newliskrit[5]} varchar(20) NOT NULL,
            fire_strength float(20) NOT NULL,
            PRIMARY KEY ( id )
            )");
            //create penghitungan_bobot_tb untuk menampung bobot2 rekomendasi
            $result = mysqli_query($conn, "CREATE TABLE penghitungan_bobot_tb(
            id INT NOT NULL AUTO_INCREMENT,
            merek VARCHAR(30) NOT NULL,
            {$newliskrit[0]} float(20) NOT NULL,
            {$newliskrit[1]} float(20) NOT NULL,
            {$newliskrit[2]} float(20) NOT NULL,
            {$newliskrit[3]} float(20) NOT NULL,
            {$newliskrit[4]} float(20) NOT NULL,
            {$newliskrit[5]} float(20) NOT NULL,
            fire_strength float(20) NOT NULL,
            PRIMARY KEY ( id )
            )");
          }
          else{
            echo "<h1>Terdapat masalah pada data kriteria</h1>";
          }

					$temp = array();
					$idx = 1;
          $arrofid = array();
          $daftar_id = mysqli_query($conn,"SELECT * from laptop_tb");
           while($data = mysqli_fetch_array($daftar_id)):
              array_push($arrofid, $data['id']);
           endwhile;

					foreach ($fire_strength as &$value) {
						if($value > 0){
              $inwis = $idx -1;
							$index_wisata = $idx;
							$get_wisata_query = mysqli_query($conn,"SELECT * from laptop_tb WHERE (id = '$arrofid[$inwis]')");
							while($data = mysqli_fetch_array($get_wisata_query)):

                if($rowcount2==1){
                  $ob_wis = $data['merek'];
                  $krit1 = $data[$newliskrit[0]];
                  $it = $idx-1;
								  $fs  = $fire_strength[$it];
                  $bk1 = $new_arrofarrbot[0][$it];

                  mysqli_query($conn, "INSERT INTO rekomendasi_tb(merek, {$newliskrit[0]}, fire_strength) 
													VALUES('$ob_wis', '$krit1', '$fs')");
								  mysqli_query($conn, "INSERT INTO penghitungan_bobot_tb(merek, {$newliskrit[0]}, fire_strength) 
													VALUES('$ob_wis', '$bk1', '$fs')");
                }elseif($rowcount2==2){
                  $ob_wis = $data['merek'];
                  $krit1 = $data[$newliskrit[0]];
                  $krit2 = $data[$newliskrit[1]];
                  $it = $idx-1;
								  $fs  = $fire_strength[$it];
                  $bk1 = $new_arrofarrbot[0][$it];
                  $bk2 = $new_arrofarrbot[1][$it];

                  mysqli_query($conn, "INSERT INTO rekomendasi_tb(merek, {$newliskrit[0]}, {$newliskrit[1]}, fire_strength) 
                  VALUES('$ob_wis', '$krit1', '$krit2', '$fs')");
                  mysqli_query($conn, "INSERT INTO penghitungan_bobot_tb(merek, {$newliskrit[0]}, {$newliskrit[1]}, fire_strength) 
                  VALUES('$ob_wis', '$bk1', '$bk2','$fs')");
                }elseif($rowcount2==3){
                  $ob_wis = $data['merek'];
                  $krit1 = $data[$newliskrit[0]];
                  $krit2 = $data[$newliskrit[1]];
                  $krit3 = $data[$newliskrit[2]];
                  $it = $idx-1;
								  $fs  = $fire_strength[$it];
                  $bk1 = $new_arrofarrbot[0][$it];
                  $bk2 = $new_arrofarrbot[1][$it];
                  $bk3 = $new_arrofarrbot[2][$it];
                  
                  $result1 = mysqli_query($conn, "INSERT INTO rekomendasi_tb(merek, {$newliskrit[0]}, {$newliskrit[1]}, {$newliskrit[2]}, fire_strength) 
                  VALUES('$ob_wis', '$krit1', '$krit2','$krit3', '$fs')");
                  $result2 = mysqli_query($conn, "INSERT INTO penghitungan_bobot_tb(merek, {$newliskrit[0]}, {$newliskrit[1]}, {$newliskrit[2]}, fire_strength) 
                  VALUES('$ob_wis', '$bk1', '$bk2','$bk3','$fs')");

                  

                }elseif($rowcount2==4){
                  $ob_wis = $data['merek'];
                  $krit1 = $data[$newliskrit[0]];
                  $krit2 = $data[$newliskrit[1]];
                  $krit3 = $data[$newliskrit[2]];
                  $krit4 = $data[$newliskrit[3]];
                  $it = $idx-1;
								  $fs  = $fire_strength[$it];
                  $bk1 = $new_arrofarrbot[0][$it];
                  $bk2 = $new_arrofarrbot[1][$it];
                  $bk3 = $new_arrofarrbot[2][$it];
                  $bk4 = $new_arrofarrbot[3][$it];

                  mysqli_query($conn, "INSERT INTO rekomendasi_tb(merek, {$newliskrit[0]}, {$newliskrit[1]},{$newliskrit[2]}, {$newliskrit[3]}, fire_strength) 
                  VALUES('$ob_wis', '$krit1', '$krit2', '$krit3', '$krit4', '$fs')");
                  mysqli_query($conn, "INSERT INTO penghitungan_bobot_tb(merek, {$newliskrit[0]}, {$newliskrit[1]},{$newliskrit[2]}, {$newliskrit[3]}, fire_strength) 
                  VALUES('$ob_wis', '$bk1', '$bk2','$bk3','$bk4','$fs')");
                }elseif($rowcount2==5){
                  $ob_wis = $data['merek'];
                  $krit1 = $data[$newliskrit[0]];
                  $krit2 = $data[$newliskrit[1]];
                  $krit3 = $data[$newliskrit[2]];
                  $krit4 = $data[$newliskrit[3]];
                  $krit5 = $data[$newliskrit[4]];
                  $it = $idx-1;
								  $fs  = $fire_strength[$it];
                  $bk1 = $new_arrofarrbot[0][$it];
                  $bk2 = $new_arrofarrbot[1][$it];
                  $bk3 = $new_arrofarrbot[2][$it];
                  $bk4 = $new_arrofarrbot[3][$it];
                  $bk5 = $new_arrofarrbot[4][$it];

                  mysqli_query($conn, "INSERT INTO rekomendasi_tb(merek, {$newliskrit[0]}, {$newliskrit[1]},{$newliskrit[2]}, {$newliskrit[3]},{$newliskrit[4]}, fire_strength) 
                  VALUES('$ob_wis', '$krit1', '$krit2', '$krit3', '$krit4','$krit5', '$fs')");
                  mysqli_query($conn, "INSERT INTO penghitungan_bobot_tb(merek, {$newliskrit[0]}, {$newliskrit[1]},{$newliskrit[2]}, {$newliskrit[3]},{$newliskrit[4]}, fire_strength) 
                  VALUES('$ob_wis', '$bk1', '$bk2','$bk3','$bk4','$bk5','$fs')");
                }elseif($rowcount2==6){
                  $ob_wis = $data['merek'];
                  $krit1 = $data[$newliskrit[0]];
                  $krit2 = $data[$newliskrit[1]];
                  $krit3 = $data[$newliskrit[2]];
                  $krit4 = $data[$newliskrit[3]];
                  $krit5 = $data[$newliskrit[4]];
                  $krit6 = $data[$newliskrit[5]];
                  $it = $idx-1;
								  $fs  = $fire_strength[$it];
                  $bk1 = $new_arrofarrbot[0][$it];
                  $bk2 = $new_arrofarrbot[1][$it];
                  $bk3 = $new_arrofarrbot[2][$it];
                  $bk4 = $new_arrofarrbot[3][$it];
                  $bk5 = $new_arrofarrbot[4][$it];
                  $bk6 = $new_arrofarrbot[5][$it];

                  mysqli_query($conn, "INSERT INTO rekomendasi_tb(merek, {$newliskrit[0]}, {$newliskrit[1]},{$newliskrit[2]}, {$newliskrit[3]},{$newliskrit[4]}, {$newliskrit[5]}, fire_strength) 
                  VALUES('$ob_wis', '$krit1', '$krit2', '$krit3', '$krit4','$krit5','$krit6', '$fs')");
                  mysqli_query($conn, "INSERT INTO penghitungan_bobot_tb(merek, {$newliskrit[0]}, {$newliskrit[1]},{$newliskrit[2]}, {$newliskrit[3]},{$newliskrit[4]}, {$newliskrit[5]}, fire_strength) 
                  VALUES('$ob_wis', '$bk1', '$bk2','$bk3','$bk4','$bk5','$bk6','$fs')");
                }
                else{
                  echo "<h1>Terdapat masalah pada data kriteria</h1>";
                }
	
							endwhile;
						} $idx++;
					}
					$get_rekomendasi_query = mysqli_query($conn,"SELECT * from rekomendasi_tb ORDER BY fire_strength DESC");
					$num = 1;
					while($data = mysqli_fetch_array($get_rekomendasi_query)):
					?>
                    <tr>
                        <th><?=$num;?></th>
                        <th><?=$data['merek'];?></th>
                        <?php
							$daftar_kriteria = mysqli_query($conn,"SELECT * from daftar_kriteria");
								while($dakrit = mysqli_fetch_array($daftar_kriteria)):
							?>
                        <th><?=$data[strtolower($dakrit['kriteria'])];?></th>
                        <?php endwhile;?>
                        <th><?=$data['fire_strength'];?></th>
                    </tr>

                    <?php $num++; endwhile; 
          $del = mysqli_query($conn,"DROP TABLE rekomendasi_tb");
        }
				?>

                </tbody>
            </table>

            <div class="mt-5 mb-5">
                <p><b>Keterangan : </b>
                    </br> Nilai Fire Strength yang paling tinggi merupakan laptop yang direkomendasikan.
                    </br>
                </p>
                <div class="collapse" id="collapseExample">
                    <table class='table table-bordered mt-4'>
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Merek Laptop</th>
                                <?php
                              $daftar_kriteria = mysqli_query($conn,"SELECT * from daftar_kriteria");
                            while($data = mysqli_fetch_array($daftar_kriteria)):
                          ?>
                                <th>Bobot <?=$data['kriteria'];?></th>
                                <?php endwhile;?>
                                <th>Fire Strength</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $get_fuzzy_query = mysqli_query($conn,"SELECT * from penghitungan_bobot_tb ORDER BY fire_strength DESC");
                            $num = 1;
                            if($get_fuzzy_query){
                              while($data = mysqli_fetch_array($get_fuzzy_query)):
                          ?>

                            <tr>
                                <th><?=$num;?></th>
                                <th><?=$data['merek'];?></th>

                                <?php
                            $daftar_kriteria = mysqli_query($conn,"SELECT * from daftar_kriteria");
                            while($dakrit = mysqli_fetch_array($daftar_kriteria)):
                              //$str="bobot_";
                              //$str.=strtolower($dakrit['kriteria']);
                              $str=strtolower($dakrit['kriteria']);
                            ?>

                                <th><?=$data[$str];?></th>
                                <?php endwhile;?>

                                <th><?=$data['fire_strength'];?></th>
                            </tr>

                            <?php $num++; endwhile; 
                            $del = mysqli_query($conn,"DROP TABLE penghitungan_bobot_tb");
                            if($del) {mysqli_close($conn);}
                          }
                            ?>


                            <?php } ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; Laprak 2022</small></div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
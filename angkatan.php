<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
  $id = "id_kelas";
  $getId = $_GET['id'];
  $q = mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas = $getId");
  $res = mysqli_fetch_array($q);

?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
  
  </head>
<body>

	<?php

  include ('tampilan/header.php');
  include ('tampilan/sidebar.php');
  include ('tampilan/footer.php');
?>
  <!-- Main Content -->
      <div class="main-content" style="background-color: #0996e8;">
        <section class="section">
          <div class="section-header">
            <h1>DATA SISWA KELAS <?= $res['nama_kelas'];?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
              <div class="breadcrumb-item text-dark">Data Siswa</div>
            </div>
          </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-dark">LIST SISWA </h4>
                    <div class="card-header-form">
                      <form>
                          <div class="input-group-btn">
                            <a href="tambah_siswa.php?id=<?php echo $res['id_kelas']?>" class="btn" style="background-color: #0996e8;"><i class="fas fa-plus"></i></a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0 ">
                  <div class="col-md-12">
                    <div class="table-responsive ">
                      
                      
                       <?php
                       if($id = $getId) { ?>
                        <table class="table table-striped ">

                        <thead>
                        <tr>
                        <th>NO</th>
                        <th>ANGKATAN</th>
                            <th>ACTION</th>   
                        </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                            $query = "SELECT DISTINCT id_kelas,s.id_spp,tahun FROM siswa as s INNER JOIN spp ON s.id_spp = spp.id_spp  WHERE id_kelas = $id ORDER BY tahun ASC";
                        $result = mysqli_query($koneksi, $query);

                            //buat perulangan untuk element tabel dari data mahasiswa
                            $no = 1;
                            while($row = mysqli_fetch_array   ($result))
                            {
                            ?>
                        <tr>  
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['tahun']; ?></td>
                        <td>
                        <a href="detail_kelas.php?id=<?php echo $getId; ?>&tahun=<?php echo $row['tahun']?>" class="btn" style="background-color: #0996e8;"><i class="fas fa-edit"></i></a>
                        </td>
                        </tr>
                        <?php
                            }
                        ?>
                        </tbody>

                        </table>
                    <?php }else{
                        echo "blok";
                    }?>
                      
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        </section>
      </div>
</body>
</html>
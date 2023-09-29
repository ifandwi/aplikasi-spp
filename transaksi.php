<?php
    include('koneksi.php'); 
    $nisn = $_GET['nisn'];
    $kekurangan = $_GET['kekurangan'];
    $sql = "SELECT * FROM petugas,siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND nisn='$nisn'";
    $query = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_array($query);
//agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>
<head>
    <title>TRANSAKSI</title>

</head>
<body>

    <?php

    include ('tampilan/header.php');
    include ('tampilan/footer.php');
    include ('tampilan/sidebar.php');
?>

    <!-- main content -->
    <div class="main-content" style="background-color: #0996e8;">
        <section class="section">
          <div class="section-header">
            <h1>TRANSAKSI</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item text-dark">Transaksi</div>
            </div>
        </div>
         <div class="row">
              <div class="col-md-12">
                <div class="card" style="padding: 10px 40px;">
                  <div class="card-header">
             <h3 class="mb-4">TRANSAKSI PEMBAYARAN</h3> 
                    <div class="card-header-form">
              <form action="proses_transaksi.php?nisn=<?= $nisn;?>" method="post">
              <input name="id_spp" value="<?= $data['id_spp'];?>" type="hidden" class="form-control mb-4" required="required">
            </div>
          </div>
            <div class="input-group mb-3">
             <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1" style="width: 120px;text-align: center;">id Petugas</span>
               </div>
                <input disabled readonly value="<?= $_SESSION['username'];?>" class="form-control mb-2" placeholder="id petugas" aria-label="masukkan id petugas" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-1">
                   <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1" style="width: 120px;text-align: center;">NISN</span>
                   </div>
                   <div class="form-group">
                   <input readonly name="nisn" value="<?= $data['nisn'];?>" type="text" class="form-control" required="required" placeholder="Ketikkan kompetensi keahlian...">
                   </div>
                </div>
                <div class="input-group">
                   <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1" style="width: 120px;text-align: center;">Nama Siswa</span>
                   </div>
                   <div class="form-group">
                   <input disabled value="<?= $data['nama'];?>" type="text" class="form-control" required="required" placeholder="Ketikkan kompetensi keahlian...">
                   </div>
                </div>

               <div class="input-group mb-3">
             <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1" style="width: 120px;text-align: center;">Tanggal Bayar</span>
               </div>
                <input type="date" name="tgl_bayar" class="form-control" placeholder="tgl_bayar" aria-label="tanggal" aria-describedby="basic-addon1" required="required">
                </div> 

              <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01" style="width: 120px;text-align: center;">Bulan Bayar</label>
              </div>
              <select class="custom-select" name= "bulan_dibayar" id="inputGroupSelect01" required="required">
                <option selected>--Pilih Bulan--</option>
                <option value="januari">Januari</option>
                <option value="februari">Februari</option>
                <option value="maret">Maret</option>
                <option value="januari">April</option>
                <option value="februari">Mei</option>
                <option value="maret">Juni</option>
                <option value="januari">Juli</option>
                <option value="februari">Agustus</option>
                <option value="maret">September</option>
                <option value="januari">oktober</option>
                <option value="februari">november</option>
                <option value="maret">desember</option>
              </select>
            </div>  

              <div class="form-group mb-3" >
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01" style="width: 130px;text-align: center;">Tahun Bayar</label>
                  <select name="tahun_dibayar" class="form-control" required>
                  <option value="">-- Pilih Tahun Bayar --</option>
                  <?php 
                  for($i=2010;$i<=date('Y');$i++) {
                    echo "<option value='$i'>$i</option>";
                  }
                  ?>
                </select>
                </div>
              </div>

                <div class="input-group mb-3">
             <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Jumlah Bayar</span>
               </div>
                <input type="number" name="jumlah_bayar" class="form-control" max="<?= $kekurangan;?>" placeholder="jumlah bayar" aria-label="masukkan nominal" aria-describedby="basic-addon1" required="required">
                </div>
                <label for=""><span class="text-danger">*</span> (Jumlah yang harus dibayar adalah <b><?= "Rp." . number_format($kekurangan,2,',','.')?></b>)</label>

            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-success" style="margin-right: 10px;">Bayar</button>
              <button type="reset" class="btn btn-primary" style="margin-right: 10px;">Reset</button>


            </form>
            </div>


             




            <br/>   




                  
  </body>
</html>

<!--  -->
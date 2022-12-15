<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>5</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-bell"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>4<sup style="font-size: 20px"></sup></h3>

                <p>Paket</p>
              </div>
              <div class="icon">
                <i class="fas fa-envelope"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

         <!-- row table-->
  <div class="row">
    <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2 mb-auto">
      <div class="page-header">
        <span class="fas fa-users text-warning mt-2 "> Data Customer</span>
        <a class="text-info" href="<?php echo base_url('customer'); ?>"><i class="fab fa-searchengin mt-2 float-right"> Perlihatkan</i></a>
      </div>
      <table class="table mt-3">
        <thead>
          <tr>
          <th>ID</th>
          <th>NAMA</th>
          <th>PAKET</th>
          <th>DEWASA</th>
          <th>ANAK-ANAK</th>
          <th>KEBERANGKATAN</th>
          <th>KEPULANGAN</th>
          <th>KENDARAAN</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no= 1;
          foreach ($customer as $cust)  { ?>
            <tr>
            <td><?= $no++ ?></td>
            <td><?= $cust->nama_customer ?></td>
            <td><?= $cust->nama_paket ?></td>
            <td><?= $cust->adult ?></td>
            <td><?= $cust->kids ?></td>
            <td><?= $cust->berangkat ?></td>
            <td><?= $cust->kembali ?></td>
            <td><?= $cust->nama_kendaraan ?></td>
            <td>
            </tr>
          <?php } ?>
        </tbody>
       
      </table>
    </div>

    
    <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
      <div class="page-header">
        <span class="fas fa-bell text-primary mt-2"> Orders</span>
        <a href="<?= base_url('orders'); ?>"><i class="fab fa-searchengin text-success mt-2 float-right"> Perlihatkan</i></a>
      </div>
      <div class="table-responsive">
        <table class="table mt-3" id="table-datatable">
          <thead>
            <tr>
             <th>No Invoice</th>
             <th >Tgl Invoice</th>
             <th >Atas Nama</th>
             <th >Dewasa</th>
             <th >Anak-Anak</th>
             <th >Keberangkatan</th>
             <th >Kepulangan</th>
             <th >Total Bayar</th>
             <th >STATUS</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 0;
            foreach ($orders as $o) { ?>
              <tr>
              
                <td><?= $o['id_order']; ?></td>
                <td><?= $o['tanggal']; ?></td>
                <td><?= $o['nama']; ?></td>
                <td><?= $o['adult']; ?></td>
                <td><?= $o['kids']; ?></td>
                <td><?= $o['berangkat']; ?></td>
                <td><?= $o['kembali']; ?></td>
                <td><?= $o['total']; ?></td>
                
                <td><?= $o['status']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>


  </div>
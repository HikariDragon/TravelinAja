<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="<?= base_url('assets/template') ?>/plugins/dropzone/min/dropzone.min.css">
<script src="<?= base_url('assets/template') ?>/plugins/dropzone/min/dropzone.min.js"></script>
  
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
</head>
<body>
<div class="container">
        <h1> drag drop</h1>
    <div class="upload-div">
        <form action="<?php base_url('galeri/dragDropUpload'); ?>" class="dropzone"></form>
    </div>
    <div class="gallery">
        <h3> upload:</h3>
        <?php
        if(!empty($tbl_galeri)){    
           foreach($tbl_galeri as $row) {
            $filePath = 'uploads/' .$row["nama_galeri"];
            $fileMime = mime_content_type($filePath);
            ?>
            <embed src="<?php base_url('uploads/'.$row["nama_galeri"]); ?>" type="<?php $fileMime; ?>" width="350px"    height="240px" />
           <?php
           }
        }else{
            echo '<p>No file(s) found...</p>';
       
        }
        ?>
    </div>
</div>
</body>
</html>
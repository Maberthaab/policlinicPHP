<?php  ?>
<html>
    <head>
        <title>Cetak</title>
        <style>
            .content img{width: 70px; height: 70px; float: left; margin-left: 20px; margin-top: 5px;}
            .content p{text-align: center; margin-left: 20px;}
            td img{width: 50px; height: 50px;}
            .content h3{text-align: left; margin-left: 5px;}
            .content h2{text-align: left; margin-left: 5px;}
            .content table{}
        </style>
    </head>
    <body>

    <?php
        include "koneksi.php"; 
        $id_pasien=$_GET["id_pasien"];
            $query = "SELECT * FROM tb_pasien WHERE id_pasien='$id_pasien' ";
            $sql= mysqli_query($conn, $query); //run query

            if(mysqli_num_rows($sql) >0){ //hitung jumlah baris
                while($data=mysqli_fetch_assoc($sql)){ //pecah data dan di ulang pecah berdasarkan pecahan data 

    ?>
    <div class="content">

    <table border="0" width="1000" height="509">
        <tr>
            <td>
                <a href="index_daftar.php"><img src="gambar/logo.jpg"></a>
                <p><span style="font-size: 25px;">POLIKLINIK CEPAT SEHAT</span><br>
                    <span style="font-size: 20px;">JL Seoul Korea</span><br>
                    <span style="font-size: 15px;">E-mail:Poliklinik_Cepat_Sehat@gmail.com Tlp/Fax : +6286875</span></p><hr>
            </td>
        </tr>
    
    <td width="990" height="300">
    <h2>Id Pasien : <?php echo $data['id_pasien']; ?></h2><br>
    <h2>Nama Pasien : <?php echo $data['nm_pasien']; ?></h2><br>
    <h2>Jenis Kelamin : <?php echo $data['jenis_kelamin']; ?></h2><br>
    <h2>Alamat : <?php echo $data['alamat']; ?></h2><br>
    </td>
    </tr>
    </table>
    
    <?php 
            
        }
    }  
    ?>


<script>
    window.print();
</script>    
    </body>
    </html>

</html>


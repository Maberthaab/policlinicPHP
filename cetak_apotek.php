<html>
    <head>
        <title>Cetak</title>
         <style>
            .content img{width: 70px; height: 70px; float: left; margin-left: 20px;}
            .content p{text-align: center; margin-left: 20px;}
            .content h2{text-align: left; margin-left: 5px;}
            .content h4{text-align: left; margin-left: 5px;}
        </style>
    </head>
    <body>

    <?php
        include "koneksi.php"; 
        $id_resep=$_GET["id_resep"];
            $query = "SELECT * FROM tb_resep WHERE id_resep='$id_resep' ";
            $sql= mysqli_query($conn, $query); //run query

            if(mysqli_num_rows($sql) >0){ //hitung jumlah baris
                while($data=mysqli_fetch_assoc($sql)){ //pecah data dan di ulang pecah berdasarkan pecahan data 
    ?>
    <div class="content">

    <table border="0" width="1000" height="509">
        <tr>
            <td>
                <a href="index_apotek.php"><img src="gambar/logo.jpg"></a>
                <p><span style="font-size: 25px;">POLIKLINIK CEPAT SEHAT</span><br>
                    <span style="font-size: 20px;">JL Seoul Korea</span><br>
                    <span style="font-size: 15px;">E-mail:Poliklinik_Cepat_Sehat@gmail.com Tlp/Fax : +6286875</span></p><hr>
            </td>
        </tr>
    <tr>
    <td width="990" height="503">
    <h2>Id Resep : <?php echo $data['id_resep']; ?></h2>
    <br>
    <h2>Nama Pasien : <?php echo $data['nm_pasien']; ?></h2>
    <br>
    <h2>Poli : <?php echo $data['nm_poli']; ?></h2>
    <br>
    <h2>Nama Dokter : <?php echo $data['nm_dokter']; ?></h2>
    <br>
    <h2>Obat : <?php echo $data['nm_obat']; ?></h2>
    <br>
    <h2>Total : Rp.<?php echo $data['total']; ?></h2>
    <br>
    </td>
    </tr>
    </table>
    <p>Nb : Berikan struk ini kepada petugas Kasir</p>
    
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


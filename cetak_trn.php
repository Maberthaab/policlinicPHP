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
        $id_transaksi=$_GET["id_transaksi"];
            $query = "SELECT * FROM tb_transaksi WHERE id_transaksi='$id_transaksi' ";
            $sql= mysqli_query($conn, $query); //run query

            if(mysqli_num_rows($sql) >0){ //hitung jumlah baris
                while($data=mysqli_fetch_assoc($sql)){ //pecah data dan di ulang pecah berdasarkan pecahan data 
    ?>
    <div class="content">

    <table border="0" width="1000" height="509">
        <tr>
            <td>
                <a href="index_kasir.php"><img src="gambar/logo.jpg"></a>
                <p><span style="font-size: 25px;">POLIKLINIK CEPAT SEHAT</span><br>
                    <span style="font-size: 20px;">JL Seoul Korea</span><br>
                    <span style="font-size: 15px;">E-mail:Poliklinik_Cepat_Sehat@gmail.com Tlp/Fax : +6286875</span></p><hr>
            </td>
        </tr>
    <tr>
    <td width="990" height="503">
    <h2>Id Transaksi : <?php echo $data['id_transaksi']; ?></h2>
    <br>
    <h2>Nama Pasien : <?php echo $data['nm_pasien']; ?></h2>
    <br>
    <h2>Poli : <?php echo $data['nm_poli']; ?></h2>
    <br>
    <h2>Tagihan : Rp.<?php echo $data['total_bayar']; ?></h2>
    <br>
    <h2>Cash : Rp.<?php echo $data['jumlah_bayar']; ?></h2>
    <br>
    <h2>Kembalian : Rp.<?php echo $data['kembalian']; ?></h2>
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


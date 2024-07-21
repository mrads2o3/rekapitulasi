<html>
<body>
<style type="text/css">
    body{
        font-family: sans-serif;
    }
</style>
<?php
include 'koneksi.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if($_POST['kategori'] == 'semua'){
        $query = mysqli_query($conn, "SELECT * FROM log WHERE waktu like '%-$_POST[bulan]-%' order by pertemuan DESC");
    }else{
        $query = mysqli_query($conn, "SELECT * FROM log WHERE id_kategori = '$_POST[kategori]' and waktu like '%-$_POST[bulan]-%' order by pertemuan DESC");
    }
    $year = date('Y');
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Rekap-Absen-".$_POST['bulan']."-".$year.".xls");

    $not = mysqli_num_rows($query);
    if($not > 0){
        while($mp1 = mysqli_fetch_array($query)){
            $mpp = $mp1['pertemuan'];
            $mpp2 = $mpp;
            break;
        }
        $cs = 4 + $mpp; 
        $cl = $cs - 1; 
        #echo $jnama;
        ?>

        <table border="1" cellpadding="4">
            <tr>
                <td colspan='<?php echo $cs;?>' style="text-align:center;">
                <h3>
                REKAP ASISTEN DAN PROGRAMMER<br>
                LABORATORIUM AKUNTANSI MENENGAH<br>
                <?php 
                if($_POST['kategori'] !='semua'){
                    $querty = mysqli_query($conn, "SELECT * FROM kategori where id_kategori='$_POST[kategori]'");
                    $nm = mysqli_fetch_array($querty);
                    echo $nm['kategori'].'<br>';
                }
                echo $_POST['bulan'].'-'.$year; 
                ?></h3>
                </td>
            </tr>

            <tr>
                <td bgcolor="#42c8f5" style="text-align:center;">
                NO
                </td>
                <td bgcolor="#42c8f5" style="text-align:center;">
                NO. REKENING
                </td>
                <td bgcolor="#42c8f5" style="text-align:center;">
                NAMA ASISTEN
                </td>
            <?php
            $noo = 0;
            while($mpp > 0){
            $noo++;
            $mpp--;
            echo'
                <td bgcolor="#42c8f5" style="text-align:center;">
                M'.$noo.'
            </td>';
            }
            ?>
                <td bgcolor="#42c8f5" style="text-align:center;">
                TOTAL
                </td>
            </tr>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM pengguna");
        $no = 0;
        $seluruh = 0;
        while($jnama = mysqli_fetch_array($query)){
            $no++;
            $npm = $jnama['npm'];
            $nama = $jnama['nama'];
            $kelas = $jnama['kelas'];
            $norek = $jnama['norek'];
            $status = $jnama['status'];
            echo'
            <tr>
                <td align="center">'.$no.'</td>
                <td align="left">'.$norek.'</td>
            ';
            if($status == 'programmer'){
            echo'
                <td>'.$nama.'<b>(P)</b></td>
            ';
            }elseif($status == 'admin'){
                echo'
                <td bgcolor="#cfc3ab">'.$nama.'<b>(**)</b></td>
                ';
            }else{
                echo'
                <td>'.$nama.'</td>
                ';
            }
            $noo = 0;
            $tot = 0;
            $mpp3 = $mpp2;
            while($mpp3 > 0){
                $noo++;
                if($_POST['kategori'] == 'semua'){
                    $querty = mysqli_query($conn, "SELECT * FROM log where pertemuan = '$noo' and npm = '$npm' and waktu like '%-$_POST[bulan]-%'");
                }else{
                    $querty = mysqli_query($conn, "SELECT * FROM log where pertemuan = '$noo' and npm = '$npm' and id_kategori='$_POST[kategori]' and waktu like '%-$_POST[bulan]-%'");
                }
                $jmlh = mysqli_num_rows($querty);
                $tot = $tot + $jmlh;
                $mpp3--;
                echo'
                <td align="center">
                '.$jmlh.'
                </td>';
            }
            echo'
                <td align="center">'.$tot.'</td>
            </tr>
            ';
        $seluruh = $seluruh + $tot;
        }
            echo '
            <tr>
                <td colspan="'.$cl.'" align="center">Total</td>
                <td align="center">'.$seluruh.'</td>
            </tr>
            ';
        ?>

        </table>
    <?php 
    }else{
        header("location:admin.php?p=na");
    }
}?>
</body>
</html>
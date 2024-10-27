<html>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }
    </style>
    <?php
include 'koneksi.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{

    $query = mysqli_query($conn, "SELECT ROW_NUMBER() OVER (ORDER BY MAX(l.waktu) DESC) as row_num, p.status as status, p.nama as nama, COUNT(CASE WHEN l.shift = 1 THEN 1 END) as shift1, COUNT(CASE WHEN l.shift = 2 THEN 1 END) as shift2, COUNT(*) as total FROM log l JOIN pengguna p ON l.id_pengguna = p.id WHERE waktu LIKE '%-$_POST[bulan]-%' GROUP BY p.username, p.status, p.nama ORDER BY l.waktu DESC");
    $year = date('Y');
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Rekap-Absen-".$_POST['bulan']."-".$year.".xls");

    $not = mysqli_num_rows($query);
    if($not > 0){
        ?>

    <table border="1" cellpadding="4">
        <tr>
            <td colspan='6' style="text-align:center;">
                <h3>
                    REKAPITULASI ABSEN<br>
                    Klinik dr Sudirman<br>
                    <?=$_POST['bulan'].'-'.$year?>
                </h3>
            </td>
        </tr>

        <tr>
            <td bgcolor="#42c8f5" style="text-align:center;">
                NO
            </td>
            <td bgcolor="#42c8f5" style="text-align:center;">
                NAMA
            </td>
            <td bgcolor="#42c8f5" style="text-align:center;">
                STATUS
            </td>
            <td bgcolor="#42c8f5" style="text-align:center;">
                SHIFT 1
            </td>
            <td bgcolor="#42c8f5" style="text-align:center;">
                SHIFT 2
            </td>
            <td bgcolor="#FF0000" style="text-align:center;">
                TOTAl
            </td>
        </tr>
         <?php
                while ($data = mysqli_fetch_array($query)) {
                ?>
        <tr>
            <td>
                <?=$data['row_num']?>
            </td>
            <td>
                <?=$data['nama']?>
            </td>  
            <td>
                <?=$data['status']?>
            </td>
            <td>
                <?=$data['shift1']?>
            </td>
            <td>
                <?=$data['shift2']?>
            </td>
            <td>
                <?=$data['total']?>
            </td>
        </tr>
        <?php
                }
                ?>
    </table>
    <?php 
    }else{
        header("location:admin.php?p=na");
    }
}?>
</body>

</html>

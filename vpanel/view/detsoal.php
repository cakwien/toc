<?php
include('../mod/sutep.php');

if(!empty($_POST['getDetail']))
{
    $id = $_POST['getDetail'];

    $qsoal = mysqli_query($con,"Select * from u_soal where id_soal = '$id'");
    $dtsoal = mysqli_fetch_array($qsoal);

    // opsi jawab

    $qop = mysqli_query($con,"Select * from u_opsi where id_soal = '$dtsoal[0]' ");
}
?>

<div class="row">
    <div class="col-md-12">
        <label class="fw-bold" for="">Soal :</label>
        <p><?=$dtsoal['soal']?></p>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Opsi Jawaban
            </div>
            <div class="card-body">
                <table class="table">
                    <?php
                    $no=1;
                    while($row = mysqli_fetch_array($qop)){
                        
                        if($row['kunci'] == "benar")
                        {
                            $st = '<i class="bi-check-circle-fill text-success"></i>';
                        }else
                        {
                            $st = '<i class="bi-x-circle-fill text-danger"></i>';
                        }
                    ?>
                    <tr>
                        <td style="width:5%;"><?=$st?></td>
                        <td><p><?=$row['opsi']?></p></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
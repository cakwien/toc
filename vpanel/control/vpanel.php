<?php
if(!empty($_GET['p']))
{
    $p = strtolower($_GET['p']);

    if($p=="login")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password))
        {
            $user->login($con,$username,$password);
        }
        
        include('view/login.php');
    }

    elseif($p=="modul")
    {
        if(isset($_POST['simpanmodul']))
        {
            $nmmodul = $_POST['nmmodul'];
            $input=$modul->insert($con,$nmmodul);
        }

        if(!empty($_GET['del']))
        {
            $modul->delete($con,$_GET['del']);
        }

        if(isset($_POST['updatemodul']))
        {
            $update=$modul->update($con,$_POST['modul'],$_POST['id']);
        }



       

        include('view/index.php');
    }

    elseif($p=="soal")
    {
        // select soal berdasarkan modul yang dipilih
        if(!empty($_GET['modul']))
        {
            $listsoal = $soal->soalbymodul($con,$_GET['modul']);
        }else
        {
            $listsoal = $soal->all($con);
        }




        include('view/index.php');
    }

    elseif($p=="insoal")
    {

        if(isset($_POST['simpansoal']))
        {
            $insoal = $_POST['soal'];
            $idmodul = $_GET['modul'];
            $opsi1 = $_POST['opsibenar'];
            $kunci = "benar";
            $q=mysqli_query($con,"insert into u_soal value('','$idmodul','$insoal')");
            if($q)
            {
                $qsoal = mysqli_query($con,"select * from u_soal where soal = '$insoal' and id_modul = '$idmodul' ");
                $dtqsoal = mysqli_fetch_array($qsoal);

                $idsoal = $dtqsoal[0];
                
                if (!empty($dtqsoal[0]))
                {
                    $inputopsi = mysqli_query($con,"insert into u_opsi values('','$idsoal','$opsi1','benar')");
                    if($inputopsi)
                    {
                        $opsisalah = $_POST['opsisalah'];
                        foreach ($opsisalah as $opsalah) {
                            mysqli_query($con, "insert into u_opsi values('','$idsoal','$opsalah','salah')");
                        }
                    }
                    
                }

                header('location:?p=soal&modul='.$idmodul.'&msg=soalok');
            }
        }

        include('view/index.php');
    }

    

   
}
else
{
    include('view/index.php');
}

?>
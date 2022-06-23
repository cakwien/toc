<?php
class modul{
    function modulall($con){
        $list=array();
        $q=mysqli_query($con,"select * from u_modul");
        while($dt = mysqli_fetch_array($q))
        {
            $list[] = $dt;
        }
        return $list;
    }

    function index($con,$index)
    {
        $q=mysqli_query($con,"select * from u_modul where id_modul = $index");
        $dt = mysqli_fetch_array($q);
        return $dt;
    }

    function insert($con,$modul)
    {
        $q=mysqli_query($con,"insert into u_modul value('','$modul')");
        if($q)
        {
            header('location:?p=modul&msg=ok');
        }else
        {
            header('location:?p=modul&msg=fail');
        }
    }

    function delete($con,$id)
    {
        $q=mysqli_query($con,"delete from u_modul where id_modul = $id");
        if($q)
        {
            header('location:?p=modul&msg=delok');
        }
        else
        {
            header('location"?p=modul&msg=delfail');
        }
    }

    function update($con,$modul,$id)
    {
        $q = mysqli_query($con, "update u_modul set modul = '$modul' where id_modul = $id");
        if ($q) {
            header('location:?p=modul&msg=updateok');
        } else {
            header('location"?p=modul&msg=updatefail');
        }
    }
}
?>
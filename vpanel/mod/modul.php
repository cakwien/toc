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
        $q=mysqli_query($con,"insert into modul value('','$modul')");
        if($q)
        {
            header('location:?p=modul&msg=ok');
        }else
        {
            header('location:?p=modul&msg=fail');
        }
    }
}
?>
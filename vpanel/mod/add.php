<?php
function hari($time)
{
    $hari = date("D",$time);

    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    return "<b>" . $hari_ini . "</b>";
}

function tgl($tanggal)
{
    $tgl = date('Y-m-d',$tanggal);
    
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tgl);

    // variabel pecahkan 0 = tahun
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tanggal

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function sel($a,$b)
{
    if($a==$b)
    {
        $ret = "selected=selected";
    }else
    {
        $ret="";
    }
    return $ret;
}

function msg($msg,$dir)
{
    $ms = '<script>window.alert("'.$msg.'"); window.location.href="'.$dir.'"</srcipt>';
    return $ms;
}

function durasi($start,$end)
{
    $tstart = date("Y-m-d h:i:sa",$start);
    $tend = date("Y-m-d h:i:sa",$end);
    //echo $waktustart;
    //echo $waktuend;

    $datetime1 = new DateTime($tstart); //start time
    $datetime2 = new DateTime($tend); //end time
    $durasi = $datetime1->diff($datetime2);
    echo $durasi->format('%H : %i : %s ');
}
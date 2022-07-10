function waktuHabis(){
    alert('waktu anda telah habis, ujian akan di tutup, semua hasil pekerjaan akan otomatis tersimpan...');

}

function hampirHabis(periods){
    if($.countdown.periodsToSeconds(periods)==60){
        $(this).css({color:"red"});
    }
}


<?php function datanasabah(){
    $db = new Data();
    $nasabah = $db->from('nasabah')
                 ->orderBy('id DESC')
                 ->get();
    return $nasabah;
}
?>
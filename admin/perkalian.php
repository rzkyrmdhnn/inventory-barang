 <html> 
  <title>Belajar di www.makelarsapi.tk</title> 
  <body> 
  <script LANGUAGE="JavaScript"> 
  // function cek(){ 
  // if(form.angka1.value == "" || form.angka2.value == ""){ 
  // alert("data kosong"); //jika angka kosong maka pesan akan tampil 
  // exit; 
  // } 
  // } 
  // function kali() { 
  // cek(); 
  // a=eval(form.angka1.value); 
  // b=eval(form.angka2.value); 
  // c=a*b 
  // form.total.value = c; 
  // } 
  </script> 
  <form name="form"> 
  <input type=text name="angka1" size=3>  
  X 
  <input name="angka2" type="text"  onchange="kali()" size="3" /> 
  = 
  <input type="text" value="" name="total" readonly="true" size="9"> 
  <br><br> 
  <!-- membuat event ketika tombol di klik maka memanggil function javascript --> 
  <input type=button name=submit onClick="kali()" value="KALIKAN"> 
  </form> 
  </body> 
  </html>  
  kalo mau penjumlahan dan pengurangan tinggal ubah dari script javascriptnya 
  } 
  function kali() { 
  cek(); 
  a=eval(form.angka1.value); 
  b=eval(form.angka2.value); 
  c=a*b 
  form.total.value = c; 
  }  
  c=a*b 
  jadi 
  c=a+b 
  atau 
  c=a-b   

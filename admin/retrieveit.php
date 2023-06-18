  <script>
  function showNama(str) {
      if (str == "") {
          document.getElementById("txtNama").innerHTML = "";
          
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtNama").innerHTML = this.responseText;
                 
              }
          };
          xmlhttp.open("GET","kasir/transaksi/getnama.php?q="+str,true);
          xmlhttp.send();
      }
  }

  function showAlamat(str) {
      if (str == "") {
          document.getElementById("txtAlamat").innerHTML = "";
          
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtAlamat").innerHTML = this.responseText;
                 
              }
          };
          xmlhttp.open("GET","kasir/transaksi/getalamat.php?q="+str,true);
          xmlhttp.send();
      }
  }
  
  function showJenis(str) {
      if (str == "") {
          document.getElementById("txtJenis").innerHTML = "";
          
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtJenis").innerHTML = this.responseText;
                 
              }
          };
          xmlhttp.open("GET","kasir/transaksi/getjenis.php?q="+str,true);
          xmlhttp.send();
      }
  }

  function showJenis2(str) {
      if (str == "") {
          document.getElementById("txtJenis2").innerHTML = "";
          
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtJenis2").innerHTML = this.responseText;
                 
              }
          };
          xmlhttp.open("GET","kasir/transaksi/getjenis2.php?q="+str,true);
          xmlhttp.send();
      }
  }


  function showQty(str) {
      if (str == "") {
          document.getElementById("txtQty").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtQty").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","kasir/transaksi/getqty.php?q="+str,true);
          xmlhttp.send();
      }
  }

    function showQty2(str) {
      if (str == "") {
          document.getElementById("txtQty2").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtQty2").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","kasir/transaksi/getqty2.php?q="+str,true);
          xmlhttp.send();
      }
  }
  function showHarga(str) {
      if (str == "") {
          document.getElementById("txtHarga").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtHarga").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","kasir/transaksi/getharga.php?q="+str,true);
          xmlhttp.send();
      }
  }

  function showHarga2(str) {
      if (str == "") {
          document.getElementById("txtHarga2").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtHarga2").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","kasir/transaksi/getharga2.php?q="+str,true);
          xmlhttp.send();
      }
  }
  </script>
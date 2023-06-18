  <script>
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
          xmlhttp.open("GET","gudang/pesan/getjenis.php?q="+str,true);
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
          xmlhttp.open("GET","gudang/pesan/getjenis2.php?q="+str,true);
          xmlhttp.send();
      }
  }

  function showJenis3(str) {
      if (str == "") {
          document.getElementById("txtJenis3").innerHTML = "";
          
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
                  document.getElementById("txtJenis3").innerHTML = this.responseText;
                 
              }
          };
          xmlhttp.open("GET","gudang/barang/getjenis3.php?q="+str,true);
          xmlhttp.send();
      }
  }

  function showJenis4(str) {
      if (str == "") {
          document.getElementById("txtJenis4").innerHTML = "";
          
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
                  document.getElementById("txtJenis4").innerHTML = this.responseText;
                 
              }
          };
          xmlhttp.open("GET","gudang/barang/getjenis4.php?q="+str,true);
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
          xmlhttp.open("GET","gudang/pesan/getqty.php?q="+str,true);
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
          xmlhttp.open("GET","gudang/pesan/getqty2.php?q="+str,true);
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
          xmlhttp.open("GET","gudang/pesan/getharga.php?q="+str,true);
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
          xmlhttp.open("GET","gudang/pesan/getharga2.php?q="+str,true);
          xmlhttp.send();
      }
  }
  </script>
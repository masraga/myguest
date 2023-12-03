<style>
    .body {
      height : 100vh;
      align-items:center;
    }
    .qr-container {
      display: flex;
      justify-content: center;
      text-align:center;
    }
</style>

<div class="body">
<div class="qr-container">
  <div class="container">
    <div id="qr" value={{$userToken}}></div>
    <h2>nama resepsionis : {{$receiptName}}</h2>
  </div>  
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script> 
  var qrContainer = document.querySelector("#qr");
  var token = qrContainer.getAttribute("value");
  var qrcode = new QRCode("qr", {
      text: token,
      width: 400,
      height: 400,
      colorDark : "#000000",
      colorLight : "#ffffff",
      correctLevel : QRCode.CorrectLevel.H
  });
  qrcode.clear(); // clear the code.
  qrcode.makeCode(token); // make another code.
  window.print();
</script>
</div>

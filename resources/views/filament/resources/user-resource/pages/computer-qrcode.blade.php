<x-filament-panels::page>
<div class="qr-container">
  <div id="qr" value={{$userToken}}></div>
  <br>
  <x-filament::button
      href="/test"
      tag="a"
      target="_blank"
  >
      Cetak
  </x-filament::button>
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

</script>
</x-filament-panels::page>

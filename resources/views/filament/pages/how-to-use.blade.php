<x-filament-panels::page>
  <style>
    tr, td, th {
      border: 1px solid;
      padding-left: 10px;
    }
  </style>
  <table border="1">
    <col style="width:10%">
    <col style="width:70%">
    <col style="width:20%">
    <thead>
      <tr>
        <th align="left">No</th>
        <th align="left">Description</th>
        <th align="left">Actor</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>
          Ke menu Pengaturan, lalu set token whatsapp dan nomor whatsapp, untuk nomor dan token whatsapp
          harus terdaftar terlebih dahulu di web unofficial whatsapp api <a href="https://fonnte.com/">fontee.com</a>
        </td>
        <td>sistem</td>
      </tr>
      <tr>
        <td>2</td>
        <td>
          Jika menggunakan sistem dilocal, gunakan <a href="https://ngrok.com/">ngrok.com</a> dan ubah .env ASSET_URL dan APP_URL sesuai 
          dengan url yang diberikan ngrok
        </td>
        <td>sistem</td>
      </tr>
      <tr>
        <td>3</td>
        <td>
          Resepsionis login, lalu buka menu pengaturan lalu klik tombol cetak qrcode komputer.
          Setelah itu akan muncul popup untuk melakukan print qrcode yang akan digunakan 
          oleh tamu nanti untuk syarat masuk keruangan.
        </td>
        <td>resepsionis</td>
      </tr>
      <tr>
        <td>4</td>
        <td>
          Tamu melakukan scan qrcode dari resepsionis, lalu qrcode akan mengarahkan kehalaman validasi wajah.
        </td>
        <td>tamu</td>
      </tr>
      <tr>
        <td>5</td>
        <td>
          Setelah tamu melakukan validasi wajah, akan muncul popup form pengisian data diri OTOMATIS di 
          resepsionis, dan resepsionis bisa menerima atau menolak tamu. Jika form data tamu telah diisi,
          maka data tamu akan masuk kedalam menu Visitors.
        </td>
        <td>resepsionis</td>
      </tr>
      <tr>
        <td>6</td>
        <td>
          Di menu visitors, resepsionis dapat menyetujui tamu masuk keruangan. Jika telah
          disetujui, maka akan ada notifikasi whatsapp OTOMATIS ke owner dan tamu bahwa tamu telah masuk kedalam
          ruangan, dan sistem akan otomatis mencetak kartu tamu.
        </td>
        <td>resepsionis</td>
      </tr>
      <tr>
        <td>7</td>
        <td>
          Setelah tamu selesai melakukan kunjungan, resepsionis dapat memperbaharui status tamu menjadi keluar
          dimenu visitors. Setelah data diperbaharui, akan ada notifikasi whatsapp OTOMATIS ke tamu dan owner,
          bahwa tamu telah selesai melakukan kunjungan.
        </td>
        <td>resepsionis</td>
      </tr>
    </tbody>
  </table>
</x-filament-panels::page>

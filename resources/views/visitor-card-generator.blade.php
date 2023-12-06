<style>
    .body {
       display: flex;
       justify-content: center; 
    }

    .face-image {
        width: 150px;
        height: auto;
        display: block;
        align-items: center;
        justify-content:center;
        margin: 0 auto;
    }

    table {
        border-collapse: collapse;
        margin-top: 10px;
    }

    table td,th {
        padding : 15px 20px;
    }
</style>
<div class="body">
    <div class="content">
        <img src="{{asset($visitor->visitorCard->face)}}" class="face-image" alt="">
        <table border="1">
            <tr>
                <th>Kode pengunjung</th>
                <td>{{$visitor->visitorCard->card_id}}</td>
            </tr>
            <tr>
                <th>Tanggal Kunjungan</th>
                <td>{{date("d-m-Y H:i:s", strtotime($visitor->created_at))}}</td>
            </tr>
            <tr>
                <th>Kartu Identitas</th>
                <td>{{$visitor->guest->id_card}}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{$visitor->guest->name}}</td>
            </tr>
            <tr>
                <th>Kelamin</th>
                <td>{{$visitor->guest->gender}}</td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td>{{$visitor->guest->phone}}</td>
            </tr>
        </table>
    </div>
</div>
    <script>
        window.print();
        window.onafterprint = back;

        function back() {
            window.location = "/admin";
        }
    </script>
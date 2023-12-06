<style>
    .body {
        height : 100vh;
        align-items: center;
        display:flex;
        justify-content:center;
    }

    button {
        display: block;
        width: 90%;
        margin: 0 auto;
        font-size: 1.2em;
    }
</style>
<div class="body">
    <div class="camera-snapshot">
        <div>
            <video autoplay="true" id="video-webcam">
            </video>
        </div>
        <br>
        <button onclick="takeSnapshot(this)">Kirim Foto</button>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"></script>
<script src="https://cdn.socket.io/4.7.2/socket.io.min.js" integrity="sha384-mZLF4UVrpi/QTWPA7BjNPEnkIfRFn4ZEO3Qt/HFklTJBj/gBOV8G3HcKn4NfQblz" crossorigin="anonymous"></script>
<script type="text/javascript">
    // seleksi elemen video
    var video = document.querySelector("#video-webcam");

    // minta izin user
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

    // jika user memberikan izin
    if (navigator.getUserMedia) {
        // jalankan fungsi handleVideo, dan videoError jika izin ditolak
        navigator.getUserMedia({ video: true }, handleVideo, videoError);
    }

    // fungsi ini akan dieksekusi jika  izin telah diberikan
    function handleVideo(stream) {
        video.srcObject = stream;
    }

    // fungsi ini akan dieksekusi kalau user menolak izin
    function videoError(e) {
        // do something
        alert("Izinkan menggunakan webcam untuk demo!")
    }

    function dataURLtoFile(dataurl, filename) {
        var arr = dataurl.split(','),
            mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[arr.length - 1]), 
            n = bstr.length, 
            u8arr = new Uint8Array(n);
        while(n--){
            u8arr[n] = bstr.charCodeAt(n);
        }
        return new File([u8arr], filename, {type:mime});
    }

    function takeSnapshot(e) {
        // buat elemen img
        e.innerText = "Loading...";
        var img = document.createElement('img');
        var context;

        // ambil ukuran video
        var width = video.offsetWidth
                , height = video.offsetHeight;

        // buat elemen canvas
        canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;

        // ambil gambar dari video dan masukan 
        // ke dalam canvas
        context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, width, height);

        // render hasil dari canvas ke elemen img
        img.src = canvas.toDataURL('image/png');
        file = dataURLtoFile(canvas.toDataURL('image/png'), "visitor.png")
        uploadToAdmin(file);
    }

    async function uploadToAdmin(face) {
        try{
            const socket = io("http://localhost:3000");
            socket.on("connect", async () => {
                console.log("connect");
                var qs = new URLSearchParams(window.location.search);
                const token = qs.get("token");
                var formData = new FormData();
                formData.append("token", token);
                formData.append("face", face);

                const upload = await axios.post("/api/visitor/face-validator", formData)
                socket.emit("send-face", JSON.stringify({
                    face: upload.data.face, 
                    code : upload.data.code,
                    admin : upload.data.admin
                }));
                
                alert(upload.data.msg);
                window.location.reload();
            })
        }
        catch(e) {
            alert("terjadi kesalahan saat mengirim foto")
        }
    }
</script>
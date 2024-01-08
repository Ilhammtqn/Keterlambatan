<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Pernyataan</title>
    <style>
        body {
            margin: 20px 40px;
        }

        .info {
            font-family: Arial, Helvetica, sans-serif;
            font-size: small;
        }

        .date p {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            padding: 0;
            text-align: right;
            margin-right: 50px;
        }

        .sign {
            float: right;
            margin-right: 50px;
            text-align: center;
        }

        .tandatangan {
            float: right;
            margin-right: 100px;
            text-align: center;
        }

        .ttd{
            margin-left: 50px;
        }
    </style>

</head>

<body>
    <div id="letter">
        <center>
            <div class="info">
                <h3>SURAT PERNYATAAN</h3>
                <h3>TIDAK AKAN DATANG TERLAMBAT KESEKOLAH</h3>
            </div>
        </center>
        <div class="mid">
            <div class="info">
                <br>
                <p>Yang bertanda tangan dibawah ini:</p>
                <p>NIS : {{ $student['nis'] }}</p>
                <p>Nama : {{ $student['name'] }}</p>
                <p>Rombel : {{ $rombel['rombel']}}</p>
                <p>Rayon : {{ $rayon['rayon']}}</p>
                <br>
                <p>Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu terlambat
                    datang ke sekolah sebanyak <strong>3 Kali</strong> yang mana hal tersebut termasuk kedalam
                    pelanggaran kedisiplinan.
                    Saya berjanji tidak akan terlambat datang ke sekolah lagi. Apabila saya terlambat datang ke sekolah
                    lagi saya siap diberikan sanksi yang sesuai dengan peraturan sekolah.</p>
                <br>
                <p>Demikian surat pernyataan terlambat ini saya buat dengan penuh penyesalan.</p>
            </div>
        </div>
        <div class="bot">
            <div class="date">
                <p>Bogor, <?php echo strftime(" %d %B %Y"); ?></p>
            </div>
            <div class="info">
                <div class="card">
                    <div class="sign">
                        <p>Orang Tua/Wali Peserta Didik,</p>
                        <br> <br>
                        <p>(...........................)</p>
                    </div>
                    <br>
                    <div class="ttd">
                        <p>Peserta Didik,</p>
                        <br> <br>
                        <p>( {{ $student['name'] }} )</p>
                    </div>
                    <br>
                    <div class="tandatangan">
                        <p>Kesiswaan,</p>
                        <br> <br>
                        <p>(...........................)</p>
                    </div>
                    <br>
                    <div class="ttd">
                        <p>Pembimbing Siswa,</p>
                        <br> <br>
                        <p>( {{ $ps['name'] }} )</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
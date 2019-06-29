<!DOCTYPE html>
<html>
<head>
	<title>Game menghitung</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="jquery-3.4.1.min.js"></script>
</head>
<body>
	<div class="container text-center">
        <div class="row">
            <div class="col-8">
                <div class="jumbotron">
                    <h1 class="display-4">Game menghitung</h1>
                    <button class="btn btn-secondary btn-lg" onclick="startgame()" id="start">Start</button>
                    <div id="inti" style="display:none">
                        <h1 id="waktugame"></h1>
                        <h1 id="soal" class="display-4"></h2>
                        <h1 id="waktusoal"></h3>
                        <span>
                            <button class="btn btn-lg" id="a" onclick="cek(this)"></button>
                            <button class="btn btn-lg" id="b" onclick="cek(this)"></button>
                            <button class="btn btn-lg" id="c" onclick="cek(this)"></button>
                        </span>
                        <h1 id="score"></h1>
                        <h2 id="verdict"></h2>
                    </div>
                    <button class="btn btn-secondary btn-lg" id="retry" style="display:none" onclick="startgame()">Retry</button>
					<div id="skor" style="display:none">
						<input type="text" class="form-control" id="nama" placeholder="Nama">
						<button type="button" class="btn btn-primary" id="simpan" onclick="simpan()">Simpan</button>
					</div>
				</div>
            </div>
            <div class="col-4">
                <div class="jumbotron">
					<h1>Top score</h1>
					<ol id="tabel">

					</ol>
				</div>
            </div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	
	var aa = [], op = [], bb = [], ans = [], ansindex = [], pil = [];
	var waktusoal = 2, waktugame = 60;
	var banyaksoal = 50;
	var ansindexnow;
	var game, gamesoal;
	var score = 0;
	var tertekan = false;
	$(document).ready(function(){
		tampil();
	});
	function tampil() {
		setTimeout(function()
		{ 
			$.ajax({
				type:"get",
				url:"tampil_skor.php",
				data : {'nama' : "nama" },
				dataType : "json",
				success:function(data)
				{
					//do something with response data
					$(tabel).empty();
					for (var i = 0; i < data['nama'].length; i++) {
						var li = document.createElement("li");
						li.appendChild(document.createTextNode(data['nama'][i] + " " + data['skor'][i]));
						document.getElementById("tabel").appendChild(li);
					}
					tampil();
				},
				error: function (xhr, ajaxOptions, thrownError) {
					// alert(xhr.status);
					// alert(thrownError);
					tampil();
				}
			});
		}, 1000);//time in milliseconds 
	}
	// 0 - tambah
	// 1 - kurang
	// 2 - kali
	function init() {
		waktusoal = 2;
		waktugame = 5;
		score = 0;
		tertekan = false;
		for (var i = 0; i < banyaksoal; i++) {
			aa[i] = Math.floor((Math.random() * 50) + 1);

			var posmin = Math.floor(Math.random() * 2);
			if (posmin == 0) aa[i] *= -1;

			op[i] = Math.floor(Math.random() * 3);
			bb[i] = Math.floor((Math.random() * 50) + 1);

			posmin = Math.floor(Math.random() * 2);
			if (posmin == 0) bb[i] *= -1;

			if (op[i] == 0) {
				ans[i] = aa[i] + bb[i];
			}
			else if (op[i] == 1) {
				ans[i] = aa[i] - bb[i];
			}
			else {
				ans[i] = aa[i] * bb[i];
			}

			if (op[i] == 1 && bb[i] < 0) {
				op[i] = 0;
				bb[i] *= -1;
			}
			else if (op[i] == 0 && bb[i] < 0) {
				op[i] = 1;
				bb[i] *= -1;
			}

			ansindex[i] = Math.floor(Math.random() * 3);

			pil[i] = [];

			for (var j = 0; j < 3; j++) {
				do {
					pil[i][j] = Math.floor(Math.random() * 2501);
					posmin = Math.floor(Math.random() * 2);
					if (posmin == 0) pil[i][j] *= -1;
					var bisa = true;
					for (var k = 0; k < j; k++) {
						if (pil[i][j] == pil[i][k] || pil[i][j] == ans[i]) {
							bisa = false;
							break;
						}
					}
					if (bisa) break;
				} while (1);
			}

			pil[i][ansindex[i]] = ans[i];

		}
	}

	function generatesoal() {
		tertekan = false;

		ansindexnow = Math.floor(Math.random() * 50);

		document.getElementById("soal").innerHTML = aa[ansindexnow] + ((op[ansindexnow] == 0) ? " + " : (op[ansindexnow] == 1) ? " - " : " * ") + bb[ansindexnow];

		document.getElementById("a").innerHTML = pil[ansindexnow][0];
		document.getElementById("b").innerHTML = pil[ansindexnow][1];
		document.getElementById("c").innerHTML = pil[ansindexnow][2];
	}

	function cek(haha) {
		if (document.getElementById("inti").style.display == 'none' || tertekan || waktugame < 0) return;

		tertekan = true;

		if (haha.innerHTML == ans[ansindexnow]) {
			score += 100;
			document.getElementById("verdict").innerHTML = "True";
			document.getElementById("verdict").style.color = "Green";
		}
		else {
			score -= 100;
			document.getElementById("verdict").innerHTML = "False";
			document.getElementById("verdict").style.color = "Red";
		}
		document.getElementById("score").innerHTML = "Score : " + score;
		
		clearInterval(gamesoal);
		waktusoal = 2;
		gamesoal = setInterval(countdowngamesoal, 500);
	}

	function startgame() {
		document.getElementById("skor").style.display = "none";
		init();
		document.getElementById("verdict").innerHTML = "";
		document.getElementById("score").innerHTML = "";
		document.getElementById("start").style.display = "none";
		document.getElementById("inti").style.display = "inline";
		document.getElementById("retry").style.display = "none";
		game = setInterval(countdowngame, 1000);
		gamesoal = setInterval(countdowngamesoal, 500);
	}

	function countdowngame() {
		document.getElementById("waktugame").innerHTML = Math.floor(waktugame / 60).toString() + " m " + (waktugame % 60).toString() + " s";
		--waktugame;

		if (waktugame < 0) {
			clearInterval(game);
			clearInterval(gamesoal);
			document.getElementById("retry").style.display = "inline";
			document.getElementById("skor").style.display = "inline";
		}
	}

	function countdowngamesoal() {
		document.getElementById("waktusoal").innerHTML = (waktusoal % 60).toString() + " s";

		if (waktusoal == 2) {
			generatesoal();
		}

		--waktusoal;

		if (waktusoal < 0) {
			clearInterval(gamesoal);
			waktusoal = 2;
			gamesoal = setInterval(countdowngamesoal, 500);
		}
	}

	function simpan() {
		var nama = document.getElementById("nama").value;
		var postForm = { //Fetch form data
            'skor'     : score, //Store name fields value
			'nama'     : nama
        };
		$.ajax({
				type:"POST",
				url:"simpan.php",
				data: postForm,
				dataType  : "json",
				success:function(data)
				{
					document.getElementById("skor").style.display = "none";
				},
				error: function (xhr, ajaxOptions, thrownError) {
					// alert(xhr.status);
					alert(thrownError);
				}
			});
	}

</script>
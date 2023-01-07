<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Ubah Data</title>
    <!--impoert fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!--impoert css-->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css")?>"/>
</head>
<body>
    
<!-- buat area menu -->
<nav class="navbar bg-light">
    <h4> Aplikasi Pengelolaan Data Obat</h4>
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/UNIVERSITASTEKNOKRAT.png/200px-UNIVERSITASTEKNOKRAT.png" alt="logo" width="100">
    <form class="container-fluid justify-content-start">
        <button id="btn_lihat" class="btn btn-outline-primary me-2" type="button">Lihat Data</button>
        <button id="btn_refresh" class="btn btn-sm btn-outline-secondary" type="button" onclick="return set_Refresh()">Refresh Data</button>
        
    </nav>
     <!--buat area data obat-->
     <main class="container text-center">
        <section class="item-label1">
			<label id="lbl_kode" for="txt_kode">
				Kode :
			</label>
		</section>
        <section class="item-input1">
			<input type="text" id="txt_kode" class="text-input" maxlength="20">
		</section>
        <section class="item-error1">
			<p id="err_kode" class="error-info">Ini Error</p>
		</section>

        <section class="item-label2">
		<label id="lbl_nama" for="txt_nama">
				Nama :
			</label>
		</section>
        <section class="item-input2">
		<input type="text" id="txt_nama" class="text-input" maxlength="100">
		</section>
        <section class="item-error2">
		<p id="err_nama" class="error-info"></p>
		</section>

		<section class="item-label3">
		<label id="lbl_jenis" for="cbo_jenis">
				Jenis Obat :
			</label>
		</section>
        <section class="item-input3">
			<select  id="cbo_jenis" class="select-input">
				<option value="-">Pilih Jenis : </option>
				<option value="Vitamin">Vitamin</option>
				<option value="Obat">Obat</option>
				
			</select>
		</section>
        <section class="item-error3">
		<p id="err_jenis" class="error-info"></p>
		</section>
        
        <section class="item-label4">
		<label id="lbl_harga" for="txt_harga">
				Harga :
			</label>
		</section>
        <section class="item-input4">
		<input type="text" id="txt_harga" class="text-input" maxlength="15" onkeypress="return setNumber(event)">
		
		</section>
        <section class="item-error4">
		<p id="err_harga" class="error-info"></p>
		</section>

		<section class="item-label5">
		<label id="lbl_stok" for="txt_stok">
				Stok :
			</label>
		</section>
        <section class="item-input5">
		<input type="text" id="txt_stok" class="text-input" maxlength="15" onkeypress="return setNumber(event)">
		
		</section>
        <section class="item-error5">
		<p id="err_stok" class="error-info"></p>
		</section>

    </main>
	<nav class="area-menu" style="margin-top:10px;">
        <button id="btn_ubah" class="btn-primary">Ubah Data</button>

    </nav>

	<!--import script.js-->
<script src ="<?php echo base_url("ext/script.js"); ?>"> </script>

<script>
    //inisialisasi object dan ambil data
    let txt_kode = document.getElementById("txt_npm");
    let txt_nama = document.getElementById("txt_nama");
    let cbo_jenis = document.getElementById("cbo_jenis");
    let txt_harga = document.getElementById("txt_harga");
    let txt_stok = document.getElementById("txt_stok");
    let token = '<? echo $token; ?>'

    txt_kode.value = '<?php echo $kode; ?>';
    txt_nama.value = '<?php echo $nama; ?>';
    cbo_jenis.value = '<?php echo $jenis; ?>';
    txt_harga.value = '<?php echo $harga; ?>';
    txt_stok.value = '<?php echo $stok; ?>';
	

    //inisialisasi object
    let btn_lihat = document.getElementById("btn_lihat");
	let btn_ubah = document.getElementById("btn_ubah");

   //even btn lihat
   btn_lihat.addEventListener('click', function(){
        location.href='<?php echo base_url (); ?>'
    });

    //fungsi refresh
            function set_Refresh()
            {
                location.href='<?php echo site_url("Obat/updateObat") ?>'
            }

	//buat event btn_simpan
	btn_ubah.addEventListener('click', function(){
		//inisialisasi object
		let lbl_kode = document.getElementById("lbl_kode");
		let err_kode = document.getElementById("err_kode");

        let lbl_nama = document.getElementById("lbl_nama");
		let err_nama = document.getElementById("err_nama");

        let lbl_jenis = document.getElementById("lbl_jenis");
		let err_jenis = document.getElementById("err_jenis");

		let lbl_harga = document.getElementById("lbl_harga");
		let err_harga = document.getElementById("err_harga");

        let lbl_stok = document.getElementById("lbl_stok");
		let err_stok = document.getElementById("err_stok");

		

		//jika kode tidak diisi
		if(txt_kode.value === "")
		{
			err_kode.style.display = "unset";
			err_kode.innerHTML = "Kode Harus Di isi !";
			lbl_kode.style.color = "#FF0000";
			txt_kode.style.borderColor = "#FF0000";
		}

		//kode diisi
		else
		{
			err_kode.style.display = "none";
			err_kode.innerHTML = "";
			lbl_kode.style.color = "#000000";
			txt_kode.style.borderColor = "unset";
		}

		//ternary operator
		const nama = (txt_nama.value === "") ?
		[
			err_nama.style.display = "unset",
			err_nama.innerHTML = "Nama Harus Di isi !",
			lbl_nama.style.color = "#FF0000",
			txt_nama.style.borderColor = "#FF0000",
		]
		:
		[
			err_nama.style.display = "none",
			err_nama.innerHTML = "",
			lbl_nama.style.color = "#000000",
			txt_nama.style.borderColor = "unset",
		]

		const jenis = (cbo_jenis.value === "") ?
		[
			err_jenis.style.display = "unset",
			err_jenis.innerHTML = "Jenis Harus Di isi !",
			lbl_jenis.style.color = "#FF0000",
			cbo_jenis.style.borderColor = "#FF0000",
		]
		:
		[
			err_jenis.style.display = "none",
			err_jenis.innerHTML = "",
			lbl_jenis.style.color = "#000000",
			cbo_jenis.style.borderColor = "unset",
		]


		//harga

		const harga = (txt_harga.value === "") ?
		[
			err_harga.style.display = "unset",
			err_harga.innerHTML = "Harga Harus Di isi !",
			lbl_harga.style.color = "#FF0000",
			txt_harga.style.borderColor = "#FF0000",
		]
		:
		[
			err_harga.style.display = "none",
			err_harga.innerHTML = "",
			lbl_harga.style.color = "#000000",
			txt_harga.style.borderColor = "unset",
		]

		//stok

		const stok = (txt_stok.value === "") ?
		[
			err_stok.style.display = "unset",
			err_stok.innerHTML = "Stok Harus Di isi !",
			lbl_stok.style.color = "#FF0000",
			txt_stok.style.borderColor = "#FF0000",
		]
		:
		[
			err_stok.style.display = "none",
			err_stok.innerHTML = "",
			lbl_stok.style.color = "#000000",
			txt_stok.style.borderColor = "unset",
		]

		//jika komponen terisi
		if(err_kode.innerHTML === "" && nama[1] === "" && jenis[1] === "" && harga[1] === "" && stok[1] === "")
		{
			// panggil method setUpdate
			setUpdate(txt_kode.value, txt_nama.value, cbo_jenis.value, txt_harga.value, txt_stok.value, token);
		}
		
		
	});
	
	const setUpdate = async(kode, nama, jenis, harga, stok, token) => {
		//buat variabel
		let form = new FormData();

		//isi/tambah nilai form
		form.append("kodenya", kode);
		form.append("namanya", nama);
		form.append("jenisnya", jenis);
		form.append("harganya", harga);
		form.append("stoknya", stok);
		form.append("tokennya", token);

		try {
			//kirim data ke controller
			let response = await fetch('<?php echo site_url("Obat/setUpdate"); ?>',{
			method: "POST",
			body: form
		});
		//proses pembacaan hasil
		let result = await response.json();
		//pemberitahuan
		alert(result.statusnya)
		}

		catch
		{
			alert("Data Gagal Dikirim !")
		}




		//proses kirim data ke controller
		//fetch('',{
		//	method: "POST",
		//	body: form
		//})
		//.then((response)=> response.json())
		//.then((result)=> alert(result.statusnya))
		//.catch((error)=> alert("Data Gagal Dikirim!"))
	}

</script>



</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat</title>

    <!--impoert fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!--impoert css-->
    
</head>
<br>
<body>
    <!-- buat area menu -->
    <nav class="navbar bg-light">
    <h4> Aplikasi Pengelolaan Data Obat</h4>
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/UNIVERSITASTEKNOKRAT.png/200px-UNIVERSITASTEKNOKRAT.png" alt="logo" width="100">
    <form class="container-fluid justify-content-start">
        <button id="btn_tambah" class="btn btn-outline-primary me-2" type="button">Tambah Data</button>
        <button id="btn_refresh" class="btn btn-sm btn-outline-secondary" type="button" onclick="return set_Refresh()">Refresh Data</button>
        </form>
    </nav>

    <!-- buat area table -->
    <table class="table table-striped">
        <!--judul table-->
        <thead>
        <tr class="table-primary">
            <th style="width : 15%;">Aksi</th>
            <th style ="text-align: center;">No.</th>
            <th style ="text-align: center;">Kode</th>
            <th style ="text-align: center;">Nama</th>
            <th style ="text-align: center;">Jenis</th>
            <th style ="text-align: center;">Harga</th>
            <th style ="text-align: center;">Stok</th>
        </tr>
</thead>
<!--isi table-->
<tbody>

        <!-- proses looping -->
    <?php
    //set nilai 
    $no = 1;
        foreach($tampil->obat as $result)
        {
            
    ?>

        <tr>
            <td style="width : 15%;">
            <nav >
                <button class="btn btn-success" id="btn_ubah" title="Ubah Data" onclick="return gotoUpdate('<?php echo $result->kode_obat;?>')"><i class="fa-solid fa-pen"></i></button>
                <button class="btn btn-danger" id="btn_hapus" title="Hapus Data" onclick="return gotoDelete('<?php echo $result->kode_obat;?>')"><i class="fa-solid fa-trash-can"></i></button>
            </nav>
            </td>
            <td style ="text-align: center;">
            <?php echo $no;?>
            </td>
            <td style ="text-align: center;">
            <?php echo $result->kode_obat;?>
            </td>
            <td style ="text-align: center;">
            <?php echo $result->nama_obat;?>
            </td>
            <td style ="text-align: center;">
            <?php echo $result->jenis_obat;?>
            </td>
            <td style ="text-align: center;">
            <?php echo $result->harga_obat;?>
            </td>
            <td style ="text-align: center;">
            <?php echo $result->stok_obat;?>
            </td>
        </tr>

        <?php
                $no++;
                }
            ?>
</tbody>
            

    </table>

    <!--import fontawesome (JS)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <script>
            let btn_tambah = document.getElementById("btn_tambah");
            //buat event  tambah data
            btn_tambah.addEventListener('click', function()
            {
            
                location.href='<?php echo site_url("Obat/TambahObat") ?>'
                
            })

           // btn_refresh.addEventListener('click', set_Refresh)
            function set_Refresh()
            {
                location.href='<?php echo base_url() ?>'
            }

             // buat fungsi untuk update data
            function gotoUpdate(kode)
            {
                //let npmx = btoa(npm);
                location.href='<?php echo site_url ("Obat/updateObat/")?>'+'/'+kode
            }

            // buat fungsi untuk hapus data
            function gotoDelete(kode)
            {
                if(confirm("Data Mahasiswa "+kode+" Ingin Di Hapus ?") === true)
                {
                    //alert("Data Mahasiswa Berhasil Dihapus")
                    //panggil fungsi setdelete
                    setDelete(kode);
                } 
            }

            function setDelete(kode){
               //buat variable konstanta data
              const data = {
                "kodenya" : kode
              }
              //kirim data dengan async dengan fetch
              fetch('<?php echo site_url("Obat/setDelete"); ?>', 
              {
                method : "POST",
                headers : {
                  "Content-Type" : "application/json",
                },
                body: JSON.stringify(data)
              })
              .then((response)=>
              {
                return response.json()
              })

              .then(function(data)
              {
                //jika nilai "err" = 0
                //if(data.err === 0)
                  //alert("Data Berhasil Dihapus")

                //jika nilai err = 1
                //else
                  //alert("Data Gagal Dihapus!")
                //alert(data.err);

                alert(data.statusnya);
                //panggil refresh
                set_Refresh();
              })
            
            }
        </script>
</body>
</html>
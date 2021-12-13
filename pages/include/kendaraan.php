<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Kendaraan</h1>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable">
      <thead>
        <tr>
          <th>No.</th>
          <th>No Unik</th>
          <th>Nama Lengkap</th>
          <th>Jenis Kendaraan</th>
          <th>Telepon</th>
          <th>Tanggal</th>
          <th>Waktu</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</main>

<script>
  function loadKendaraan() {
    let empTable = document.getElementById("dataTable").getElementsByTagName("tbody")[0];
    empTable.innerHTML = "";

    $.ajax({
      url: "./ajax/kendaraan.php",
      type: "get",
      success: function (data) {
        let response = JSON.parse(data);
        for (let key in response) {
          if (response.hasOwnProperty(key)) {
            let val = response[key];
            
            let newRow = empTable.insertRow(); 
            let noCell = newRow.insertCell(0);
            let unikCell = newRow.insertCell(1);
            let namaCell = newRow.insertCell(2);
            let jenisCell = newRow.insertCell(3);
            let teleponCell = newRow.insertCell(4);
            let tanggalCell = newRow.insertCell(5);
            let waktuCell = newRow.insertCell(6);
            let aksiCell = newRow.insertCell(7);

            noCell.innerHTML = val['no'];
            unikCell.innerHTML = val['unik'];
            namaCell.innerHTML = val['nama'];
            jenisCell.innerHTML = val['jenis'];
            teleponCell.innerHTML = val['telepon'];
            tanggalCell.innerHTML = val['tanggal'];
            waktuCell.innerHTML = val['waktu'];
            aksiCell.innerHTML = val['aksi'];
          }
        }
      }
    });
  }

  document.addEventListener("DOMContentLoaded", function() {
    loadKendaraan();
  })
</script>
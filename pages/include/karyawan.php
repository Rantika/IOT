<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Karyawan</h1>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable">
      <thead>
        <tr>
          <th>No Unik</th>
          <th>Nama Lengkap</th>
          <th>Jabatan</th>
          <th>Telepon</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</main>

<script>
  loadJabatan();

  function loadJabatan() {
    let empTable = document.getElementById("dataTable").getElementsByTagName("tbody")[0];
    empTable.innerHTML = "";

    $.ajax({
      url: "./ajax/karyawan.php?act=get",
      type: "get",
      success: function (data) {
        let response = JSON.parse(data);
        for (let key in response) {
          if (response.hasOwnProperty(key)) {
            let val = response[key];
            
            let newRow = empTable.insertRow(0); 
            let unikCell = newRow.insertCell(0);
            let namaCell = newRow.insertCell(1);
            let jabatanCell = newRow.insertCell(2);
            let teleponCell = newRow.insertCell(3);
            let aksiCell = newRow.insertCell(4);

            unikCell.innerHTML = val['no_unik'];
            namaCell.innerHTML = val['nama'];
            jabatanCell.innerHTML = val['jabatan'];
            teleponCell.innerHTML = val['telepon'];
            aksiCell.innerHTML = '<button class="btn btn-danger mr-2" onclick="hapus('+val['id']+')">Hapus</button>';
            aksiCell.innerHTML += '<button class="btn text-white btn-warning" data-id="'+val['id']+'" data-value="'+val['jabatan']+'" id="editBtn">Edit</button>';
          }
        }
      }
    });
  }
</script>
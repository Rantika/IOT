<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Jabatan</h1>
  </div>
  <div class="row">
    <div class="col-lg-4 mb-3">
      <div class="card">
        <div class="card-body" id="tambah">
          <div class="form-group">
            <label for="tambahJabatan">Tambah Jabatan</label>
            <input type="text" id="tambahJabatan" class="form-control">
          </div>
          <div class="form-group">
            <button id="addJabatan" class="btn btn-primary">Tambah</button>
          </div>
        </div>
        <div class="card-body d-none" id="edit">
          <div class="form-group">
            <label for="editJabatan">Edit Jabatan</label>
            <input type="text" id="editJabatan" class="form-control">
            <input type="hidden" id="editId" class="form-control">
          </div>
          <div class="form-group">
            <button id="updateJabatan" class="btn btn-primary">Simpan</button>
            <button onclick="batal()" class="btn btn-danger">Batal</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable">
          <thead>
            <tr>
              <th>Jabatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</main>

<script>
  loadJabatan();

  function loadJabatan() {
    let empTable = document.getElementById("dataTable").getElementsByTagName("tbody")[0];
    empTable.innerHTML = "";

    $.ajax({
      url: "./ajax/jabatan.php?act=get",
      type: "get",
      success: function (data) {
        let response = JSON.parse(data);
        for (let key in response) {
          if (response.hasOwnProperty(key)) {
            let val = response[key];
            
            let newRow = empTable.insertRow(0); 
            let jabatanCell = newRow.insertCell(0);
            let aksiCell = newRow.insertCell(1);

            jabatanCell.innerHTML = val['jabatan'];
            aksiCell.innerHTML = '<button class="btn btn-danger mr-2" onclick="hapus('+val['id']+')">Hapus</button>';
            aksiCell.innerHTML += '<button class="btn text-white btn-warning" data-id="'+val['id']+'" data-value="'+val['jabatan']+'" id="editBtn">Edit</button>';
          }
        }
      }
    });
  }

  function hapus(id) {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data anda akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "./ajax/jabatan.php?act=hapus",
          type: "post",
          data: {id: id},
          success: function (response) {
            Swal.fire({
              title: 'Harap tunggu!',
              timer: 2000,
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading()
              },
              willClose: () => {
                if (response == 1) {
                  loadJabatan();
                  Swal.fire('Wooww', 'Data anda berhasil dihapus!', 'success');
                } else {
                  Swal.fire('Ooops!', 'Data anda gagal dihapus!', 'error');
                }
              }
            })
          }
        });
      }
    })
  }

  function batal() {
    $("#tambah").removeClass('d-none');
    $("#edit").addClass('d-none');
  }

  $(document).ready(function () {
    $('#addJabatan').click(function () {
      let jabatan = $('#tambahJabatan').val().trim();

      if (jabatan == "") {
        Swal.fire('Ooops!', 'Form jabatan harap diisi!', 'error');
      } else {
        $.ajax({
          url: "./ajax/jabatan.php?act=post",
          type: "post",
          data: {jabatan: jabatan},
          success: function (response) {
            Swal.fire({
              title: 'Harap tunggu!',
              timer: 2000,
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading()
              },
              willClose: () => {
                if (response == 1) {
                  loadJabatan();
                  $('#tambahJabatan').val('');
                  Swal.fire('Wooww', 'Data anda berhasil ditambah!', 'success');
                } else {
                  Swal.fire('Ooops!', 'Data anda gagal ditambah!', 'error');
                }
              }
            })
          }
        });
      }
    });

    $("body").on('click', '#editBtn', function () {
      $("#edit").removeClass('d-none');
      $("#tambah").addClass('d-none');

      let idValue = $(this).data('id');
      let jabatanValue = $(this).data('value');

      $("#editId").val(idValue);
      $("#editJabatan").val(jabatanValue);
    })

    $("#updateJabatan").click(function () {
      let id = $('#editId').val().trim();
      let jabatan = $('#editJabatan').val().trim();

      if (jabatan == "" && id == "") {
        Swal.fire('Ooops!', 'Form harap diisi!', 'error');
      } else if (jabatan == "") {
        Swal.fire('Ooops!', 'Form jabatan harap diisi!', 'error');
      } else if (id == "") {
        Swal.fire('Ooops!', 'Form id harap diisi!', 'error');
      } else {
        $.ajax({
          url: "./ajax/jabatan.php?act=update",
          type: "post",
          data: {id: id, jabatan: jabatan},
          success: function (response) {
            Swal.fire({
              title: 'Harap tunggu!',
              timer: 2000,
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading()
              },
              willClose: () => {
                if (response == 1) {
                  loadJabatan();
                  $("#tambah").removeClass('d-none');
                  $("#edit").addClass('d-none');
                  Swal.fire('Wooww', 'Data anda berhasil disimpan!', 'success');
                } else {
                  Swal.fire('Ooops!', 'Data anda gagal disimpan!', 'error');
                }
              }
            })
          }
        });
      }
    })
  })
</script>
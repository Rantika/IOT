<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Kendaraan</h1>
  </div>
  <div class="row">
    <div class="col-md-5 form-group">
      <input type="date" id="tglm" class="form-control">
    </div>
    <div class="col-md-5 form-group">
      <input type="date" id="tgls" class="form-control">
    </div>
    <div class="col-md form-group">
      <button class="btn btn-primary form-control" id="cek">Cek</button>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered table-hover" id="dataTable">
      <thead>
        <tr>
          <th>No.</th>
          <th>No Unik</th>
          <th>Tanggal</th>
          <th>Waktu</th>
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
      url: "./pages/ajax/kendaraan.php",
      type: "get",
      success: function (data) {
        $("tbody").html(data)
      }
    });
  }

  document.addEventListener("DOMContentLoaded", function() {
    loadKendaraan();
  })

  $(document).ready(function() {
    $("body").on("click", "#cek", function() {
      let tglm = $('#tglm').val().trim();
      let tgls = $('#tgls').val().trim();

      if (tglm == "" || tgls == "") {
        
      } else {
        $.ajax({
          url: "./pages/ajax/kendaraan.php",
          type: "post",
          data: {
            tglm: tglm,
            tgls: tgls
          },
          success: function (data) {
            $("tbody").html(data)
          }
        })
      }
    })
  })
</script>
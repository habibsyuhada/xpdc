<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Table List</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <input type="hidden" name="id_zone_list" value="<?= $id_zone ?>">
                <div id="load_table"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="myModalLabel">Edit Table Rate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="fetch_data"></div>
    </div>
  </div>
</div>
<script>
  load_table();
  var loading = `<h4 class="font-weight-bold text-center"><i class="fa fa-spinner fa-spin"></i> Loading</h4>`;
  $("#load_table").html(loading);

  $('#myModal').on('shown.bs.modal', function(e) {
    $("#myModal").css("display", "block");
    var id = $(e.relatedTarget).data('id');
    $.ajax({
      type: 'POST',
      url: "<?= base_url() ?>zone/edit_table_rate",
      data: {
        id: id
      }
    }).done(function(msg) {
      $('#fetch_data').html(msg);
    })
  });

  function load_table() {
    var id = $("input[name=id_zone_list]").val();
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>zone/load_table_rate",
      data: {
        id_zone: id
      }
    }).done(function(msg) {
      $("#load_table").html(msg);
    });
  }
</script>
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
                            <div class="col">
                                <div class="form-group">
                                    <label>Type of Shipment</label>
                                    <input type="hidden" name="id_branch" value="<?= $id_branch ?>">
                                    <select class="form-control" name="type_of_shipment" required>
                                        <option value="International">International Shipping</option>
                                        <option value="Domestic">Domestic Shipping</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Type of Mode</label>
                                    <select class="form-control" name="type_of_mode" required>
                                        <option value="Land Shipping">Land Shipping</option>
                                        <option value="Air Freight">Air Freight</option>
                                        <option value="Sea Transport">Sea Transport</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col d-none" id="detail_of_mode">

                            </div>
                            <div class="col">
                                <label>Zone</label>
                                <select class="form-control select2" name="zone" required>
                                    <?php foreach ($zone as $row) : ?>
                                        <option value="<?= $row['zone_name'] ?>"><?= $row['zone_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col">
                                <label>Sub Zone</label>
                                <select class="form-control select2" name="subzone" required>
                                    <option value="">All</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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

    $('#myModal').on('shown.bs.modal', function(e) {
        $("#myModal").css("display", "block");
        var id = $(e.relatedTarget).data('id');
        $.ajax({
            type: 'POST',
            url: "<?= base_url() ?>branch/edit_table_rate",
            data: {
                id: id
            }
        }).done(function(msg) {
            $('#fetch_data').html(msg);
        })
    });

    $(".select2").select2();

    $("select[name=type_of_shipment]").change(function() {
        load_table();
    });
    $("select[name=type_of_mode]").change(function() {
        load_table();
    });
    $("select[name=zone]").change(function() {
        load_table();
    });
    $("select[name=subzone]").change(function() {
        load_table();
    });

    function load_table() {
        var loading = `<h4 class="font-weight-bold text-center"><i class="fa fa-spinner fa-spin"></i> Loading</h4>`;
        $("#load_table").html(loading);
        var type_of_shipment = $("select[name=type_of_shipment]").val();
        var type_of_mode = $("select[name=type_of_mode]").val();
        var zone = $("select[name=zone]").val();
        var subzone = $("select[name=subzone]").val();
        var id = $("input[name=id_branch]").val();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>branch/load_table_rate",
            data: {
                id_branch: id,
                type_of_shipment, type_of_shipment,
                type_of_mode: type_of_mode,
                zone: zone,
                subzone: subzone
            }
        }).done(function(msg) {
            $("#load_table").html(msg);
        });
    }
</script>
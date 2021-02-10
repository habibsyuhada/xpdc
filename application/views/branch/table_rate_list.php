<div class="main-content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Table List</h3>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="international-tab" data-toggle="tab" href="#international" role="tab" aria-controls="international" aria-selected="true">International Table Rate</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="domestic-tab" data-toggle="tab" href="#domestic" role="tab" aria-controls="domestic" aria-selected="false">Domestic Table Rate</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="international" role="tabpanel" aria-labelledby="international-tab">
                                <br>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-upload"></i> Upload Excel
                                </button>
                                <a href="<?= base_url() ?>branch/download_table_rate/<?= $id_branch ?>" class="btn btn-warning"><i class="fa fa-download"></i> Download Excel</a>
                                <br>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <form action="<?= base_url() ?>branch/upload_table_rate/<?= $id_branch ?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Upload Excel</label>
                                                <input type="file" class="form-control-file" name="upload_excel" accept=".csv" required />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Type of Mode</label>
                                            <input type="hidden" name="id_branch" value="<?= $id_branch ?>">
                                            <select class="form-control" name="type_of_mode" required>
                                                <option value="Land Shipping">Land Shipping</option>
                                                <option value="Air Freight - Express">Air Freight - Express</option>
                                                <option value="Air Freight - Reguler">Air Freight - Reguler</option>
                                                <option value="Sea Transport - LCL">Sea Transport - LCL</option>
                                                <option value="Sea Transport - FCL">Sea Transport - FCL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col d-none" id="detail_of_mode">

                                    </div>
                                    <div class="col">
                                        <label>Zone</label>
                                        <select class="form-control select2" name="zone" required>
                                            <?php foreach ($zone as $row) : ?>
                                                <option value="<?= $row['zone_name'] ?>" data-id="<?= $row['id'] ?>"><?= $row['zone_name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label>Sub Zone</label>
                                        <select class="form-control select2" name="subzone" id="subzone" required>
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
                            <div class="tab-pane fade" id="domestic" role="tabpanel" aria-labelledby="domestic-tab">
                                <br>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDomestic" aria-expanded="false" aria-controls="collapseDomestic">
                                    <i class="fa fa-upload"></i> Upload Excel
                                </button>
                                <a href="<?= base_url() ?>branch/download_table_rate_domestic/<?= $id_branch ?>" class="btn btn-warning"><i class="fa fa-download"></i> Download Excel</a>
                                <br>
                                <div class="collapse" id="collapseDomestic">
                                    <div class="card card-body">
                                        <form action="<?= base_url() ?>branch/upload_table_rate_domestic/<?= $id_branch ?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Upload Excel</label>
                                                <input type="file" class="form-control-file" name="upload_excel" accept=".csv" required />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="load_table_domestic"></div>
                                    </div>
                                </div>
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
<!-- Modal -->
<div class="modal fade" id="myModalDomestic" tabindex="-1" role="dialog" aria-labelledby="myModalDomesticLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="myModalDomesticLabel">Edit Table Rate Domestic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="fetch_data_domestic"></div>
        </div>
    </div>
</div>
<script>
    load_table();
    load_table_domestic();
    subzone_unit();

    $('#myModalDomestic').on('shown.bs.modal', function(e) {
        $("#myModalDomestic").css("display", "block");
        var id = $(e.relatedTarget).data('id');
        $.ajax({
            type: 'POST',
            url: "<?= base_url() ?>branch/edit_table_rate_domestic",
            data: {
                id: id
            }
        }).done(function(msg) {
            $('#fetch_data_domestic').html(msg);
        })
    });

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

    $("select[name=type_of_mode]").change(function() {
        load_table();
    });
    $("select[name=zone]").change(function() {
        load_table();
        subzone_unit();
    });
    $("select[name=subzone]").change(function() {
        load_table();
    });

    function load_table() {
        var loading = `<h4 class="font-weight-bold text-center"><i class="fa fa-spinner fa-spin"></i> Loading</h4>`;
        $("#load_table").html(loading);
        var type_of_mode = $("select[name=type_of_mode]").val();
        var zone = $("select[name=zone]").val();
        var subzone = $("select[name=subzone]").val();
        var id = $("input[name=id_branch]").val();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>branch/load_table_rate",
            data: {
                id_branch: id,
                type_of_mode: type_of_mode,
                zone: zone,
                subzone: subzone
            }
        }).done(function(msg) {
            $("#load_table").html(msg);
        });
    }

    function load_table_domestic() {
        var loading = `<h4 class="font-weight-bold text-center"><i class="fa fa-spinner fa-spin"></i> Loading</h4>`;
        $("#load_table_domestic").html(loading);
        var id = $("input[name=id_branch]").val();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>branch/load_table_rate_domestic",
            data: {
                id_branch: id
            }
        }).done(function(msg) {
            $("#load_table_domestic").html(msg);
        });
    }

    function subzone_unit() {

        var zone = $("select[name='zone'] option:selected").data('id');
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>branch/load_subzone",
            data: {
                zone: zone
            }
        }).done(function(msg) {
            var array = JSON.parse(msg);
            $('#subzone option:gt(0)').remove();
            $.each(array, function(index, value) {
                $("select[name='subzone']").append($("<option></option>")
                    .attr("value", value['sub_zone']).text(value['sub_zone']));
            });
        });
    }
</script>
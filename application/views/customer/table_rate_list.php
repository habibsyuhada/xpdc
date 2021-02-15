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
                            <input type="hidden" name="id_customer" value="<?= $id_customer ?>">
                            <div class="tab-pane fade show active" id="international" role="tabpanel" aria-labelledby="international-tab">
                                <br>
                                <div class="row">
                                    <?php if ($status_branch == '1') { ?>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Branch</label>
                                                <select class="form-control" name="branch" required>
                                                    <?php foreach ($branch as $row) { ?>
                                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Type of Mode</label>
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
                                <?php if ($status_branch == '1') { ?>
                                    <br>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Branch</label>
                                            <select class="form-control" name="branch_domestic" required>
                                                <?php foreach ($branch as $row) { ?>
                                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php } ?>
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
<script>
    load_table();
    load_table_domestic();
    subzone_unit();

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
    <?php if ($status_branch == '1') { ?>
        $("select[name=branch]").change(function() {
            load_table();
        });
        $("select[name=branch_domestic]").change(function() {
            load_table_domestic();
        });
    <?php } ?>

    function load_table() {
        var loading = `<h4 class="font-weight-bold text-center"><i class="fa fa-spinner fa-spin"></i> Loading</h4>`;
        $("#load_table").html(loading);
        var type_of_mode = $("select[name=type_of_mode]").val();
        var zone = $("select[name=zone]").val();
        var subzone = $("select[name=subzone]").val();
        var id = $("input[name=id_customer]").val();
        <?php if ($status_branch == '1') { ?>
            var branch = $("select[name=branch]").val();
        <?php } ?>
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>customer/load_table_rate",
            data: {
                id_customer: id,
                type_of_mode: type_of_mode,
                zone: zone,
                subzone: subzone,
                <?php if ($status_branch == '1') { ?>
                    branch: branch
                <?php } ?>
            }
        }).done(function(msg) {
            $("#load_table").html(msg);
        });
    }

    function load_table_domestic() {
        var loading = `<h4 class="font-weight-bold text-center"><i class="fa fa-spinner fa-spin"></i> Loading</h4>`;
        $("#load_table_domestic").html(loading);
        var id = $("input[name=id_customer]").val();
        <?php if ($status_branch == '1') { ?>
            var branch = $("select[name=branch_domestic]").val();
        <?php } ?>
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>customer/load_table_rate_domestic",
            data: {
                id_customer: id,
                <?php if ($status_branch == '1') { ?>
                    branch: branch
                <?php } ?>
            }
        }).done(function(msg) {
            $("#load_table_domestic").html(msg);
        });
    }

    function subzone_unit() {

        var zone = $("select[name='zone'] option:selected").data('id');
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>customer/load_subzone",
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
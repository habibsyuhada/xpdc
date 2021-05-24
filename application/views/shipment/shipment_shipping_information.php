<form id="modalSubmit" action="<?php echo base_url(); ?>shipment/shipment_shipping_information_process" method="POST" class="forms-sample" enctype="multipart/form-data">
    <div class="modal-body">
        <input type="hidden" name="id" value="<?php echo $shipment['id'] ?>">
        <input type="hidden" name="tracking_no" value="<?php echo $shipment['tracking_no'] ?>">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <hr class="mt-0">
                        <p class="m-0 text-center">Shipment Number</p>
                        <h1 class="font-weight-bold m-0 text-center"><?php echo $shipment['tracking_no'] ?></h1>
                        <hr class="mb-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">Main Agent</h6>
                                <!-- <div class="form-group">
                    <label>Agent Name</label>
                    <input type="text" class="form-control" name="main_agent_name" placeholder="Main Agent Name" value="<?= $shipment['main_agent_name'] ?>">
                  </div> -->
                                <div class="form-group">
                                    <label>Agent Name</label>
                                    <select class="form-control select2" name="main_agent_name">
                                        <option value="">- Select One -</option>
                                        <?php foreach ($agent_list as $data) { ?>
                                            <option value="<?= $data['name'] ?>" <?php echo ($shipment['main_agent_name'] == $data['name'] ? 'selected' : '') ?>><?= $data['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>MAWB / MBL</label>
                                    <input type="text" class="form-control" name="main_agent_mawb_mbl" placeholder="MAWB / MBL" value="<?= $shipment['main_agent_mawb_mbl'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>MAWB / MBL Attachment</label>
                                    <input type="file" name="main_agent_mawb_mbl_atc" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                                        </span>
                                    </div>
                                    <?php if ($shipment['main_agent_mawb_mbl_atc'] != "") : ?>
                                        <!-- <img height="150px" src="<?php echo base_url() . "file/agent/" . $shipment['main_agent_mawb_mbl_atc'] ?>"> -->
                                        <a href="<?php echo base_url() . "file/agent/" . $shipment['main_agent_mawb_mbl_atc'] ?>" target="_blank" class="btn btn-danger btn-flat">Atc</a>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Carrier</label>
                                    <input type="text" class="form-control" name="main_agent_carrier" placeholder="Carrier" value="<?= $shipment['main_agent_carrier'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Voyage/Flight No.</label>
                                    <input type="text" class="form-control" name="main_agent_voyage_flight_no" placeholder="Voyage/Flight No." value="<?= $shipment['main_agent_voyage_flight_no'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Voyage/Flight Date</label>
                                    <input type="date" class="form-control" name="main_agent_voyage_flight_date" placeholder="Voyage/Flight Date" value="<?= @$shipment['main_agent_voyage_flight_date'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Port of Loading</label>
                                    <input type="text" class="form-control" name="main_agent_port_of_loading" placeholder="Port of Loading" value="<?= $shipment['main_agent_port_of_loading'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Port of Discharge</label>
                                    <input type="text" class="form-control" name="main_agent_port_of_discharge" placeholder="Port of Discharge" value="<?= $shipment['main_agent_port_of_discharge'] ?>">
                                </div>
                                <!-- <div class="form-group">
                    <label>Cost</label>
                    <input type="number" class="form-control" name="main_agent_cost" placeholder="Cost" value="<?= @$shipment['main_agent_cost'] ?>">
                  </div> -->
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">Secondary Agent</h6>
                                <!-- <div class="form-group">
                    <label>Agent Name</label>
                    <input type="text" class="form-control" name="secondary_agent_name" placeholder="Secondary Agent Name" value="<?= $shipment['secondary_agent_name'] ?>">
                  </div> -->
                                <div class="form-group">
                                    <label>Agent Name</label>
                                    <select class="form-control select2" name="secondary_agent_name">
                                        <option value="">- Select One -</option>
                                        <?php foreach ($agent_list as $data) { ?>
                                            <option value="<?= $data['name'] ?>" <?php echo ($shipment['secondary_agent_name'] == $data['name'] ? 'selected' : '') ?>><?= $data['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>MAWB / MBL</label>
                                    <input type="text" class="form-control" name="secondary_agent_mawb_mbl" placeholder="MAWB / MBL" value="<?= $shipment['secondary_agent_mawb_mbl'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>MAWB / MBL Attachment</label>
                                    <input type="file" name="secondary_agent_mawb_mbl_atc" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                                        </span>
                                    </div>
                                    <?php if ($shipment['secondary_agent_mawb_mbl_atc'] != "") : ?>
                                        <!-- <img height="150px" src="<?php echo base_url() . "file/agent/" . $shipment['secondary_agent_mawb_mbl_atc'] ?>"> -->
                                        <a href="<?php echo base_url() . "file/agent/" . $shipment['secondary_agent_mawb_mbl_atc'] ?>" target="_blank" class="btn btn-danger btn-flat">Atc</a>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Carrier</label>
                                    <input type="text" class="form-control" name="secondary_agent_carrier" placeholder="Carrier" value="<?= $shipment['secondary_agent_carrier'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Voyage/Flight No.</label>
                                    <input type="text" class="form-control" name="secondary_agent_voyage_flight_no" placeholder="Voyage/Flight No." value="<?= $shipment['secondary_agent_voyage_flight_no'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Voyage/Flight Date</label>
                                    <input type="date" class="form-control" name="secondary_agent_voyage_flight_date" placeholder="Voyage/Flight No." value="<?= @$shipment['secondary_agent_voyage_flight_date'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Port of Loading</label>
                                    <input type="text" class="form-control" name="secondary_agent_port_of_loading" placeholder="Port of Loading" value="<?= $shipment['secondary_agent_port_of_loading'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Port of Discharge</label>
                                    <input type="text" class="form-control" name="secondary_agent_port_of_discharge" placeholder="Port of Discharge" value="<?= $shipment['secondary_agent_port_of_discharge'] ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                                <h6 class="font-weight-bold">Assign Shipment</h6>
                                <div class="form-group">
                                    <label>Branch</label>
                                    <select class="form-control" name="assign_branch">
                                        <option value="">-- Select One --</option>
                                        <?php foreach ($branch_list as $key => $value) : ?>
                                            <option value="<?php echo $key ?>" <?php echo (@$shipment['assign_branch'] == $key ? 'selected' : '') ?>><?php echo $key ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="mt-2 row">
                            <div class="text-left col-6">
                                <!-- <span class="btn btn-danger previous-tab">Back</span> -->
                            </div>
                            <div class="text-right col-6">
                                <!-- <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')">Submit</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')">Submit</button>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
    </div>
</form>
<script type="text/javascript">
    var input_invalid = 0;

    $("form#modalSubmit").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        input_invalid = 0;
        $('button[name=submit]').attr('disabled', true);
        $('#scan_loading').removeClass('d-none');
        var url = $('#modalSubmit').attr('action');
        // console.log($("#modalSubmit, #form_history").serialize());
        $.ajax({
            type: "POST",
            url: url,
            data: $("#form_history, #modalSubmit").serialize(), // serializes the form's elements.
            success: function(data) {
                $('input[name=tracking_no]').val('');
                if (data.includes('Error') == true) {
                    showDangerToast(data);
                } else {
                    data = JSON.parse(data);
                    <?php if ($pages == 'shipment_history_update') { ?>
                        num_scanned++;
                        markup = "<tr>" +
                            "<td>" + num_scanned + "</td>" +
                            "<td>" + data.tracking_no + "</td>" +
                            "<td>" + data.date + "</td>" +
                            "<td>" + data.time + "</td>" +
                            "<td>" + data.location + "</td>" +
                            "<td>" + data.status + "</td>" +
                            "<td>" + data.remarks + "</td>" +
                            "<tr>";
                        $("#table_history tbody").prepend(markup);
                        showSuccessToast('Your Data has been submitted!');
                    <?php } else if ($pages == 'shipment_track') { ?>
                        var btn = '<a class="btn btn-danger btn-sm" onclick="return confirm(`Are you sure?`)" href="<?= base_url() ?>shipment/shipment_history_delete_db/' + data.id + '/' + data.id_shipment + '"><i class="fa fa-trash"></i></a>'

                        // var table = $('#example').DataTable();

                        var rowNode = $('#table_history').DataTable()
                            .row.add([data.date, data.time, data.location, data.status, data.remarks, btn])
                            .draw()
                            .node();

                        $(rowNode)
                            .css('color', 'red')
                            .animate({
                                color: 'black'
                            });
                        $('#form_history').trigger("reset");
                        showSuccessToast('Your Data has been submitted!');
                    <?php } ?>
                }
                $('button[name=submit]').attr('disabled', false);
                $('#scan_loading').addClass('d-none');
                $("#fetch_ship_info").html("");
                $("#shipInfoModal").modal('hide');
            }
        });
    });

    $("form#modalSubmit input").on("invalid", function() {
        if (input_invalid < 1) {
            var element = $(this).closest('.tab-pane').attr('id');
            $('#' + element + '-tab').trigger('click');
            input_invalid = 1;
        }
    });

    $(".select2").select2({
        theme: "bootstrap4"
    });
</script>
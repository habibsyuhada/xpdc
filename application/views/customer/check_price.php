<div class="main-content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Check Price</h3>
                    </div>
                    <div class="card-body">
                        <form id='formData' method="POST">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control select2" name="country" onchange="select_country(this)" required>
                                            <option value="">- Select One -</option>
                                            <?php foreach ($country as $value) { ?>
                                                <option value="<?= $value['country'] ?>"><?= $value['country'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total Weight</label>
                                        <input type="number" class="form-control" name="weight" placeholder="Total Weight" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Action</label><br>
                                    <button type="submit" name="btn_action" class="btn btn-warning"><i class="fa fa-search"></i> Calculate</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="load_price"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#formData").submit(function(e) {
        e.preventDefault();
        var loading = `<h4 class="font-weight-bold text-center"><i class="fa fa-spinner fa-spin"></i> Waiting to Calculate Price</h4>`;
        $("#load_price").html(loading);
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>customer/check_price_process",
            data: $("#formData").serialize()
        }).done(function(resp) {
            $("#load_price").html(resp);
        });
    });

    $(".select2").select2();

    function select_country(input) {
        var select_city = $("[name=city]");
        var name_city = "city";
        $.ajax({
            url: "<?php echo base_url() ?>country/city_autocomplete",
            dataType: "json",
            data: {
                country: $(input).val(),
            },
            success: function(data) {
                console.log(data);
                var content = $(select_city).parent();
                $("select[name=" + name_city + "]").select2("destroy");
                $(select_city).remove();
                if (data.length > 0) {
                    var html = '<select class="form-control select2" name="' + name_city + '" required>';
                    $.each(data, function(index, value) {
                        html += "<option value='" + value + "'>" + value + "</option>";
                    });
                    html += "</select>";
                    $(content).append(html);
                    $("[name=" + name_city + "]").select2({
                        theme: "bootstrap4"
                    });
                } else {
                    var html = '<input type="text" class="form-control" name="' + name_city + '" placeholder="City">';
                    $(content).append(html);
                }
            }
        });
    }
</script>
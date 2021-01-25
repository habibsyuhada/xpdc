<div class="main-content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Sub Zone List</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-warning"><i class="fa fa-plus"></i> Tambah Data</button>
                                </div>
                                <table class="table data_table">
                                    <thead>
                                        <tr class="bg-info">
                                            <th class="text-white font-weight-bold">Sub Zone</th>
                                            <th class="text-white font-weight-bold">City</th>
                                            <th class="text-white font-weight-bold"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sub_zone as $key => $value) : ?>
                                            <tr>
                                                <td><?php echo $value['sub_zone'] ?></td>
                                                <td><?php echo $value['city'] ?></td>
                                                <td>
                                                    <button type="button" data-toggle="modal" data-target="#editModal" data-id="<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></button>
                                                    <a href="<?php echo base_url() ?>zone/subzone_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Sub Zone</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAdd" action="<?= base_url() ?>zone/subzone_create_process" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Sub Zone</label>
                        <input type="hidden" name="id_zone" value="<?= $id_zone ?>" />
                        <input type="text" class="form-control" name="sub_zone" placeholder="Sub Zone" required />
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <select class="form-control select2" name="city[]" id="city" multiple>
                            <?php foreach ($city as $data) : ?>
                                <option value="<?= $data['city'] ?>"><?= $data['city'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Tambah Sub Zone</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="fetch_data"></div>
        </div>
    </div>
</div>
<script>
    $('#editModal').on('shown.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $.ajax({
            type: 'POST',
            url: "<?= base_url() ?>zone/subzone_update/" + id
        }).done(function(msg) {
            $('#fetch_data').html(msg);
        })
    });

    $(".select2").select2();
</script>
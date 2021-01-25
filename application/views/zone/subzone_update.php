<form id="formAdd" action="<?= base_url() ?>zone/subzone_update_process/<?= $subzone_list['id'] ?>" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label>Sub Zone</label>
            <input type="hidden" name="id_zone" value="<?= $subzone_list['id_zone'] ?>" />
            <input type="text" class="form-control" name="sub_zone" placeholder="Sub Zone" value="<?= $subzone_list['sub_zone'] ?>" required />
        </div>
        <div class="form-group">
            <label>City</label>
            <select class="form-control select2" name="city[]" id="city" multiple>
                <?php foreach ($city as $data) : ?>
                    <option value="<?= $data['city'] ?>" <?= (in_array($data['city'], $cities)) ? 'selected' : ''; ?>><?= $data['city'] ?></option>
                <?php endforeach; ?>
            </select>
            <small class="text-danger"></small>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>
<script>
    $(".select2").select2();
</script>
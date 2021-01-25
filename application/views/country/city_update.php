<form action="<?= base_url() ?>country/city_update_process/<?=$city_list['id']?>" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label>City</label>
            <input type="text" class="form-control" name="city" placeholder="City" value="<?= $city_list['city'] ?>" required />
        </div>
        <div class="form-group">
            <label>City Code</label>
            <input type="text" class="form-control" name="city_code" placeholder="City Code" value="<?= $city_list['city_code'] ?>" required />
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>
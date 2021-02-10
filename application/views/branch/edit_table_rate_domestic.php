<form action="<?= base_url() ?>branch/table_rate_domestic_update_process/<?= $table_rate['id'] ?>" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label>City</label>
            <select class="form-control select2" name="city" required>
                <?php foreach ($city as $value) { ?>
                    <option value="<?=$value['city']?>" <?=($value['city'] == $table_rate['city']) ? 'selected' : '';?>><?=$value['city']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Airfreight / Kg</label>
            <input type="text" class="form-control" name="airfreight_price_kg" placeholder="Airfreight / Kg" value="<?= $table_rate['airfreight_price_kg'] ?>" required />
        </div>
        <div class="form-group">
            <label>Airfreight Term</label>
            <input type="text" class="form-control" name="airfreight_term" placeholder="Airfreight Term" value="<?= $table_rate['airfreight_term'] ?>" required />
        </div>
        <div class="form-group">
            <label>Landfreight / Kg</label>
            <input type="text" class="form-control" name="landfreight_price_kg" placeholder="Landfreight / Kg" value="<?= $table_rate['landfreight_price_kg'] ?>" required />
        </div>
        <div class="form-group">
            <label>Landfreight Term</label>
            <input type="text" class="form-control" name="landfreight_term" placeholder="Landfreight Term" value="<?= $table_rate['landfreight_term'] ?>" required />
        </div>
        <div class="form-group">
            <label>Seafreight / Kg</label>
            <input type="text" class="form-control" name="seafreight_price_kg" placeholder="Seafreight / Kg" value="<?= $table_rate['seafreight_price_kg'] ?>" required />
        </div>
        <div class="form-group">
            <label>Seafreight Term</label>
            <input type="text" class="form-control" name="seafreight_term" placeholder="Seafreight Term" value="<?= $table_rate['seafreight_term'] ?>" required />
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>
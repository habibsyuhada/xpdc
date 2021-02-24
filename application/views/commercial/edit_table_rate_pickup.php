<form action="<?= base_url() ?>commercial/table_rate_pickup_update_process/<?= $table_rate['id'] ?>" method="POST">
    <div class="modal-body">
        <input type="hidden" name="rate_type" value="<?=$table_rate['rate_type']?>" />
        <div class="form-group">
            <label>City</label>
            <select class="form-control select2" name="city" required>
                <option value="">- Select One -</option>
                <?php foreach ($city as $value) { ?>
                    <option value="<?= $value['city'] ?>" <?=($value['city'] == $table_rate['city']) ? 'selected' : '';?>><?= $value['city'] ?></option>
                <?php } ?>
            </select>
        </div>
        <?php if ($table_rate['rate_type'] == 'multiply rate') { ?>
            <div class="form-group">
                <label>Min. Value</label>
                <input type="text" class="form-control" name="min_value" placeholder="Min. Value" value="<?= $table_rate['min_value'] ?>" required />
            </div>
            <div class="form-group">
                <label>Max. Value</label>
                <input type="text" class="form-control" name="max_value" placeholder="Max. Value" value="<?= $table_rate['max_value'] ?>" required />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" name="price" placeholder="Price" value="<?= $table_rate['price'] ?>" required />
            </div>
        <?php } else if ($table_rate['rate_type'] == 'fix rate') { ?>
            <div class="form-group">
                <label>Value</label>
                <input type="text" class="form-control" name="default_value" placeholder="Value" value="<?= $table_rate['default_value'] ?>" required />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" name="price" placeholder="Price" value="<?= $table_rate['price'] ?>" required />
            </div>
        <?php } ?>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>
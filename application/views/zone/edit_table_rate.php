<form action="<?= base_url() ?>zone/table_rate_update_process/<?= $table_rate['id'] ?>" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label>Type of Mode</label>
            <select class="form-control" name="type_of_mode" required>
                <option value="">- Select One -</option>
                <option value="Sea Transport" <?=($table_rate['type_of_mode'] == 'Sea Transport') ? 'selected' : '';?>>Sea Transport</option>
                <option value="Land Shipping" <?=($table_rate['type_of_mode'] == 'Land Shipping') ? 'selected' : '';?>>Land Shipping</option>
                <option value="Air Freight" <?=($table_rate['type_of_mode'] == 'Air Freight') ? 'selected' : '';?>>Air Freight</option>
            </select>
        </div>
        <div class="form-group">
            <label>Rate Type</label>
            <select class="form-control" name="rate_type" required>
                <option value="">- Select One -</option>
                <option value="fix rate" <?=($table_rate['rate_type'] == 'fix rate') ? 'selected' : '';?>>Fix Rate</option>
                <option value="multiply rate" <?=($table_rate['rate_type'] == 'multiply rate') ? 'selected' : '';?>>Multiply Rate</option>
            </select>
        </div>
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
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>
<div class="main-content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Restore</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>user/restore_db_process" onsubmit="return confirm('Are you sure want to restore database?')" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Restore Database</label>
                                <input type="file" class="form-control-file" name="restore" required />
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-database"></i> Restore Database</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                <a href="#" class="btn btn-warning"><i class="fa fa-plus"></i> </a>
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
                                                    <a href="<?php echo base_url() ?>zone/subzone_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
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
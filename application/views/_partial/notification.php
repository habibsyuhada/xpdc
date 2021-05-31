<div class="dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span class="badge bg-danger"><?= count($history) ?></span></a>
    <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown" style="overflow: auto; width: 100%; max-height: 500px;">
        <h4 class="header">Notifications</h4>
        <div class="notifications-wrap">
            <?php foreach ($history as $row) { ?>
                <a href="<?=base_url()?>shipment/shipment_list?tracking_no[]=<?=$row['tracking_no']?>" class="media">
                    <span class="d-flex">
                        <i class="ik ik-info"></i>
                    </span>
                    <span class="media-body">
                        <span class="heading-font-family media-heading"><?=$row['tracking_no']?></span>
                        <span class="media-content">No Activity in <?= $row['remain_day']?> Day</span>
                    </span>
                </a>
            <?php } ?>
            <!-- <a href="#" class="media">
                <span class="d-flex">
                    <i class="ik ik-calendar"></i>
                </span>
                <span class="media-body">
                    <span class="heading-font-family media-heading">To Do</span>
                    <span class="media-content">Meeting with Nathan on Friday 8 AM ...</span>
                </span>
            </a> -->
        </div>
        <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
    </div>
</div>
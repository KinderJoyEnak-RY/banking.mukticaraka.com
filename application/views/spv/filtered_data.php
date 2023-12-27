<?php if (isset($filtered_totals) && is_array($filtered_totals)) : ?>
    <div class="row">
        <?php foreach ($filtered_totals as $bank => $total) : ?>
            <div class="col-md-4">
                <div class="info-box mb-3 bg-info">
                    <span class="info-box-icon"><i class="fas fa-piggy-bank"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><?= ucfirst($bank); ?> (Filtered)</span>
                        <span class="info-box-number"><?= $total; ?> data</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        <?php endforeach; ?>
    </div>
    <!-- /.row -->
<?php endif; ?>
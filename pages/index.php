<?php
onlyAuth();
?>
<?= component('widget_info') ?>
<div class="row">
    <div class="col-md-12 col-lg-12 ">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Chart</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <div class="row">
                    <?= component('chart/bar_chart') ?>
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
</div><!--end row-->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Stock History</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">

                <?= component('stock_history/tableStockHistory') ?>

            </div>
        </div>
    </div> <!-- end col -->
</div>
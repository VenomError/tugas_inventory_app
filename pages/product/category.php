<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Category</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                        <div class="row g-2">

                            <div class="col-auto">
                                <button type="button" class="btn btn-primary" id="createButton"><i class="fa-solid fa-plus me-1"></i> Add Category</button>
                            </div><!--end col-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">

                <?= component('category/tableCategory') ?>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<?= component('category/create') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Products</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                        <form class="row g-2">
                            <div class="col-auto">
                                <a class="btn bg-primary-subtle text-primary dropdown-toggle d-flex align-items-center arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" data-bs-auto-close="outside">
                                    <i class="iconoir-filter-alt me-1"></i> Filter
                                </a>
                                <div class="dropdown-menu dropdown-menu-start">
                                    <div class="p-2">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" checked="" id="filter-all">
                                            <label class="form-check-label" for="filter-all">
                                                All
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" checked="" id="filter-one">
                                            <label class="form-check-label" for="filter-one">
                                                Fashion
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" checked="" id="filter-two">
                                            <label class="form-check-label" for="filter-two">
                                                Plants
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" checked="" id="filter-three">
                                            <label class="form-check-label" for="filter-three">
                                                Toys
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" checked="" id="filter-four">
                                            <label class="form-check-label" for="filter-four">
                                                Gadgets
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" checked="" id="filter-five">
                                            <label class="form-check-label" for="filter-five">
                                                Food
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" checked="" id="filter-six">
                                            <label class="form-check-label" for="filter-six">
                                                Drinks
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-auto">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProductModal"><i class="fa-solid fa-plus me-1"></i> Add Product</button>
                            </div><!--end col-->
                        </form>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">

                <?= component('product/tableProduct') ?>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<?= component('product/create', ['id' => 'createProductModal']) ?>
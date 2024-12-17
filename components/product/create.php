<div class="modal fade" id="<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $id ?>1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title m-0 text-white" id="<?= $id ?>1">Create New Product</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="row">
                    <form class="needs-validation form" novalidate>
                        <div class="mb-2">
                            <label for="category" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">dasd</option>
                            </select>
                            <div class="invalid-feedback">
                                <small> Select Category.</small>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="category" class="form-label">Product Name</label>
                            <input type="text" class="form-control" required name="product_name" id="product_name" placeholder="Product Name">
                            <div class="invalid-feedback">
                                <small> Select Category.</small>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="category" class="form-label">Price</label>
                            <input type="text" class="form-control" required name="price" id="price" placeholder="Price">
                            <div class="invalid-feedback">
                                <small> Select Category.</small>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="category" class="form-label">Stock</label>
                            <input type="text" class="form-control" required name="stock" id="stock" placeholder="Stock">
                            <div class="invalid-feedback">
                                <small> Select Category.</small>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form><!--end form-->
                </div><!--end row-->
            </div><!--end modal-body-->
        </div><!--end modal-content-->
    </div>
</div>
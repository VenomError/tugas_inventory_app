<div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="createProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title m-0 text-white" id="createProductModalLabel">Create New Product</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="row">
                    <form class="needs-validation form" novalidate id="productForm">

                        <input type="hidden" id="productId">

                        <div class="mb-2">
                            <?php
                            $category = new Category();
                            $dataCategory = $category->all();
                            ?>
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                <?php foreach ($dataCategory as $item) : ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <small>Please select a category.</small>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" required name="product_name" id="product_name" placeholder="Product Name">
                            <div class="invalid-feedback">
                                <small>Product name is required.</small>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" required name="price" id="price" placeholder="Price">
                            <div class="invalid-feedback">
                                <small>Price is required.</small>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" required name="stock" id="stock" placeholder="Stock">
                            <div class="invalid-feedback">
                                <small>Stock is required.</small>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="saveButton">Create</button>
                    </form><!--end form-->
                </div><!--end row-->
            </div><!--end modal-body-->
        </div><!--end modal-content-->
    </div>
</div>


<!-- action -->

<script>
    $(document).ready(function() {
        // Fungsi untuk membuka modal dalam mode Create
        function openCreateModal() {
            $('#createProductModalLabel').text('Create New Product');
            $('#saveButton').text('Create');
            $('#productForm')[0].reset();
            $('#productId').val('');
            $('#createProductModal').modal('show');
        }

        // Fungsi untuk membuka modal dalam mode Edit
        function openEditModal(id, category_id, product_name, price, stock) {
            $('#createProductModalLabel').text('Edit Product');
            $('#saveButton').text('Update');
            $('#productId').val(id);
            $('#category_id').val(category_id);
            $('#product_name').val(product_name);
            $('#price').val(price);
            $('#stock').val(stock);
            $('#createProductModal').modal('show');
        }

        // Tangani submit form untuk Create dan Edit
        $('#productForm').submit(function(event) {
            event.preventDefault();

            // Validasi form
            if (!this.checkValidity()) {
                event.stopPropagation();
                $(this).addClass('was-validated');
                return;
            }

            const id = $('#productId').val().trim();
            const category_id = $('#category_id').val().trim();
            const product_name = $('#product_name').val().trim();
            const price = $('#price').val().trim();
            const stock = $('#stock').val().trim();

            const formData = {
                category_id: category_id,
                product_name: product_name,
                price: parseFloat(price),
                stock: parseInt(stock)
            };

            let url = '/request/product/create.php';
            if (id) {
                formData.id = id;
                url = '/request/product/update.php';
            }

            $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                })
                .done(function(res) {
                    if (res.status === 'success') {
                        toastr.success(res.message, 'Berhasil');
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        toastr.error(res.message, 'Gagal');
                    }
                })
                .fail(function(xhr, status, error) {
                    console.log(xhr.responseText); // Lihat respons lengkap di console
                    toastr.error('Terjadi kesalahan: ' + error, 'Error');
                })
                .always(function() {
                    $('#createProductModal').modal('hide');
                    $('#productForm')[0].reset();
                    $('#productForm').removeClass('was-validated');
                });
        });

        // Event listener untuk tombol Create
        $('#createButton').click(function() {
            openCreateModal();
        });

        // Event listener untuk tombol Edit
        $('.editButton').click(function() {
            const id = $(this).data('id');
            const category_id = $(this).data('category-id');
            const product_name = $(this).data('product-name');
            const price = $(this).data('price');
            const stock = $(this).data('stock');
            openEditModal(id, category_id, product_name, price, stock);
        });
    });
</script>
<?php
$product = new Product();

$data  = $product->all();


?>

<div class="table-responsive">
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
        <div class="datatable-container">
            <table class="table mb-0 checkbox-all datatable-table" id="tableListproduct">
                <thead>
                    <tr>
                        <th class="ps-0" data-sortable="true" style="width: 26.774483378256964%;"><button class="datatable-sorter">Code</button></th>
                        <th class="ps-0" data-sortable="true" style="width: 26.774483378256964%;"><button class="datatable-sorter">Product Name</button></th>
                        <th data-sortable="true" style="width: 11.500449236298294%;"><button class="datatable-sorter">Category</button></th>
                        <th data-sortable="true" style="width: 8.176100628930817%;"><button class="datatable-sorter">Price</button></th>
                        <th data-sortable="true" style="width: 7.457322551662174%;"><button class="datatable-sorter">Stock</button></th>
                        <th data-sortable="true" style="width: 7.457322551662174%;"><button class="datatable-sorter">Status</button></th>
                        <th data-sortable="true" style="width: 11.859838274932615%;"><button class="datatable-sorter">In Stock</button></th>
                        <th data-sortable="true" style="width: 20.21563342318059%;"><button class="datatable-sorter">Created At</button></th>
                        <th class="text-end" data-sortable="true" style="width: 9.254267744833783%;"><button class="datatable-sorter">Action</button></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $product) : ?>
                        <tr>
                            <td>
                                <span id="clipboardInput<?= $product['id'] ?>"><?= $product['id'] ?></span>
                                <button class="btn btn-secondary btn-sm " type="button" id="button-addon2" data-clipboard-action="copy" data-clipboard-target="#clipboardInput<?= $product['id'] ?>"><i class="far fa-copy "></i></button>
                            </td>
                            <td class="ps-0">
                                <p class="d-inline-block align-middle mb-0">
                                    <span class="text-info d-inline-block align-middle mb-0 product-name"><?= $product['name'] ?></span>
                                    <br>
                                </p>
                            </td>
                            <td><?= $product['category_name'] ?></td>
                            <td>Rp <?= number_format($product['price'], 2) ?></td>
                            <td><?= $product['stock'] ?></td>
                            <td><span class="badge bg-<?= statusStockColor($product['status_stock']) ?>"><?= strtoupper($product['status_stock']) ?></span></td>
                            <td>
                                <?php
                                if ($product['in_stock'] == true) {
                                    $checked = true;
                                } else {
                                    $checked = false;
                                }
                                ?>
                                <div class="form-check form-switch form-switch-success">
                                    <input class="form-check-input" type="checkbox" id="inStockSwitch" onchange="switchInStock( '<?= $product['id'] ?>',<?= $product['in_stock'] ?>)" <?= $checked ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="inStockSwitch">
                                        <?= $checked ? 'In Stock' : 'Out Stock' ?>
                                    </label>
                                </div>
                            <td>
                                <span><?= date_format(date_create($product['created_at']), 'd M, Y h:ia') ?></span>
                            </td>
                            <td class="text-end">
                                <div class="btn-group">
                                    <button class="btn editButton"
                                        data-id="<?= $product['id'] ?>"
                                        data-category-id="<?= $product['category_id'] ?>"
                                        data-product-name="<?= $product['name'] ?>"
                                        data-price="<?= $product['price'] ?>"
                                        data-stock="<?= $product['stock'] ?>"
                                        data-status-stock="<?= $product['status_stock'] ?>">
                                        <i class="las la-pen text-secondary fs-18"></i></button>
                                    <button class="btn " onclick="deleteProduct('<?= $product['id'] ?>')"><i class="las la-trash-alt text-secondary fs-18"></i></button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach;  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function switchInStock(id, in_stock) {

        const formData = {
            id: id,
            in_stock: in_stock
        };

        $.ajax({
                url: '/request/product/updateInStock.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
            })
            .done(function(res) {
                if (res.status === 'success') {
                    toastr.success(res.message, 'Berhasil');
                    setTimeout(function() {
                        location.reload();
                    }, 500);
                } else {
                    toastr.error(res.message, 'Gagal');
                }
            })
            .fail(function(xhr, status, error) {
                console.log(xhr.responseText);
                toastr.error('Terjadi kesalahan: ' + error, 'Error');
            })
    }

    function deleteProduct(id) {

        if (!confirm('Apakah Anda yakin ingin menghapus product ini?')) {
            return;
        }
        $.ajax({
                url: '/request/product/delete.php',
                type: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
            })
            .done(function(res) {
                if (res.status === 'success') {
                    toastr.success(res.message, 'Berhasil');
                    setTimeout(function() {
                        location.reload();
                    }, 500);
                } else {
                    toastr.error(res.message, 'Gagal');
                }
            })
            .fail(function(xhr, status, error) {
                console.log(xhr.responseText);
                toastr.error('Terjadi kesalahan: ' + error, 'Error');
            })
    }
</script>
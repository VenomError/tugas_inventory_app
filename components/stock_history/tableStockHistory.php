<?php
$stockHistory = new StockHistory();
$data = $stockHistory->all();
?>
<div class="table-responsive">
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
        <div class="datatable-container">
            <table class="table mb-0 checkbox-all datatable-table" id="tableListCategory">
                <thead>
                    <tr>
                        <th class="ps-0" data-sortable="true"><button class=" datatable-sorter">Product Name</button></th>
                        <th class="ps-0" data-sortable="true"><button class=" datatable-sorter">Quantity</button></th>
                        <th class="ps-0" data-sortable="true"><button class=" datatable-sorter">Type</button></th>
                        <th class="ps-0" data-sortable="true"><button class=" datatable-sorter">Receipt Date</button></th>
                        <th class="ps-0" data-sortable="true"><button class=" datatable-sorter">Created At</button></th>
                        <th class="text-end" data-sortable="true" style="width: 9.254267744833783%;"><button class="datatable-sorter">Action</button></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $stockHistory) : ?>
                        <tr>
                            <td class="ps-0">
                                <img src="assets/images/products/04.png" alt="" height="40">
                                <p class="d-inline-block align-middle mb-0">
                                    <a href="ecommerce-order-details.html" class="d-inline-block align-middle mb-0 product-name"><?= ucwords($stockHistory['product_name']) ?></a>
                                    <br>
                                </p>
                            </td>
                            <td><?= $stockHistory['quantity'] ?></td>
                            <td>
                                <span class="badge bg-<?= stockTypeColor($stockHistory['type']) ?>">
                                    <?= str_replace('_', ' ', $stockHistory['type']) ?>
                                </span>
                            </td>
                            <td><?= date_format(date_create($stockHistory['receipt_date']), 'd M,y h:ia') ?></td>
                            <td><?= date_format(date_create($stockHistory['created_at']), 'd M,y h:ia') ?></td>
                            <td class="text-end">
                                <div class="btn-group">
                                    <button class="btn editButton" data-id="<?= $stockHistory['id'] ?>"><i class="las la-pen text-secondary fs-18"></i></button>
                                    <button class="btn" onclick="deleteCategory(<?= $stockHistory['id'] ?>)">
                                        <i class="las la-trash-alt text-secondary fs-18"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function deleteCategory(id) {
        if (!confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
            return;
        }

        $.ajax({
            url: '/request/category/delete.php',
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    toastr.success(response.message, 'Berhasil');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    toastr.error(response.message, 'Gagal');
                }
            }
        });
    }
</script>
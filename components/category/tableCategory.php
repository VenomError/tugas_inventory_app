<?php
$category = new Category();
$data = $category->all();
?>
<div class="table-responsive">
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
        <div class="datatable-container">
            <table class="table mb-0 checkbox-all datatable-table" id="tableListCategory">
                <thead>
                    <tr>
                        <th class="ps-0" data-sortable="true" style="width: 26.774483378256964%;"><button class="datatable-sorter">Category Name</button></th>
                        <th class="text-end" data-sortable="true" style="width: 9.254267744833783%;"><button class="datatable-sorter">Action</button></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $category) : ?>
                        <tr>
                            <td class="ps-0">

                                <p class="d-inline-block align-middle mb-0">
                                    <span class=" text-info d-inline-block align-middle mb-0 product-name"><?= ucwords($category['name']) ?></span>
                                    <br>
                                </p>
                            </td>
                            <td class="text-end">
                                <button class="btn editButton" data-id="<?= $category['id'] ?>" data-name="<?= $category['name'] ?>"><i class="las la-pen text-secondary fs-18"></i></button>
                                <button class="btn" onclick="deleteCategory(<?= $category['id'] ?>)">
                                    <i class="las la-trash-alt text-secondary fs-18"></i>
                                </button>
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
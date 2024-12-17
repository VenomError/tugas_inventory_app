<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title m-0 text-white" id="categoryModalLabel">Create New Category</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="row">
                    <form class="needs-validation form" novalidate id="categoryForm">
                        <input type="hidden" id="categoryId"> <!-- Hidden input untuk ID kategori -->
                        <div class="mb-2">
                            <label for="category" class="form-label">Category</label>
                            <input class="form-control" type="text" id="category" placeholder="Enter Category" required>
                            <div class="invalid-feedback">
                                <small>Input Nama Category.</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="saveButton">Create</button>
                    </form><!--end form-->
                </div><!--end row-->
            </div><!--end modal-body-->
        </div><!--end modal-content-->
    </div>
</div>

<script>
    $(document).ready(function() {
        // Fungsi untuk membuka modal dalam mode Create
        function openCreateModal() {
            $('#categoryModalLabel').text('Create New Category');
            $('#saveButton').text('Create');
            $('#categoryForm')[0].reset();
            $('#categoryId').val('');
            $('#categoryModal').modal('show');
        }

        // Fungsi untuk membuka modal dalam mode Edit
        function openEditModal(id, name) {
            $('#categoryModalLabel').text('Edit Category');
            $('#saveButton').text('Update');
            $('#category').val(name);
            $('#categoryId').val(id);
            $('#categoryModal').modal('show');
        }

        // Tangani submit form untuk Create dan Edit
        $('#categoryForm').submit(function(event) {
            event.preventDefault();

            const id = $('#categoryId').val().trim();
            const name = $('#category').val().trim();

            const formData = {
                name: name
            };

            let url = '/request/category/create.php';
            if (id) {
                formData.id = id;
                url = '/request/category/update.php';
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
                    toastr.error('Terjadi kesalahan: ' + error, 'Error');
                })
                .always(function() {
                    $('#categoryModal').modal('hide');
                    $('#categoryForm')[0].reset();
                });
        });

        // Event listener untuk tombol Create
        $('#createButton').click(function() {
            openCreateModal();
        });

        // Event listener untuk tombol Edit
        $('.editButton').click(function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            openEditModal(id, name);
        });
    });
</script>
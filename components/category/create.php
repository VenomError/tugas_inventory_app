<div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createCategoryModal1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title m-0 text-white" id="createCategoryModal1">Create New Category</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="row">
                    <form class="needs-validation form" novalidate id="createProduct">
                        <div class="mb-2">
                            <label for="category" class="form-label">Category</label>
                            <input class="form-control" type="text" id="category" placeholder="Enter Category" required>
                            <div class="invalid-feedback">
                                <small> Input Nama Category.</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form><!--end form-->
                </div><!--end row-->
            </div><!--end modal-body-->
        </div><!--end modal-content-->
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#createProduct').submit(function(event) {
            event.preventDefault();

            const formData = {
                name: $('#category').val().trim()
            };

            $.ajax({
                    url: "/request/category/create.php",
                    type: "POST",
                    data: formData,
                    dataType: 'json', // Pastikan respons di-parse sebagai JSON
                })
                .done(function(res) {
                    // Akses res.status dan res.message dengan benar
                    if (res.status === "success") {
                        toastr.success(res.message, res.status);
                    } else {
                        toastr.error(res.message, res.status);
                    }

                })
                .always(function() {
                    $('#createCategoryModal').modal('hide');
                    $('#createProduct')[0].reset();
                });
        });
    });
</script>
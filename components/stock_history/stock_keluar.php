<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Stok Keluar</h4>
                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <form id="formStockIn">
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Product Code/ID</label>
                        <input type="text" class="form-control" id="product_id" aria-describedby="product_id_help" placeholder="Enter Product Code/ID">
                        <small id="product_id_help" class="form-text text-muted">Masukkan code barang atau id barang</small>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" aria-describedby="quantity_help" placeholder="Enter Quantity">
                                <small id="quantity_help" class="form-text text-muted">Masukkan jumlah barang masuk</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="receipt_date" class="form-label">Receipt Date</label>
                                <input type="datetime-local" class="form-control" id="receipt_date" aria-describedby="receipt_date_help" placeholder="Enter Product Code/ID">
                                <small id="receipt_date_help" class="form-text text-muted">Masukkan tanggal penerimaan stock</small>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Stock Out</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
</div>

<script>
    $(document).ready(function() {
        $('#formStockIn').submit(function(event) {
            event.preventDefault();

            const type = 'stock_out';
            const product_id = $('#product_id').val().trim();
            const quantity = $('#quantity').val().trim();
            const receipt_date = $('#receipt_date').val().trim();

            const formData = {
                type: type,
                product_id: product_id,
                quantity: quantity,
                receipt_date: receipt_date,
            };


            $.ajax({
                    url: '/request/stockHistory/create.php',
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
        });
    });
</script>
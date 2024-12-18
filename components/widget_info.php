<?php
$product = new Product();

$habis = $product->whereStatus('habis')->num_rows;
$hampir_habis = $product->whereStatus('hampir habis')->num_rows;
$tersedia = $product->whereStatus('tersedia')->num_rows;
?>

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-center  pb-3">
                    <div class="col-9">
                        <p class="text-dark mb-0 fw-semibold fs-14">Product Stock Habis</p>
                        <h3 class="mt-2 mb-0 fw-bold"><?= $habis ?></h3>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-center  pb-3">
                    <div class="col-9">
                        <p class="text-dark mb-0 fw-semibold fs-14">Product Stock Hampir Habis</p>
                        <h3 class="mt-2 mb-0 fw-bold"><?= $hampir_habis ?></h3>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-center  pb-3">
                    <div class="col-9">
                        <p class="text-dark mb-0 fw-semibold fs-14">Product Stock Tersedia</p>
                        <h3 class="mt-2 mb-0 fw-bold"><?= $tersedia ?></h3>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
</div>

<script>
    $(document).ready(function() {
        const habis = parseInt(<?= json_encode($habis) ?>);
        const hampir_habis = parseInt(<?= json_encode($hampir_habis) ?>);

        if (!isNaN(habis) && habis > 0) {
            toastr.error(`Sebanyak ${habis} produk telah kehabisan stok.`, 'Peringatan', {
                timeOut: 0, // Notifikasi tidak akan hilang secara otomatis
                extendedTimeOut: 0, // Waktu tambahan juga diatur ke 0
                closeButton: true, // Tambahkan tombol close untuk menutup notifikasi secara manual
            });
        }
        if (!isNaN(hampir_habis) && hampir_habis > 0) {
            toastr.warning(`Sebanyak ${hampir_habis} produk hampir kehabisan stok.`, 'Peringatan', {
                timeOut: 0, // Notifikasi tidak akan hilang secara otomatis
                extendedTimeOut: 0, // Waktu tambahan juga diatur ke 0
                closeButton: true, // Tambahkan tombol close untuk menutup notifikasi secara manual
            });
        }
    });
</script>
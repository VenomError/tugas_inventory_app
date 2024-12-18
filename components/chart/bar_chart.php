<canvas id="stockInfo" class="apex-charts"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function() {
        const ctx = document.getElementById('stockInfo').getContext('2d');
        let chart;

        $.ajax({
                url: '/request/product/getStockData.php',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(res) {
                if (res.status === 'success') {


                    // Asumsikan res.data berisi array dengan label dan data stok
                    const labels = res.data.map(item => item.name); // Misalnya, 'item.name' adalah nama produk
                    const data = res.data.map(item => item.stock); // Misalnya, 'item.stock' adalah jumlah stok

                    // Membuat grafik menggunakan data dari AJAX
                    chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Jumlah Stok',
                                data: data,
                                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                } else {
                    toastr.error(res.message, 'Failed to Fetch Chart Data');
                }
            })
            .fail(function(xhr, status, error) {
                console.log(xhr.responseText); // Lihat respons lengkap di console
                toastr.error('Terjadi kesalahan: ' + error, 'Error');
            });
    });
</script>
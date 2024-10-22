<x-app-penjual>
<!--========== CONTENTS ==========-->
<main>
    <section class="row justify-content-center">
        <h1 class="fw-bold fs-4 mt-2 mb-3">Riwayat Penjualan</h1>
        <div class="card col-md-3">

        </div>
 
        <div class="card col-md-3">

        </div>

        <div class="card col-md-3">

        </div>

        <div class="container pt-2 pb-4">
            <div id="chartContainer" style="height: 350px; width: 100%;"></div>
        </div>
        <div class="container mt-4">
            <h1 class="fw-bold fs-5 pt-3 mb-3">Pesanan Terakhir</h1>
            <table class="table align-middle">
                <thead>
                    <tr class="">
                        <th>Product Name</th>
                        <th>Location</th>
                        <th>Date - Time</th>
                        <th>Piece</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://via.placeholder.com/40" alt="Product" class="product-img me-2">
                                Apple Watch
                            </div>
                        </td>
                        <td>6096 Marjolaine Landing</td>
                        <td>12.09.2019 - 12.53 PM</td>
                        <td>423</td>
                        <td>$34,295</td>
                        <td><span class="status-badge status-delivered">Delivered</span></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://via.placeholder.com/40" alt="Product" class="product-img me-2">
                                Apple Watch
                            </div>
                        </td>
                        <td>6096 Marjolaine Landing</td>
                        <td>12.09.2019 - 12.53 PM</td>
                        <td>423</td>
                        <td>$34,295</td>
                        <td><span class="status-badge status-pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://via.placeholder.com/40" alt="Product" class="product-img me-2">
                                Apple Watch
                            </div>
                        </td>
                        <td>6096 Marjolaine Landing</td>
                        <td>12.09.2019 - 12.53 PM</td>
                        <td>423</td>
                        <td>$34,295</td>
                        <td><span class="status-badge status-rejected">Rejected</span></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </section>
</main>

<!--========== MAIN JS ==========-->
<?php
$dataPoints = array(
    array("x" => 1672531200000, "y" => 3289000),  // Januari 2023
    array("x" => 1675209600000, "y" => 3830000),  // Februari 2023
    array("x" => 1677628800000, "y" => 2009000),  // Maret 2023
    array("x" => 1680307200000, "y" => 2840000),  // April 2023
    array("x" => 1682899200000, "y" => 2396000),  // Mei 2023
    array("x" => 1685577600000, "y" => 1613000),  // Juni 2023
    array("x" => 1688169600000, "y" => 1821000),  // Juli 2023
    array("x" => 1690848000000, "y" => 2000000),  // Agustus 2023
    array("x" => 1693526400000, "y" => 1397000),  // September 2023
    array("x" => 1696118400000, "y" => 2506000),  // Oktober 2023
    array("x" => 1698796800000, "y" => 6704000),  // November 2023
    array("x" => 1701388800000, "y" => 5704000)   // Desember 2023
);
?>
<script>
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Riwayat Penjualan dalam Beberapa Bulan",
                fontWeight: "semi-bold",
                fontSize: 24,  // Ukuran font title
                horizontalAlign: "left",  // Penyesuaian align agar sesuai dengan gambar
                margin: 20
            },
            axisY: {
                title: "",
                valueFormatString: "#0,,.",
                suffix: "M",
                prefix: "Rp ",
                gridThickness: 0,
                lineThickness: 1,
                tickLength: 0,
                labelFontColor: "#A0A0A0",
                labelFontSize: 12
            },
            axisX: {
                title: "",
                valueFormatString: "MMM YYYY",
                interval: 1,
                intervalType: "month",
                gridThickness: 0,
                lineThickness: 1,
                tickLength: 0,
                labelFontColor: "#A0A0A0",
                labelFontSize: 12
            },
            data: [{
                type: "splineArea",
                markerSize: 5,
                xValueFormatString: "MMM YYYY",
                yValueFormatString: "Rp#,##0.##",
                xValueType: "dateTime",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>,
                lineColor: "#4285F4",  // Warna garis
                fillOpacity: 0.3,
                color: "#4285F4",
                markerColor: "#4285F4",
                markerBorderColor: "#ffffff",
                markerBorderThickness: 2
            }]
        });

        chart.render();

    }
</script>
</x-app-penjual>
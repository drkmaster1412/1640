<?php include "connection.php"; ?>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- add jQuery library -->
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['bar'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Post', 'Like', 'Dislike'],
                <?php
                $query = "select * from poster";
                $res = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_array($res)) {
                    $p_name = $data['p_name'];
                    $like_count = $data['like_count'];
                    $dislike_count = $data['dislike_count'];
                    ?>
                    ['<?php echo $p_name; ?>', <?php echo $like_count; ?>, <?php echo $dislike_count; ?>],
                    <?php
                }
                ?>
            ]);

            var options = {
                chart: {
                    title: 'Post statistic',
                    subtitle: 'Like , dislike_count',
                },
                bars: 'vertical' // Required for Material Bar Charts.
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));

            // add setInterval to check database changes
            setInterval(function () {
                $.ajax({
                    url: "check_changes.php", // path to your server-side script
                    success: function (result) {
                        if (result == "1") {
                            location.reload(); // reload page if changes detected
                        }
                    }
                });
            }, 5000); // check every 5 seconds
        }
    </script>
</head>

<body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
</body>

</html>
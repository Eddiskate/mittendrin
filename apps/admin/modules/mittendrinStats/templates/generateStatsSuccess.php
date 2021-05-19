<?php if (!$session_lists): ?>
    <h3>Liczba słuchaczy:</h3>
    <p id="count-users">W wybranym okresie: <?php echo $stats_count_all_user ?></p>
    <div id="chart_div"></div>
    <hr>

    <h3>Średni czas słuchania:</h3>
    <p id="count-users">W wybranym okresie: <?php echo $average_listening_time_together['0'] ?>
        :<?php echo $average_listening_time_together['1'] ?>:<?php echo $average_listening_time_together['2'] ?></p>
    <div id="average_listening_time"></div>
    <hr>

    <h3>Podział na dobę:</h3>
    <div id="average_listening_time_hour"></div>
    <hr>
    <div class="row">
        <div class="span12">
            <div id="donutchartcity" style="width: 100%; height: 500px;"></div>
        </div>
    </div>

    <div class="row">
        <div class="span12">
            <div id="donutchartcountry" style="width: 100%; height: 500px;"></div>
        </div>
    </div>

    <div class="row">
        <div class="span12">
            <div id="donutchartdevice" style="width: 100%; height: 500px;"></div>
        </div>
    </div>

    <script>
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

            var jsonData = $.ajax({
                url: "/admin.php/ajax/mittendrinStatData",
                data: {data_range: '<?php echo $date ?>', idradio_station: <?php echo $idradio_station ?>},
                dataType: "json",
                async: false
            }).responseText;

            var data = new google.visualization.DataTable(jsonData);
            var options = {
                hAxis: {
                    title: 'Data'
                },
                vAxis: {
                    title: 'Ilość'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>

    <script>
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

            var jsonData = $.ajax({
                url: "/admin.php/ajax/mittendrinStatAverageListeningTime",
                data: {data_range: '<?php echo $date ?>', idradio_station: <?php echo $idradio_station ?>},
                dataType: "json",
                async: false
            }).responseText;

            var data = new google.visualization.DataTable(jsonData);
            var options = {
                hAxis: {
                    title: 'Data'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('average_listening_time'));

            chart.draw(data, options);
        }
    </script>

    <script>
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

            var jsonData = $.ajax({
                url: "/admin.php/ajax/mittendrinStatAverageListeningTimeHour",
                data: {data_range: '<?php echo $date ?>', idradio_station: <?php echo $idradio_station ?>},
                dataType: "json",
                async: false
            }).responseText;

            var data = new google.visualization.DataTable(jsonData);
            var options = {
                hAxis: {
                    title: 'Godzina'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('average_listening_time_hour'));

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var jsonData = $.ajax({
                url: "/admin.php/ajax/mittendrinStatCity",
                data: {data_range: '<?php echo $date ?>', idradio_station: <?php echo $idradio_station ?>},
                dataType: "json",
                async: false
            }).responseText;

            var data = new google.visualization.DataTable(jsonData);

            var options = {
                title: 'Miasto',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchartcity'));
            var total = 0;
            for (var i = 0; i < data.getNumberOfRows(); i++) {
                total = total + data.getValue(i, 1);
            }

            for (var i = 0; i < data.getNumberOfRows(); i++) {
                var label = data.getValue(i, 0);
                var val = data.getValue(i, 1);
                var percentual = ((val / total) * 100).toFixed(1);
                data.setFormattedValue(i, 0, label + '- ' + val + ' (' + percentual + '%)');
            }

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var jsonData = $.ajax({
                url: "/admin.php/ajax/mittendrinStatCountry",
                data: {data_range: '<?php echo $date ?>', idradio_station: <?php echo $idradio_station ?>},
                dataType: "json",
                async: false
            }).responseText;

            var data = new google.visualization.DataTable(jsonData);

            var options = {
                title: 'Kraj',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchartcountry'));

            var total = 0;
            for (var i = 0; i < data.getNumberOfRows(); i++) {
                total = total + data.getValue(i, 1);
            }

            for (var i = 0; i < data.getNumberOfRows(); i++) {
                var label = data.getValue(i, 0);
                var val = data.getValue(i, 1);
                var percentual = ((val / total) * 100).toFixed(1);
                data.setFormattedValue(i, 0, label + '- ' + val + ' (' + percentual + '%)');
            }

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var jsonData = $.ajax({
                url: "/admin.php/ajax/mittendrinStatDevice",
                data: {data_range: '<?php echo $date ?>', idradio_station: <?php echo $idradio_station ?>},
                dataType: "json",
                async: false
            }).responseText;

            var data = new google.visualization.DataTable(jsonData);

            var options = {
                title: 'Urządzenia',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchartdevice'));

            var total = 0;
            for (var i = 0; i < data.getNumberOfRows(); i++) {
                total = total + data.getValue(i, 1);
            }

            for (var i = 0; i < data.getNumberOfRows(); i++) {
                var label = data.getValue(i, 0);
                var val = data.getValue(i, 1);
                var percentual = ((val / total) * 100).toFixed(1);
                data.setFormattedValue(i, 0, label + '- ' + val + ' (' + percentual + '%)');
            }

            chart.draw(data, options);
        }
    </script>

<?php else: ?>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>LP</th>
            <th>Adres IP</th>
            <th>Start sesji</th>
            <th>Koniec sesji</th>
            <th>Czas online</th>
            <th>Nagłowek</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($session_lists as $lp => $mittendrin_stats): ?>
            <tr>
                <td><?php echo $lp+1 ?></td>
                <td><?php echo $mittendrin_stats->getIpaddr() ?></td>
                <td><?php echo date('Y-m-d H:i:s', $mittendrin_stats->getOpen()) ?></td>
                <td><?php if($mittendrin_stats->getClose() > time()): ?><b style="color: green;">online</b><?php else: ?><?php echo date('Y-m-d H:i:s', $mittendrin_stats->getClose()) ?><?php endif; ?></td>
                <td style="text-align: right;"><?php echo $mittendrin_stats->getOnlineTime() ?></td>
                <td><?php echo $mittendrin_stats->getHttpUserAgent() ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

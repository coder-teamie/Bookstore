<!-- db -->
<?php include "../includes/db.php"; ?>

<!-- Header -->
<?php include "./includes/admin_header.php"; ?>

<!-- Header -->
<?php include "./includes/admin_navigation.php"; ?>

<!-- Side Nav -->
<?php include "./includes/admin_sidebar.php"; ?>

      <!-- page content -->
      <section class="section">
        <h1>welcome to admin panel</h1>

        <!-- <script
          type="text/javascript"
          src="https://www.gstatic.com/charts/loader.js"
        ></script>
        <script type="text/javascript">
          google.charts.load('current', { packages: ['bar'] });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Year', 'Sales', 'Expenses', 'Profit'],
              ['2014', 1000, 400, 200],
              ['2015', 1170, 460, 250],
              ['2016', 660, 1120, 300],
              ['2017', 1030, 540, 350],
            ]);

            var options = {
              chart: {
                title: 'Bookstore Records',
                subtitle: 'Sales, Expenses, and Profit: 2014-2017',
              },
            };

            var chart = new google.charts.Bar(
              document.getElementById('columnchart_material')
            );

            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        </script>
        <div
          id="columnchart_material"
          style="width: 800px; height: 500px"
        ></div> -->
      </section>

      <!-- footer -->
      <?php include "./includes/admin_footer.php"; ?>
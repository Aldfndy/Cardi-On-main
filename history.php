<!DOCTYPE html>
<html lang="en">

<head>
  <title>Order History</title>
  <link rel="stylesheet" href="history.css">
  <meta name="viewport" content="width=device-width">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <link rel="icon" href="img/cardion-red.png" type="image/png">
  <meta charset="utf-8">
</head>

<body>
  <section>
    <h1>Transaction History</h1>
    <hr>
    <table>
      <thead>
        <tr>
          <th class="no">No.</th>
          <th class="date">Date</th>
          <th>Location</th>
          <th>Duration</th>
          <th class="desc">Description</th>
          <th class="amount">Amount</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Retrieve payment history data from cookies
        $paymentHistory = isset($_COOKIE['payment_history']) ? json_decode($_COOKIE['payment_history'], true) : [];

        // Loop through each payment entry and display them in table rows
        foreach ($paymentHistory as $index => $payment) {
          $location = $payment['id'];
          $amount = 'Rp ' . number_format($payment['price'], 0, '.', ',');

          echo "<tr>";
          echo "<td  class='no'>" . ($index + 1) . "</td>";
          echo "<td class='date'>" . $payment['date'] . "</td>";
          echo "<td class='location'>" . $location . "</td>";
          echo "<td class='duration'>" . $payment['hour'] . " hour(s)</td>";
          echo "<td>Payment Succesful</td>";
          echo "<td class='amount'>" . $amount . "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>

    <hr>

    <p class="back-button">
      <?php
      $referrer = $_SERVER['HTTP_REFERER'];

      if (strpos($referrer, 'transaction.php') !== false) {
        echo '<a href="homepage.php">← Back</a>';
      } else {
        echo '<a href="#" onclick="goBack()">← Back</a>';
      }
      ?>
    </p>
  </section>
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>

</html>
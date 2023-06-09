<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Under Construction</title>
  <style>
    body {
      background-image: url("img/con1.png"); */
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: #fff;
    }

    .container {
      text-align: center;
    }

    h1 {
      font-size: 36px;
      color: #fff;
      margin-bottom: 20px;
    }

    #countdown {
      font-size: 2em;
      margin-bottom: 1em;
    }

    p {
      font-size: 1.2em;
      color: #fff;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Under Construction</h1>
    <div id="countdown"></div>
    <p>We'll get right on it tho... in, like, soon? idk.</p>
  </div>

  <script>
    var completionDate = new Date("2039-12-31");
    function updateCountdown() {
      var now = new Date();
      var timeDiff = completionDate.getTime() - now.getTime();

      if (timeDiff <= 0) {
        document.getElementById("countdown").innerHTML = "Construction Completed!";
      } else {
        var days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
      }
    }
    setInterval(updateCountdown, 1000);
  </script>
</body>

</html>

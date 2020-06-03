<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="stylesheet.css" />
    <title>Document</title>
  </head>
  <body>
    <h1>CSV Phone Log Summarize</h1>

    <main class="main-content home">
      <p>
        Please Upload CSV in this matching format:
      </p>
      <img src="assets/csv-example.png" />
      <form action="calls-summery.php">
        <input name="file-loader" type="file" placeholder="Your CSV file" />
        <button>Upload</button>
      </form>
    </main>
  </body>
</html>

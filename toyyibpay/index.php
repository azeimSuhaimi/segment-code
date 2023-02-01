<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>toyyibpay</h1>


    <form action="payment_process.php" enctype="multipart/form-data" method="post">

    <div class="mb-3">
    <label for="billName" class="form-label">billName</label>
    <input type="text" class="form-control" id="billName" name="billName" placeholder="billName">
    </div>

    <div class="mb-3">
    <label for="billDescription" class="form-label">billDescription</label>
    <input type="text" class="form-control" id="billDescription" name="billDescription" placeholder="billDescription">
    </div>

    <div class="mb-3">
    <label for="billAmount" class="form-label">billAmount</label>
    <input type="text" class="form-control" id="billAmount" name="billAmount" placeholder="billAmount">
    </div>

    <div class="mb-3">
    <label for="billTo" class="form-label">billTo</label>
    <input type="text" class="form-control" id="billTo" name="billTo" placeholder="billTo">
    </div>

    <div class="mb-3">
    <label for="billEmail" class="form-label">billEmail</label>
    <input type="text" class="form-control" id="billEmail" name="billEmail" placeholder="billEmail">
    </div>

    <div class="mb-3">
    <label for="billPhone" class="form-label">billPhone</label>
    <input type="text" class="form-control" id="billPhone" name="billPhone" placeholder="billPhone">
    </div>

    <button type="submit">submit</button>
   
    </form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
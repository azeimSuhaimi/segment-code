




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <title>Document</title>
</head>
<body>
    
</body>
</html>

<script>

axios.post('axios_get_or_send_data2.php', {
    firstName: 'Fred',
    lastName: 'Flintstone'
  })
  .then(function (response) {
    console.log(response.data.firstName);
  })
  .catch(function (error) {
    console.log(error);
  });

</script>
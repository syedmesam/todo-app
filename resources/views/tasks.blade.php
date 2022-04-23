<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Document</title>
</head>
<body>
  <h1>Tasks List</h1>
  <table class="table table-dark" >
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Task name</th>
        <th scope="col">Status</th>
        {{-- <th scope="col">Last</th>
        <th scope="col">Handle</th> --}}
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Make API's</td>
        <td><button type="submit" class="btn">Completed<button/></td> 
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Make form table</td>
        <td> <button type="submit" class="btn">Completed</button></td>
        {{-- <td>@fat</td> --}}
      </tr>
    </tbody>
  </table>
</body>
</html>
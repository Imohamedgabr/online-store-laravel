<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JS Bin</title>
</head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<body>
<main id="app">
    <div class="actions">
    <a rel="nofollow" class="btn btn-default" href="#!/add-product">
      <span class="glyphicon glyphicon-plus"></span>
      Add product
    </a>
  </div>
  <div class="filters row">
    <div class="form-group col-sm-3">
      <label for="search-element">Product name</label>
      <input class="form-control" id="search-element" requred="">
    </div>
  </div>
  <table class="table">
    <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th class="col-sm-2">Actions</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>
        <a rel="nofollow" href="#!/product/1">Angular</a>
      </td>
      <td>Superheroic JavaScript MVW Framework.</td>
      <td>
        100
        <span class="glyphicon glyphicon-euro" aria-hidden="true"></span>
      </td>
      <td>
        <a rel="nofollow" class="btn btn-warning btn-xs" href="#!/product/1/edit">Edit</a>
        <a rel="nofollow" class="btn btn-danger btn-xs" href="#!/product/1/delete">Delete</a>
      </td>
    </tr><tr>
      <td>
        <a rel="nofollow" href="#!/product/2">Ember</a>
      </td>
      <td>A framework for creating ambitious web applications.</td>
      <td>
        100
        <span class="glyphicon glyphicon-euro" aria-hidden="true"></span>
      </td>
      <td>
        <a rel="nofollow" class="btn btn-warning btn-xs" href="#!/product/2/edit">Edit</a>
        <a rel="nofollow" class="btn btn-danger btn-xs" href="#!/product/2/delete">Delete</a>
      </td>
    </tr><tr>
      <td>
        <a rel="nofollow" href="#!/product/3">React</a>
      </td>
      <td>A JavaScript Library for building user interfaces.</td>
      <td>
        100
        <span class="glyphicon glyphicon-euro" aria-hidden="true"></span>
      </td>
      <td>
        <a rel="nofollow" class="btn btn-warning btn-xs" href="#!/product/3/edit">Edit</a>
        <a rel="nofollow" class="btn btn-danger btn-xs" href="#!/product/3/delete">Delete</a>
      </td>
    </tr>
    </tbody>
  </table>
  </main>
</body>
</html>
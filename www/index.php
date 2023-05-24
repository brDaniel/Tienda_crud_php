<?php
require_once 'db.php';
?>
<?php
require_once './includes/header.php';
?>

<main>
  <div class="containter p-4">
    <div class="row">
      <div class="col-md-4">

        <form action="insert.php" method='POST'>
          <!-- MESSAGE -->
          <?PHP
          if (isset($_SESSION['message'])) {
          ?>
            <div class="alert alert-<?php echo $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
              <strong><?php echo $_SESSION['message_type'] ?></strong><?php echo $_SESSION['message'] ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="close"></button>
            </div>
          <?php
            unset($_SESSION['message']);
          }

          ?>

          <!-- INSTERTAR PRODUCTOS -->
          <div class="card card-body">
            <div class="mb-3">
              <label for="product" class="form-label">Product</label>
              <input type="text" name="product" id="product" class="form-control" placeholder="product description" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="amount" class="form-label">Amount</label>
              <input type="text" name="amount" id="amount" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Only numerics characters</small>
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="text" name="price" id="price" class="form-control" placeholder="price of the product">
            </div>
            <input type="submit" class="btn btn-success" name="guardar" value="Guardar">
          </div>
        </form>
      </div>
      <!-- SHOW ALL -->
      <div class="col-md-8">
        <table class="table table-bordered">
          <thead class="bg-dark text-white">
            <tr>
              <th>Product</th>
              <th>Amount</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = 'SELECT id,product,amount,price FROM Products';
            $selectProducts = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($selectProducts)) {
            ?>
              <tr>
                <td><?php echo $row['product'] ?></td>
                <td><?php echo $row['amount'] ?></td>
                <td>$ <?php echo $row['price'] ?></td>
                <td>
                  <a href="edit.php/?id=<?php echo $row['id'] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pen-fill" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                    </svg>
                  </a>
                  <a href="delete.php/?id=<?php echo $row['id'] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                    </svg>
                  </a>
                </td>
              <tr>
              <?php
            }
              ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</main>
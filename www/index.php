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
                    dafs
                  </a>
                  <a href="delete.php/?id=<?php echo $row['id'] ?>">
                    fads
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
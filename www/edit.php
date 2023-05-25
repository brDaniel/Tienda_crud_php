<?php
include ('db.php');

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "SELECT product, amount, price FROM Products WHERE id=$id";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1){
     $row = mysqli_fetch_array($result);
     $product = $row['product'];
     $amount = $row['price'];
     $price = $row['price'];
  }
  if(isset($_POST['edit'])){
    $id = $_GET['id'];
    $product = $_POST['product'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];

    $query =  "UPDATE Products SET product='$product', amount=$amount, price=$price WHERE id=$id ";
    $result = mysqli_query($conn,$query);
    if(!$result){
      die("no se logro Actualizar el producto".$query);
    }
    $host  = $_SERVER['HTTP_HOST'];
    $_SESSION['message']='A product has been updated!';
    $_SESSION['message_type']='primary';
    header("location: http://$host");
  }
}
?>

<?php require_once 'includes/header.php';?>
<div class="container p-4">
  <div class="col-md-4 mx-auto">
    <div class="card card-body">
      <form action="/edit.php/?id=<?php echo $id ?>" method="post">
      <div class="mb-3">
              <label for="product" class="form-label">Product</label>
              <input type="text" name="product" id="product" class="form-control" placeholder="product description" value="<?php echo $product?>">
            </div>
            <div class="mb-3">
              <label for="amount" class="form-label">Amount</label>
              <input type="text" name="amount" id="amount" class="form-control" placeholder="" value="<?php echo $id?>">
              <small id="helpId" class="text-muted">Only numerics characters</small>
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="text" name="price" id="price" class="form-control" placeholder="price of the product" value="<?php echo $price?>" >
            </div>
            <input type="submit" class="btn btn-success" name="edit" value="edit">
      </form>
    </div>
  </div>
</div>
<?php require_once 'includes/footer.php';?>


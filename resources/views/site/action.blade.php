<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "includes/db.php";
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
    
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		
            
            <div class='aside'>
			<h3 class='aside-title'>Categories</h3>
			<div class='btn-group-vertical'>
	";
	if(mysqli_num_rows($run_query) > 0){
        $i=1;
		while($row = mysqli_fetch_array($run_query)){
            
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            $i++;
            
            
			echo "
					
                    <div type='button' class='btn navbar-btn category' cid='$cid'>
									
									<a href='#'>
										<span  ></span>
										$cat_name
										<small class='qty'>($count)</small>
									</a>
								</div>
                    
			";
            
		}
        
        
		echo "</div>";
	}
}


if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='col-md-12'>
                    <div class='product-filters'>
                    <div'>
	";
	if(mysqli_num_rows($run_query) > 0){
        $i=1;
		while($row = mysqli_fetch_array($run_query)){
            
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            $i++;
			echo "
			 
				<p class='btn navbar-btn selectBrand' cid='$cid' >
				<a href='#' style='color: #051922'>
							<span></span>$cat_name
							<span>($count)</span>
						</a>
				</h2>
                            
                        
						
			";
		}
		echo "</div> </div></div>";
	}
}


if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/3);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#product-row' page='$i' id='page' class='active'>$i</a></li>     
		";
	}
}

if(isset($_POST["getProduct"])){
	
	$product_query = "SELECT * FROM project ";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
				$id    = $row['id'];
				$proj_name   = $row['proj_name'];
				//$pro_brand = $row['brand_title'];
				$proj_class = $row['proj_class'];
				$proj_image = $row['proj_image'];
		echo "
		<div class='design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4 $proj_class'>
            <a href='portfolio-single.php' class='item-wrap'>
              <span class='icon-add'></span>
              <img class='img-fluid' src='assets/images/sq_img_12.jpg'>
            </a>
		 </div>"
			;
		}
	}
}



if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id";
        
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id";
	}else {
        
		$keyword = $_POST["keyword"];
        header('Location:shop.php');
		$sql = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_keywords LIKE '%$keyword%'";
       
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($run_query)){
				$pro_id    = $row['product_id'];
				$pro_cat   = $row['product_cat'];
				//$pro_brand = $row['brand_title'];
				$pro_title = $row['product_title'];
				$pro_price = $row['product_price'];
				$pro_image = $row['product_image'];
				$cat_class = $row['cat_name'];
				$cat_unit = $row["cat_unit"];
				$cat_name = $row["cat_title"];
		echo "
			 <div class='col-lg-4 col-md-6 text-center $cat_class'>
					<div class='single-product-item'>
						<div class='product-image'>
							<a href='product.php?p=$pro_id'><img src='assets/images/$pro_image' alt=''></a>
						</div>
						<h3>$pro_title</h3>
						<p class='product-price'>$ $pro_price <span>Per $cat_unit </span></p>
						<p><strong>Category: </strong>$cat_name</p>
						<a  pid='$pro_id'  id='product' class='cart-btn'><i class='fas fa-shopping-cart'></i> Add to Cart</a>
					</div>
				</div>

			";
		}
	}
	


	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		

		if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>This product is already added to cart</b>
				</div>
			";//not in video
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product added to cart</b>
					</div>
				";
			}
		}
		}else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>This product is already added to cart</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product added to cart</b>
					</div>
				";
				exit();
			}
			
		}
		
		
		
		
	}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			$total_price=0;
			while ($row=mysqli_fetch_array($query)) {
                
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				$total_price=$total_price+$product_price;
				echo '
					
                    
                    <div class="product-widget">
						<div class="product-img">
							<img src="product_images/'.$product_image.'" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-name"><a href="#">'.$product_title.'</a></h3>
							<h4 class="product-price"><span class="qty">'.$n.'</span>$'.$product_price.'</h4>
						</div>

					</div>'

                    
                    ;
				
			}
            
            echo '<div class="cart-summary">
				    <small class="qty">'.$n.' Item(s) selected</small>
				    <h5>$'.$total_price.'</h5>
				</div>'
            ?>
				
				
			<?php
			
			exit();
		}
	}
	
    
    
    if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo '
			
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-image"><strong>Image</strong></th>
									<th class="product-name"><strong>Name</strong></th>
									<th class="product-price"><strong>Price</strong></th>
									<th class="product-quantity"><strong>Quantity</strong></th>
									<th class="product-total"><strong>Total</strong></th>
									<th class="product-refresh"><i class="fas fa-sync-alt"></i></th>
									<th class="product-remove"><i class="fas fa-trash"></i></th>
								</tr>
							</thead>
							<tbody>
					
                    ';
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];

					echo 
						' 
						<tr class="table-body-row">
							<td class="product-image">
								<a href="product.php?p='.$product_id.'"><img src="assets/images/'.$product_image.'" alt=""></a>
							</td>
							<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
				            <input type="hidden" name="" value="'.$cart_item_id.'"/>
							<td class="product-name"><a href="product.php?p='.$product_id.'">'.$product_title.'</a></td>
							<td class="product-price" data-th="Price">
								<input type="number" class="price" value="'.$product_price.'" readonly="readonly">
							</td>
								<td class="product-quantity" data-th="Quantity">
									<input type="number" name="qty" value="'.$qty.'" min="1" max="10">
								</td>
								<td class="product-total" data-th="Subtotal">
									<input type="number" class="total" value="'.$product_price*$qty.'" readonly="readonly"></td>
								</td>
								<td class="">
								  <a href="#" class="update" update_id="'.$product_id.'"><i class="fas fa-sync-alt"></i>
								</td>
								<td class="">
								  <a href="cart.php" class=" remove" remove_id="'.$product_id.'"><i class="fa fa-times"></i>
								</td>
							</tr>
                            ';
				}
				echo '
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Total </strong></td>
									<td><b class="net_total" ></b></td>
								</tr>
								<div id="issessionset"></div>
							</tbody>
						</table>
						
													
				';
				if (!isset($_SESSION["uid"])) {
					echo '
							<div class="cart-buttons">
					
							<a href="" data-toggle="modal" data-target="#Modal_register" class="boxed-btn black">Check Out</a>
						</div>
					</div>

				</div>
						';
                }
			else 
				if(isset($_SESSION["uid"])){
					//Paypal checkout form
					echo '
					</form>
						<form action="checkout.php" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="tnafricanstore@gmail.com">
							<input type="hidden" name="upload" value="1">';
							  
							$x=0;
							$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query)){
								$x++;
								echo  	

									'<input type="hidden" name="total_count" value="'.$x.'">
									<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">
									 ';
								
								}
							  
							echo   
								'<input type="hidden" name="return" value="http://localhost/myfiles/public_html/payment_success.php"/>
					                <input type="hidden" name="notify_url" value="http://localhost/myfiles/public_html/payment_success.php">
									<input type="hidden" name="cancel_return" value="http://localhost/myfiles/public_html/cancel.php"/>
									<input type="hidden" name="currency_code" value="USD"/>
									<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/><br>
									<input type="submit" id="submit" name="login_user_with_product" name="submit" class="btn" value="Ready to Checkout ">
									</form></td>
									
									</tr>
									
									</tfoot>
									
							</table></div></div>';
				}
			}
		else{
		echo'
		<div class="full-height-section error-section">
			<div class="full-height-tablecell">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 text-center">
							<div class="error-text">
								<i class="far fa-sad-cry"></i>
								<h1>No Item Added To the cart.</h1>
								<a href="shop.php" class="boxed-btn">Go to Shop</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		';
	}
	}
	
	
	
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}
	else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}




?>

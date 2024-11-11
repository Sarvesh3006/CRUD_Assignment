<?php include('header.php')?>
<?php include('dbcon.php')?>

	<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];


            $query = "SELECT * FROM `customers` WHERE `id` = '$id'";
            $result = mysqli_query($connection, $query);

            if(!$result){
                die("query Failed".mysqli_error());
            } 
            else {
                $row = mysqli_fetch_assoc($result);
                
            }
        }
       
	?>


		<?php


			if(isset($_POST['update_customers'])){
				if (isset($_GET['id_new'])) {
					$idnew = $_GET['id_new'];
				}

				$name = $_POST['name'];
				$item = $_POST['item'];
                $Quantity = $_POST['quantity'];
				$total_amount = $_POST['total_amount'];
				$include_gst = $_POST['include_gst'];
				$payable_amount = $_POST['payable_amount'];

				$query = "UPDATE `customers` set `name` = '$name', `item` = '$item', `quantity` = '$quantity', `total_amount` = '$total_amount', `include_gst` = '$include_gst', `payable_amount` = '$payable_amount' WHERE `id`= '$idnew'";
				$result = mysqli_query($connection, $query);

	            if(!$result){
	                die("query Failed".mysqli_error());
	            } 
	            else{
	            	header('location:index.php?update_msg=You have successfully updated the information');
	            }

			}

		?>


	<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
    <!-- Form Title -->
    <h1>Edit your Data</h1>

    <!-- First Name -->
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
    </div>

    <!-- Last Name -->
    <div class="form-group">
        <label for="item">item</label>
        <input type="text" name="item" class="form-control" value="<?php echo $row['item']; ?>" required>
    </div>
     <div class="form-group">
        <label for="quantity">quantity</label>
        <input type="number" name="quantity" class="form-control" value="<?php echo $row['quantity']; ?>" step="1" required>
    </div>

    <!-- Total Amount -->
    <div class="form-group">
        <label for="total_amount">Payment Amount</label>
        <input type="number" id="total_amount" name="total_amount" class="form-control" value="<?php echo $row['total_amount']; ?>"required>
    </div>

     <!-- Include GST -->
      <div class="form-group">
      <label>Include GST</label><br>
      <input type="radio" name="include_gst" value="Yes" id="gst_yes" required> Yes
      <input type="radio" name="include_gst" value="No" id="gst_no" required> No
      </div>


    <!-- Payable Amount -->
    <div class="form-group">
        <label for="payable_amount">Total Payable Amount</label>
        <input type="number" id="payable_amount" name="payable_amount" class="form-control" value="<?php echo $row['payable_amount']; ?>" readonly>
    </div>

    <!-- Submit Button -->
    <input type="submit" class="btn btn-success" name="update_customers" value="UPDATE" style="margin:10px;">
</form>

<script>
    // Get references to the necessary input fields and radio buttons
    const totalAmountField = document.getElementById("total_amount");
    const payableAmountField = document.getElementById("payable_amount");
    const gstYesRadio = document.getElementById("gst_yes");
    const gstNoRadio = document.getElementById("gst_no");

    // Function to update payable amount based on GST selection
    function updatePayableAmount() {
        const totalAmount = parseFloat(totalAmountField.value) || 0; // Get the total amount or default to 0
        let payableAmount = totalAmount;

        // If GST "Yes" is selected, add 18% to the payable amount
        if (gstYesRadio.checked) {
            payableAmount += totalAmount * 0.18;
        }

        // Update the payable amount field
        payableAmountField.value = payableAmount.toFixed(2); // Format to 2 decimal places
    }

    // Event listeners
    totalAmountField.addEventListener("input", updatePayableAmount);
    gstYesRadio.addEventListener("change", updatePayableAmount);
    gstNoRadio.addEventListener("change", updatePayableAmount);
</script>

 



<?php include('footer.php')?>
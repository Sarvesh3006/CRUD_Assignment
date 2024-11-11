<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>
<div class="box1">
        <h2>Transaction Details</h2>
        <!-- Adjusted button attributes for Bootstrap 5 -->
        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Add Customer</button>
    </div>
    <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Payment Amount</th>
            <th>Include GST 18%</th>
            <th>Total Payable Amount</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM `customers`";
            $result = mysqli_query($connection, $query);

            if(!$result){
                die("query Failed".mysqli_error());
            } else {
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['item']; ?></td>
                         <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['total_amount']; ?></td>
                        <td><?php echo $row['include_gst']; ?></td>
                        <td><?php echo $row['payable_amount']; ?></td>
                        <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
                        <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                }
            }
        ?>
    </tbody>
</table>







<form action="insert_data.php" method="post">
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Add Customer</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- First Name -->
                    <div class="form-group">
                        <label for="f_name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="item">Item</label>
                        <input type="text" name="item" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" step="1" required>
                    </div>
                    
                    <!-- Total Amount -->
                    <div class="form-group">
                        <label for="total_amount">Payment Amount</label>
                        <input type="number" id="total_amount" name="total_amount" class="form-control" required>
                    </div>
                    
                    <!-- Include GST -->
                    <div class="form-group">
                        <label>Include GST</label><br>
                        <input type="radio" name="include_gst" value="Yes" id="gst_yes"> Yes
                        <input type="radio" name="include_gst" value="No" id="gst_no" checked> No
                    </div>
                    
                    <!-- Payable Amount -->
                    <div class="form-group">
                        <label for="payable_amount">Total Payable Amount</label>
                        <input type="number" id="payable_amount" name="payable_amount" class="form-control" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_customers" value="ADD">
                </div>
            </div>
        </div>
    </div>
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


<?php include('footer.php'); ?>
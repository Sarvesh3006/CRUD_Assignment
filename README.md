# Customer Transaction Management System

This is a web application developed in PHP and MySQL for managing customer transactions. It enables users to add, view, edit, and delete transaction details and calculates the total payable amount with an option to include GST.

## Features

- **Add New Customer Transaction**: Add details like customer name, item, quantity, and payment amount.
- **GST Calculation**: Choose whether to include GST (18%), with automatic calculation of the total payable amount.
- **View Transaction List**: Displays a list of transactions with all relevant details.
- **Edit and Delete Transactions**: Modify or remove existing transaction records.

## Prerequisites

- **PHP**: Version 7.4 or higher.
- **MySQL Database**: To store transaction data.
- **XAMPP or WAMP**: For local server setup (if running locally).
- **Bootstrap**: For responsive styling and modal support (Bootstrap 5+ recommended).

## Installation

1. **Clone the Repository**:
   ```bash

Usage
Add a New Transaction:

Click the Add Customer button.
Enter the required details and choose whether to include GST.
The payable amount will be calculated automatically based on GST selection.
Edit or Delete a Transaction:

Use the Edit button to modify a record, or Delete to remove it from the database.
GST Calculation:

If GST is included, 18% will be added to the total amount automatically.
File Structure
header.php: Common header for the application.
dbcon.php: Database connection file.
main page: Displays the customer transactions table and provides options to edit or delete.
insert_data.php: Handles insertion of new customer transaction records.
update_page_1.php: Enables editing of customer transaction data.
delete_page.php: Deletes selected customer records.
JavaScript for GST Calculation
The JavaScript function updatePayableAmount() automatically calculates the total payable amount based on the selected GST option. The payable amount field updates dynamically when the total amount or GST selection is changed.

javascript
Copy code
function updatePayableAmount() {
    const totalAmount = parseFloat(totalAmountField.value) || 0;
    let payableAmount = totalAmount;

    if (gstYesRadio.checked) {
        payableAmount += totalAmount * 0.18;
    }

    payableAmountField.value = payableAmount.toFixed(2);
}
Troubleshooting
Ensure your database connection in dbcon.php is configured correctly.
Make sure XAMPP or WAMP is running if testing locally.
Verify that you have Bootstrap 5 or higher to support the modal functionality.

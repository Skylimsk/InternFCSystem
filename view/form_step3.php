<h1>Company Department/Unit Details and Contact Person</h1>
        <hr>
        <form action="../controller/studentController.php" method="post">
            <!-- Form fields here -->
            <div class="form-group">
                <label for="departName">Department/Unit Name (if any):</label>
                <input type="text" id="departName" name="departName">
                <br><br>
                <label for="picName">Name of Contact Person:</label>
                <input type="text" id="picName" name="picName">
                <br><br>
                <label for="picOfficePhoneNo">Office Phone No:</label>
                <input type="text" id="picOfficePhoneNo" name="picOfficePhoneNo">
                <br><br>
                <label for="picFaxNo">Fax No:</label>
                <input type="text" id="picFaxNo" name="picFaxNo">
                <br><br>
                <label for="picMobileNo">Mobile No:</label>
                <input type="text" id="picMobileNo" name="picMobileNo">
                <br><br>
                <label for="picEmail">Email Address:</label>
                <input type="text" id="picEmail" name="picEmail">
            </div>
            <br>
            
            <!-- Add the rest of the form fields similar to the above structure -->
            <button type="submit" class="back-button" value="Back" name="back">Back</button>

            <button type="submit" class="next-button" value="Next" name="next">Next</button>
        </form>
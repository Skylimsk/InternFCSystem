<h1>Company Main Information</h1>
        <hr>
        <form action="../controller/studentController.php" method="post">
            <!-- Form fields here -->
            <div class="form-group">
                <label for="comName">Name:</label>
                <input type="text" id="comName" name="comName">
                <br><br>
                <label for="comRegNo">Registration No:</label>
                <input type="text" id="comRegNo" name="comRegNo">
                <br><br>
                <label for="comPicName">CEO's/GM Name:</label>
                <input type="text" id="comPicName" name="comPicName">
                <br><br>
                <label for="comWeb">Website (if any):</label>
                <input type="text" id="comWeb" name="comWeb">
                <br><br>
                <label for="comCategory">Company Category:</label>
                <input type="text" id="comCategory" name="comCategory">
                <br><br>
                <label for="comSector">Company Sector:</label>
                <input type="text" id="comSector" name="comSector">
                <br>
                
                <h1>Company Main/Branch Details</h1>
                <hr>
                <label for="comCity">City:</label>
                <input type="text" id="comCity" name="comCity">
                <br><br>
                <label for="comState">State:</label>
                <input type="text" id="comState" name="comState">
                <br><br>
                <label for="comPostcode">Postcode:</label>
                <input type="text" id="comPostcode" name="comPostcode">
                <br><br>
                <label for="comCountry">Country:</label>
                <input type="text" id="comCountry" name="comCountry">
                <br><br>
                <label for="comOfficeNo">Office Phone No:</label>
                <input type="text" id="comOfficeNo" name="comOfficeNo">
                <br><br>
                <label for="comFaxNo">Fax No:</label>
                <input type="text" id="comFaxNo" name="comFaxNo">
            </div>
            <br>
            <!-- Add the rest of the form fields similar to the above structure -->
            <button type="submit" class="back-button" value="Back" name="back">Back</button>

            <button type="submit" class="next-button" value="Next" name="next">Next</button>
        </form>
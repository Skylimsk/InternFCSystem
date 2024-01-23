<h1>LI Coordinator Information</h1>
        <hr>
        <form action="../controller/studentController.php" method="post">
            <!-- Form fields here -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="coorName" name="coorName">
                <br><br>
                <label for="faculty">Faculty:</label>
                <input type="text" id="coorFac" name="coorFac">
                <br><br>
                <label for="officeNo">Office No:</label>
                <input type="text" id="coorOfficeNo" name="coorOfficeNo">
                <br><br>
                <label for="phoneNo">Phone No:</label>
                <input type="text" id="coorPhoneNo" name="coorPhoneNo">
                <br><br>
                <label for="email">Email Address:</label>
                <input type="text" id="coorEmail" name="coorEmail">
                <br><br>
                <label for="programme">Faculty's Programme:</label>
                <input type="text" id="coorProgramme" name="coorProgramme">
            </div>
            <br>
            <!-- Add the rest of the form fields similar to the above structure -->
            <button type="submit" class="next-button" value="Next" name="next">Next</button>
        </form>
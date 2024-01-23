<h1>Placement Details</h1>
        <hr>
        <form action="../controller/studentController.php" method="post">
            <!-- Form fields here -->
            <div class="form-group">
                <label for="accommodation">Accommodation during LI:</label>
                <input type="text" id="accommodation" name="accommodation">
                <br><br>
                <label for="distance">Distance between two points:</label>
                <input type="text" id="distance" name="distance">
                <br><br>
                <label for="transportation">Type of Transportation:</label>
                <input type="text" id="transportation" name="transportation">
                <br><br>
                <label for="comProfile">Profile Company:</label>
                <input type="text" id="comProfile" name="comProfile">
                <br><br>
                <label for="scopeOffer">Scope Offered:</label>
                <input type="text" id="scopeOffer" name="scopeOffer">
            </div>
            <br>
            
            <!-- Add the rest of the form fields similar to the above structure -->
            <button type="submit" class="back-button" value="Back" name="back">Back</button>

            <button type="submit" class="submit-button" value="Submit" name="submit">Submit</button>
        </form>
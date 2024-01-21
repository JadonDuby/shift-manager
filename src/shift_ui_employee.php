<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shift Management</title>
    <!-- Include FullCalendar and jQuery -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>
</head>
<body>

<div>
    <h2>Create a Shift</h2>
    <form id="createShiftForm">

        <label for="shiftStartTime">Start Time:</label>
        <input type="datetime-local" id="shiftStartTime" name="shiftStartTime" required>

        <label for="shiftEndTime">End Time:</label>
        <input type="datetime-local" id="shiftEndTime" name="shiftEndTime" required>

        <button type="button" onclick="createShift()">Create Shift</button>
    </form>
</div>

<div>
    <h2>Shift Actions</h2>

    <button type="button" onclick="addUserToShift()">Add User to Shift</button>
    <button type="button" onclick="removeUserFromShift()">Remove User from Shift</button>
    <button type="button" onclick="requestShift()">Request Shift</button>
    <button type="button" onclick="submitShift()">Submit Shift</button>
    <button type="button" onclick="getShifts()">Get Shifts</button>
</div>

<script>
    // Function to create a new shift using AJAX
    function createShift() {
        const startTime = $('#shiftStartTime').val();
        const endTime = $('#shiftEndTime').val();
        $.ajax({
            type: 'POST',
            url: 'ajax_handler.php', // Update with your actual PHP endpoint
            data: {
                action: 'createShift',
                start_time: startTime,
                end_time: endTime,
            },
            success: function(response) {
            console.log(response);

            // Access the response data
            const success = response.success;
            const message = response.message;

            if (success) {
                // Handle success, update UI or show a message
                alert(message);
            } else {
                // Handle failure, show an error message
                alert('Failed to create shift. Check console for details.');
            }
        },
        error: function(error) {
            console.error(error);
            // Handle error, show an error message
        }
        });
    }

    // Function to add a user to a shift using AJAX
    function addUserToShift() {
        // Implement the logic to add a user to a shift
    }

    // Function to remove a user from a shift using AJAX
    function getShifts() {
        $.ajax({
            type: 'POST',
            url: 'ajax_handler.php', // Update with your actual PHP endpoint
            data: {
                action: 'getShifts',
            },
            success: function(response) {
            console.log(response);

            // Access the response data
            const success = response.success;
            const message = response.message;

            if (success) {
                // Handle success, update UI or show a message
                alert(message);

            } else {
                // Handle failure, show an error message
                alert('Failed get shifts. Check console for details.');
            }
        },
        error: function(error) {
            console.error(error);
            // Handle error, show an error message
        }
        });
    }

    // Function to request a shift using AJAX
    function requestShift() {

        // Implement the logic to request a shift
    }

    function submitShift(){
        const startTime = $('#shiftStartTime').val();
        const endTime = $('#shiftEndTime').val();
        $.ajax({
            type: 'POST',
            url: 'ajax_handler.php', // Update with your actual PHP endpoint
            data: {
                action: 'submitShift',
                start_time: startTime,
                end_time: endTime,
            },
            success: function(response) {
            console.log(response);

            // Access the response data
            const success = response.success;
            const message = response.message;

            if (success) {
                // Handle success, update UI or show a message
                alert(message);
            } else {
                // Handle failure, show an error message
                alert('Failed to submit shift. Check console for details.');
            }
        },
        error: function(error) {
            console.error(error);
            // Handle error, show an error message
        }
        });

    }
</script>

</body>
</html>


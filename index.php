<!DOCTYPE html>
<html>
<head>
    <title>Schedule Interview</title>
</head>
<body>
    <h2>Schedule Interview</h2>
    <form action="schedule.php" method="post">
        <label for="name">Candidate Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Candidate Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="recipient">Email to receive details:</label>
        <input type="email" id="recipient" name="recipient" required><br><br>
        <label for="date">Interview Date:</label>
        <input type="date" id="date" name="date" required><br><br>
        <input type="submit" value="Schedule">
    </form>
</body>
</html>

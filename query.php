<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/query.css">
    <title>Query</title>
</head>
<body>
    <div class="container">
        <h2>Query Form</h2>
        <form action="process_query.php" method="POST" enctype="multipart/form-data">
            <label for="query_type">Select Query Type:</label>
            <select name="query_type" id="query_type" required>
                <option value="General">General Inquiry</option>
                <option value="Admissions">Admissions</option>
                <option value="Scholarship">Scholarship</option>
                <option value="Examination">Examination</option>
            </select>
            
            <label for="query_text">Enter Your Query:</label>
            <textarea name="query_text" id="query_text" rows="4" required></textarea>
            
            <label for="upload_image">Upload Image (Optional):</label>
            <input type="file" name="query_image" id="upload_image">
            
            <button type="submit" name="submit">Submit Query</button>
        </form>
    </div>
</body>
</html>

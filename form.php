<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share your experience</title>
    <style>
        /* Box styling */
        .form-box {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);

        }
        /* Form styling */
        form {
         margin-top: 20px;
             
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 2px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn[type="submit"] {
            background-color: #416D19;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            align-self: center;
            
        }

        .btn[type="submit"]:hover {
            background-color: #BFEA7C;
        }
    </style>
</head>
<body>
    <header></header>
    <div class="form-box">
        <h2>Share your experience</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="experience">Experience:</label>
            <textarea id="experience" name="experience" required></textarea>

            <label for="photo">Upload Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>

            <label for="rating">Rating Guide:</label>
            <select id="rating" name="rating" required>
                <option value="">Select Rating</option>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>

            <button class="btn" type="submit">Submit</button>
        </form>
    </div>
    <footer></footer>
     <script src="JS/nav.js"></script>
</body>

</html>

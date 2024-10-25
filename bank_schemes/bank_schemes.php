<?php
// Define JSON file path
$jsonFile = "bank_schemes.json";

// Fetch data from the JSON file
function fetchBankSchemes($jsonFile)
{
    if (file_exists($jsonFile)) {
        $jsonData = file_get_contents($jsonFile);
        return json_decode($jsonData, true);
    } else {
        return [];
    }
}

// Get bank schemes
$bankSchemes = fetchBankSchemes($jsonFile);
?>

<!DOCTYPE html>
<html>

<!-- <head>
    <title>Latest Bank Schemes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .section-title {
            color: #2d2d2d;
            margin-top: 30px;
            font-size: 1.5em;
        }

        .scheme-card {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .scheme-card h3 {
            margin: 0;
        }

        .scheme-card p {
            margin: 5px 0 10px;
        }

        .scheme-card a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
    
</head> -->

<head>
    <title>Latest Bank Schemes</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Animate.css for animations -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9fafb;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 40px;
            animation: fadeInDown 1s;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-title {
            color: #34495e;
            margin-top: 30px;
            font-size: 1.75em;
            font-weight: bold;
            padding-bottom: 10px;
            border-bottom: 3px solid #6a11cb;
        }

        .scheme-card {
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s, background 0.3s;
            color: #2c3e50;
        }

        .scheme-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #cfdef3, #e0eafc);
        }

        .scheme-card h3 {
            margin: 0;
            font-weight: bold;
            color: #2575fc;
        }

        .scheme-card p {
            margin: 10px 0 15px;
            color: #2c3e50;
            font-size: 1.05em;
        }

        .scheme-card a {
            color: #ffffff;
            background-color: #6a11cb;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .scheme-card a:hover {
            background-color: #2575fc;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="animate__animated animate__fadeInDown">Latest Bank Schemes</h1>

        <!-- Government Bank Schemes -->
        <div>
            <h2 class="section-title">Government Bank Schemes</h2>
            <div class="row">
                <?php
                if (!empty($bankSchemes['government'])) {
                    foreach ($bankSchemes['government'] as $scheme) {
                        echo '<div class="col-md-6">';
                        echo '<div class="scheme-card animate__animated animate__zoomIn">';
                        echo '<h3>' . htmlspecialchars($scheme['name']) . '</h3>';
                        echo '<p>' . htmlspecialchars($scheme['description']) . '</p>';
                        echo '<a href="' . htmlspecialchars($scheme['link']) . '" class="btn btn-primary btn-sm" target="_blank">Learn More</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-muted">No government schemes available at the moment.</p>';
                }
                ?>
            </div>
        </div>

        <!-- Private Bank Schemes -->
        <div>
            <h2 class="section-title">Private Bank Schemes</h2>
            <div class="row">
                <?php
                if (!empty($bankSchemes['private'])) {
                    foreach ($bankSchemes['private'] as $scheme) {
                        echo '<div class="col-md-6">';
                        echo '<div class="scheme-card animate__animated animate__zoomIn">';
                        echo '<h3>' . htmlspecialchars($scheme['name']) . '</h3>';
                        echo '<p>' . htmlspecialchars($scheme['description']) . '</p>';
                        echo '<a href="' . htmlspecialchars($scheme['link']) . '" class="btn btn-primary btn-sm" target="_blank">Learn More</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-muted">No private schemes available at the moment.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</body>


</html>
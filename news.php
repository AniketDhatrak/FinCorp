<?php
$apiKey = 'h1ibcATLENE513P8ZcpQHeoVlR00I0AL7dDBMdW1'; // Replace with your actual MarketAux API key
$news = [];
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
$symbols = 'TSLA,AMZN,MSFT'; // Replace with desired symbols

// Fetch news from MarketAux API
function fetchNews($symbols = '', $search = '')
{
    global $apiKey;
    $url = 'https://api.marketaux.com/v1/news/all?symbols=' . $symbols . '&filter_entities=true&language=en&api_token=' . $apiKey;

    if ($search) {
        $url .= '&search=' . urlencode($search);
    }

    $response = file_get_contents($url);
    return json_decode($response, true);
}

// Get the news data
$news = fetchNews($symbols, $searchQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial News</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 2.5rem;
        }

        .card {
            border-radius: 8px;
            transition: transform 0.2s;
            width: 300px;
            /* Set width for cards */
            display: inline-block;
            /* Ensure cards are in-line */
            vertical-align: top;
            /* Align cards at the top */
            margin-right: 10px;
            /* Space between cards */
        }

        .card:hover {
            transform: scale(1.02);
        }

        .list-group-item {
            transition: background-color 0.2s;
        }

        .list-group-item:hover {
            background-color: #e2e6ea;
        }

        a {
            color: #007bff;
        }

        a:hover {
            color: #0056b3;
        }

        .text-primary {
            color: #007bff;
        }

        .text-secondary {
            color: #6c757d;
        }

        /* Horizontal scroll styles */
        .scrollable {
            overflow-x: auto;
            white-space: nowrap;
            padding: 10px 0;
            /* Add some vertical padding */
        }

        .card-title {
            font-size: 1.1rem;
            height: 40px;
            /* Fixed height for title to avoid overflow */
            overflow: hidden;
            /* Hide overflow */
            text-overflow: ellipsis;
            /* Add ellipsis for long titles */
            white-space: nowrap;
            /* Prevent title from wrapping */
        }

        .card-text {
            font-size: 0.9rem;
            height: 60px;
            /* Fixed height for description */
            overflow: hidden;
            /* Hide overflow */
            text-overflow: ellipsis;
            /* Add ellipsis for long descriptions */
            display: -webkit-box;
            /* Use box model */
            -webkit-line-clamp: 3;
            /* Limit to 3 lines */
            -webkit-box-orient: vertical;
            /* Vertical orientation */
        }

        .card {
            border-radius: 8px;
            transition: transform 0.2s;
            width: 300px;
            /* Set width for cards */
            display: inline-block;
            /* Ensure cards are in-line */
            vertical-align: top;
            /* Align cards at the top */
            margin-right: 10px;
            /* Space between cards */
        }

        .scrollable {
            overflow-x: auto;
            white-space: nowrap;
            padding: 10px 0;
            /* Add some vertical padding */
        }

        .card-title {
            font-size: 1.1rem;
            height: 40px;
            /* Fixed height for title to avoid overflow */
            overflow: hidden;
            /* Hide overflow */
            text-overflow: ellipsis;
            /* Add ellipsis for long titles */
            white-space: nowrap;
            /* Prevent title from wrapping */
        }

        .card-text {
            font-size: 0.9rem;
            height: 60px;
            /* Fixed height for description */
            overflow: hidden;
            /* Hide overflow */
            text-overflow: ellipsis;
            /* Add ellipsis for long descriptions */
            display: -webkit-box;
            /* Use box model */
            -webkit-line-clamp: 3;
            /* Limit to 3 lines */
            -webkit-box-orient: vertical;
            /* Vertical orientation */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Financial News</h1>
        <form class="mb-4" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search news..." value="<?= htmlspecialchars($searchQuery) ?>">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <div class="row">
            

            <div class="col-md-9">
                <h4 class="text-secondary">Latest News</h4>
                <div class="scrollable">
                    <?php if (isset($news['data']) && count($news['data']) > 0): ?>
                        <?php foreach ($news['data'] as $article): ?>
                            <div class="card shadow-sm">
                                <img src="<?= htmlspecialchars($article['image_url']) ?>" class="card-img-top" alt="News Image" style="height: 180px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($article['title']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($article['description']) ?></p>
                                    <small class="text-muted">Published at: <?= date('Y-m-d H:i', strtotime($article['published_at'])) ?></small>
                                    <br>
                                    <a href="<?= htmlspecialchars($article['url']) ?>" target="_blank" class="btn btn-primary btn-sm mt-2">Read more</a>
`                                </div>
`                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-warning" role="alert">No news available.</div>
                    <?php endif; ?>
                </div>

                <h4 class="text-secondary mt-4">Topic News</h4>
                <?php
                // Example topics; replace with actual data if needed
                $topics = [
                    'fraud' => 'Fraud',
                    'stock' => 'Stock',
                    'investment' => 'Investment',
                    'market' => 'Market',
                    'crypto' => 'Cryptocurrency',
                    'global' => 'Global Markets'
                ];
                foreach ($topics as $key => $topic): ?>
                    <h5><?= htmlspecialchars($topic) ?></h5>
                    <div class="scrollable">
                        <?php $topicNews = fetchNews('', $key); // Fetch news for each topic 
                        ?>
                        <?php if (isset($topicNews['data']) && count($topicNews['data']) > 0): ?>
                            <?php foreach ($topicNews['data'] as $article): ?>
                                <div class="card shadow-sm">
                                    <img src="<?= htmlspecialchars($article['image_url']) ?>" class="card-img-top" alt="News Image" style="height: 180px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($article['title']) ?></h5>
                                        <p class="card-text"><?= htmlspecialchars($article['description']) ?></p>
                                        <small class="text-muted">Published at: <?= date('Y-m-d H:i', strtotime($article['published_at'])) ?></small>
                                        <br>
                                        <a href="<?= htmlspecialchars($article['url']) ?>" target="_blank" class="btn btn-primary btn-sm mt-2">Read more</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-warning" role="alert">No news available for this topic.</div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
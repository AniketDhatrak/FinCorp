<?php
$apiKey = 'PU6N4O3ptrL517RrRWGEEEwVjtrmSZ9T8elyhdyZ'; // Replace with your actual MarketAux API key
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

    // Append a random query parameter to prevent caching
    $url .= '&_=' . rand(1, 1000000);

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
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            width: 300px;
            display: inline-block;
            vertical-align: top;
            margin: 10px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            overflow: hidden;
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
        }

        .card-title {
            font-size: 1.1rem;
            height: auto;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 0.5rem;
        }

        .card-text {
            font-size: 0.9rem;
            max-height: 60px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            margin-bottom: 0.5rem;
        }

        .card-body {
            padding: 1rem;
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
            display: block;
            margin: 0 auto;
            width: 100%;
        }

        small {
            display: block;
            margin-top: 0.5rem;
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
                                <img src="<?= htmlspecialchars($article['image_url']) ?>" class="card-img-top" alt="News Image">
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
                    <h4 class="text-secondary"><?= htmlspecialchars($topic) ?></h4>
                    <div class="scrollable">
                        <?php $topicNews = fetchNews('', $key); // Fetch news for each topic ?>
                        <?php if (isset($topicNews['data']) && count($topicNews['data']) > 0): ?>
                            <?php foreach ($topicNews['data'] as $index => $article): ?>
                                <?php if ($index < 4): // Show only the first 4 news items ?>
                                    <div class="card shadow-sm">
                                        <img src="<?= htmlspecialchars($article['image_url']) ?>" class="card-img-top" alt="News Image">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= htmlspecialchars($article['title']) ?></h5>
                                            <p class="card-text"><?= htmlspecialchars($article['description']) ?></p>
                                            <small class="text-muted">Published at: <?= date('Y-m-d H:i', strtotime($article['published_at'])) ?></small>
                                            <br>
                                            <a href="<?= htmlspecialchars($article['url']) ?>" target="_blank" class="btn btn-primary btn-sm mt-2">Read more</a>
                                        </div>
                                    </div>
                                <?php endif; ?>
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

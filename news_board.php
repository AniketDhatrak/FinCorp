<?php
function fetchLatestNews()
{
    $queryString = http_build_query([
        'api_token' => 'boiqCcKFCAGKTrAG36tm4By0iW4kh47oH3hqsZIO',
        'symbols' => 'AAPL,TSLA',
        'filter_entities' => 'true',
        'limit' => 15, // Increase the limit to try fetching more articles
    ]);

    $ch = curl_init(sprintf('%s?%s', 'https://api.marketaux.com/v1/news/all', $queryString));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($ch);

    curl_close($ch);

    return json_decode($json, true);
}

$apiResult = fetchLatestNews();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial News Ticker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .news-ticker-container {
            background: #1e3c72;
            color: #ffffff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .news-ticker-header {
            font-weight: bold;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: start;
        }

        .news-ticker-header h6 {
            display: flex;
            align-items: center;
            font-size: 1.2em;
            font-weight: 600;
        }

        .news-ticker-header i {
            margin-right: 8px;
        }

        .news-list-container {
            overflow: hidden;
            height: 250px;
            /* Fixed height for the scrolling area */
            padding: 0;
            position: relative;
        }

        .news-list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            animation: scroll 60s linear infinite;
            /* Slower scroll */
        }

        .news-list li {
            display: flex;
            flex-direction: column;
            background: #2a5298;
            padding: 10px;
            margin-bottom: 8px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .news-list li:hover {
            background: #354c78;
        }

        .news-list p {
            margin: 0;
            color: #ffffff;
        }

        .news-list a {
            color: #ffdf00;
            text-decoration: none;
            margin-top: 5px;
            font-weight: 500;
        }

        .news-list a:hover {
            text-decoration: underline;
        }

        @keyframes scroll {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-50%);
                /* Scrolls halfway */
            }
        }

        .news-ticker-container:hover .news-list {
            animation-play-state: paused;
            /* Pause on hover */
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <div class="news-ticker-container">
            <div class="news-ticker-header">
                <h6><i class="far fa-newspaper"></i> Latest News</h6>
            </div>
            <div class="news-list-container">
                <ul class="news-list">
                    <?php
                    if (isset($apiResult['data']) && count($apiResult['data']) > 0) {
                        $displayedArticles = 0;
                        foreach ($apiResult['data'] as $news) {
                            if ($displayedArticles >= 10)
                                break; // Limit to 10 items
                            echo '<li>';
                            echo '<p>' . htmlspecialchars($news['title']) . '</p>';
                            echo '<p>' . htmlspecialchars(date("d M Y", strtotime($news['published_at']))) . '</p>';
                            echo '<a href="' . $news['url'] . '" target="_blank">Read more ....</a>';
                            echo '</li>';
                            $displayedArticles++;
                        }
                        // Repeat the same articles to create a seamless loop
                        $displayedArticles = 0;
                        foreach ($apiResult['data'] as $news) {
                            if ($displayedArticles >= 10)
                                break;
                            echo '<li>';
                            echo '<p>' . htmlspecialchars($news['title']) . '</p>';
                            echo '<p>' . htmlspecialchars(date("d M Y", strtotime($news['published_at']))) . '</p>';
                            echo '<a href="' . $news['url'] . '" target="_blank">Read more ....</a>';
                            echo '</li>';
                            $displayedArticles++;
                        }
                    } else {
                        echo '<li><p>No news available.</p></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Auto-refresh news every 15 minutes
        setInterval(function () {
            location.reload();
        }, 900000); // 900000 ms = 15 minutes
    </script>
</body>

</html>
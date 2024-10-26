<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Literacy Videos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .video-card {
            transition: transform 0.2s ease-in-out;
        }

        .video-card:hover {
            transform: scale(1.05);
        }

        .modal-body iframe {
            border: none;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <h1 class="text-center">Financial Literacy Videos</h1>
    <p class="text-center text-muted">Learn about various financial topics through our curated videos.</p>

    <!-- Tabs for Different Sections -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <?php
        $sections = ["Micro Loans", "Government Schemes", "Loans", "Business Loans", "Startup Loans", "Investment"];
        foreach ($sections as $index => $section) {
            $activeClass = $index === 0 ? 'active' : '';
            echo "<li class='nav-item'>
                    <a class='nav-link $activeClass' id='tab-$index' data-toggle='tab' href='#section-$index' role='tab'>$section</a>
                  </li>";
        }
        ?>
    </ul>

    <!-- Tab Content for Each Section -->
    <div class="tab-content my-4" id="myTabContent">
        <?php
        // YouTube video IDs and titles for each section
        $videos = [
            "Micro Loans" => [
                ["id" => "6b2XfWl4mV4", "title" => "What Are Micro Loans?"],
                ["id" => "F1XlLlGMRc4", "title" => "Microfinance in India"],
                ["id" => "fYiwViYzPBg", "title" => "Micro Loan Explained"],
                ["id" => "X14NqFT3oBg", "title" => "How Micro Loans Work"],
            ],
            "Government Schemes" => [
                ["id" => "Ba5E8sSCYpU", "title" => "Top Government Schemes in India"],
                ["id" => "_N1eUdqecjA", "title" => "Government Loan Schemes"],
                ["id" => "G35sVXp8m0Y", "title" => "How to Apply for Government Schemes"],
                ["id" => "UFAi5B3UOaY", "title" => "Overview of Government Schemes"],
            ],
            "Loans" => [
                ["id" => "dRLf3cHTH00", "title" => "Understanding Personal Loans"],
                ["id" => "HByzS3sLRV8", "title" => "Types of Loans"],
                ["id" => "3T0EhoCq03w", "title" => "Loan Application Process"],
                ["id" => "6O1w4Dzwu6c", "title" => "Loan Repayment Guide"],
            ],
            "Business Loans" => [
                ["id" => "HKyPeoT5XrE", "title" => "Business Loan Explained"],
                ["id" => "ZZLPC1DTw5s", "title" => "How to Get a Business Loan"],
                ["id" => "Ohg_WgtlWoU", "title" => "Best Business Loans for Startups"],
                ["id" => "zU8sbGqV8XU", "title" => "How to Apply for Business Loans"],
            ],
            "Startup Loans" => [
                ["id" => "FChP_eZxOhU", "title" => "Startup Loan Basics"],
                ["id" => "YN6ee_T75X0", "title" => "How to Secure Startup Funding"],
                ["id" => "RJZ7rNz8Isc", "title" => "Funding Options for Startups"],
                ["id" => "3oAqE-4toRQ", "title" => "How to Get a Startup Loan"],
            ],
            "Investment" => [
                ["id" => "Y0bx2GNB23M", "title" => "Investment Basics for Beginners"],
                ["id" => "A5n7fZgwkbA", "title" => "Types of Investments"],
                ["id" => "WoU1JbT90JY", "title" => "How to Start Investing"],
                ["id" => "H74SjWZ0r68", "title" => "Investment Strategies Explained"],
            ],
        ];

        foreach ($sections as $index => $section) {
            $activeClass = $index === 0 ? 'show active' : '';
            echo "<div class='tab-pane fade $activeClass' id='section-$index' role='tabpanel'>";
            echo "<h3 class='text-primary'>$section</h3>";
            echo "<p class='text-muted'>Discover videos related to $section that help improve your financial knowledge.</p>";
            echo "<div class='row'>";

            // Display relevant videos
            foreach ($videos[$section] as $video) {
                $video_id = $video["id"];
                $video_title = $video["title"];
                echo "<div class='col-md-3 mb-4'>
                        <div class='card video-card'>
                            <img src='https://img.youtube.com/vi/$video_id/hqdefault.jpg' class='card-img-top' alt='Video Thumbnail'>
                            <div class='card-body'>
                                <h5 class='card-title'>$video_title</h5>
                                <a href='#' class='btn btn-primary btn-block' onclick='showVideoModal(\"$video_title\", \"$video_id\")'>Watch Now</a>
                            </div>
                        </div>
                      </div>";
            }
            echo "</div></div>";
        }
        ?>
    </div>
</div>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Video Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="videoFrame" width="100%" height="400" src="" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS, jQuery, and Custom Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function showVideoModal(videoTitle, videoId) {
        $('#videoModalLabel').text(videoTitle);
        $('#videoFrame').attr('src', 'https://www.youtube.com/embed/' + videoId);
        $('#videoModal').modal('show');
    }

    // Clear video when modal is closed
    $('#videoModal').on('hidden.bs.modal', function () {
        $('#videoFrame').attr('src', '');
    });
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Literacy Videos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="container my-5">
    <h1 class="text-center">Financial Literacy Videos</h1>
    <p class="text-center text-muted">Learn about various financial topics through our curated videos.</p>

    <!-- Tabs for Different Sections -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <?php
        $sections = ["Micro Loans", "Government Schemes", "Loans", "Business Loans", "Startup Loans"];
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
        foreach ($sections as $index => $section) {
            $activeClass = $index === 0 ? 'show active' : '';
            echo "<div class='tab-pane fade $activeClass' id='section-$index' role='tabpanel'>";
            echo "<h3 class='text-primary'>$section</h3>";
            echo "<p class='text-muted'>Discover videos related to $section that help improve your financial knowledge.</p>";
            echo "<div class='row'>";

            // Dummy video thumbnails for illustration
            for ($i = 1; $i <= 4; $i++) {
                echo "<div class='col-md-3 mb-4'>
                        <div class='card video-card'>
                            <img src='https://via.placeholder.com/150' class='card-img-top' alt='Video Thumbnail'>
                            <div class='card-body'>
                                <h5 class='card-title'>$section Video $i</h5>
                                <a href='#' class='btn btn-primary btn-block' onclick='showVideoModal(\"$section Video $i\")'>Watch Now</a>
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
<script src="js/scripts.js"></script>
</body>
</html>

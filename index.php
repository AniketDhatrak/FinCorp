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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="Home">
    <meta name="author" content="Inovatik">

    <title>FinCorp</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- <link href="css/fontawesome-all.css" rel="stylesheet"> -->
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
    <!-- CSS for improved styling -->
    <style>
        .news-slide {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            border-radius: 10px;
            overflow: hidden;
            background-color: #f4f4f4;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .news-link {
            text-decoration: none;
            color: inherit;
        }

        .news-image {
            width: 100%;
            height: 150px;
            background-size: cover;
            background-position: center;
        }

        .news-content {
            padding: 15px;
        }

        .news-title {
            font-size: 1.1em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .news-description {
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">

            <a class="navbar-brand logo-image" href="index.html"><h3>FinCorp</h3></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#description">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features">Financial Schemes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#screens">Financial News</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-scroll" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">User</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="article-details.html"><span class="item-text">LogIn</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="terms-conditions.html"><span class="item-text">SignUp</span></a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                </ul>
                <span class="nav-item">
                    <a class="btn-outline-sm page-scroll" href="#download">FinBot</a>
                </span>
            </div>
        </div>
    </nav>


    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <h1>"Your guide to smarter financial decisions is here!"</h1>
                        <p class="p-large p-heading">Fincorp is a financial literacy website aimed at promoting economic development by offering information on various financial schemes, investment options, loans and microloans, making complex financial concepts accessible to public.</p>
                        <a class="btn-solid-lg" href="#your-link"><i class="fab fa-apple"></i>FinBot</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="deco-white-circle-1">
            <img src="images/decorative-white-circle.svg" alt="alternative">
        </div>
        <div class="deco-white-circle-2">
            <img src="images/decorative-white-circle.svg" alt="alternative">
        </div>
        <div class="deco-blue-circle">
            <img src="images/decorative-blue-circle.svg" alt="alternative">
        </div>
        <div class="deco-yellow-circle">
            <img src="images/decorative-yellow-circle.svg" alt="alternative">
        </div>
        <div class="deco-green-diamond">
            <img src="images/decorative-green-diamond.svg" alt="alternative">
        </div>
    </header>


    <div class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-image">
                            <i class="fa-solid fa-toilet-paper" style="color: #63E6BE; font-size: 3.25rem;
line-height: 7.5rem;"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Financial Schemes</h5>
                        </div>
                    </div>

                    <!-- <div class="card">
                        <div class="card-image green">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Financial Analysis</h5>
                        </div>
                    </div> -->

                    <div class="card">
                        <div class="card-image red">
                            <i class="fa-solid fa-newspaper" style="color: #B197FC; font-size: 3.25rem;
line-height: 7.5rem;"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Financial News</h5>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-image yellow">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Finance Bot</h5>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-image blue">
                            <i class="fa-solid fa-coins" style="color: #74C0FC ; font-size: 3.25rem;
line-height: 7.5rem;"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Finance Tracker</h5>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- <div id="description" class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="images/description-1-app.png" alt="alternative">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Organize Your Time And Start Getting Results</h2>
                        <p>Sync is the first mobile app on the market to harness the power of social connections to help you stop procrastinating and start getting things done. Give it a try and see the changes right away</p>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Analyse and evaluate your current status and productivity</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Begin monitoring your day to day routine with Sync app</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">See the improved results in no more than a couple of weeks</div>
                            </li>
                        </ul>
                        <a class="btn-solid-reg popup-with-move-anim" href="#description-1-details-lightbox">LIGHTBOX</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Details Lightbox -->
    <!-- <div id="description-1-details-lightbox" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
			<div class="col-lg-8">
                <div class="image-container">
                    <img class="img-fluid" src="images/description-1-details-lightbox.jpg" alt="alternative">
                </div>
			</div>
			<div class="col-lg-4">
                <h3>Goals Setting</h3>
				<hr>
                <p>The app can easily help you track your personal development evolution if you take the time to set it up.</p>
                <h4>User Feedback</h4>
                <p>This is a great app which can help you save time and make your live easier. And it will help improve your productivity.</p>
                <ul class="list-unstyled li-space-lg">
                    <li class="media">
                        <i class="far fa-check-square"></i><div class="media-body">Splash screen panel</div>
                    </li>
                    <li class="media">
                        <i class="far fa-check-square"></i><div class="media-body">Statistics graph report</div>
                    </li>
                    <li class="media">
                        <i class="far fa-check-square"></i><div class="media-body">Events calendar layout</div>
                    </li>
                    <li class="media">
                        <i class="far fa-check-square"></i><div class="media-body">Location details screen</div>
                    </li>
                    <li class="media">
                        <i class="far fa-check-square"></i><div class="media-body">Onboarding steps interface</div>
                    </li>
                </ul>
                <a class="btn-solid-reg mfp-close page-scroll" href="#download">DOWNLOAD</a> <button class="btn-outline-reg mfp-close as-button" type="button">BACK</button>
			</div>
		</div>
    </div>  -->


    <!-- <div class="tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="tabs-container">

                        
                        <ul class="nav nav-tabs" id="cedoTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true"><i class="far fa-clock"></i>Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"><i class="fas fa-list"></i>Tracking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false"><i class="far fa-calendar-alt"></i>Organize</a>
                            </li>
                        </ul>
                        
                        <div class="tab-content" id="cedoTabsContent">
                             Tab -->
    <!-- <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                                <p><strong>Schedule tasks</strong> to keep track of their completion. Sync provides multiple scheduling options including alarms and reminders.</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="far fa-check-square"></i>
                                        <div class="media-body">You can always add new tasks or change the settings of existing ones in your calendar view or the app control panel</div>
                                    </li>
                                    <li class="media">
                                        <i class="far fa-check-square"></i>
                                        <div class="media-body">It's easy to stay focused on your most important daily activities that will get you closer to meeting your goals</div>
                                    </li>
                                    <li class="media">
                                        <i class="far fa-check-square"></i>
                                        <div class="media-body">Use phone reminders to free up your long term memory which will reduce stress and make you more productive</div>
                                    </li>
                                </ul>
                                <a class="btn-solid-reg page-scroll" href="terms-conditions.html">TERMS</a> <a class="btn-outline-reg page-scroll" href="privacy-policy.html">PRIVACY</a>
                            </div>
                      
                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                                <p><strong>Keep track of everything</strong> and analyse your progress while using the app. In less than a month you should be seeing improved results when it comes to time management and task prioritization</p>
                                <p><strong>Anyone can enjoy the app</strong> no matter their gender, age, occupation or location in the world. Sync's algorithms have been built to be flexible and functional for any person in the world</p>
                                <p><strong>Achieve the impossible</strong> just by carefully monitoring your progress and keeping the app updated with daily operations. It's easier than you think and it only takes a couple of minutes</p>
                                <a class="red" href="terms-conditions.html">Terms & Conditions >></a>
                            </div>
                       
                            <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                                <p><strong>Use the power of social interactivity</strong> to keep you motivated and focused on your daily and long term goals. It's revolutionary</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="far fa-check-square"></i>
                                        <div class="media-body">Commiting to something in front of a crowd gives you little room to walk back on your promise and makes you push on</div>
                                    </li>
                                    <li class="media">
                                        <i class="far fa-check-square"></i>
                                        <div class="media-body">No more frustrations of loosing focus and not being efficient. Sync main purpose is to solve just that and make you happy</div>
                                    </li>
                                    <li class="media">
                                        <i class="far fa-check-square"></i>
                                        <div class="media-body">It's the first mobile app that can turn you in a better organized person without the pressure of failing like other systems</div>
                                    </li>
                                    <li class="media">
                                        <i class="far fa-check-square"></i>
                                        <div class="media-body">Recognized by a lot of trainers and life coaches Sync is the number one tool they recommend time management</div>
                                    </li>
                                </ul>
                            </div> 
                        </div> 
                        
                    
                    </div> 
                </div> 
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="images/description-2-app.png" alt="alternative">
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <!-- Financial schemes -->
    <div id="features" class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Financial Schemes</h2>
                    <p class="p-heading">Financial schemes are structured plans or programs, often by governments or institutions, designed to provide financial assistance, investment opportunities, or savings options to support economic well-being</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <ul class="list-unstyled li-space-lg first">
                        <li class="media">
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fa-solid fa-house fa-stack-1x"></i>
                            </span>
                            <div class="media-body">
                                <h4>Micro Loans</h4>
                                <p> Small, short-term loans typically offered to low-income individuals to help them start or expand their operations.</p>
                            </div>
                        </li>
                        <li class="media">
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x green"></i>
                                <i class="fa-solid fa-landmark-dome fa-stack-1x"></i>
                            </span>
                            <div class="media-body">
                                <h4>Government Schemes</h4>
                                <p>Provides financial assistance, services, or benefits to promote welfare, development, and economic growth.</p>
                            </div>
                        </li>
                        <li class="media">
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x red"></i>
                                <i class="fa-solid fa-money-bill-trend-up fa-stack-1x"></i>
                            </span>
                            <div class="media-body">
                                <h4>SIP</h4>
                                <p>Investment strategy that allows to invest a fixed amount regularly in mutual funds, helping to build wealth over time.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <img class="img-fluid" src="images/finscheme.jpg" alt="alternative">
                </div>
                <div class="col-lg-4">
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x yellow"></i>
                                <i class="fa-solid fa-building fa-stack-1x"></i>
                            </span>
                            <div class="media-body">
                                <h4>Business Loans</h4>
                                <p>Funds borrowed by businesses to finance operations, expansion, or capital expenditures, typically requiring repayment with interest.</p>
                            </div>
                        </li>
                        <li class="media">
                            <span class="fa-stack">
                                <i class="fa-solid fa-circle fa-stack-2x" style="color: blue;"></i>
                                <i class="fa-solid fa-landmark fa-stack-1x"></i>
                            </span>
                            <div class="media-body">
                                <h4>Private Schemes</h4>
                                <p>Financial programs or investment plans offered by private institutions, designed to provide specific benefits or returns.</p>
                            </div>
                        </li>
                        <li class="media">
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fa-solid fa-money-bill-transfer fa-2xs fa-stack-1x"></i>
                            </span>
                            <div class="media-body">
                                <h4>SWP</h4>
                                <p>Allows investors to withdraw a fixed amount of money regularly from their mutual fund investments, providing a steady income stream while maintaining investment in the fund.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- financial news -->
    <!-- Slider HTML -->
    <div id="newsSlider" class="slider">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Header for Latest News -->
                <h2 class="text-center mb-4">Latest News</h2>
                
                    <div class="slider-container">
                        <div class="swiper-container news-slider">
                            <div class="swiper-wrapper">
                                <?php if (!empty($news['data'])): ?>
                                    <?php foreach ($news['data'] as $index => $article): ?>
                                        <?php if ($index >= 10) break; // Limit to 10+ news items 
                                        ?>
                                        <div class="swiper-slide news-slide">
                                            <a href="<?php echo $article['url']; ?>" target="_blank" class="news-link" data-effect="fadeIn">
                                                <div class="news-image" style="background-image: url('<?php echo htmlspecialchars($article['image_url']); ?>');"></div>
                                                <div class="news-content">
                                                    <h4 class="news-title"><?php echo htmlspecialchars($article['title']); ?></h4>
                                                    <p class="news-description"><?php echo htmlspecialchars($article['description']); ?></p>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="swiper-slide">
                                        <p>No news articles available.</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Testimonials -->
    <!-- <div class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>User Testimonials</h2>
                </div> 
            </div> 
            <div class="row">
                <div class="col-lg-12"> -->

    <!-- Card -->
    <!-- <div class="card">
                        <div class="card-image">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <hr class="testimonial-line">
                        </div>
                        <div class="card-body">
                            <div class="testimonial-text">I love using Sync for my personal development needs. It meets all my requirements and it actually helps a lot with focusing skills.</div>
                            <div class="testimonial-author">Rick Jones - Designer</div>
                        </div>
                    </div> -->
    <!-- Card -->
    <!-- <div class="card">
                        <div class="card-image">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <hr class="testimonial-line">
                        </div>
                        <div class="card-body">
                            <div class="testimonial-text">After trying out a large number of personal coaching apps I decided to give Sync a try and what a wonderful surprise it was.</div>
                            <div class="testimonial-author">Lynda Marquez - Developer</div>
                        </div>
                    </div> -->

    <!-- Card -->
    <!-- <div class="card">
                        <div class="card-image">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <hr class="testimonial-line">
                        </div>
                        <div class="card-body">
                            <div class="testimonial-text">Never dreamed I could learn so fast how to focus on my personal goals and improve my life to levels I never thought possible.</div>
                            <div class="testimonial-author">Jay Frisco - Marketer</div>
                        </div>
                    </div> -->
    <!-- end of card -->
    <!-- 
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="image-container">
                        <img class="img-fluid" src="images/customer-logo-1.png" alt="alternative">
                        <img class="img-fluid" src="images/customer-logo-2.png" alt="alternative">
                        <img class="img-fluid" src="images/customer-logo-3.png" alt="alternative">
                        <img class="img-fluid" src="images/customer-logo-4.png" alt="alternative">
                        <img class="img-fluid" src="images/customer-logo-5.png" alt="alternative">
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-lg-12"> -->

    <!-- Card -->
    <!-- <div class="card">
                        <div class="card-image">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <hr class="testimonial-line">
                        </div>
                        <div class="card-body">
                            <div class="testimonial-text">I got so much value from using Sync in my daily life for which I am very grateful and would recommend it to everybody</div>
                            <div class="testimonial-author">Frank Gibson - Manager</div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-image">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <hr class="testimonial-line">
                        </div>
                        <div class="card-body">
                            <div class="testimonial-text">If you have great goals but can't figure out a way to keep focused then you should definitely give Sync a try and see the results</div>
                            <div class="testimonial-author">Rita Longmile - Designer</div>
                        </div>
                    </div>
                   
                    <div class="card">
                        <div class="card-image">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <hr class="testimonial-line">
                        </div>
                        <div class="card-body">
                            <div class="testimonial-text">I've been looking for a great organizer app for such a long time but now I am really happy that I found Sync. It's beeen working great</div>
                            <div class="testimonial-author">Jones Smith - Developer</div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div> -->


    <!-- Statistics -->
    <!-- <div class="counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                  
                    <div id="counter">
                        <div class="cell">
                            <i class="fas fa-users"></i>
                            <div class="counter-value number-count" data-count="231">1</div>
                            <p class="counter-info">Happy Users</p>
                        </div>
                        <div class="cell">
                            <i class="fas fa-code green"></i>
                            <div class="counter-value number-count" data-count="385">1</div>
                            <p class="counter-info">Issues Solved</p>
                        </div>
                        <div class="cell">
                            <i class="fas fa-cog red"></i>
                            <div class="counter-value number-count" data-count="159">1</div>
                            <p class="counter-info">Good Reviews</p>
                        </div>
                        <div class="cell">
                            <i class="fas fa-comments yellow"></i>
                            <div class="counter-value number-count" data-count="127">1</div>
                            <p class="counter-info">Case Studies</p>
                        </div>
                        <div class="cell">
                            <i class="fas fa-rocket blue"></i>
                            <div class="counter-value number-count" data-count="211">1</div>
                            <p class="counter-info">Orders Received</p>
                        </div>
                    </div> 
                    

                </div>
            </div>
        </div>
    </div> -->


    <!-- Download -->
    <!-- <div id="download" class="basic-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="image-container">
                        <img class="img-fluid" src="images/download-iphone.png" alt="alternative">
                    </div>
                    <p class="p-large">Do you feel like you're wasting time with small stuff instead of working towards your goals? Start using Sync to organize your time and get a grip on your personal development</p>
                    <a class="btn-solid-lg" href="#your-link"><i class="fab fa-apple"></i>DOWNLOAD</a>
                    <a class="btn-solid-lg" href="#your-link"><i class="fab fa-google-play"></i>DOWNLOAD</a>
                </div>
            </div>
        </div>
        <div class="deco-white-circle-1">
            <img src="images/decorative-white-circle.svg" alt="alternative">
        </div>
        <div class="deco-white-circle-2">
            <img src="images/decorative-white-circle.svg" alt="alternative">
        </div>
        <div class="deco-blue-circle">
            <img src="images/decorative-blue-circle.svg" alt="alternative">
        </div>
        <div class="deco-yellow-circle">
            <img src="images/decorative-yellow-circle.svg" alt="alternative">
        </div> 
        <div class="deco-green-diamond">
            <img src="images/decorative-green-diamond.svg" alt="alternative">
        </div>
    </div>  -->

    <!-- Footer -->
    <!-- <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-col first">
                        <h5>About FinCorp</h5>
                        <p class="p-small">Fincorp is a financial literacy website aimed at promoting economic development by offering information on various financial schemes, investment options, loans and microloans, making complex financial concepts accessible to public.</p>
                    </div> 
                    <div class="footer-col second">
                        <h5>Contact Info</h5>
                        <ul class="list-unstyled li-space-lg p-small">
                            <li class="media">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="media-body">Atlas, kurla, India</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-envelope"></i>
                                <div class="media-body"><a href="#your-link">office@gmail.com</a></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-phone-alt"></i>
                                <div class="media-body"><a href="#your-link">+91 9999999999</a></div>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col third">
                        <h5>Value Links</h5>
                        <ul class="list-unstyled li-space-lg p-small">
                            <li><a href="terms-conditions.html">Terms & Conditions</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="article-details.html">news</a></li>
                        </ul>
                    </div>
                   
                    <div class="footer-col fifth">
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-pinterest-p fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                    </div> 
                </div> 
            </div>
    </div> -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2020 <a href="#">FinCorp</a> - All rights reserved</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <!-- <script src="js/swiper.min.js"></script> -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->

    <script src="js/scripts.js"></script> <!-- Custom scripts -->
    <!-- Include Swiper JS and initialize continuous scrolling -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
    const swiper = new Swiper('.news-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

    <script src="https://kit.fontawesome.com/ae3714a579.js" crossorigin="anonymous"></script>
</body>

</html> 
<?php
$json = file_get_contents('statistics-probability.json');
$courses = json_decode($json, true);

// Default course index
$courseIndex = 0;

if (isset($_GET['course']) && is_numeric($_GET['course'])) {
  $courseIndex = (int)$_GET['course'];

  // Ensure courseIndex is within bounds
  if ($courseIndex < 0 || $courseIndex >= count($courses)) {
    $courseIndex = 0; // Fallback to default if out of bounds
  }
}

$currentCourse = $courses[$courseIndex];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Place favicon.ico in the root directory -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/favicon.png" />

  <!-- All CSS -->
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/aos.css" />
  <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
  <link rel="stylesheet" href="assets/css/slick.css" />
  <link rel="stylesheet" href="assets/css/nice-select.css" />
  <link rel="stylesheet" href="assets/css/odometer.css" />
  <link rel="stylesheet" href="assets/css/venobox.min.css" />
  <link rel="stylesheet" href="assets/css/spacing.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

  <title>Mathematics Course</title>
</head>

<body>
  <!-- main-page-wrapper start -->
  <div class="main-page-wrapper">
    <!-- preloader start -->
    <!-- <div id="preloader">
      <div id="ctn-preloader" class="ctn-preloader">
        <div class="icon">
          <img src="assets/img/logo/favicon.png" alt="" class="m-auto d-block" width="60" />
        </div>
        <div class="txt-loading">
          <span data-text-preloader="M" class="letters-loading"> M </span>
          <span data-text-preloader="a" class="letters-loading"> a </span>
          <span data-text-preloader="t" class="letters-loading"> t </span>
          <span data-text-preloader="h" class="letters-loading"> h </span>
          <span data-text-preloader="e" class="letters-loading"> e </span>
          <span data-text-preloader="m" class="letters-loading"> m </span>
          <span data-text-preloader="a" class="letters-loading"> a </span>
          <span data-text-preloader="t" class="letters-loading"> t </span>
          <span data-text-preloader="i" class="letters-loading"> i </span>
          <span data-text-preloader="c" class="letters-loading"> c </span>
          <span data-text-preloader="s" class="letters-loading"> s </span>
        </div>
      </div>
    </div> -->
    <!-- preloader end -->

    <main>
      <!-- Breadcrumb start -->
      <div class="breadcrumb-section pt-190 pb-150 pt-lg-120 pb-lg-120 pt-md-80 pb-md-80 pt-xs-50 pb-xs-50" style="background-image: url(assets/img/logo-course/banner.jpg)">
        <div class="container">
          <div class="row">
            <div class="col-xl-12">
              <div class="page-title-content">
                <h2 class="title"><?php echo $currentCourse['title-list']; ?></h2>
                <div class="breadcrumb-menu">
                  <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>
                      <a href="statistics-probability.php?course=<?php echo $courseIndex; ?>"><?php echo $currentCourse['title-list']; ?></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Breadcrumb end -->

      <!-- Course Details start -->
      <div class="course-details-section pt-150 pb-150 pt-lg-120 pb-lg-120 pt-md-80 pb-md-80 pt-xs-50 pb-xs-50">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
              <div class="main-content-wrap">
                <div class="course-header">
                  <div class="course-header-title">
                    <h2><?php echo $currentCourse['title-list']; ?></h2>
                  </div>
                  <div class="course-header-img">
                    <div class="plyr__video-embed" id="player">
                      <iframe style="position: relative;" src="<?php echo $currentCourse['video'] ?>" allowfullscreen allowtransparency allow="autoplay"></iframe>
                    </div>
                  </div>
                </div>
                <div class="course-description-wrap">
                  <div class="course-description-title">
                    <h3>Course Description</h3>
                    <div class="bar"></div>
                  </div>
                  <div class="course-description-text">
                    <p><?php echo $currentCourse['description']; ?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-5 col-lg-4 mt-lg-50 mt-md-50 mt-xs-50">
              <div class="sidebar-wrap widget-wrapper sidebar-wrap-right" style="padding: 40px 0;">
                <div class="sidebar-widget-wrap mb-40">
                  <h4 class="widget-title">Course List</h4>
                  <div class="widget-content">
                    <div class="category-list">
                      <ul>
                        <?php foreach ($courses as $index => $course) : ?>
                          <li>
                            <a href="statistics-probability.php?course=<?php echo $index; ?>">
                              <span><i class="fa-light fa-square<?php echo ($index == $courseIndex) ? '-check' : ''; ?>" style="color:<?php echo ($index == $courseIndex) ? 'green' : 'inherit'; ?>;"></i> <?php echo $course['title-list']; ?></span>
                            </a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="sidebar-widget-wrap">
                  <h4 class="widget-title">Quiz</h4>
                  <div class="widget-content">
                    <div class="category-list">
                      <ul>
                        <li>
                          <a href="#" style="pointer-events: none; cursor: not-allowed; color: gray;text-decoration: none; opacity: 0.5;">
                            <span><i class="fa-light fa-square"></i> Quiz 1</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Course Details end -->

      <!-- Footer start -->
      <footer>
        <div class="footer-section">
          <div class="footer-copyright pt-60 pb-60 pt-lg-40 pb-lg-40 pt-md-30 pb-md-30 pt-xs-25 pb-xs-25">
            <div class="container">
              <div class="row text-center">
                <div class="col-xl-12">
                  <div class="copyright-text">
                    <p>Copyright @ 2024</a>. All Rights Reserved.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- Footer end -->

      <!--scrollToTopBtn end-->
      <a id="scrollToTopBtn" class="progress-wrap">
        <i class="fa-regular fa-arrow-up-from-bracket"></i>
      </a>

  </div>
  <!-- main-page-wrapper end -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/swiper-bundle.min.js"></script>
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/jquery.nice-select.min.js"></script>
  <script src="assets/js/odometer.min.js"></script>
  <script src="assets/js/jquery-ui.js"></script>
  <script src="assets/js/jquery-ui-slider-range.js"></script>
  <script src="assets/js/venobox.min.js"></script>
  <script src="assets/js/isotope.pkgd.min.js"></script>
  <script src="assets/js/imagesloaded.pkgd.min.js"></script>
  <script src="assets/js/ajax-form.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://kit.fontawesome.com/6628cfd99d.js" crossorigin="anonymous"></script>
  <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
</body>

</html>
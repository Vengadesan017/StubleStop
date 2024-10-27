<?php 

  include_once 'session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stubble Stop - Home</title>
    <link rel="icon" type="image/jpeg" href="../img/favicon.jpeg">
    <link rel="stylesheet" type="text/css" href="../css/universal.css">
    <link rel="stylesheet" type="text/css" href="../css/error.css">
    <link rel="stylesheet" type="text/css" href="../css/Farmer/FarmerHome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- Header Section -->
    <header>
        
        <h1 class="app-name">STUBBLE STOP</h1>
    </header>
    <?php 
        if (isset($_SESSION['error'])) {
        print_r(" <div class='alert alert-danger alert-dismissible'>
                ".$_SESSION['error']."<div class='close'>&times;</div>
                </div>
            ");
            unset($_SESSION['error']);
        } 
        if (isset($_SESSION['msg'])) {
        print_r(" <div class='alert alert-success alert-dismissible'>
                ".$_SESSION['msg']."<div class='close'>&times;</div>
                </div>
            ");
            unset($_SESSION['msg']);
        } 
    ?>
    <!-- Slogan Section -->
    <section class="slogan-section">
        <h2>Growing Together, Greener Together </h2>
        <p>Building a Future Beyond Carbon&#127807;</p>
    </section>

  <!-- Process Explanation in Cards -->
  <section class="process-section container">
    <h2 class="process-title">Our Eco-Friendly Stubble Management Process</h2>
    <div id="processCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Step 1: Create a Post for Land Clearing -->
            <div class="carousel-item active">
                <div class="card process-card">
                    <img src="../img/Farmer/home2post.png" class="card-img-top" alt="Create Land Post">
                    <div class="card-body">
                        <h5 class="card-title">Step 1: Create a Post to Clear Your Land</h5>
                        <p class="card-text">Farmers can easily create posts specifying their land clearing requirements. This ensures clarity in tasks and helps to prepare for the next planting season.</p>
                    </div>
                </div>
            </div>
            <!-- Step 2: Assign Labor and Equipment -->
            <div class="carousel-item">
                <div class="card process-card">
                    <img src="../img/Farmer/home2store.png" class="card-img-top" alt="Assign Labor">
                    <div class="card-body">
                        <h5 class="card-title">Step 2: Assign Labor and Baling Equipment</h5>
                        <p class="card-text">We coordinate laborers and equip baling machines and transport vehicles to efficiently collect and process stubble, ensuring a smooth operation.</p>
                    </div>
                </div>
            </div>
            <!-- Step 3: Store Stubble Temporarily -->
            <div class="carousel-item">
                <div class="card process-card">
                    <img src="../img/Farmer/home2labour.png" class="card-img-top" alt="Decentralized Storage">
                    <div class="card-body">
                        <h5 class="card-title">Step 3: Store in a Decentralized Store Room</h5>
                        <p class="card-text">Collected straw is stored temporarily in a decentralized store room, ensuring its safety and readiness for distribution to manufacturers.</p>
                    </div>
                </div>
            </div>
            <!-- Step 4: Distribute to Manufacturers -->
            <div class="carousel-item">
                <div class="card process-card">
                    <img src="../img/Farmer/home2manufacturer.png" class="card-img-top" alt="Distribute to Manufacturers">
                    <div class="card-body">
                        <h5 class="card-title">Step 4: Distribute the Collected Straw to Manufacturers</h5>
                        <p class="card-text">The processed straw is then distributed to manufacturers looking for sustainable raw materials, contributing to a circular economy.</p>
                    </div>
                </div>
            </div>
            <!-- Step 5: Share Fair Profit -->
            <div class="carousel-item">
                <div class="card process-card">
                    <img src="../img/Farmer/home2money.png" class="card-img-top" alt="Profit Sharing">
                    <div class="card-body">
                        <h5 class="card-title">Step 5: Share Fair Profit Money with You</h5>
                        <p class="card-text">Once the straw is sold, profits are fairly distributed among all stakeholders, ensuring that everyone benefits from sustainable practices.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#processCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#processCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

 <!-- About Stubble Stop Section -->
 <section class="about-section container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2>What Does Stubble Stop Do?</h2>
            <p>
                <strong>Stubble Stop</strong> is an innovative platform committed to creating a greener and more sustainable future. By offering a solution to the widespread problem of stubble burning, our platform enables farmers to connect with a network of professionals—laborers, straw balers, manufacturers, and transporters—to effectively manage and repurpose crop residues. This initiative not only helps reduce harmful carbon emissions but also promotes eco-friendly practices that contribute to global sustainability efforts.
            </p>
            <p>
                Our mission is to help farmers turn agricultural waste into valuable resources, improving their economic well-being while simultaneously protecting the environment. Stubble Stop empowers farmers to stop burning stubble and instead participate in a profitable, eco-friendly alternative. By bringing together all stakeholders in the stubble management process, we ensure that agricultural waste is collected, processed, and reused efficiently, helping industries such as biofuels, animal feed, and more.
            </p>
        </div>
        <div class="col-md-6">
            <img src="../img/Farmer/aboutstubblestop.png" alt="Stubble Stop Process" class="img-fluid rounded shadow animated-image">
        </div>
        
    </div>
</section>
   <!-- Impact and Benefits Section -->
<section class="impact-section container">
    <h2 class="impact">Impact and Benefits</h2>
    <div class="impact-grid">
        <!-- Carbon Footprint Reduction -->
        <div class="impact-item">
            <img src="../img/Farmer/reductioncarbonemission.png" alt="Carbon Footprint Reduction" class="impact-image">
            <p class="impact-percentage">60% Reduction in Carbon Emissions</p>
        </div>

        <!-- Farmer's Income Increase -->
        <div class="impact-item">
            <img src="../img/Farmer/increasefarmerincome.png" alt="Farmer's Income Increase" class="impact-image">
            <p class="impact-percentage">50% Increase in Farmers' Income</p>
        </div>

        <!-- Manufacturers' Material Usage -->
        <div class="impact-item">
            <img src="../img/Farmer/rawmaterialreuse.png" alt="Manufacturers' Material Usage" class="impact-image">
            <p class="impact-percentage">70% Raw Material Reuse by Manufacturers</p>
        </div>

        <!-- Sustainability Improvement -->
        <div class="impact-item">
            <img src="../img/Farmer/overallsustainibility.png" alt="Sustainability Improvement" class="impact-image">
            <p class="impact-percentage">80% Overall Sustainability Improvement</p>
        </div>
    </div>
</section>
<!-- Feedback Form Section -->
<section class="feedback-section container">
    <h2>We Value Your Feedback!</h2>
    <p class="feedback-description">
        Your feedback is important to us. Please share your thoughts about the Stubble Stop app to help us improve your experience.
    </p>
    <div class="visme_d" 
         data-title="Untitled Project" 
         data-url="rx7ywzy0-untitled-project" 
         data-domain="forms" 
         data-full-page="false" 
         data-min-height="500px" 
         data-form-id="96661">
    </div>
    <script src="https://static-bundles.visme.co/forms/vismeforms-embed.js"></script>
</section>

    <!-- Footer Section -->
    <footer class="footer">
        <p>© 2024 Stubble Stop - Reducing Stubble Burning, Saving the Planet!</p>
    </footer>
<!-- Bottom Navigation Bar -->
<nav class="navbar navbar-light bg-light navbar-expand fixed-bottom">
    <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item">
            <a class="nav-link text-center active" href="Home.php">
                <i class="fas fa-home"></i><br>Home
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center " href="Post.php">
                <i class="fas fa-edit"></i><br>Post
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" href="Status.php">
                <i class="fas fa-info-circle"></i><br>Status
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" href="Wallet.php">
                <i class="fas fa-wallet"></i><br>Wallet
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center " href="Profile.php">
                <i class="fas fa-user"></i><br>Profile
            </a>
        </li>
    </ul>
</nav>
    <script src="../js/error.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

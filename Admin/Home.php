<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stubble Solve Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/Admin/Home.css">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">STUBBLE SOLVE</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Storerooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Workers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manufacturers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Section -->
    <div class="container mt-4">
        <div class="row">
            <!-- Left Column (Content) -->
            <div class="col-md-9">
                <div class="post-card mb-4">
                    <div class="row">
                        <!-- First Card (Crop Details) -->
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="text-light">Crop Type: Rice</h5>
                                    <p>Location: 43de, xxxx, Punjab</p>
                                    <p>Field Size: 1000 acres</p>
                                    <p>Deadline: 21/12/24</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Second Card (Human Power Details) -->
                        <div class="col-md-6 mb-3 ">
                            <div class="card shadow-sm">
                                <div class="card-body" id="one">
                                    <p>Needed Human Power: 20 Persons</p>
                                    <p>Enrolled Human Power: 30 Persons</p>
                                    <p>Committed Human Power: 18 Persons</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>

                <!-- Duplicate post section for display -->
                <div class="post-card mb-4">
                    <div class="row">
                        <!-- First Card (Crop Details) -->
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="text-light">Crop Type: Rice</h5>
                                    <p>Location: 43de, xxxx, Punjab</p>
                                    <p>Field Size: 1000 acres</p>
                                    <p>Deadline: 21/12/24</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Second Card (Human Power Details) -->
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm">
                                <div class="card-body" id="two">
                                    <p>Needed Human Power: 20 Persons</p>
                                    <p>Enrolled Human Power: 30 Persons</p>
                                    <p>Committed Human Power: 18 Persons</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>

            <!-- Right Column (Filter) -->
            <div class="col-md-3">
                <div>
                    <div class="filter-box mb-2">
                    <div class="apply_filter">
                    <h5>Apply Filter</h5>
                    </div>
                   </div>
                    <!-- New Posts Filter -->
                    <div class="filter-box mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="newPosts">
                            <label class="form-check-label" for="newPosts">New Posts</label>
                        </div>
                    </div>
            
                    <!-- Committed Filter -->
                    <div class="filter-box mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="committed">
                            <label class="form-check-label" for="committed">Committed</label>
                        </div>
                    </div>
            
                    <!-- Completed Filter -->
                    <div class="filter-box mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="completed">
                            <label class="form-check-label" for="completed">Completed</label>
                        </div>
                    </div>
            
                    <!-- Verified Filter -->
                    <div class="filter-box mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="verified">
                            <label class="form-check-label" for="verified">Verified</label>
                        </div>
                    </div>
            
                    <!-- Payment Filter -->
                    <div class="filter-box mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="payment">
                            <label class="form-check-label" for="payment">Payment</label>
                        </div>
                    </div>
            
                    <!-- From Date Filter -->
                    <div class="filter-box mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="fromDate">
                            <label class="form-check-label" for="fromDate">From Date</label>
                        </div>
                    </div>
            
                    <!-- To Date Filter -->
                    <div class="filter-box mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="toDate">
                            <label class="form-check-label" for="toDate">To Date</label>
                        </div>
                    </div>
            
                </div>
            </div>
            

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>

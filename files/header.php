<?php session_start(); ?>

	
<div class="container-fluid"> 
		<div class="row align-items-center">
			<div class="col-sm-8"  >
				<a href="index.php"><img src="../images/dogworld LOGO.png" alt="Dog world logo" width="400px"></a> 
			</div>
			<?php 
			if ($_SESSION["usertype"]=="admin"){
				echo " <div class="col-sm-2 align-self-center">
				<a href="../files/adminHome.html" class="btn btn-light" role="button">Admin Home</a>
				</div> ";
			} ?>
			<div class="col-sm-1 align-self-center">
				<a href="../files/login.html" class="btn btn-light" role="button">Sign In</a>
			</div>
			<div class="col-sm-1 align-self-center">
				<a href="../files/viewCart.html" class="btn btn-light" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
  				<path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
				</svg></a>
			</div>
			
		
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container-fluid">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li class="nav-item">
			  <a class="nav-link" href="/files/browse.php">Featured</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="/files/browse.html">All Dogs</a>
			</li>
			 <li class="nav-item">
			  <a class="nav-link" href="/files/browse.html">Shop by Breed</a>
			</li>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				Dropdown
			  </a>
			  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				<li><a class="dropdown-item" href="#">Action</a></li>
				<li><a class="dropdown-item" href="#">Another action</a></li>
				<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="#">Something else here</a></li>
			  </ul>
			</li>
		  </ul>
		  <form class="d-flex">
			<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success" type="submit">Search</button>
		  </form>
		</div>
	  </div>
	</nav>
	
	</div>
	
	<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

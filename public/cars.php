<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<title>Claires's Cars - Our Cars</title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: 10:00-16:00</p>
			</aside>
			<img src="images/logo.png"/>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="cars.php">Showroom</a></li>
			<li><a href="about.html">About Us</a></li>
			<li><a href="contact.php">Contact us</a></li>
		</ul>
	</nav>
		<img src="images/randombanner.php"/>
	<main class="admin">

	<section class="left">
		<ul>
			<li><a href="jaguar.php">Jaguar</a></li>
			<li><a href="mercedes.php">Mercedes</a></li>
			<li><a href="aston.php">Aston Martin</a></li>

		</ul>
	</section>

	<section class="right">

		<h1>Our cars</h1>

	<ul class="cars">


	<?php
	$server = '127.0.0.1';$username = 'root';$password = '';$schema = 'cars';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	$cars = $pdo->prepare('SELECT * FROM cars LIMIT 10');
	$manu = $pdo->prepare('SELECT * FROM manufacturers WHERE id = :id');

	$cars->execute();


	foreach ($cars as $car) {
		$manu->execute(['id' => $car['manufacturerId']]);
		$manufacturer = $manu->fetch();
		echo '<li>';

		if (file_exists('images/cars/' . $car['id'] . '.jpg')) {
			echo '<a href="images/cars/' . $car['id'] . '.jpg"><img src="images/cars/' . $car['id'] . '.jpg" /></a>';
		}

		echo '<div class="details">';
		echo '<h2>' . $manufacturer['name'] . ' ' . $car['name'] . '</h2>';
		echo '<h3>£' . $car['price'] . '</h3>';
		echo '<p>' . $car['description'] . '</p>';

		echo '</div>';
		echo '</li>';
	}

	?>

</ul>

</section>
	</main>


	<footer>
		&copy; Claire's Cars 2018
	</footer>
</body>
</html>

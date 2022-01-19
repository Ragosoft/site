<?php
if ( !empty($_POST) && trim($_POST['surname']) != '' && trim($_POST['name']) != '' && trim($_POST['email']) != '' && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && trim($_POST['phone']) != '' && trim($_POST['message']) != '' ) {

    $message =  "Je hebt een nieuw bericht van de klant Ragosoft ontvangen: <br><br>\n" .
                "<strong>Voornaam van de verzender: </strong>" . strip_tags($_POST['surname']) . "<br>\n" .
                "<strong>Achternaam van de verzender: </strong>" . strip_tags($_POST['name']) . "<br>\n" .
                "<strong>E-mailadres van de verzender: </strong>" . strip_tags($_POST['email']) . "<br>\n" .
                "<strong>Telefoonnummer van de verzender: </strong>" . strip_tags($_POST['phone']) . "<br>\n" .
                "<strong>Vraag van de verzender: </strong>" . strip_tags($_POST['message']);

    $subject = "=?utf-8?B?".base64_encode("Bericht van de klant Ragosoft!")."?=";

    $email_from = "info@ragosoft.org";
    $name_from = "Ragosoft.be";

    $headers = "MIME-Version: 1.0" . PHP_EOL . 
                "Content-Type: text/html; charset=utf-8" . PHP_EOL .
                "From: " . "=?utf-8?B?".base64_encode($name_from)."?=" . "<" . $email_from . ">" . PHP_EOL . 
                "Reply-To: " . $email_from . PHP_EOL;

    $sendResult = mail('email hier', $subject, $message, $headers);

    if ( $sendResult ) {

        header ('Location:send.php');

        // $success = "<div class=\"success\">Uw bericht is succesvol verzonden!</div>";
    } else {
        $failure = "<div class=\"error\">Uw bericht is niet verzonden! Probier nog een keer a.u.b!</div>";
    }
    
}
function checkValue($item, $message ) {
    if ( isset($item) && trim($item) == '' ) {
        echo '<div class="error">' . $message . '</div>';
    }
}
function printPostValue($item){
    if ( isset($item) && strlen(trim($item)) > 0 ) { 
        echo $item;
    }
}
function checkEmail($email){
    if ( isset($email) && trim($email) == '' ) {
        echo '<div class="error">Voer uw E-mailadres in.</div>';
    } else if ( isset($email) && !filter_var($email, FILTER_VALIDATE_EMAIL) ){
        echo '<div class="error">Voer het juiste E-mailadres in.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="nl-be">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
	<title>Sense4Flavour</title>
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
	<div class="wrapper">
		<header class="header">
			<nav class="navbar">
				<div class="nav__logo"><a href="#" alt="Sense4Flavor"><img src="images/logo.png"></a>
					<span>Sense4Flavor</span>
				</div>
				<ul class="nav__menu">
					<li class="nav__item"><a href="index.html" class="nav__link">Home</a></li>
					<li class="nav__item"><a href="menu.html" class="nav__link">Onze Menu</a></li>
					<li class="nav__item"><a href="gallery.html" class="nav__link">Gallerij</a></li>
					<li class="nav__item"><a href="about.html" class="nav__link">Over ons</a></li>
					<li class="nav__item"><a href="contact.php" class="nav__link">Contact</a></li>
				</ul>
				<div class="social__icons__top">
					<a href="#" title="Facebook"><img src="images/facebook.png"></a>
					<a href="#" title="Instagram"><img src="images/instagram.png"></a>
				</div>
				<div class="burger">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</div>
			</nav>
		</header>

		<div class="wrapper__form">
			<div class="overlay">
				<div class="content__wrapper">
					<h1>Contactformulier</h1>
					<hr class="form__hr">
					<form method="POST" action="contact.php" class="form-content">
						<?php
                        if ( isset($failure)) {
                            echo $failure;
                        }
                    ?>
						<?php
                        if (isset($success)) {
                            echo $success;
                        }
                    ?>
						<div class="form-group">
							<input type="text" id="name" required>
							<?php checkValue($_POST['surname'], 'Voer uw Voornaam in.'); ?>
							<label for="name"><i class="fas fa-user"></i> Voornaam</label>
						</div>
						<div class="form-group">
							<input type="text" id="surname" required>
							<label for="surname"><i class="fas fa-user"></i> Achternaam</label>
						</div>
						<div class="form-group">
							<input type="email" id="email" required>
							<label for="email"><i class="fas fa-envelope"></i> Email</label>
						</div>
						<div class="form-group">
							<input type="phone" id="phone" required>
							<label for="phone"><i class="fas fa-phone-square-alt"></i> Telefoonnummer</label>
						</div>
						<div class="form-group">
							<textarea rows="8" id="message" required></textarea>
							<label for="message"><i class="fas fa-comments"></i> Vraag</label>
						</div>
						<button type="submit" class="form__button">Verzenden</button>
					</form>
				</div>
			</div>
		</div>

		<footer class="footer">
			<div class="footer__row">
				<div class="contact__info">
					<h2>Contact info</h2>
					<hr class="contact__hr">
				</div>

				<div class="contact__columns">
					<div class="contact__item">
						<div class="contact-icon-paper-plane"><i class="fas fa-paper-plane"></i></div>
						<span class="contact__text">test01@gmail.com</span>
					</div>
					<div class="contact__item">
						<div class="contact-icon-map-marker"><i class="fas fa-map-marker-alt"></i></div>
						<span class="contact__text">straat, Belgie</span>
					</div>
					<div class="contact__item">
						<div class="contact-icon-phone"><i class="fas fa-phone"></i></div>
						<p class="contact__text">Ragosoft:<span class="contact__number">048/0000000</span></p>
						<p class="contact__text">Ragosoft:<span class="contact__number">047/0000000</span></p>
					</div>
				</div>

				<div class="social__icons">
					<a href="#" title="Facebook"><img src="images/facebook.png"></a>
					<a href="#" title="Instagram"><img src="images/instagram.png"></a>
				</div>

				<div class="footer-copyright">Copyright &copy;
					<script>document.write(new Date().getFullYear());</script>, Ragosoft | Designed by <a
						href="#">Ragosoft</a>
				</div>
			</div>
		</footer>
	</div>


	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/569f2fa54e.js"></script>

	<script type="text/javascript" src="burger.js"></script>
</body>

</html>
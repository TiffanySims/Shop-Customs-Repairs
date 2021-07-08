
<?php
	// Message Vars
	$msg = '';
	

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $phone = htmlspecialchars($_POST['phone']);
    $make = htmlspecialchars($_POST['make']);
   

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)&&!empty($phone)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
			
			} else {
				// Passed
				$toEmail = 'info@shopcustomsrepairs.com';
				$subject = 'Contact Request From '.$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
          <h4>Email</h4><p>'.$email.'</p>
          <h4>Phone</h4><p>'.$phone.'</p>
          <h4>Make</h4><p>'.$make.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = '';
					
				} else {
					// Failed
					$msg = 'Your email was not sent';
					
				}
			}
		} else {
			// Failed
			$msg = '';
			
		}
	}
?>



<!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" type="image/png" href="images/pix.png" />
    <title>Shop Customs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link type="text/css" rel="stylesheet" href="css/styles.css" />
    <script
      src="https://kit.fontawesome.com/6b8ba87358.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,400i"
      rel="stylesheet"
    />
  </head>
  <body>
    <header class="hero">
       <img class="logo"src="images/shop.png">
      <div class="container">
     
        <nav class="hero__nav">
         <ul>
            <li><a href="#about">About</a></li>
            <li><a href="#specialties">Best Services</a></li>
            <li><a href="#why">Why Us?</a></li>
            <li><a href="#promotions">Promotions</a></li>
            <li><a href="#faq">FAQ</a></li>
          </ul>
        </nav>
        
       <a href="#popup" ><button class="btn btn-popup">Contact Us</button> </a>
        <div class="hero__body">
          <div class="hero__text">
            <h1 class="hero__text--h1">
              Professional car repair and maintenance
            </h1>
            <p class="hero__text--paragraph">
              Our locally owned and independent repair shop employ the latest technology and the
              expert technicians who will diagnose your repair, fix it right the
              first time, and back it with a 12 month warranty.
            </p>
            <a href="#promotions" class="btn">Promotions</a>
            <p class="hero__text--contact">
              <i class="fas fa-phone"></i>(708)439-5224
            </p>
            
          </div>
          <div class="hero__form">
            <h3 class="hero__form--h3">Request a callback</h3>
            <form action="index.php" method="POST">
              <input type="text" name="name" placeholder="Full Name" />
              <input type="text" name="email" placeholder="Email" />
              <input type="phone" name="phone" placeholder="Phone number" />
              <input type="text" name="make" placeholder="Year/Make/Model" />
              <textarea name="message" placeholder="Message" ></textarea>
              <div class="button">
                <button name="submit"class="hero__form--btn">Submit Request</button>
                 <?php if($msg != ''): ?>
    		<div ><?php echo $msg; ?></div>
    	<?php endif; ?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>
    <section class="about" id="about">
      <h2 class="section--heading">What we offer</h2>
      <p class="section--text">
        No one looks forward to the time when their vehicle needs attention. At Shop Customs repairs, we understand.
      </p>
      <div class="container">
        <div class="about__box">
          <div class="about__box--right">
            <div class="about__item">
              <div class="about__item--icon">
                <i class="fas fa-cogs"></i>
              </div>
              <div class="about__item--text">
                <h4 class="about__item--h4">Free diagnosis</h4>
                <p class="about__item--paragraph">
                  Shop Customs has its own codebooks for diagnosing--something you won't find among our competitors.
                </p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__item--icon">
                <i class="fas fa-stopwatch"></i>
              </div>
              <div class="about__item--text">
                <h4 class="about__item--h4">Fast Repair</h4>
                <p class="about__item--paragraph">
                  We know that you need to get back on th road ASAP. We promise not to hold you up.
                </p>
              </div>
            </div>
            <div class="about__item">
              <div class="about__item--icon">
                <i class="fas fa-ribbon"></i>
              </div>
              <div class="about__item--text">
                
                <h4 class="about__item--h4">12 Month warranty</h4>
                <p class="about__item--paragraph">
                  We stand behind our repairs!
                </p>
              </div>
            </div>
          </div>
          <div class="about__box--left">
            <img src="images/speed.jpeg" alt="engine" />
          </div>
        </div>
      </div>
    </section>
    <section class="specialties" id="specialties">
      <h2 class="section--heading">Popular Services</h2>
      <p class="section--text">
        At Shop Customs, we offer comprehensive services that are designed to keep your vehicle running like new. Reliable and affordable auto repair service has set us apart as a trusted name in the community, and we pride ourselves on the high standard of quality and honest assessment we provide in every job we take. 
      </p>
      <div class="specialties__container">
      <div class="specialties__right">
        <img src="images/wrench.png" alt="wrench">
      </div>
      <div class="specialties__left">
        <div class="specialties__item">
          <i class="fa fa-wrench" aria-hidden="true"></i>

        <h5 class="specialties__title">
          Engine Services
        </h5>
        <p class="specialties__paragraph">Keep a well-tuned engine for maximum performance. Ensure a long engine life by entrusting the care of your vehicle to Shop Customs</p>
      </div>
      
       <div class="specialties__item">
        <i class="fa fa-check"></i>
        <h5 class="specialties__title">
          State Inspections
        </h5>
        <p class="specialties__paragraph">If you don't pass your emission test, bring your car in. We can get your car ready to pass its next emissions and smog test</p>
      </div>
      
       <div class="specialties__item">
          <i class="fa fa-battery-1"></i>

        <h5 class="specialties__title">
          Battery Replacement
        </h5>
        <p class="specialties__paragraph">Your battery is one of the most important parts of your vehicle. Stay in charge with proper battery replacement.</p>
      </div>
      
       <div class="specialties__item">
        <i class="fas fa-car"></i>
        <h5 class="specialties__title">
          Brakes
        </h5>
        <p class="specialties__paragraph">If your brakes grind with a continuous loud metallic sound, it may be time to consider brake service.</p>
      </div>
    </div>
    </div>
      </div>
    </section>
    <section class="services" id="services">
      <div class="container">
         <h2 class="section--heading">Repair Services</h2>
      <p class="section--text">
       Hearing a strange sound under the hood? We're here to help! Repairs to your vehicle should never be overlooked. Big or small, we can handle any sized repair to get you back on the road.
      </p>
      <ul class="services__list"> 
          <li class="services__list--item"><i class="fas fa-tools" ></i>Check Engine Light Service</li>
          <li class="services__list--item"><i class="fas fa-tools" ></i>Oil, Lube, &amp; Filter Change </li>
          <li class="services__list--item"><i class="fas fa-tools" ></i>Brake Repair Service</li>
          <li class="services__list--item"><i class="fas fa-tools" ></i>Air Condiion Service</li>
          <li class="services__list--item"><i class="fas fa-tools" ></i>TIre Rotation</li>
          <li class="services__list--item"><i class="fas fa-tools" ></i>Cooling System Service</li>
          <li class="services__list--item"><i class="fas fa-tools" ></i>Belt and Hose Replacement</li>
          <li class="services__list--item"><i class="fas fa-tools" ></i>Suspension system repair</li>
          <li class="services__list--item"><i class="fas fa-tools" ></i>Fuel Filter Replacement</li>
          <li class="services__list--item"><i class="fas fa-tools" ></i>Shocks and Struts</li>
          <li class="services__list--item"><i class="fas fa-tools" ></i>Light Bulb Replacement</li>
          <li class="services__list--item"><i class="fas fa-tools" ></i> transmission Service</li>
        </ul>
        </div>
    </section>
    <section class="faqs" id="faq">
      
      <h2 class="section--heading">FAQ</h2>
      <p class="section--text">
        Find the answers that you need. You can always contact us for more!
      </p>
      
      <div class="faqs__container">
        <div class="container">
          <div class="faq__container">
            <div class="faq__box">

        <div class="faq" id="question1">
           <a href="#question1" class="question">
          <i class="fa fa-plus" ></i>
          <i class="fa fa-minus" ></i>
        How long will my repair take?</a>
          <p class="answer">The estimated time for repairs varies greatly depending on what needs to be done in order to get your car repaired. We will provide you with a more exact time estimate once we determine what needs to be done.</p>
        </div>
        <div class="faq" id="question2">
         <a href="#question2" class="question">
          <i class="fa fa-plus"></i>
          <i class="fa fa-minus" ></i>

           Can I get an estimate without bringing my car in?</a>
          <p class="answer">To get an accurate estimate, we need to physically evaluate your vehical.</p>
        </div>
        <div class="faq" id="question3">
          <a href="#question3" class="question">
          <i class="fa fa-plus"></i>
          <i class="fa fa-minus" ></i>

          Do I need an appointment</a>
          <p class="answer">No appointment necessary. However, if you prefer to schedule an appointment you may do so. To accommodate your busy schedule, a convenient night drop-box is also available.
          </p>
        </div>
        <div class="faq" id="question4">
          <a href="#question4"class="question">
          <i class="fa fa-plus"></i>
          <i class="fa fa-minus" ></i>

          What payment options do you have</a>
          <p class="answer">We now that car repairs are unexpected. We try to work with our clients as much as possible.</p>
        </div>
      </div>
          
     <div class="faq__additional">
       <div class="additional__questions">
       <h4>Questions?</h4>
       <p>You can always contact us for any questions or concerns!</p>
       <a href="#popup"><button>Contact Us</button></a>
     </div>
    
     </div>
     </div>
     
       </div>
       </div>

    </section>
    <section class="promotions" id="promotions">
      <h2 class="section--heading">Promotions</h2>
      <p class="section--text">
        Shop Customs is committed to saving you money: apart from helping you save with brake specials and auto repair deals, we aim to provide you with the highest quality repairs, keeping you on the road for longer.
      </p>
      <div class="container">
        <div class="coupons">
          <div class="coupon">

            <h2>Free</h2>
            <div class="coupon__body">
            <h3>Brake Check</h3>
            <p>Includes: A Road Test, A Visual Inspection, and Checking the level of the brake fluid</p>
            <p>Offer good thru: 12/31/2020</p>
            </div>
          </div>
          <div class="coupon">
            <h2>Free</h2>
            <div class="coupon__body">

            <h3>Check Engine Light</h3>
            <p>If your car or truck's Check Engine Light comes on, we'll check it for FREE</p>
            <p>Offer good thru: 12/31/2020</p>
          </div>
          </div>
          <div class="coupon">
            <h2>10% OFF</h2>
           <div class="coupon__body">
            <h3>Any Repair Service</h3>
            <p> Maximum savings $100</p>
            <p>Offer good thru: 12/31/2020</p>
          </div>
          </div>
          <div class="coupon">
            <h2>$200 OFF</h2>
              <div class="coupon__body">
            <h3>Transmission Rebuild</h3>
            <p></p>
            <p>Offer good thru: 12/31/2020</p>
          </div>
          </div>
        </div>
      </div>
    </section>
    <section class="request">
      <h2>Request an Appointment Today!</h2>
      <h3>Info@shopcustomsrepairs.com</h3>
      <button>Contact Us</button>
    </section>
    <footer>
      <div class="container footer__container">
      <div class="footer__left">
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>

      </div>
      <div class="footer__middle">
        <p>Copyright &copy;2020 Shop Customs, LLC. All Rights Reserved</p>
      </div>
      <div class="footer__right">
        
        <p class="footer__address"><i class="fa fa-map-marker" aria-hidden="true"></i>16700 Lanthrop Ave</p>
        <p class="footer__city">Harvey, IL 60426</p>
      <p class="footer__phone"><i class="fa fa-mobile"></i>   (708) 439-5224</p>
        </div>
      </div>
    </footer>
    <div class="popup" id="popup">
      <div class="popup__content">
    <div class="popup__form">
      <a href="#hero"><i class ="fa fa-times"></i></a>
            <h3 class="hero__form--h3">Request a callback</h3>
            <form action="index.php" method="POST">
              <input type="text" name="name" placeholder="Full Name" />
              <input type="text" name="email" placeholder="Email" />
              <input type="phone" name="phone" placeholder="Phone number" />
              <input type="text" name="make" placeholder="Year/Make/Model" />
              
              <textarea name = "message" placeholder="Message"></textarea>
              <div class="button">
                <button name="submit" class="hero__form--btn">Submit Request</button>
                
              </div>
            </form>
    </div>
    </div>
          </div>
  
  </body>
</html>

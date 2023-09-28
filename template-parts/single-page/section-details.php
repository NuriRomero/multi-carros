<!--====== Start Listing Details section ======-->
<section class="listing-details-section pt-120 pb-90">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="listing-details-wrapper listing-details-wrapper-one">
					<div class="listing-content mb-50 wow fadeInUp">
						<h2 class="title"><?php
							$modelo = get_post_meta( get_the_ID(), 'Modelo', true );
							$marca  = get_post_meta( get_the_ID(), 'Marca', true );
							$anio   = get_post_meta( get_the_ID(), 'Año', true );
							echo $marca . ' ' . $modelo . ' ' . $anio;
						?>
						</h2>
						<br>
						<?php the_post_thumbnail(); ?>
						<br>
						<?php
						$custom_fields = get_post_custom();
						foreach ( $custom_fields as $key => $values ) {
							foreach ( $values as $value ) {
								echo "<p><strong>$key:</strong> $value</p>";
							}
						}

						the_content(); // Imprime el contenido de la publicación
						?>

					</div>
					<div class="listing-features-box mb-50 wow fadeInUp">
						<h4 class="title">Our Features</h4>
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-12">
								<div class="icon-box icon-box-one">
									<div class="icon">
										<i class="ti-credit-card"></i>
									</div>
									<div class="info">
										<h6>Card Payment</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12">
								<div class="icon-box icon-box-one">
									<div class="icon">
										<i class="ti-paint-bucket"></i>
									</div>
									<div class="info">
										<h6>Air-conditioned</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12">
								<div class="icon-box icon-box-one">
									<div class="icon">
										<i class="ti-rss-alt"></i>
									</div>
									<div class="info">
										<h6>Wireless Internet</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12">
								<div class="icon-box icon-box-one">
									<div class="icon">
										<i class="ti-trash"></i>
									</div>
									<div class="info">
										<h6>Transmicion: <?php echo get_post_meta( get_the_ID(), 'Transmision', true ); ?></h6>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12">
								<div class="icon-box icon-box-one">
									<div class="icon">
										<i class="ti-car"></i>
									</div>
									<div class="info">
										<h6>Parking Street</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12">
								<div class="icon-box icon-box-one">
									<div class="icon">
										<i class="ti-credit-card"></i>
									</div>
									<div class="info">
										<h6>Outdoor Seating</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="listing-gallery-box wow fadeInUp">
						<h4 class="title">Photo Showcase</h4>
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="gallery-item mb-30">
									<a href="assets/images/listing/gallery-1.jpg" class="img-popup"><img src="assets/images/listing/gallery-1.jpg" alt="gallery image"></a>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="gallery-item mb-30">
									<a href="assets/images/listing/gallery-2.jpg" class="img-popup"><img src="assets/images/listing/gallery-2.jpg" alt="gallery image"></a>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="gallery-item mb-30">
									<a href="assets/images/listing/gallery-3.jpg" class="img-popup"><img src="assets/images/listing/gallery-3.jpg" alt="gallery image"></a>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="gallery-item mb-30">
									<a href="assets/images/listing/gallery-4.jpg" class="img-popup"><img src="assets/images/listing/gallery-4.jpg" alt="gallery image"></a>
								</div>
							</div>
						</div>
					</div>
					<div class="listing-tag-box mb-50 wow fadeInUp">
						<h4 class="title">Popular Tag</h4>
						<a href="#">Delivery</a>
						<a href="#">Restaurant</a>
						<a href="#">Free Internet</a>
						<a href="#">Shopping</a>
						<a href="#">Car Parking</a>
						<a href="#">Food</a>
						<a href="#">Kitchen</a>
						<a href="#">Reservation</a>
						<a href="#">Travel</a>
					</div>
					<div class="listing-faq-box mb-50 wow fadeInUp">
						<h4 class="title">Asked Question</h4>
						<div class="faq-accordian" id="listingFaq">
							<div class="card">
								<a class="card-header" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">How do I Make a regular Table Booking?</a>
								<div id="collapseOne" class="collapse show" data-parent="#listingFaq">
									<div class="card-body">
										<p>Musutrum orci montes hac at neque mollis taciti parturient vehicula interdum viverra cubilia ipsum ut duis amet nullam sit ut ornare mattis urna. Parturient. Aptent erat blandit dolor porta eros mollis hendrerit leo viverra pellentesque fusce.</p>
									</div>
								</div>
							</div>
							<div class="card">
								<a class="collapsed card-header" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false">How can I be certain my booking's been received?</a>
								<div id="collapseTwo" class="collapse" data-parent="#listingFaq">
									<div class="card-body">
										<p>Musutrum orci montes hac at neque mollis taciti parturient vehicula interdum viverra cubilia ipsum ut duis amet nullam sit ut ornare mattis urna. Parturient. Aptent erat blandit dolor porta eros mollis hendrerit leo viverra pellentesque fusce.</p>
									</div>
								</div>
							</div>
							<div class="card">
								<a class="collapsed card-header" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false">How much do I have to pay for my booking?</a>
								<div id="collapseThree" class="collapse" data-parent="#listingFaq">
									<div class="card-body">
										<p>Musutrum orci montes hac at neque mollis taciti parturient vehicula interdum viverra cubilia ipsum ut duis amet nullam sit ut ornare mattis urna. Parturient. Aptent erat blandit dolor porta eros mollis hendrerit leo viverra pellentesque fusce.</p>
									</div>
								</div>
							</div>
							<div class="card">
								<a class="collapsed card-header" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false">What happens restaurant and they don't have my booking?</a>
								<div id="collapseFour" class="collapse" data-parent="#listingFaq">
									<div class="card-body">
										<p>Musutrum orci montes hac at neque mollis taciti parturient vehicula interdum viverra cubilia ipsum ut duis amet nullam sit ut ornare mattis urna. Parturient. Aptent erat blandit dolor porta eros mollis hendrerit leo viverra pellentesque fusce.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="listing-review-box mb-50 wow fadeInUp">
						<h4 class="title">Customer Review</h4>
						<ul class="review-list">
							<li class="review">
								<div class="thumb">
									<img src="assets/images/listing/review-1.jpg" alt="review image">
								</div>
								<div class="review-content">
									<h5>Moriana Steve</h5>
									<span class="date">Sep 02, 2021</span>
									<p>Musutrum orci montes hac at neque mollis taciti parturient vehicula interdum verra cubilia ipsum duis amet nullam sit ut ornare mattis urna. </p>
									<div class="content-meta d-flex align-items-center justify-content-between">
										<ul class="ratings ratings-three">
											<li><span class="av-rate">4.5</span></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
										</ul>
										<a href="#" class="reply"><i class="ti-share-alt"></i>Reply</a>
									</div>
								</div>
							</li>
							<li class="review">
								<div class="thumb">
									<img src="assets/images/listing/review-2.jpg" alt="review image">
								</div>
								<div class="review-content">
									<h5>Moriana Steve</h5>
									<span class="date">Sep 02, 2021</span>
									<p>Musutrum orci montes hac at neque mollis taciti parturient vehicula interdum verra cubilia ipsum duis amet nullam sit ut ornare mattis urna. </p>
									<div class="content-meta d-flex align-items-center justify-content-between">
										<ul class="ratings ratings-three">
											<li><span class="av-rate">4.5</span></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
										</ul>
										<a href="#" class="reply"><i class="ti-share-alt"></i>Reply</a>
									</div>
								</div>
							</li>
							<li class="review">
								<div class="thumb">
									<img src="assets/images/listing/review-3.jpg" alt="review image">
								</div>
								<div class="review-content">
									<h5>Moriana Steve</h5>
									<span class="date">Sep 02, 2021</span>
									<p>Musutrum orci montes hac at neque mollis taciti parturient vehicula interdum verra cubilia ipsum duis amet nullam sit ut ornare mattis urna. </p>
									<div class="content-meta d-flex align-items-center justify-content-between">
										<ul class="ratings ratings-three">
											<li><span class="av-rate">4.5</span></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
											<li class="star"><i class="flaticon-star-1"></i></li>
										</ul>
										<a href="#" class="reply"><i class="ti-share-alt"></i>Reply</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="listing-review-form mb-30 wow fadeInUp">
						<div class="row">
							<div class="col-md-6">
								<h4 class="title">Write a Review</h4>
							</div>
							<div class="col-md-6">
								<div class="form-rating">
									<ul class="ratings">
										<li><span>Rate Here:</span></li>
										<li class="star"><i class="flaticon-star-1"></i></li>
										<li class="star"><i class="flaticon-star-1"></i></li>
										<li class="star"><i class="flaticon-star-1"></i></li>
										<li class="star"><i class="flaticon-star-1"></i></li>
										<li class="star"><i class="flaticon-star-1"></i></li>
									</ul>
									<span>(02 Reviews)</span>
								</div>
							</div>
						</div>
						<form>
							<div class="row">
								<div class="col-lg-12">
									<div class="form_group">
										<textarea class="form_control" placeholder="Write Message" name="message"></textarea>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_group">
										<input type="text" class="form_control" placeholder="Your name" name="name" required>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_group">
										<input type="email" class="form_control" placeholder="Email here" name="email" required>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form_group">
										<div class="single-checkbox d-flex">
											<input type="checkbox" id="check4" name="checkbox">
											<label for="check4"><span>Save my name, email, and website in this browser for the next time i comment.</span></label>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form_group">
										<button class="main-btn icon-btn">Submit Review</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar-widget-area">
					<div class="widget reservation-form-widget mb-30 wow fadeInUp">
						<h4 class="widget-title">Reservation</h4>
						<form>
							<div class="form_group">
								<input type="text" class="form_control" placeholder="Name" name="name" required>
								<i class="ti-user"></i>
							</div>
							<div class="form_group">
								<input type="text" class="form_control" placeholder="Phone" name="phone" required>
								<i class="ti-mobile"></i>
							</div>
							<div class="form_group">
								<select class="wide">
									<option data-display="Guest">Guest</option>
									<option data-display="01">Guest 01</option>
									<option data-display="02">Guest 02</option>
									<option data-display="02">Guest 02</option>
									<option data-display="02">Guest 02</option>
								</select>
							</div>
							<div class="form_group">
								<select class="wide">
									<option data-display="Date">Date</option>
									<option data-display="01">01.11.2021</option>
									<option data-display="02">01.11.2021</option>
									<option data-display="03">01.11.2021</option>
									<option data-display="04">01.11.2021</option>
								</select>
							</div>
							<div class="form_group">
								<select class="wide">
									<option data-display="Guest">Time</option>
									<option data-display="01">08.00AM-10.00AM</option>
									<option data-display="02">11.00AM-12.00PM</option>
									<option data-display="03">01.00PM-02.00PM</option>
									<option data-display="04">02.00PM-03.00PM</option>
								</select>
							</div>
							<div class="form_group">
								<button class="main-btn icon-btn">Book Now</button>
							</div>
						</form>
					</div>
					<div class="widget contact-info-widget mb-30 wow fadeInUp">
						<div class="contact-info-widget-wrap">
							<div class="contact-map">
								<iframe src="https://maps.google.com/maps?q=new%20york&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
								<a href="#" class="support-icon"><i class="flaticon-headphone"></i></a>
							</div>
							<div class="contact-info-content">
								<h4 class="widget-title">Contact Info</h4>
								<div class="info-list">
									<p><i class="ti-tablet"></i><a href="tel:+98265365205">+98 (265) 3652 - 05</a></p>
									<p><i class="ti-location-pin"></i>45/A Natura, Barcelona, Spain</p>
									<p><i class="ti-email"></i><a href="mailto:contact@example.com">contact@example.com</a></p>
									<p><i class="ti-world"></i><a href="www.fioxen.com">www.fioxen.com</a></p>
								</div>
								<ul class="social-link">
									<li><a href="#"><i class="ti-facebook"></i></a></li>
									<li><a href="#"><i class="ti-twitter-alt"></i></a></li>
									<li><a href="#"><i class="ti-pinterest"></i></a></li>
									<li><a href="#"><i class="ti-dribbble"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="widget business-hour-widget mb-30 wow fadeInUp">
						<h4 class="widget-title">Business Hour</h4>
						<ul class="time-info">
							<li><span class="day">Monday</span><span class="time">08:00 - 21:00</span></li>
							<li><span class="day">Tuesday</span><span class="time">08:00 - 21:00</span></li>
							<li><span class="day">Wednesday</span><span class="time">08:00 - 21:00</span></li>
							<li><span class="day">Thursday</span><span class="time">08:00 - 21:00</span></li>
							<li><span class="day">Friday</span><span class="time">08:00 - 21:00</span></li>
							<li><span class="day">Saturday</span><span class="time">08:00 - 21:00</span></li>
							<li><span class="day">Sunday</span><span class="time st-close">Close</span></li>
						</ul>
					</div>
					<div class="widget newsletter-widget mb-30 wow fadeInUp">
						<div class="newsletter-widget-wrap bg_cover" style="background-image: url(assets/images/newsletter-widget-1.jpg);">
							<i class="flaticon-email-1"></i>
							<h3>Subscribe Our
								Newsletter</h3>
							<button class="main-btn icon-btn">Subscribe</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====== End Listing Details section ======-->

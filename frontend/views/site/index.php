<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Start your day with us :)';
?>

<!-- Services Section -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Services</h2>
                <h3 class="section-subheading text-muted">The Balance & Harmony Of Body and Mind.</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img src="img/service/massage.jpg" class="image-round-corners"/>
                    </span>
                <h4 class="service-heading">Special Care Solutions</h4>
            </div>
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img src="img/service/massage2.jpg" class="image-round-corners"/>
                    </span>
                <h4 class="service-heading">Body Care & Massage</h4>
            </div>
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img src="img/service/massage3.jpg" class="image-round-corners"/>
                    </span>
                <h4 class="service-heading">Oils & Aromatherapy</h4>
            </div>

        </div>
    </div>
</section>

<!-- Team Section -->
<section id="team" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Our Amazing Team</h2>
                <h3 class="section-subheading text-muted">Our Salon has the most spectacular environment, to ensure
                    every client has an unforgettable and luxurious experience.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="img/team/1.jpg" class="img-responsive img-circle" alt="">
                    <h4>Camelia</h4>
                    <p class="text-muted">Colour & Cut Specialist, Senior Stylist</p>
                    <p class="text-muted">Unisex hairdresser who has been in the hair industry for over 10 years working
                        closely with her clients to create beautiful hair. </p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="img/team/2.jpg" class="img-responsive img-circle" alt="">
                    <h4>Jasmin</h4>
                    <p class="text-muted">Beauty Therapist</p>
                    <p class="text-muted">Experienced Beauty Therapist specializes in facial treatments, eyelash
                        extensions, ear candles, manicure and pedicure, all kinds of waxing and eye treatments.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="img/team/3.jpg" class="img-responsive img-circle" alt="">
                    <h4>Rimma</h4>
                    <p class="text-muted">Nail Technician</p>
                    <p class="text-muted">Rimma is highly qualified nail technician with extensive experience in the
                        industry. She provides tailored treatments to suits client's individual needs. </p>
                </div>
            </div>
        </div>
        <div class="text-center marging-bottom-50">
            <?= Html::a('Show more masters', 'masters/index', ['class' => 'btn btn-xl']) ?>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <p class="large text-muted">We combine the talent of highly trained stylists and therapists with the
                    finest brands in the world. The atmosphere in the salon is relaxed and welcoming a range of clients
                    of all ages.</p>
                <p class="large text-muted">There is a lot of laughing and energy in the salon but the main focus is
                    always on YOU and making sure that not only do you enjoy the experience but you leave with all the
                    ingredients of a good hairstyle, manicure or beauty treatment, meaning you can take care of hair,
                    nail or skin at home.</p>
            </div>
        </div>
    </div>
</section>


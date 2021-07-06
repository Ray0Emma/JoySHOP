<style>
.carousel-item img{
	height: 100vh;
	min-height:  300px;
	background: no-repeat center center scroll;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
.carousel-caption {
        color: #c66;
        bottom: 25%;
        right: 5%;
        text-align: center;
        background-color: transparent;
        max-width: 500px;
        left: auto;
        padding:5px;
        /* bottom: auto; */

}
.carousel-caption h5 {
    font-family: Georgia, 'Times New Roman', Times, serif;
	font-size: 45px;
    font-weight: bold;
	text-transform:uppercase;
	letter-spacing: 3px;

}
.carousel-caption p {

	font-size: 18px;
	line-height: 1.9;
}
</style>

<div class="carousel slide" data-ride="carousel" id="carouselExampleIndicators">
    <ol class="carousel-indicators">
        <li class="active" data-slide-to="0" data-target="#carouselExampleIndicators"></li>
        <li data-slide-to="1" data-target="#carouselExampleIndicators"></li>
        <li data-slide-to="2" data-target="#carouselExampleIndicators"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img alt="First slide" class="d-block w-100 vh-100" src="/frontend/img/img-3.jpg">
            <div class="carousel-caption d-none d-md-block">
                <h5>Produits
                    <span style="background-color: #c66;color:rgb(255, 244, 249)">
                         Naturels
                    </span>
                </h5>
                <p>Votre peau représente 90% de votre selfie.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img alt="Second slide" class="d-block w-100 vh-100" src="/frontend/img/img.jpg">
            <div class="carousel-caption d-none d-md-block">
                <h5>Votre
                    <span style="background-color: #c66;color:rgb(255, 244, 249)">
                        beaute
                    </span>
                  notre inspiration</h5>
                <p>Donnez un peu d'amour à votre peau.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img alt="Third slide" class="d-block w-100 vh-100" src="/frontend/img/img-2.jpg">
            <div class="carousel-caption d-none d-md-block">
                <h5>Votre peau est votre meilleur
                     <span style="background-color: #c66;color:rgb(255, 244, 249)">
                        accessoire
                    </span>
                </h5>
                <p>produits sains, naturels et sans danger</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" data-slide="prev" href="#carouselExampleIndicators" role="button">
        <span aria-hidden="true" class="carousel-control-prev-icon"></span>
        <span class="sr-only">Previous</span></a>
          <a class="carousel-control-next" data-slide="next" href="#carouselExampleIndicators" role="button">
        <span aria-hidden="true" class="carousel-control-next-icon"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

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

	font-size: 45px;
    font-weight: bold;
	text-transform:capitalize;
	letter-spacing: 2px;

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
                <h5>Slider One Item</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img alt="Second slide" class="d-block w-100 vh-100" src="/frontend/img/slider1.jpg">
            <div class="carousel-caption d-none d-md-block">
                <h5>Slider two Item</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img alt="Third slide" class="d-block w-100 vh-100" src="/frontend/img/img-2.jpg">
            <div class="carousel-caption d-none d-md-block">
                <h5>Slider One Item</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
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

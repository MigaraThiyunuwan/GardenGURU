 <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
 

<!DOCTYPE html>
<html >

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./css/boostrapmin.css">
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/blog.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="./js/boostrapbundlemin.js"></script>
  <title></title>
</head>

<body>

  <header>
    <nav class=" my-nav navbar navbar-light navbar-expand-lg ">
        <div class="container">

            <a class="navbar-brand" href="#"> <img src="./images/logo.png" height="50" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse"  id="navbarNav" >
                <ul class="navbar-nav ms-auto" >
                <li class="nav-item " style="margin-right: 20px;">
                    <a class="nav-link" href="#"><b>Home</b> </a>
                </li>
                <li class="nav-item" style="margin-right: 20px;">
                    <a class="nav-link" href="#"><b>Home</b></a>
                </li>
                <li class="nav-item" style="margin-right: 20px;">
                    <a class="nav-link" href="#"><b>Home</b></a>
                </li>
                <li class="nav-item" style="margin-right: 20px;">
                    <a class="nav-link " href="#"><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#"><b>Home1</b></a>
                </li>
                </ul>
            </div>
        </div>
    </nav>

   

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('./images/c1.jpg')">
                        <div class="carousel-caption">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                        </div>
                </div>
                <div class="carousel-item" style="background-image: url('./images/c3.jpg')">
                        <div class="carousel-caption">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                        </div>
                </div>
                <div class="carousel-item" style="background-image: url('./images/c4.jpg')">
                        <div class="carousel-caption">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                        </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
    </div>


  </header>


  <div>

  <ul class="cards">
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--fence"></div>
      <div class="card__content">
        <div class="card__title">Flex</div>
        <p class="card__text">This is the shorthand for flex-grow, flex-shrink and flex-basis combined. The second and third parameters (flex-shrink and flex-basis) are optional. Default is 0 1 auto. </p>
        <button class="btn btn--block card__btn">Button</button>
      </div>
    </div>
  </li>
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--river"></div>
      <div class="card__content">
        <div class="card__title">Flex Grow</div>
        <p class="card__text">This defines the ability for a flex item to grow if necessary. It accepts a unitless value that serves as a proportion. It dictates what amount of the available space inside the flex container the item should take up.</p>
        <button class="btn btn--block card__btn">Button</button>
      </div>
    </div>
  </li>
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--record"></div>
      <div class="card__content">
        <div class="card__title">Flex Shrink</div>
        <p class="card__text">This defines the ability for a flex item to shrink if necessary. Negative numbers are invalid.</p>
        <button class="btn btn--block card__btn">Button</button>
      </div>
    </div>
  </li>
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--flowers"></div>
      <div class="card__content">
        <div class="card__title">Flex Basis</div>
        <p class="card__text">This defines the default size of an element before the remaining space is distributed. It can be a length (e.g. 20%, 5rem, etc.) or a keyword. The auto keyword means "look at my width or height property."</p>
        <button class="btn btn--block card__btn">Button</button>
      </div>
    </div>
  </li>
</ul>

  </div>



</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</html>
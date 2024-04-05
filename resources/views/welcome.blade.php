<!DOCTYPE html>
<html lang="en">
<head>
  <title>Library SMKN 24</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 400 15px/1.8 Lato, sans-serif;
    color: #777;
  }
  h3, h4 {
    margin: 10px 0 30px 0;
    letter-spacing: 10px;      
    font-size: 20px;
    color: #111;
  }
  .container {
    padding: 80px 120px;
  }
  .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;
    opacity: 0.7;
  }
  .person:hover {
    border-color: #f1f1f1;
  }
  .carousel-inner img {
    width: 100%; /* Set width to 100% */
    margin: auto;
  }
  .carousel-caption h3 {
    color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
    background: #fb8500;
    color: #000;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
  }
  .list-group-item:last-child {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail p {
    margin-top: 15px;
    color: #555;
  }
  .btn {
    padding: 10px 20px;
    background-color: #023047;
    color: #f1f1f1;
    border-radius: 0;
    transition: .2s;
  }
  .btn:hover, .btn:focus {
    border: 1px solid #333;
    background-color: #fff;
    color: #000;
  }
  .modal-header, h4, .close {
    background-color:#023047 ;
    color: #fff !important;
    text-align: center;
    font-size: 30px;
  }
  .modal-header, .modal-body {
    padding: 40px 50px;
  }
  .nav-tabs li a {
    color: #777;
  }
  #googleMap {
    width: 100%;
    height: 400px;
    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
  }  
  .navbar {
    font-family: Montserrat, sans-serif;
    margin-bottom: 0;
    background-color: #023047;
    border: 0;
    font-size: 11px !important;
    letter-spacing: 4px;
    opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
    color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
    color: #fff !important;
  }
  .navbar-nav li.active a {
    color: #fff !important;
    background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
  }
  .open .dropdown-toggle {
    color: #fff;
    background-color: #555 !important;
  }
  .dropdown-menu li a {
    color: #000 !important;
  }
  .dropdown-menu li a:hover {
    background-color: red !important;
  }
  footer {
    background-color: #023047;
    color: #f5f5f5;
    padding: 32px;
  }
  footer a {
    color: #f5f5f5;
  }
  footer a:hover {
    color: #777;
    text-decoration: none;
  }  
  .form-control {
    border-radius: 0;
  }
  textarea {
    resize: none;
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Library SMKN 24 JAKARTA</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#ourlibrary">OUR LIBRARY</a></li>
        <li><a href="#books">BOOKS</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="{{ route('login') }}">LOGIN</a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="/css/library.jpg" alt="Library 1" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Monkey D.Luffy</h3>
          <p>Aku akan menyelamatkanmu bahkan jika itu membunuhku</p>
        </div>      
      </div>

      <div class="item">
        <img src="/css/library6.jpg" alt="Chicago" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Ali bin Abi Thalib</h3>
          <p>"Tidak perlu menjelaskan tentang dirimu kepada siapa pun, karena yang menyukaimu tidak butuh itu. Dan yang membencimu tidak akan percaya itu."</p>
        </div>      
      </div>
    
      <div class="item">
        <img src="/css/library4.jpg" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
          <h3>QS. Al-Insyirah: 5-6</h3>
          <p>“Karena sesungguhnya sesudah kesulitan itu ada kemudahan, sesungguhnya sesudah kesulitan itu ada kemudahan.”</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- Container (The Band Section) -->
<div id="band" class="container text-center">
  <h3>OUR LIBRARY</h3>
  <p><em>Welcome to our Library!</em></p>
  <p>"Selamat datang di Perpustakaan SMKN 24 Jakarta, tempat di mana setiap buku adalah jendela menuju pengetahuan tak terhingga. Temukan petualangan baru, teman sejawat, dan inspirasi yang mengubah hidup di antara rak-rak buku kami yang penuh warna."</p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>Bu Taylor Swift</strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="/css/bu putri.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo" class="collapse">
        <p>Guitarist and Lead Vocalist</p>
        <p>Loves long walks on the beach</p>
        <p>Member since 1988</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Pak Cillian Murphy</strong></p><br>
      <a href="#demo2" data-toggle="collapse">
        <img src="/css/pak agus.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo2" class="collapse">
        <p>Drummer</p>
        <p>Loves drummin'</p>
        <p>Member since 1988</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Bu Emma Watson</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="/css/emma watson.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo3" class="collapse">
        <p>Bass player</p>
        <p>Loves math</p>
        <p>Member since 2005</p>
      </div>
    </div>
  </div>
</div>

<!-- Container (TOUR Section) -->
<div id="tour" class="bg-1">
  <div class="container">
    <h3 class="text-center">BOOKS</h3>
    <p class="text-center">Ayo,telusuri buku-buku favoritmu!<br></p>
    
    
    <div class="row text-center">
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="/css/bukuikigai.jpg" alt="Paris" width="400" height="300">
          <p><strong>Ikigai</strong></p>
          <p>Hector Garcia, Francesc Miralles</p>
          <button class="btn" data-toggle="modal" data-target="#myModal">View More</button>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="/css/buku2.jpg" alt="New York" width="400" height="300">
          <p><strong>Atomic Habits</strong></p>
          <p>James Clear</p>
          <button class="btn" data-toggle="modal" data-target="#myModal">View More</button>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="/css/buku5.jpg" alt="San Francisco" width="400" height="300">
          <p><strong>Alasan Untuk Tetap Hidup</strong></p>
          <p>Matt Haig</p>
          <button class="btn" data-toggle="modal" data-target="#myModal">View More</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-book"></span>Sinopsis</h4>
        </div>
        <div class="modal-body">
          Dalam kehidupan ini, kita sering kali dihadapkan pada tantangan yang membuat kita merasa kehilangan motivasi. Namun, buku ini mengajak pembaca untuk menemukan kembali semangat dan inspirasi dalam setiap langkah hidup mereka. Dengan kombinasi antara pengalaman pribadi, penelitian psikologis, dan kisah-kisah inspiratif, buku ini membimbing pembaca untuk memahami betapa pentingnya motivasi dalam mencapai kebahagiaan.
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          <p>Need <a href="#">help?</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>Hubungi kami untuk informasi lebih lanjut</em></p>

  <div class="row">
    <div class="col-md-4">
      <p>Ada saran dan kritik? Hubungi kami</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Jl. Bambu Hitam No.3, RT.3/RW.1, Bambu Apus, Kec. Cipayung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13890</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: (021) 8441976</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: librarysmkn24jkt@gmail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
  <br>
  <h3 class="text-center">REVIEW</h3>  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Winda</a></li>
    <li><a data-toggle="tab" href="#menu1">Bilqis</a></li>
    <li><a data-toggle="tab" href="#menu2">Lawrenza</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h2>Winda, Siswa</h2>
      <p>Tempatnya nyaman, ada AC nya. Jadi,siswa bisa betah baca buku disini</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h2>Bilqis, Siswa</h2>
      <p>Koleksi bukunya lengkap, ada buku fiksi dan non fiksi</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h2>Lawrenza, Siswa</h2>
      <p>Tempatnya luas, pelayanannya juga bagus. Cocok buat tempat nugas atau sekedar baca buku</p>
    </div>
  </div>
</div>

<!-- Image of location/map -->
<img src="map.jpg" class="img-responsive" style="width:100%">

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>All rigth reserved &copy; <a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">Anisa Sudarwanto</a></p> 
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Covid</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('frondend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{asset('frondend/assetsvendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css')}}">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{asset('frondend/assets/css/clean-blog.min.css')}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">Daftar Kasus</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="post.html">Sample Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Covid-19</h1>
            <span class="subheading"></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  
  <div class="container">
    <div class="row" Align="left">
      <div class="col-lg-8 col-md-10 mx-auto">
       <h2>Kasus Indonesia</h2>
        <div class="post-preview">
          <a href="post.html">
             <h>
              Jumlah Positif</h>
            </a>
            <h2>
             <div> {{ $positif }}</div>
            </h2>
          </div>

        <hr>
        <div class="post-preview">
          <a href="post.html">
            <h>
              Jumlah sembuh
            </h>
          </a>
          <h3 class="post-subtitle">
              {{ $sembuh }}
            </h3>
        </div>
         </hr>

        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
            </h2>
            </a>
        </div>
        <hr>

        <div class="post-preview">
          <a href="post.html">
            <h>
              Jumlah Meninggal
            </h>
              </a>
            <h3 class="post-subtitle">
              {{ $meninggal }}
            </h3>
        </div>

        <?php
       $datapositif = file_get_contents("https://api.kawalcorona.com/positif");
        $positif = json_decode($datapositif, TRUE);
        $datasembuh = file_get_contents("https://api.kawalcorona.com/sembuh");
        $sembuh = json_decode($datasembuh, TRUE);
        $datameninggal = file_get_contents("https://api.kawalcorona.com/meninggal");
        $meninggal = json_decode($datameninggal, TRUE);  
        $dataid = file_get_contents("https://api.kawalcorona.com/indonesia");
        $id = json_decode($dataid, TRUE);
        $datadunia = file_get_contents("https://api.kawalcorona.com/");
        $dunia = json_decode($datadunia, TRUE);
   
   
       ?>


        <div class="card-header"><h2>Data Kasus Corona global</h2>
        </div>
               <div class="card-body">
               <table class="table">
                  <thead>
                  <tr>
                     <th>No</th>
                     <th>Negara</th>
                     <th>Positif</th>
                     <th>Sembuh</th>
                     <th>Meninggal</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php
                  $no = 1;
                  @endphp
      <?php
       for ($i=0; $i <= 191; $i++){
         ?>
         <tr>
         <td> <?php echo $i+1 ?></td>
         <td> <?php echo $dunia[$i]['attributes']['Country_Region'] ?></td>
         <td> <?php echo $dunia[$i]['attributes']['Confirmed'] ?></td>
         <td> <?php echo $dunia[$i]['attributes']['Recovered'] ?></td>
         <td> <?php echo $dunia[$i]['attributes']['Deaths'] ?></td>
         </tr>



           <?php
       }?>
</tbody>
</table>
                   </div>
                   </div>
                   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                   <section id="provinsi" class="provinsi">
      <div class="container">


        <div class="section-title" data-aos="zoom-out">
          <h2>Data Kasus Indonesia</h2>
        </div>

        <div class="row content" data-aos="fade-up">
              
            <div class="table-wrapper-scroll-y my-custom-scrollbar col-lg-12">

              <table class="table table-bordered table-striped mb-0 " width="100%">
                <thead>
                  <tr>
                    <th scope="col"><center>No</center></th>
                    <th scope="col"><center>Provinsi</center></th>
                    <th scope="col"><center>Jumlah Positif</center></th>
                    <th scope="col"><center>Jumlah Sembuh</center></th>
                    <th scope="col"><center>Jumlah Meninggal</center></th>
                  </tr>
                </thead>
              <tbody>
              @php
                $no = 1;
              @endphp

              @foreach($lokal as $data)
                  <tr>
                    <th scope="row"><center>{{$no++}}</center></th>
                      <td><center>{{$data->nama_provinsi}}</center></td>
                      <td><center>{{number_format($data->jumlah_positif)}}</center></td>
                      <td><center>{{number_format($data->jumlah_sembuh)}}</center></td>
                      <td><center>{{number_format($data->jumlah_meninggal)}}</center></td>
                  </tr>
                  
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
        </div>

      </div>
      </section>
   
 <!-- ======== End Table Section ======== -->


















                   
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('frondend/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('frondend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('frondend/assets/js/clean-blog.min.js')}}"></script>

</body>

</html>

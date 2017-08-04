@extends('main') 

@section('title', '| Homepage')
@section('content')

    <div class="row">
    <div class="col-md-12">
          <div class="jumbotron">
      <h1>Welcome to my Blog</h1>
      <p class="lead">Safaricom has 19.4 million customers, and the company offers prepaid and postpaid mobile, voice, and data services.  About 99% of customers are prepaid customers. Safaricom has over 2,900 base stations that provide 2G and 3G cell service to customers, and continues to invest in upgrading and building new base stations through the “Best Network in Kenya” program.  3G coverage is only available in the metropolitan areas of the country. </p>
      <p><a class="btn btn-success btn-lg" href="#" role="button">Popular Post</a></p>
</div>
    </div>
    </div><!--end of header .row-->
    <div class="row">
      <div class="col-md-8">
        <div class="post">
          <h3>Post Heading</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis doloribus iusto fugiat fuga reprehenderit qui, eum odio laborum ipsa, aspernatur vel quis nisi, id magni ut reiciendis blanditiis sapiente ea.</p>
          <a href="#" class="btn btn-primary">Read More</a>
          </div><!--end of post-->
          <hr>
            <div class="post">
          <h3>Post Heading</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis doloribus iusto fugiat fuga reprehenderit qui, eum odio laborum ipsa, aspernatur vel quis nisi, id magni ut reiciendis blanditiis sapiente ea.</p>
          <a href="#" class="btn btn-primary">Read More</a>
          </div><!--end of post-->
          <hr>
            <div class="post">
          <h3>Post Heading</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis doloribus iusto fugiat fuga reprehenderit qui, eum odio laborum ipsa, aspernatur vel quis nisi, id magni ut reiciendis blanditiis sapiente ea.</p>
           <a href="#" class="btn btn-primary">Read More</a>
          </div><!--end of post-->
          <hr>
            <div class="post">
          <h3>Post Heading</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis doloribus iusto fugiat fuga reprehenderit qui, eum odio laborum ipsa, aspernatur vel quis nisi, id magni ut reiciendis blanditiis sapiente ea.</p>
           <a href="#" class="btn btn-primary">Read More</a>
          </div><!--end of post-->
          <hr>
      </div>
      <div class="col-md-3 col-md-offset-1"><h2>Side Bar</h2></div><!--end of col-md-3-->
    </div>
 @endsection
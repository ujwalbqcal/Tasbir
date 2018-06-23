<html lang="en">
<head>
  <title>Image upload</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/lightbox.css')}}" type="text/css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script type="text/javascript" src="{{asset('js/lightbox.min.js')}}"></script>

</head>
<body>
  
  <div class="container">
  @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif
        @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    <h3 class="jumbotron">Select an Image to upload</h3>
  <form method="post" action="{{url('create')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <input type="file" name="filename" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
          </div>
        </div>
      
      
      
        @if($image)
   	    <div class="row">
         <div class="col-md-8">
              <strong>Images:</strong>
              <br/><br/>
             <a href="{{asset('/storage/originalPath/'.$image->filename)}}" class="img-thumbnail" alt="Cinque Terre" height="240px" width="240px" data-lightbox="roadtrip">
                 <img src="{{asset('/storage/originalPath/'.$image->filename)}}" class="img-thumbnail" alt="Cinque Terre" height="240px" width="240px" ></a>
        </div>
        <!--<div class="col-md-4">
            <strong>Thumbnail Image:</strong>
            <br/>
            <img src="/thumbnail/{{$image->filename}}"  />
       	 </div>-->
   		</div>
        @endif       
  </form>
  </div>
</body>
</html>

<script>
    lightbox.option({
      'resizeDuration': 200,
      'albumLabel': true
    })
</script>

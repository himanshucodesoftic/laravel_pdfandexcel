<!DOCTYPE html>
<html>
<head>
    <title> Import Export Excel to database </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
           Import Export Excel to database
           @if(Session::has('msg'))
                                    <div class="alert alert-success">
                                    {{ Session::get('msg') }}
                                   
                                </div>
                            @endif
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
            </form>
        </div>
    </div>
</div>
   
<script type="text/javascript">
setInterval(function(){ 
   // toggle the class every 
   $('alert').toggleClass('alert');  
   setTimeout(function(){
     // toggle another class
     $('alert').toggleClass('alert');  
   },2000)

},2000);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>
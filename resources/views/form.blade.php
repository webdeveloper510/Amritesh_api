<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  </head>
  <body>
    <div class="container">
      <form id="newsForm" method="post" enctype="multipart/form-data">
        @csrf     
        <div class="form-group">
		    <label for="InputNewsName" class="form-label">News name</label>
            <input type="text" name="news_name" class="form-control" placeholder="Enter News Name" id="news_name" value="{{ old('news_name') }}">
        </div>

        <div class="form-group">
		    <label for="InputPdf" class="form-label">Pdf upload</label>
            <input type="file" name="pdf" class="form-control" placeholder="Upload pdf" id="pdf" value="{{ old('pdf') }}">
        </div>

        <div class="form-group">
		    <label for="InputImage" class="form-label">Image upload</label>
            <input type="file" name="image" class="form-control" placeholder="Upload image" id="image" value="{{ old('image') }}">
        </div>

        <div class="form-group">
		    <label for="InputYoutubeLink" class="form-label">Youtube link</label>
            <input type="text" name="youtube_link" class="form-control" placeholder="Enter youtube link" id="youtube_link" value="{{ old('youtube_link') }}">
        </div>

        <div class="form-group"> 
		  <label for="InputDescription" class="form-label">Description</label>
          <textarea class="form-control" name="description" placeholder="Enter description" id="description" value="{{ old('description') }}"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success" id="submit">Submit</button>
        </div>
    </form>
    </div>
    <script>     
      $('#newsForm').submit(function(e){
        e.preventDefault();
        $.ajaxSetup({
       headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
        });
        $.ajax({
            url: "{{ url('create-news')}}",
            method: 'post',
            data: $('#newsForm').serialize(),
            success: function(response){      
            console.log(response);  
 
            }
        });
    });
      
    </script>
  </body>
</html>
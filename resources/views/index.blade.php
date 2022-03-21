<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="{{ asset( 'js/app.js' ) }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AJAX CRUD, YAY!</title>
</head>
<body>
    <div class="container">
        <h2 id="main-title">AJAX CRUD</h2>

        <div>
            @foreach($books as $book)
                <div class="book" id="{{ $book->id }}">
                    <h3 class="title-{{ $book->id }}">{{ $book->title }}</h3>

                    <p class="author-{{ $book->id }}">{{ $book->author }}</p>

                    <p>{{ $book->id }}</p>
                    <button class="edit-btn">Edit Book</button>
                </div>
                <hr>
            @endforeach
        </div>

        <form id="addEditBook" method="POST">
            <label for="title">Title: </label>
            <input type="text" name="title" id="title" value="">

            <label for="author">Author: </label>
            <input type="text" name="author" id="author" value="">

            <input type="hidden" name="bookId" id="bookId" value="">

            <button type="submit" class="save-button" id="btn-save-{{ $book->id }}">Save Changes</button>
        </form>
    </div>
</body>
</html>
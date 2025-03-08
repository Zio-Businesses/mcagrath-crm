<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/css/all.min.css') }}">

    <!-- Lightbox CSS for Image Preview -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

    <title>Photo Gallery</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $company->favicon_url }}">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .gallery {
            margin-top: 30px;
        }

        .gallery img {
            width: 100%;
            border-radius: 8px;
            transition: transform 0.3s ease-in-out;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>

<div class="container">
    <h2 class="text-center mt-4">Photo Gallery</h2>

    <div class="row gallery">
        @foreach($files as $file_url)
        <div class="col-md-4 mb-4">
            <a href="{{$file_url}}" data-lightbox="gallery">
                <img src="{{$file_url}}" class="img-fluid">
            </a>
        </div>
        @endforeach
    </div>
</div>

<!-- jQuery & Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Lightbox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

</body>
</html>

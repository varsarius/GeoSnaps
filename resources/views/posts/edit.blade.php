@extends('layouts.default')
@section('content')
<div>
    <h1>The only way to do great work is to love what you do. - Steve Jobs </h1>
    <h3>Edit a Post</h3>
        <div class="container mx-auto mt-4">
            <div class="row">
                @foreach($post->images as $image)

                    <div class="col-md-4" style="margin-bottom: 2rem">
                        <div class="card" style="width: 18rem;">

                            <img src="{{ asset($image->image_url) }}" class="rounded float-left" alt="{{ $post->title }}">
                            <form style="float: right" action="{{ route('images.destroy', $image->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 form-group">
            <label class="form-label" for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{$post->name}}">
        </div>
        <div class="mb-3 form-group">
            <label class="form-label" for="description">Description</label>
            <textarea id="description" class="form-control" name="description" rows="3" required>{{$post->description}}</textarea>
        </div>
        <div>
            <label for="formFileLg" class="form-label">Large file input example</label>
            <input class="form-control form-control-lg" id="formFileLg" type="file" name="images[]" multiple="">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update Post</button>

    </form>
    <br>
    <div id="fileList"></div>

    <script>
        document.getElementById('formFileLg').addEventListener('change', function(e) {
            var fileList = document.getElementById('fileList');
            fileList.innerHTML = ''; // очистить список перед добавлением новых файлов
            var files = this.files;
            for (var i = 0; i < files.length; i++) {
                (function(file) {
                    var img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.height = 100; // измените размер по своему усмотрению
                    img.onload = function() {
                        URL.revokeObjectURL(this.src); // освобождение ресурсов после загрузки изображения
                    }
                    img.style.marginLeft = "2rem";
                    img.style.marginBottom = "2rem";
                    fileList.appendChild(img);
                })(files[i]);
            }
        });
    </script>
</div>
@endsection

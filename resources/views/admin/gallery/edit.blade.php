@extends('admin.main-layout')
@section('body')
    <div class="container-fluid"
        style="margin-left: -5px; width:102%; font-family: oswald; font-size:18px; background-color:white;">
        <h2 class="py-2">Edit In Gallery</h2>
        @if (session('success'))
            <script>
                toastr.success('{{ session('success') }}');
            </script>
        @endif
        <form action="{{ route('admin.gallery.update',$gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Caption:</label>
                        <input type="text" name="caption" class="form-control" value="{{ $gallery->caption }}">
                        @if ($errors->has('caption'))
                            <p class="text-danger">{{ $errors->first('caption') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Alternate Text:</label>
                        <input type="text" name="alternateText" class="form-control" value="{{ $gallery->alternateText }}"">
                        @if ($errors->has('alternateText'))
                            <p class="text-danger">{{ $errors->first('alternateText') }}</p>
                        @endif
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control" style="width: 100%;" rows="5" id="textarea" autofocus>{{ $gallery->description }}</textarea>
                        <div id="count" style="color: #2E9E42;">
                            <span id="current_count">0</span>
                            <span id="maximum_count">/ 1000</span>
                        </div>
                        @if ($errors->has('description'))
                            <p class="text-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label for="Picture">Picture:</label>
                    @if ($gallery->image)
                        <img src="{{ asset('gallery/'.$gallery->image) }}" alt="{{ $gallery->name }}" height="250px" width="500px">
                    @else
                        No Image
                    @endif
                    <input type="file" name="image" accept="image/*" class="mt-2 form-control-file">
                    @if ($errors->has('image'))
                        <p class="text-danger">{{ $errors->first('image') }}</p>
                    @endif
                </div>
            </div>
            <!-- Submit Button -->
            <div class="row">
                <div>
                    <button type="submit" class="btn btn-primary">Update In Gallery</button>
                </div><br>
            </div>
        </form>
        <br>
    </div>

    <script>
        // Function to preview uploaded image
        function previewImage(event) {
            var image = document.getElementById('imagePreview');
            var imageContainer = document.getElementById('imagePreviewContainer');
            var input = event.target;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    image.src = e.target.result;
                    imageContainer.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        $('#textarea').keyup(function() {
            var characterCount = $(this).val().length,
                current_count = $('#current_count'),
                maximum_count = $('#maximum_count'),
                count = $('#count');
            current_count.text(characterCount);
        });
    </script>
@endsection

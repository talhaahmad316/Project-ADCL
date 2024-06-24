@extends('admin.main-layout')
@section('body')
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row" style="height: 45px; width: 102%; margin-left: -18px;">
                    <div class="col-sm-12" style="background-color: white; padding: 6px;">
                        <h1 class="m-0">Gallery</h1>
                    </div>
                </div>
            </div>
        </div>
        @if (session('success'))
        <script>
            // Display Toastr success message
            toastr.success('{{ session('success') }}');
        </script>
    @endif
        <div class="mb-4 row">
            <div class="col-md-6 " style="font-family: oswald; margin-left: 93%; font-size:18px;">
                <a href="{{ route('admin.gallery.create') }}" style="margin-top: 4%;margin-left: -189%" class="btn btn-success">Add In Gallery</a>
            </div>
        </div>
        <table id="galleryTable" class="table table-bordered" style="font-family: oswald; font-size:18px;">
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Caption</th>
                    <th>Alternate Text</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $gallery)
                    <tr>
                        <td>
                            @if ($gallery->image)
                                <img src="{{ asset('gallery/'.$gallery->image) }}" alt="{{ $gallery->name }}"
                                    class="border rounded-circle border-light img-centered"
                                    style="width: 100px; height: 100px; object-fit: cover; object-position: center;">
                            @else
                                No Image
                            @endif
                        </td>

                        <td>{{ $gallery->caption }}</td>
                        <td>{{ $gallery->alternateText }}</td>
                        <td>{{ $gallery->description }}</td>

                        <td>

                            <a href="{{ route('admin.gallery.show',  $gallery->id) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('admin.gallery.edit',$gallery->id) }}" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                           
                            <a>
                                <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this player?')">
                                        <i class="fas fa-trash"></i> 
                                    </button>
                                </form>
                            </a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <script>
        $(document).ready(function () {
            $('#galleryTable').DataTable();
        });
    </script>
@endsection

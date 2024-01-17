@extends('admin.main-layout')

@section('body')
<div class="container-fluid" style="margin-left: -20px; width:103.5%; font-family: oswald; font-size:18px; background-color:white;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-size: 28px; font-weight:bold">Add Team</div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label for="name">Team Name:</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label for="logo">Team Logo:</label>
                                    <input type="file" name="logo" accept="image/*" class="form-control-file" required>
                                    <div class="logo-preview" style="display: flex; align-items: center; margin-left: 350px; margin-top:-45px;">
                                        <img id="logoPreview" src="#" alt="Logo Preview" style="max-height: 100px; border-radius: 50%; display: none;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="club">Team Club:</label>
                            <select name="club" class="form-control" required>
                                <option value="">Select a Club</option>
                                <option value="ADCL">ADCL </option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control" required>
                                <option value="">Select a Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Add Team</button>
                        </div>
                    </form>
                    &nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    // JavaScript to preview the selected logo image
    document.querySelector('input[name="logo"]').addEventListener('change', function(e) {
        var logoPreview = document.getElementById('logoPreview');
        if (e.target.files.length > 0) {
            var reader = new FileReader();
            reader.onload = function (e) {
                logoPreview.style.display = 'block';
                logoPreview.src = e.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        } else {
            logoPreview.style.display = 'none';
            logoPreview.src = '';
        }
    });
</script>

@endsection


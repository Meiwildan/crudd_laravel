@extends('layout.admin')

@section('content')
<body>
  <br>
  <br>
  <h1 class="text-center mb-4 mt-5">Tambah Data Pegawai</h1>


 <div class="container">
  <div class="row justify-content-center">
  <div class="col-8">
      <div class="card">
          <div class="card-body">
              <form action="/insertdata" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control">
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Jenis Kelamin</label>
                      <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                          <option selected>Pilih Jenis Kelamin</option>
                          <option value="cowo">cowo</option>
                          <option value="cewe">cewe</option>
                        </select>
                        @error('jeniskelamin')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">No Telpon</label>
                      <input type="number" name="notelpon" class="form-control">
                      @error('notelpon')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Tambah Gambar</label>
                      <input type="file" name="foto" class="form-control">
                    </div>
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
          </div>
      </div>
  </div>
  </div>
 </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>
    
@endsection
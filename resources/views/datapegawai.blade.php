@extends('layout.admin')
@push('css')
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pegawai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Pegawai</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="container">
    {{-- {{ Session::get('halaman_url') }} --}}
    <a href="/tambahpegawai" type="button" class="btn btn-success btn-sm">Tambah +</a>
    <div class="row g-3 align-items-center mt-2 ">
        <div class="col-auto">
            <form action="/pegawai" method="GET">
              <i class="nav-icon fas fa-search"></i>
                <label class="form-label">Search Data</label>
                <input type="search" name="search" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="Search">
            </form>        
        </div>
    </div>
           
          
    
    {{-- @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
      </div>
    @endif --}}
    <div class="row">
        <table class="table">
            <thead>
              <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">No telpon</th>
                <th scope="col">Foto</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach ($data as $index => $rowfarrel)
                <tr class="text-center">
                    <th>{{ $index + $data->firstItem() }}</th>
                    <td>{{ $rowfarrel->nama }}</td>
                    <td>{{ $rowfarrel->jeniskelamin }}</td>
                    <td>{{ $rowfarrel->notelpon }}</td>
                    <td>
                        <img src="{{ asset('fotopegawai/'.$rowfarrel->foto) }}" width="85px">
                    </td>
                    <td>{{ $rowfarrel->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="/tampilkandata/{{$rowfarrel->id}}" class="btn btn-info btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm delete" data-id="{{ $rowfarrel->id }}">Delete</a>
                    </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
          {{ $data->links() }}
    </div>
   </div>
</div>


</html>



@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    $('.delete').click(function() {
        var pegawaiid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');


        swal({
                title: "Yakin?",
                text: "Kamu akan menghapus data pegawai dengan id " + pegawaiid + " ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletedata/" + pegawaiid + ""
                    swal("Data Berhasil Dihapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    });
</script>
  <script>
    @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
    
  </script>
    
@endpush
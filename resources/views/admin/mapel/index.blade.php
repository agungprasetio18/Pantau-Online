@extends('layouts.admin.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                @if (session('status'))
                    <div class="alert alert-success">
                    {{session('status')}}
                    </div>
                @endif

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <!-- Main content -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="card-title">Data Mata Pelajaraan</h3>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-primary float-lg-right" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data
                        </button>
                    </div>
                </div>
                
            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Pelajaraan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $mapels as $mapel )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mapel->nama_mapel }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <a href="{{route('admin.mapel.edit', $mapel->id_mapel)}}" class="btn btn-success btn-sm edit_data"> <i class="fa fa-edit"></i>Edit</a>
                                    </div>
                                    <div class="col-lg-4">
                                        <form action="{{route('admin.mapel.destroy', $mapel->id_mapel)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button  class="btn btn-danger btn-sm hapus_data"> <i class="fa fa-trash"></i>Hapus</button>
                                        </form>
                                    </div>
                                </div>
                                
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
</div>
</section>
<!-- /.content -->
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" class="form-data" id="form-data" action="{{route('admin.mapel.store')}}">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Mata Pelajaraan</label>
                                <input type="text" name="nama_mapel" id="nama_mapel" class="form-control" >
                                <p class="text-danger">{{ $errors->first('nama_mapel') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function () {
        $("#table").DataTable();
    });

</script>
@endsection

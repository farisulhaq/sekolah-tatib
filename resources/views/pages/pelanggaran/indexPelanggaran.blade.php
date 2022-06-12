@extends('templates.app')
@section('content')
  <div class="row mt-3">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Pelanggaran</h3>
        </div>
        <div class="card-body">
          <a href="{{ route('pelanggaran.create') }}" class="btn btn-primary mb-2"><i class="fa-solid fa-plus"></i> Tambah
            pelanggaran</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center col-1">No</th>
                <th class="col-1 text-center">NIS</th>
                <th class="col-2">Nama Siswa</th>
                <th class="col-2">Pelanggaran</th>
                <th class="col-2 text-center">Tanggal Kejadian</th>
                <th class="col-2 text-center">Bukti</th>
                <th class="col-1 text-center">Poin</th>
                <th colspan="2" class="text-center col-1">Action</th>
              </tr>
            </thead>
            <tbody>
              @for ($i = 0; $i < 2; $i++)
                <tr>
                  <td class="text-center">1</td>
                  <td class="text-center">16987</td>
                  <td class="text-capitalize">ahmad farisul haq</td>
                  <td class="text-capitalize">menyontek</td>
                  <td class="text-center">12/04/2002</td>
                  <td class="text-center"><img
                      src="https://www.teralogistics.com/wp-content/uploads/2020/12/default.png" alt="default" width="80">
                  </td>
                  <td class="text-center">10</td>
                  <td class="text-center">1</td>
                  <td class="text-center">1</td>
                </tr>
              @endfor
            </tbody>
          </table>
        </div>

        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection

@extends('templates.app')
@section('content')
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Bordered Table</h3>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
							@forelse ($gurus->users as $guru)
							{{ dd($guru) }}
							<tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $guru->name }}</td>
								<td>{{ $guru->email }}</td>
                <td>Edit</td>
                <td>Hapus</td>
              </tr>
              <tr>
							@empty
								
							@endforelse
              
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

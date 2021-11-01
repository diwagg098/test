@extends('layout._app')

@section('title','Apartement')
@section('content')
    <div id="page-content-wrapper">
    <div class="container-fluid">
        <h2>Apartement</h2><br>
        <br>
        <div class="row">
            <a href="{{ url('apartement/book')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Book Now</a> | <button class="btn btn-info" onclick="downloadexcel('table')"><i class="fa fa-download"></i> Download Report</button>
        </div>
        <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table" id="">
                    <thead >
                        <th class="text-center">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Apartement Name</th>
                        <th class="text-center">dateFrom</th>
                        <th class="text-center">dateTo</th>
                        <th class="text-center">Duration Book</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($content as $row)
                        <tr>
                            <td class="text-center">{{ $loop->iteration}}</td>
                            <td class="text-center">{{ $row->name}}</td>
                            <td class="text-center">{{ $row->apartement_name}}</td>
                            <td class="text-center">{{ $row->dateFrom}}</td>
                            <td class="text-center">{{ $row->dateTo}}</td>
                            <td class="text-center">
                                <?php 
                                    $from = date_create($row->dateFrom);
                                    $to = date_create($row->dateTo);
                                    $diff = date_diff($from, $to);
                                ?>

                                {{ $diff->d . ' Hari'}}
                            </td>
                            <td class="text-center">
                                <form action="{{ url('apartement/delete/' . $row->uniq_id)}}" onsubmit="return confirm('Hapus data ?')" method="POST">
                                    @csrf
                                    @method("delete")
                                    <a href="{{ url('apartement/edit/' . $row->uniq_id)}}" class="btn btn-success">Edit</a> | <button class="btn btn-danger" type="submit">Hapus</button></td>
                                </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>
  <table class="table" id="table" style="display: none;">
    <thead >
        <th class="text-center">No</th>
        <th class="text-center">Name</th>
        <th class="text-center">Apartement Name</th>
        <th class="text-center">dateFrom</th>
        <th class="text-center">dateTo</th>
        <th class="text-center">Duration Book</th>
    </thead>
    <tbody>
        @foreach ($content as $row)
        <tr>
            <td class="text-center">{{ $loop->iteration}}</td>
            <td class="text-center">{{ $row->name}}</td>
            <td class="text-center">{{ $row->apartement_name}}</td>
            <td class="text-center">{{ $row->dateFrom}}</td>
            <td class="text-center">{{ $row->dateTo}}</td>
            <td class="text-center">
                <?php 
                    $from = date_create($row->dateFrom);
                    $to = date_create($row->dateTo);
                    $diff = date_diff($from, $to);
                ?>

                {{ $diff->d . ' Hari'}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
  function downloadexcel(tableID) {
    var table = document.getElementById(tableID);
    window.open('data:application/vnd.ms-excel,' + encodeURIComponent(table.outerHTML));
  }
</script>
@endsection
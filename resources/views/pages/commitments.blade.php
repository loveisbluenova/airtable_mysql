@extends('admin.layouts.dashboard')

@section('template_title')
  Welcome {{ $user->name }}
@endsection

@section('template_fastload_css')
@endsection

@section('content')
  <link href="../resources/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
  <link href="../resources/css/chosen.min.css" rel="stylesheet" type="text/css" />
  <link href="../resources/css/jquery.dataTables.yadcf.css" rel="stylesheet" type="text/css" />
  <link href="../resources/css/shCore.css" rel="stylesheet" type="text/css" />
  <link href="../resources/css/shThemeDefault.css" rel="stylesheet" type="text/css" />
  <style>
    body {
      font-size: 12px;
    }
  </style>
   <div class="content-wrapper">
      <section class="content-header">

      <h1>
        Ny - Commitments <small> {{ Lang::get('pages.dashboard-access-level',['access' => $access] ) }} </small>
      </h1>

      {!! Breadcrumbs::render() !!}

      </section>
    <section class="content">   

          <div class="box box-primary box-solid">
            <div class="box-header">

              <h3 class="box-title" style="margin: 5px;"></h3>
              <a href="/updatecommitment" class="btn btn-default btn-sm pull-right">
                <i class="fa fa-download" aria-hidden="true"></i>
                Update Commitments from Airtable
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" cellpadding="0" cellspacing="0" border="0" class="display">
                <thead>
                <tr>
                  <th>Description / Commitment Description</th>
                  <th>Commitment date</th>
                  <th>Noncity cost</th>
                  <th>Citycost</th>
                  <th>Budgetline</th>
                  <th>Fmsnumber</th>
                  <th>Commitment code</th>
                </tr>
                </thead>
              <tbody>
               @foreach ($commitments as $commitment)
                <tr>
                  <td>{{$commitment->description}}</td>
                  <td>{{$commitment->plancommdate}}</td>
                  <td>{{$commitment->noncitycost}}</td>
                  <td>{{$commitment->citycost}}</td>
                  <td>{{$commitment->budgetline}}</td>
                  <td>{{$commitment->fmsnumber}}</td>
                  <td>{{$commitment->commitmentcode}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
              <dir class="text-right">
                {{$commitments->links()}}
              </dir>
            </div>
            <!-- /.box-body -->


      </div>
      <!-- /.row -->

    </section>
  </div>
@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')

    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <script src="../js/bootstrap-select.js"></script>
    <script src="../resources/js/jquery.dataTables.yadcf.js"></script>
    <script src="../resources/js/dom_source_example2.js"></script>


@endsection
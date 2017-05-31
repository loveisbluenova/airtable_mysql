@extends('admin.layouts.dashboard')

@section('template_title')
  Welcome {{ $user->name }}
@endsection

@section('template_fastload_css')
@endsection

@section('content')

  <link href="../../resources/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
  <link href="../../resources/css/chosen.min.css" rel="stylesheet" type="text/css" />
  <link href="../../resources/css/jquery.dataTables.yadcf.css" rel="stylesheet" type="text/css" />
  <link href="../../resources/css/shCore.css" rel="stylesheet" type="text/css" />
  <link href="../../resources/css/shThemeDefault.css" rel="stylesheet" type="text/css" />
  <style>
    body {
      font-size: 12px;
    }
    .dl-horizontal dt, .dl-horizontal dd {
      font-size: 16px;
    }
    .dataTables_length, .dataTables_filter
    {
      display: none;
    }
  </style>
   <div class="content-wrapper">
      <section class="content-header">

      <h1>
        Ny - Profile <small> {{ Lang::get('pages.dashboard-access-level',['access' => $access] ) }} </small>
      </h1>

      {!! Breadcrumbs::render() !!}

      </section>
    <section class="content">   

          <div class="box box-primary box-solid">
            <div class="box-header" style="margin-bottom: 20px;">

              <h3 class="box-title" style="margin: 5px;"></h3>

            </div>
                      <div class="col-md-12">
              <dl class="dl-horizontal">
                <dt>Project Name:<dt><dd> {{$projects->project_projectid}}</dd>
                <dt>Agency Name:<dt> <dd>{{$projects->magencyname}}</dd>
                <dt>Description:<dt> <dd>{{$projects->project_description}}</dd>
                <dt>City Cost + Non-City Cost:<dt><dd> ${{$projects->project_citycost}} + ${{$projects->project_noncitycost}}</dd>
                <dt>Total Cost:<dt> <dd>{{$projects->project_totalcost}}</dd>
                <dt>#of Commitments:<dt> <dd>{{sizeof(explode(",", $projects->project_commitments))}}</dd>
              </dl>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" cellpadding="0" cellspacing="0" border="0" class="display">
                <thead>
                <tr>
                  <th>Description / Commitment Description</th>
                  <th>commitment date</th>
                  <th>noncity cost($)</th>
                  <th>citycost($)</th>
                  <th>budgetline</th>
                  <th>fmsnumber</th>
                  <th>commitment code</th>
                </tr>
                </thead>
                <tbody id="tblData">
                 @foreach ($commitments as $commitment)
                  <tr>
                    <td>{{$commitment->description}} / {{$commitment->commitmentdescription}}</td>
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
   
            </dir>
            <!-- /.box-body -->


      </div>
      <!-- /.row -->

    </section>
  </div>
@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')

    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.bootstrap.min.js"></script>
    <script src="../../js/bootstrap-select.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../resources/js/jquery.dataTables.yadcf.js"></script>
    <script src="../../resources/js/dom_source_example2.js"></script>




@endsection
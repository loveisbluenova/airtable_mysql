@extends('admin.layouts.dashboard')

@section('template_title')
  Welcome {{ $user->name }}
@endsection

@section('template_fastload_css')
@endsection

@section('content')
  <link href="../resources/css/jquery.dataTables.css" rel="stylesheet" type="text/css">

  <link href="../resources/css/jquery.dataTables.yadcf.css" rel="stylesheet" type="text/css" />
  <link href="../resources/css/shCore.css" rel="stylesheet" type="text/css" />
  <link href="../resources/css/shThemeDefault.css" rel="stylesheet" type="text/css" />
  <link href="../resources/css/chosen.min.css" rel="stylesheet" type="text/css" />
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
            <h4>Ny - Projects</h4> 
    
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                <tr>
                  <th>Project ID</th>
                  <th>Agency</th>
                  <th>Description</th>
                  <th>#Commitments</th>
                  <th>Total Cost &nbsp &nbsp&nbsp&nbsp&nbsp</th>
                </tr>
                </thead>
              <tbody>
               @foreach ($projects as $project)
                <tr>
                  <td><a href="/pages/projects/{{$project->project_recordid}}"> {{$project->project_projectid}}</a></td>
                  <td>{{$project->magencyname}}</td>
                  <td>{{$project->project_description}}</td>
                  <td>{{sizeof(explode(",", $project->project_commitments))}}</td>
                  <td>{{$project->project_totalcost}}</td>
                </tr>

                @endforeach

            
                </tbody>
              </table>
              <dir class="text-right">

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
    <script src="../resources/js/chosen.jquery.min.js"></script>
    <script src="../resources/js/jquery.dataTables.yadcf.js"></script>
    <script src="../resources/js/dom_source_example1.js"></script>


@endsection
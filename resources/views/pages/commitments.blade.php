@extends('admin.layouts.dashboard')

@section('template_title')
  Welcome {{ $user->name }}
@endsection

@section('template_fastload_css')
@endsection

@section('content')
   <div class="content-wrapper">
      <section class="content-header">

      <h1>
        Ny - Commitments <small> {{ Lang::get('pages.dashboard-access-level',['access' => $access] ) }} </small>
      </h1>

      {!! Breadcrumbs::render() !!}

      </section>
    <section class="content">
      <div class="row">
        
        <!--  <div class="col-sm-4 col-md-4">
            
              <div class="input-group col-md-12">
                    <input type="text" onkeyup="myFunction()" id="myInput" class="form-control" placeholder="Search (Project ID or Description)" name="q">

                  <div class="input-group-btn">
                        <button class="btn btn-secondary" id="mysearchbutton" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
         
          </div>
        <div class="form-group col-sm-4 col-md-4">
            <select id="first-disabled2" class="selectpicker" multiple data-hide-disabled="true" data-size="5">
            </select>
          </div> -->     
        
      </div> 

          <div class="box box-primary box-solid">
            <div class="box-header">

              <h3 class="box-title" style="margin: 5px;"><i class="fa fa-calendar" aria-hidden="true"></i><b> Updated Date :</b></h3>
              <a href="/updatecommitment" class="btn btn-default btn-sm pull-right">
                <i class="fa fa-download" aria-hidden="true"></i>
                Update Commitments from Airtable
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
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
                  <td>${{$commitment->noncitycost}}</td>
                  <td>${{$commitment->citycost}}</td>
                  <td>{{$commitment->budgetline}}</td>
                  <td>{{$commitment->fmsnumber}}</td>
                  <td>{{$commitment->commitmentcode}}</td>
                </tr>
                @endforeach
                </tfoot>
              </table>
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
    <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

@endsection
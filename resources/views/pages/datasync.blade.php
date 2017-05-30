@extends('admin.layouts.dashboard')

@section('template_title')
  Welcome {{ $user->name }}
@endsection

@section('template_fastload_css')

@endsection

@section('content')
    <style>
      .box-header.with-border {
      border-bottom: 1px solid #f4f4f4;
      height: 55px;
    }
    </style>
   <div class="content-wrapper">
      <section class="content-header">

      <h1>
        Ny - Data Sync <small> {{ Lang::get('pages.dashboard-access-level',['access' => $access] ) }} </small>
      </h1>

      {!! Breadcrumbs::render() !!}

      </section>
      <section class="content">
          <div class="box box-primary box-solid">
            <div class="box-header">

              <h3 class="box-title" style="margin: 5px;"></h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="text-left">
              <a href="http://localhost/agency.php">
                <i class="fa fa-download" aria-hidden="true"></i>
                Update Agencies from Airtable
              </a>
              <h4>Updated Date: {{$agencyupdate->created_at}}</h4>
            </div>
            <div class="text-left">

              <a href="http://localhost/project.php">
                <i class="fa fa-download" aria-hidden="true"></i>
                Update Projects from Airtable
              </a>
              <h4>Updated Date: {{$projectupdate->created_at}}</h4>
            </div>
            <div class="text-left">
              <a href="http://localhost/commitment.php">
                <i class="fa fa-download" aria-hidden="true"></i>
                Update Commitments from Airtable
              </a>
              <h4>Updated Date: {{$commitmentupdate->created_at}}</h4>
            </div>
            <!-- /.box-body -->


          </div>
        </div>

      </section>
  </div>
@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')


@endsection
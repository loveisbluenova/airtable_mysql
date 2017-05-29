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
        Ny - Agencies <small> {{ Lang::get('pages.dashboard-access-level',['access' => $access] ) }} </small>
      </h1>

      {!! Breadcrumbs::render() !!}

      </section>
      <section class="content">
          <div class="row">
        
            <div class="col-sm-4 col-md-4">
              <div class="input-group col-md-12">
                  <input type="text" id="myInput" class="form-control" placeholder="Search (Agency Name)" name="q"> 
                  <div class="input-group-btn">
                    <button class="btn btn-secondary" id="mysearchbutton" type="submit"><i class="glyphicon glyphicon-search"></i></button>

                  </div>         
              </div>            
            </div> 
    
          </div> 
      <!-- /.search form -->
      <!-- Your Page Content Here -->
      <div class="row" id="row">

        <!-- ./col -->

      </div>


      </section>
  </div>
@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')
    <script src="../js/airtable.browser.js"></script>
    <script src="../js/agency.js"></script>

@endsection
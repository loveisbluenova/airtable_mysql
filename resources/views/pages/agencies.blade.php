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
      <!-- search form -->
      <div class="row">
        
          <div class="col-sm-4 col-md-4">
            <div class="input-group col-md-12">
              <form action="/pages/agencies/find" method="POST" class="form-group">  
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control" placeholder="Search (Agency Name)" name="find" style="    width: calc(100% - 40px);"> 
                <span class="input-group-btn">
                  <button class="btn btn-secondary" id="mysearchbutton" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </span>
              </form>


            </div>            
          </div>
          <div class="col-sm-8 col-md-8">
          <h4><b style="margin-left:30px;"> Total Cost</b> <a href="/pages/agencies/totalcostdesc"> <i class="fa fa-sort-amount-desc" aria-hidden="true"></i> </a><a href="/pages/agencies/totalcostasc"> <i class="fa fa-sort-amount-asc" aria-hidden="true"></i> </a><b style="margin-left:65px; "> Projects </b> <a href="/pages/agencies/projectsdesc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a><a href="/pages/agencies/projectsasc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a><b style="margin-left:65px;"> Commitments </b><a href="/pages/agencies/commitmentsdesc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a><a href="/pages/agencies/commitmentsasc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a></h4>

          </div>
        
      </div> 
      <!-- /.search form -->
      <!-- Your Page Content Here -->
      <div class="row" id="row">
          @foreach ($agencys as $agency)
            <div class="col-md-4">
              <div class="box box-solid">
                <div class="box-header with-border  text-center" style="height:55px">
                  <h3 class="box-title"><a href="projects/{{$agency->magencyname}}">{{$agency->magencyname}}</a></h3>
                </div>
                <div class="box-body" id="tblData">
                  <dl class="dl-horizontal">
                    <dt>Agency Acronym </dt><dd>{{$agency->magencyacro}}</dd>
                    <dt># Project </dt><dd> {{$agency->projects}}</dd>
                    <dt>- Total Cost </dt><dd> {{$agency->total_project_cost}}</dd>
                    <dt># Commitments </dt><dd> {{$agency->commitments}}</dd>
                    <dt>- City Costs </dt><dd> ${{$agency->commitments_cost}}</dd>
                    <dt>- Non City Costs </dt><dd> ${{$agency->commitments_noncity_cost}}</dd>
                  </dl>
                </div>
              </div>
            </div>
          @endforeach
      </div>
    
    </section>
  </div>
@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')
   <script src="../js/airtable.browser.js"></script>
  <script src="../js/agency.js"></script>

@endsection
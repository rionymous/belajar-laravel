@extends('layouts.app')

@section('content')
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <div class="section-header-back">
                <a href="/roles" class="btn btn-icon">
                  <i class="fas fa-arrow-left"></i>
                </a>
              </div>
              <h1>View Role</h1>
              <div class="section-header-breadcrumb"> @foreach($breadcrumbs as $breadcrumb) <div class="breadcrumb-item">
                  <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                </div> @endforeach </div>
            </div>
            <div class="section-body">
              <div class="row">
                <div class="col-12 col-md-4 col-lg-4">
                  <div class="card">
                    <div class="card-header">
                      <h4>{{ $role->name }}</h4>
                    </div>
                    <div class="card-body">
                    <ul class="list-group">
                      <li class="list-group-item">Cras justo odio</li>
                      <li class="list-group-item">Dapibus ac facilisis in</li>
                      <li class="list-group-item">Morbi leo risus</li>
                      <li class="list-group-item">Porta ac consectetur ac</li>
                      <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-8 col-lg-8">
                  <div class="card">
                    <div class="card-header">
                      <h4>User Assigned</h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped" id="table-role">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody></tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div> 
@endsection
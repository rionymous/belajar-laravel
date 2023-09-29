@extends('layouts.app')

@section('content')
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <div class="section-header-back">
                <a href="{{ route('permissions.index') }}" class="btn btn-icon">
                  <i class="fas fa-arrow-left"></i>
                </a>
              </div>
              <h1>View Permission</h1>
              <div class="section-header-breadcrumb"> @foreach($breadcrumbs as $breadcrumb) <div class="breadcrumb-item">
                  <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                </div> @endforeach </div>
            </div>
            <div class="section-body">
              <div class="row">
                <div class="col-12 col-md-4 col-lg-4">
                  <div class="card">
                    <div class="card-header">
                      <h4>{{ $permission->name }}</h4>
                    </div>
                    <div class="card-body">
                    <p><strong>Description:</strong> {{ $permission->description }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-8 col-lg-8">
                  <div class="card">
                    <div class="card-header">
                      <h4>Role Assigned</h4>
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

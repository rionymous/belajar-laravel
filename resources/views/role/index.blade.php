<!DOCTYPE html>
<html lang="en"> @include('components.header') <body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1"> @include('components.navbar') @include('components.sidebar')
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Role List</h1>
              <div class="section-header-button">
                <a href="/roles/create" class="btn btn-primary">Add New</a>
              </div>
              <div class="section-header-breadcrumb"> @foreach($breadcrumbs as $breadcrumb) <div class="breadcrumb-item">
                  <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                </div> @endforeach </div>
            </div>
            <div class="section-body">
              <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>All Roles</h4>
                    </div>
                    <div class="card-body">
                    @if(count($roles) > 0)
                      <div class="table-responsive">
                        <table class="table table-striped" id="table-role">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Enabled</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody> @foreach ($roles as $role) 
                            <tr data-user-id="{{ $role->id }}">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <span class="badge {{ $role->enabled ? 'badge-success' : 'badge-warning' }}">
                                  {{ $role->enabled ? 'ENABLE' : 'DISABLE' }}
                                </span>
                              </td>
                              <td>
                                <a href="/roles/edit/{{ $role->id }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="/roles/delete/{{ $role->id }}" class="btn btn-danger btn-sm">Delete</a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      @else
                        <div class="empty-state" data-height="400">
                        <div class="empty-state-icon">
                          <i class="fas fa-question"></i>
                        </div>
                        <h2>We couldn't find any data</h2>
                        <p class="lead"> Sorry we can't find any data, to get rid of this message, make at least 1 entry. </p>
                        <a href="#" class="btn btn-primary mt-4">Create new One</a>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div> @include('components.footer')
      </div>
    </div> @include('components.script')
  </body>
</html>
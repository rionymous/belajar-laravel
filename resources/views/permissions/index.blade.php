@extends('layouts.app')

@section('content')
    <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Permission List</h1>
              <div class="section-header-button">
                <a href="{{ route('permissions.create') }}" class="btn btn-primary">Create Permission</a>
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
                      <h4>All Permission</h4>
                    </div>
                    <div class="card-body">
                    @if(count($permissions) > 0)
                      <div class="table-responsive">
                        <table class="table table-striped" id="table-role">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody> @foreach($permissions as $permission)
                            <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->description }}</td>
                              <td>
                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
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
                        <a href="{{ route('permissions.create') }}" class="btn btn-primary mt-4">Create new One</a>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div> 
@endsection

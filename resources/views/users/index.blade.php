@extends('layouts.app')

@section('content')
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>User List</h1>
              <div class="section-header-button">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Add New</a>
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
                      <h4>All Users</h4>
                    </div>
                    <div class="card-body">
                    @if(count($users) > 0)
                      <div class="table-responsive">
                        <table class="table table-striped" id="table-user">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone Number</th>
                              <th>Role</th>
                              <th>Enabled</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody> @foreach ($users as $user) <tr data-user-id="{{ $user->id }}">
                              <td>{{ $loop->index + 1 }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>-</td>
                              <td>@foreach ($user->roles as $role)
                                {{ $role->name }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach</td>
                              <td>
                                <span class="badge {{ $user->enabled ? 'badge-success' : 'badge-warning' }}">
                                  {{ $user->enabled ? 'ENABLE' : 'DISABLE' }}
                                </span>
                              </td>
                              <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                              </td>
                            </tr> @endforeach </tbody>
                        </table>
                      </div>
                      @else
                        <div class="empty-state" data-height="400">
                        <div class="empty-state-icon">
                          <i class="fas fa-question"></i>
                        </div>
                        <h2>We couldn't find any data</h2>
                        <p class="lead"> Sorry we can't find any data, to get rid of this message, make at least 1 entry. </p>
                        <a href="/users/add" class="btn btn-primary mt-4">Create new One</a>
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
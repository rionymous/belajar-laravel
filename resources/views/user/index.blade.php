<!DOCTYPE html>
<html lang="en"> 
    @include('components.header') 
<body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1"> @include('components.navbar') @include('components.sidebar')
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>User List</h1>
              <div class="section-header-button">
                <a href="/users/create" class="btn btn-primary">Add New</a>
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
                              <td>-</td>
                              <td>
                                <span class="badge {{ $user->enabled ? 'badge-success' : 'badge-warning' }}">
                                  {{ $user->enabled ? 'ENABLE' : 'DISABLE' }}
                                </span>
                              </td>
                              <td>
                                <a href="/users/edit/{{ $user->id }}" class="btn btn-primary btn-sm">Edit</a>
                                <button onclick="deleteUser({{ $user->id }})" class="btn btn-danger btn-sm">Delete</button>
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
                        <a href="/users/create" class="btn btn-primary mt-4">Create new One</a>
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

    <script>
    function deleteUser(userId) {
        // Tampilkan Sweet Alert konfirmasi
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this user!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Lakukan penghapusan pengguna
                $.ajax({
                    url: '/users/delete/' + userId,
                    type: 'GET',
                    success: function(response) {
                        // Tampilkan Sweet Alert sukses
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'User has been deleted.',
                            icon: 'success'
                        }).then(() => {
                            // Redirect atau lakukan tindakan lain jika perlu
                            window.location.href = '/users';
                        });
                    },
                    error: function(xhr) {
                        // Tampilkan Sweet Alert gagal
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to delete user.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    }
</script>
  </body>
</html>
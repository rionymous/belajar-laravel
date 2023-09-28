<!DOCTYPE html>
<html lang="en">
@include('components.header')

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      @include('components.navbar')
      @include('components.sidebar')

      <!-- Main Content -->
      <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <div class="section-header-back">
                        <a href="/users" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h1>Add User</h1>
                    <div class="section-header-breadcrumb">
                    @foreach($breadcrumbs as $breadcrumb)
                    <div class="breadcrumb-item">
                        <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                    </div>
                @endforeach
                    </div>
                </div>

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Create New User</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('user.create') }}" method="post">
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                                   for="name">Name</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                                   for="email">Email</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" id="email" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                                   for="password">Password</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="password" class="form-control" id="password"
                                                       name="password">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
      @include('components.footer')
    </div>
  </div>

  @include('components.script')
</body>
</html>
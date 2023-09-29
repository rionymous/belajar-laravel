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
                        <a href="/roles" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h1>Edit Role</h1>
                    <div class="section-header-breadcrumb"> @foreach($breadcrumbs as $breadcrumb) <div class="breadcrumb-item">
									<a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
								</div> @endforeach </div>
                </div>

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Role</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('role.update', ['id' => $role->id]) }}" method="post">
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="name">Name</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Enabled</label>
                                            <div class="selectgroup w-100 col-sm-12 col-md-7">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="enabled" value="1" class="selectgroup-input" {{ $role->enabled ? 'checked' : '' }}>
                                                    <span class="selectgroup-button">Enable</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="enabled" value="0" class="selectgroup-input" {{ !$role->enabled ? 'checked' : '' }}>
                                                    <span class="selectgroup-button">Disable</span>
                                                </label>
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
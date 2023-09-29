@extends('layouts.app') @section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('permissions.index') }}" class="btn btn-icon">
          <i class="fas fa-arrow-left"></i>
        </a>
      </div>
      <h1>Create Permission</h1>
      <div class="section-header-breadcrumb"> 
        @foreach($breadcrumbs as $breadcrumb) 
        <div class="breadcrumb-item">
          <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
        </div> @endforeach </div>
    </div>
    <div class="section-body">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Create New Permission</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('permissions.store') }}" method="post"> 
                @csrf 
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="name">Name</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="description">Description</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" id="description" name="description">
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Create</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div> @endsection
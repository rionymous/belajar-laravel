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
            <h1>Blank Page</h1>
          </div>

          <div class="section-body">
          </div>
        </section>
      </div>
      @include('components.footer')
    </div>
  </div>

  @include('components.script')
</body>
</html>
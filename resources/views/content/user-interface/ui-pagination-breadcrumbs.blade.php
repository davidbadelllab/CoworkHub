@extends('layouts/contentNavbarLayout')

@section('title', 'Pagination and breadcrumbs - UI elements')

@section('content')
<div class="card mb-6">
  <h5 class="card-header">Pagination</h5>
  <!-- Basic Pagination -->
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <small class="text-light fw-medium">Basic</small>
        <div class="demo-inline-spacing">
          <!-- Basic Pagination -->
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <li class="page-item first">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-left-s-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-right-s-line ri-22px"></i></a>
              </li>
              <li class="page-item last">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
          <!--/ Basic Pagination -->
          <!-- Basic rounded Pagination -->
          <nav aria-label="Page navigation">
            <ul class="pagination pagination-rounded">
              <li class="page-item first">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-left-s-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-right-s-line ri-22px"></i></a>
              </li>
              <li class="page-item last">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
          <!--/ Basic rounded Pagination -->


        </div>
      </div>
      <div class="col-lg-6">
        <small class="text-light fw-medium">Basic Pagination Shape</small>
        <div class="demo-inline-spacing">
          <!-- Outline Pagination -->
          <nav aria-label="Page navigation">
            <ul class="pagination pagination-outline-primary">
              <li class="page-item first">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-left-s-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-right-s-line ri-22px"></i></a>
              </li>
              <li class="page-item last">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
          <!--/ Outline Pagination -->
          <!-- Outline rounded Pagination -->
          <nav aria-label="Page navigation">
            <ul class="pagination pagination-rounded pagination-outline-primary">
              <li class="page-item first">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-left-s-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-arrow-right-s-line ri-22px"></i></a>
              </li>
              <li class="page-item last">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
          <!--/ Outline rounded Pagination -->
        </div>
      </div>
    </div>
  </div>
  <!--/ Basic Pagination -->

</div>
<!-- Pagination Sizes -->
<div class="card mb-6">
  <h5 class="card-header">Sizes & Alignments</h5>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-4">
        <small class="text-light fw-medium">Sizes</small>
        <div class="demo-inline-spacing">
          <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm">
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-20px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-20px"></i></a>
              </li>
            </ul>
          </nav>
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
          <nav aria-label="Page navigation">
            <ul class="pagination pagination-lg">
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-24px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-24px"></i></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="col-lg-8">
        <small class="text-light fw-medium">Alignments</small>
        <div class="demo-inline-spacing">
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
          <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
          <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
              <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-back-mini-line ri-22px"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon ri-skip-forward-mini-line ri-22px"></i></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Pagination Sizes -->

<!-- Breadcrumb -->
<div class="card">
  <h5 class="card-header">Breadcrumbs</h5>
  <div class="card-body">
    <!-- Basic Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">Library</a>
        </li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
    <!-- Basic Breadcrumb -->
    <!-- Custom style1 Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-style1">
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">Library</a>
        </li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
    <!--/ Custom style1 Breadcrumb -->
    <!-- Custom style2 Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-style2">
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">Library</a>
        </li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
    <!--/ Custom style2 Breadcrumb -->
    <!-- Basic Breadcrumb with icon -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="javascript:void(0);" class="d-flex align-items-center"><i class="ri-star-fill ri-20px me-1 text-body"></i>Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="javascript:void(0);" class="d-flex align-items-center"><i class="ri-star-fill ri-20px me-1 text-body"></i>Library</a>
        </li>
        <li class="breadcrumb-item active">
          <a href="javascript:void(0);" class="d-flex align-items-center"><i class="ri-star-fill ri-20px me-1"></i>Data</a>
        </li>
      </ol>
    </nav>
    <!--/ Basic Breadcrumb with icon -->
  </div>
</div>
<!--/ Breadcrumb -->
@endsection
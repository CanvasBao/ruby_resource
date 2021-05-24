<div class="white-box">
  <!-- Page Heading -->
  <h2 class="my-4">{{ $attributes->get('title') }}</h2>
  <div class="row">
    @foreach ($griddata as $item)
      <div class="col-lg-6 mb-4 card-object">
        <div class="card h-100 shadow p-3 rounded">
          <a href="#"><img class="card-img-top" src="{{ asset($item['img']) }}" alt=""></a>
          <div class="card-body">
            <h3 class="card-title">
              <a href="#">{{ $item['title'] }}</a>
            </h3>
            <p class="card-text">{{ $item['content'] }}</p>
          </div>
          @if ( $editFlag == '1')
            <div style="font-size: 20px;" class="card-text">
              <a href="#" class="delete-banner p-2 float-sm-right" data-id="{{ $item['id'] }}" data-token="{{ csrf_token() }}" ><i  class="fas fa-trash-alt"></i></a>
              <a class="link-banner p-2 float-sm-right" data-item="{{ $item }}"><i  class="fas fa-link"></i></a>
            </div>
          @endif
        </div>
      </div> 
    @endforeach
  </div>
  <!-- Pagination -->
  <!-- <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
    </li>
  </ul> -->

</div>
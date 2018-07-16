@extends('layout.layout')
@section('content')

      <!-- START MAIN CONTENT -->

      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Dashboard</div>
          </h1>
          <!-- START COUNT ROW -->
          
          <!-- END COUNT ROW -->

          <!-- START BROAD ROW -->
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3>All Years</h3>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                  @if(count($year) >= '1')
                        <tr>
                          <th>Year</th>
                          <th>Ip Address</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                        </tr>
                    @foreach($year as $m)
                        <tr>
                          <td>{{ $m->year }}</td>
                          <td>{{ $m->ip_address }}</td>
                          <td>{{ $m->created_at }}</td>
                          <td>{{ $m->updated_at }}</td>
                        </tr>
                    @endforeach
                  @else
                        <tr>
                          <td colspan="10" align="center">No Year Found.</td>
                        </tr>
                  @endif
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <!-- END BROAD ROW -->
          
        </section>
      </div>

      <!-- END MAIN CONTENT -->


@endsection

     
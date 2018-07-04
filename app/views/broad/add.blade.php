@extends('layout.layout')

@section('content')
		
		<!-- START MAIN CONTENT -->

      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Add Broad Questions</div>
          </h1>
          

          <div class="row">
          <div class="col-12 ">

            <div class="card card-primary">
              <div class="card-header"><h4>Add Broad Question</h4></div>

              <div class="card-body">


            @if(Session::has('add_message'))
                <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                  <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    <div class="alert-title">Success:</div>
                    {{ Session::get('add_message') }}
                  </div>
                </div>
            @endif

            @if($errors->any())
                {{ implode('', $errors->all('
                <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                  <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    <div class="alert-title">Error:</div>
                    :message
                  </div>
                </div>
                ')) }}
            @endif


                <form method="POST" action="" class="needs-validation" novalidate="">
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="subject_code">Subject</label>
                      <select name="subject_code" id="subject_code" class="form-control" required autofocus="">
                        <option value="">-- Select Subject --</option>
                      @foreach($subject as $sub)
                        <option value="{{ $sub->subject_code }}">{{ $sub->subject_name }} ({{$sub->subject_code}})</option>
                      @endforeach
                      </select>
                      <div class="invalid-feedback">
                        Choose Subject!
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="year">Question Year</label>
                      <select name="year" id="year" class="form-control" required>
                        <option value="">-- Select Question Year --</option>
                      @foreach($year as $yr)
                        <option value="{{ $yr->year }}">{{ $yr->year }}</option>
                      @endforeach
                      </select>
                      <div class="invalid-feedback">
                        Choose Question Year!
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="question">Question</label>
                      <textarea id="question" class="form-control" name="question" rows="5" cols="80" required="" placeholder="Question"></textarea>
                      <div class="invalid-feedback">
                        Enter Question!
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="answer">Answer</label>
                      <textarea id="answer" class="form-control" name="answer" rows="5" cols="80" required="" placeholder="Answer"></textarea>
                      <div class="invalid-feedback">
                        Enter Answer!
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="suggestion">Suggestion</label>
                      <textarea id="suggestion" class="form-control" name="suggestion" rows="5" cols="80" required="" placeholder="Suggestion (5 to 7 Only)"></textarea>
                      <div class="invalid-feedback">
                        Enter Suggestion!
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                      Add
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
          
        </section>
      </div>

      <!-- END MAIN CONTENT -->

@endsection

@section('footer')
  <script src="{{ asset('dist/js/ckeditor/ckeditor.js') }}"></script>
  <script>
  $(function () {
    CKEDITOR.replace('question')
    $('.textarea').wysihtml5()
  })

  $(function () {
    CKEDITOR.replace('answer')
    $('.textarea').wysihtml5()
  })
</script>
@endsection
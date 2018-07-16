@extends('layout.layout')

@section('content')
		
		<!-- START MAIN CONTENT -->

      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Add MCQ Questions</div>
          </h1>
          

          <div class="row">
          <div class="col-12 ">

            <div class="card card-primary">
              <div class="card-header"><h4>Add MCQ Question</h4></div>

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
                      <select name="subject_code" id="subject_code" class="form-control" required autofocus>
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
                      <label for="option1" class="d-block">Option 1</label>
                      <input id="option1" type="text" class="form-control" name="option1" required placeholder="Option 1">
                      <div class="invalid-feedback">
                        Enter Option 1!
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="option2" class="d-block">Option 2</label>
                      <input id="option2" type="text" class="form-control" name="option2" required placeholder="Option 2">
                      <div class="invalid-feedback">
                        Enter Option 2!
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="option3" class="d-block">Option 3</label>
                      <input id="option3" type="text" class="form-control" name="option3" required placeholder="Option 3">
                      <div class="invalid-feedback">
                        Enter Option 3!
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="option4" class="d-block">Option 4</label>
                      <input id="option4" type="text" class="form-control" name="option4" required placeholder="Option 4">
                      <div class="invalid-feedback">
                        Enter Option 4!
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="answer" class="d-block">Correct Answer</label>
                      <input id="answer" type="text" class="form-control" name="answer" required placeholder="Correct Answer">
                      <div class="invalid-feedback">
                        Enter Correct Answer!
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
</script>
@endsection
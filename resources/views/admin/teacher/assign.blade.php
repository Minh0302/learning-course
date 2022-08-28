@extends('admin_layout')
@section('admin_content')
<style type="text/css">
    .dropdown-container {
        position: relative;
    }

    .dropdown-label {
        padding: 4px 10px 4px 0;
    }

    /* .dropdown-label:before {
        content: "\25BC";
    }

    .dropdown-container.is-active .dropdown-label:before {
        content: "\25B2";
    } */

    .dropdown-button {
        cursor: pointer;
        padding: 2px;
        border: 1px solid #d5d5d5;
        background: white;
        display: flex;
        flex-flow: row wrap;
        border-radius: 3px;
    }

    .dropdown-quantity {
        flex: 1;
        display: flex;
        flex-flow: row wrap;
    }

    .dropdown-sel {
        display: inline-block;
        background: #eee;
        border-radius: 3em;
        padding: 2px 10px;
        margin: 0 3px 3px 0;
    }

    .dropdown-list {
        position: absolute;
        overflow-y: auto;
        z-index: 9999999;
        top: calc(100% - 2px);
        width: 100%;
        max-height: 40vh;
        padding: 10px;
        padding-top: 0;
        border: 1px solid #d5d5d5;
        border-top: 0;
        background: white;
        display: none;
    }

    .dropdown-container.is-active .dropdown-list {
        display: block;
    }

    .dropdown-list input[type="search"] {
        padding: 5px;
        display: block;
        width: 100%;
    }

    .dropdown-list ul {
        padding: 0;
        padding-top: 10px;
        list-style: none;
    }

    .dropdown-list li {
        padding: 0.24em 0;
    }

    input[type="checkbox"] {
        margin-right: 5px;
    }

    /* HELPER CLASSES */
    .noselect {
        user-select: none;
    }

    .is-hidden {
        display: none;
    }
</style>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Giáo viên</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Elements</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-2">
            </div>

            <div class="col-lg-8">

                <div class="card" style="height: 500px">
                    <div class="card-body">
                        <h5 class="card-title">Phân công giáo viên</h5>

                        <!-- General Form Elements -->
                        <form method="post" action="{{url('admin/teacher-assign')}}">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Khoá học</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="course_id">
                                        <option selected>-- Select --</option>
                                        @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->course_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Giáo viên</label>
                                <div class="col-sm-10">
                                    <div class="dropdown-container">
                                        <div class="dropdown-button noselect">
                                            <div class="dropdown-label">-- Select --</div>
                                            <div class="dropdown-quantity"></div>
                                        </div>
                                        <div class="dropdown-list">
                                            <input type="search" placeholder="Search positions" class="dropdown-search">
                                            <ul>
                                                @foreach($teachers as $teacher)
                                                <li>
                                                    <label><input value="{{$teacher->id}}" name="positions[]" data-name="{{$teacher->admin_name}}" type="checkbox">{{$teacher->admin_name}}</label>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3" style="margin-top: 200px">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" name="assign" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

            <div class="col-lg-2">
            </div>
        </div>
    </section>

</main><!-- End #main -->
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script>
    const $dropdown = $('.dropdown-container'); // Cache all;

function UI_dropdown() {

  const $this = $(this);
  const $btn = $('.dropdown-button', this);
  const $list = $('.dropdown-list', this);
  const $li = $('li', this);
  const $search = $('.dropdown-search', this);
  const $ckb = $(':checkbox', this);
  const $qty = $('.dropdown-quantity', this);


  $btn.on('click', function() {
    $dropdown.not($this).removeClass('is-active'); // Close other
    $this.toggleClass('is-active'); // Toggle this
  });

  $search.on('input', function() {
    const val = $(this).val().trim();
    const rgx = new RegExp(val, 'i');
    $li.each(function() {
      const name = $(this).text().trim();
      $(this).toggleClass('is-hidden', !rgx.test(name));
    });
  });

  $ckb.on('change', function() {
    const names = $ckb.get().filter(el => el.checked).map(el => {
      return `<span class="dropdown-sel">${el.dataset.name.trim()}</span>`;
    });
    $qty.html(names.join(''));
  });
}

$dropdown.each(UI_dropdown); // Apply logic to all dropdowns

// Dropdown - Close opened 
$(document).on('click', function(ev) {
  const $targ = $(ev.target).closest('.dropdown-container');
  if (!$targ.length) $dropdown.filter('.is-active').removeClass('is-active');
});
</script>
@endsection
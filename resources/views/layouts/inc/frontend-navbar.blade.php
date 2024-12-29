<div class="global-navbar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-3">
        <div class="container">
            <a class="navbar-brand" href="#">StudyVerse</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <!-- Categories Dropdown -->
                    <li class="nav-item dropdown" style="position: relative;">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="categoriesDropdown" role="button" aria-expanded="false">Categories</a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown" style="min-width: 60px !important ; display: none; position: absolute; top: 100%; left: 0; margin-top: 0;">
                            @php
                                $categories = App\Models\Category::where("navbar_status", "0")->where('status', '0')->where('is_deleted','0')->get();
                            @endphp

                            @foreach($categories as $cateitem)
                                <li><a class="dropdown-item" href="{{url('faculty/'.$cateitem->slug)}}">{{$cateitem->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <!-- Notes Dropdown -->
                    <li class="nav-item dropdown" style="position: relative;">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="notesDropdown" role="button" aria-expanded="false">Notes</a>
                        <ul class="dropdown-menu" aria-labelledby="notesDropdown" 
                            style="min-width: 60px !important ; display: none; position: absolute; top: 100%; left: 0; margin-top: 0; width:50px;">
                            <li><a class="dropdown-item" href="notes.html?faculty=BBS&program=yearly">BBS</a></li>
                            <li><a class="dropdown-item" href="notes.html?faculty=BBA&program=semester">BBA</a></li>
                            <li><a class="dropdown-item" href="notes.html?faculty=BCA&program=yearly">BCA</a></li>
                        </ul>
                    </li>

                    <!-- Past Questions Dropdown -->
                    <li class="nav-item dropdown " style="position: relative;">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="questionsDropdown" role="button" aria-expanded="false">Past Questions</a>
                        <ul class="dropdown-menu" aria-labelledby="questionsDropdown" 
                            style="min-width: 60px !important ;  display: none; position: absolute; top: 100%; left: 0; margin-top: 0; width: 50px;">
                            <li><a class="dropdown-item" href="past-questions.html?faculty=BBS&program=yearly">BBS</a></li>
                            <li><a class="dropdown-item" href="past-questions.html?faculty=BBA&program=semester">BBA</a></li>
                        </ul>
                    </li>

                    <!-- Syllabus Dropdown -->
                    <li class="nav-item dropdown " style="position: relative;">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="syllabusDropdown" role="button">Syllabus</a>
                        <ul class="dropdown-menu" aria-labelledby="syllabusDropdown" 
                            style="min-width: 60px !important ;  display: block; position: absolute;  top: 100%; left: 0; margin-top: 0;">
                            <li><a class="dropdown-item" href="syllabus.html?faculty=BBS&program=yearly">BBS</a></li>
                            <li><a class="dropdown-item" href="syllabus.html?faculty=BCA&program=semester">BCA</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript for Hover Dropdown -->
<script>
    document.querySelectorAll('.nav-item.dropdown').forEach(function (dropdown) {
        dropdown.addEventListener('mouseenter', function () {
            this.querySelector('.dropdown-menu').style.display = 'block';
        });
        dropdown.addEventListener('mouseleave', function () {
            this.querySelector('.dropdown-menu').style.display = 'none';
        });
    });
</script>

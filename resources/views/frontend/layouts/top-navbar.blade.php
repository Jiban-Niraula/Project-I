<!-- Navbar -->
<nav class="navbar">
    <div class="container">
        <div class="site-name">{{ config ('app_name')}}</div>
        <ul class="nav-links">
            <li class="dropdown">
                <a href="#">Notes</a>
                <ul class="dropdown-menu">
                    <li><a href="notes.html?faculty=BBS&program=yearly">BBS</a></li>
                    <li><a href="notes.html?faculty=BBA&program=semester">BBA</a></li>
                    <li><a href="notes.html?faculty=BCA&program=yearly">BCA</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">Past Questions</a>
                <ul class="dropdown-menu">
                    <li><a href="past-questions.html?faculty=BBS&program=yearly">BBS</a></li>
                    <li><a href="past-questions.html?faculty=BBA&program=semester">BBA</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">Syllabus</a>
                <ul class="dropdown-menu">
                    <li><a href="syllabus.html?faculty=BBS&program=yearly">BBS</a></li>
                    <li><a href="syllabus.html?faculty=BCA&program=semester">BCA</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

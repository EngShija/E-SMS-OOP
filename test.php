<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-sms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>

    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
        aria-controls="offcanvasExample">
        Link with href
    </a>
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
        aria-controls="offcanvasExample">
        Button with data-bs-target
    </button>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <nav class="list-group col-md-3 col-lg-2 d-md-block sidebar bg-dark mb-5">
                    <li class="nav-item">
                        <a class="list-group-item list-group-item-action" href="dashboard.php">DASHBOARD</a>
                    </li>

                    <li class="nav-item">
                        <a class="subject list-group-item list-group-item-action" href="#subject">SUBJECTS</a>
                    </li>

                    <div class="dropdown mt-3">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            SUBJECTS
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>

                    <li class="nav-item">
                        <a class="exams list-group-item list-group-item-action" href="#exams">EXAMINATIONS</a>
                    </li>
                    <li class="nav-item">
                        <a class="results list-group-item list-group-item-action" href="#result">RESULTS</a>
                    </li>

                    <li class="nav-item">
                        <a class="class list-group-item list-group-item-action" href="#class">CLASSES</a>
                    </li>
                    <li class="nav-item">
                        <a class="student list-group-item list-group-item-action" href="#student">STUDENTS</a>
                    </li>
                    <?php if($role['role'] == 'admin') :?>
                    <li class="nav-item">
                        <a class="teacher list-group-item list-group-item-action" href="#teacher">TEACHERS</a>
                    </li>

                    <li class="nav-item">
                        <a class="admin list-group-item list-group-item-action" href="#admin">ADMINS</a>
                    </li>
                    <li class="nav-item">
                        <a class="settings list-group-item list-group-item-action" href="#result">SETTINGS</a>
                    </li>
                    <?php endif ?>
                </nav>
            </div>
            <div class="dropdown mt-3">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Dropdown button
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</body>
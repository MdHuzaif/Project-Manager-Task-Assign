<!DOCTYPE html>
<html>
<head>
    <title>Project Manager</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Add New Projects</h1>

        <form method="post" action="/projects">
            @csrf
            <div class="form-group">
                <label for="project_name">Project ID:</label>
                <input type="text" name="project_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="project_amount">Project Amount:</label>
                <input type="number" name="project_amount" class="form-control">
            </div>

            <div class="form-group">
                <label for="project_assign_date">Project Assign Date:</label>
                <input type="date" name="project_assign_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="project_release_date">Project Release Date:</label>
                <input type="date" name="project_release_date" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Add Project</button>
        </form>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Project Assign Date</th>
                    <th>Project Amount</th>
                    <th>Project Release Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->project_name }}</td>
                    <td>{{ $project->project_assign_date }}</td>
                    <td>{{ $project->project_amount }}</td>
                    <td>{{ $project->project_release_date }}</td>
                    <td>
                        <form method="post" action="/projects/{{ $project->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/projects/filterpage" class="btn btn-primary" style="margin-bottom: 50px; : center;">FILTER PROJECTS</a>
    </div>
    <div class="vertical-center"></div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

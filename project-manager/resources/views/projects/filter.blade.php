<!DOCTYPE html>
<html>
<head>
    <title>Project Manager</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Filter Projects</h1>

        <form method="post" action="/projects/filter">
            @csrf
            <div class="form-group">
                <label for="assign_from_date">Assign Date From:</label>
                <input type="date" name="assign_from_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="assign_to_date">Assign Date To:</label>
                <input type="date" name="assign_to_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="release_from_date">Release Date From:</label>
                <input type="date" name="release_from_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="release_to_date">Release Date To:</label>
                <input type="date" name="release_to_date" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
         <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Project Assign Date</th>
                    <th>Project Amount</th>
                    <th>Project Release Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->project_name }}</td>
                    <td>{{ $project->project_assign_date }}</td>
                    <td>{{ $project->project_amount }}</td>
                    <td>{{ $project->project_release_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if (isset($percentage))
        <h3>Percentage: {{ number_format($percentage, 2) }}%</h3>
        @endif
        <br>
        <a href="/" class="btn btn-primary" style="margin-bottom: 50px; align-items: center;">ADD NEW PROJECTS</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

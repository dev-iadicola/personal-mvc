 <!-- Admin Panel -->
 <div class="container admin-panel">
        <h1 class="my-4">Portfolio Management</h1>

        <!-- Form to Add Project -->
        <div class="mb-4">
            <h3>Add New Project</h3>
            <form id="addProjectForm">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="overview">Overview</label>
                    <textarea class="form-control" id="overview" name="overview" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="url" class="form-control" id="link" name="link" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Project</button>
            </form>
        </div>

        <!-- Projects Table -->
        <div>
            <h3>Existing Projects</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Overview</th>
                        <th>Link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="projectsTableBody">
                    <!-- Rows will be inserted here by JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

   

    <!-- JavaScript and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom Script -->
    <script>
        document.getElementById('addProjectForm').addEventListener('submit', function(event) {
            event.preventDefault();
            // Get form values
            const title = document.getElementById('title').value;
            const overview = document.getElementById('overview').value;
            const link = document.getElementById('link').value;

            // Add project to table
            const tableBody = document.getElementById('projectsTableBody');
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>1</td>
                <td>${title}</td>
                <td>${overview}</td>
                <td><a href="${link}" target="_blank">${link}</a></td>
                <td>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            `;
            tableBody.appendChild(row);

            // Clear form
            document.getElementById('addProjectForm').reset();
        });
    </script>
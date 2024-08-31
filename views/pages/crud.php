<div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold mb-6">TodoList</h1>

    <div class="mb-6">
        <button id="showCreateForm" class="bg-blue-500 text-white py-2 px-4 rounded-md shadow-md mb-4">Create New Post</button>
    </div>



    <!-- Create Post Form -->
    <div class="grid grid-cols-1 gap-4">

    <!-- crete -->
        <div class="col-start-1  col-end-5">
        <div id="createPostForm" class="mb-6">
            <h2 class="text-2xl font-semibold mb-4 bg-white  p-3 rounded-lg ">Create Activity</h2>
            <form id="formCreate" action="/post-create" method="POST" class="bg-white p-4 rounded shadow-md">
                <div class="mb-4">
                    <label for="createTitle" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="createTitle" name="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>
                <div class="mb-4">
                    <label for="createDescription" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="createDescription" name="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" rows="4" required></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md shadow-md">Save</button>
                <button type="reset" class="ml-4 bg-gray-500 text-white py-2 px-4 rounded-md shadow-md">Cancel</button>
            </form>
        </div>
        </div>

        <!-- Edit Post Form -->
        <div id="editPostForm" class="hidden mb-6 col-start-1  col-end-9">
            <h2 class="text-2xl font-semibold mb-4 bg-white  p-3 rounded-lg ">Edit </h2>
            <form id="formEdit" class="bg-white p-4 rounded shadow-md">
                <input type="hidden" id="editId" name="id">
                <div class="mb-4">
                    <label for="editTitle" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="editTitle" name="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>
                <div class="mb-4">
                    <label for="editDescription" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="editDescription" name="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" rows="4" required></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md shadow-md">Update</button>
                <button type="button" id="cancelEdit" class="ml-4 bg-gray-500 text-white py-2 px-4 rounded-md shadow-md">Cancel</button>
            </form>
        </div>

          <!-- List -->
    <div id="postList" class="mb-6 col-start-10 col-end-12">
    <div id="postList" >
        <h2 class="text-3xl bg-white  p-3 rounded-lg  font-semibold mb-6 col-span-full"> List</h2>
        <?php foreach ($posts as $post): ?>
            <div class="bg-white p-6 rounded-lg shadow-lg my-10">
                <h3 class="text-2xl font-semibold mb-2"><?= htmlspecialchars($post->title) ?? 'Title is empty.' ?></h3>
                <p class="text-gray-700 mb-4"><?= htmlspecialchars($post->description) ?? 'Description is empty.' ?></p>
                <div class="flex gap-4">
                    <button onclick="editPost('<?= $post->id ?>')" class="bg-blue-500 text-white py-2 px-4 rounded-md shadow-md hover:bg-blue-600 transition">Edit</button>
                    <form action="/post-delete/<?= $post->id ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete <?= htmlspecialchars($post->title) ?>?')">
                        @delete    
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md shadow-md hover:bg-red-600 transition">Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    </div>


  
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const postList = document.getElementById('posts');
        const createPostForm = document.getElementById('createPostForm');
        const editPostForm = document.getElementById('editPostForm');
        const showCreateFormButton = document.getElementById('showCreateForm');
        const cancelCreateButton = document.getElementById('cancelCreate');
        const cancelEditButton = document.getElementById('cancelEdit');
        const formCreate = document.getElementById('formCreate');
        const formEdit = document.getElementById('formEdit');
        const editIdInput = document.getElementById('editId');

        // Load posts from local storage
        function loadPosts() {
            const posts = JSON.parse(localStorage.getItem('posts')) || [];
            postList.innerHTML = posts.map(post => `
                    <li class="border-b border-gray-200 py-4">
                        <h3 class="text-lg font-semibold">${post.title}</h3>
                        <p class="text-gray-700">${post.description}</p>
                        <button onclick="editPost(${post.id})" class="text-blue-500 hover:underline mt-2 mr-4">Edit</button>
                        <button onclick="deletePost(${post.id})" class="text-red-500 hover:underline mt-2">Delete</button>
                    </li>
                `).join('');
        }

        // Show create post form
        showCreateFormButton.addEventListener('click', function() {
            createPostForm.classList.remove('hidden');
            editPostForm.classList.add('hidden');
        });







    });
</script>
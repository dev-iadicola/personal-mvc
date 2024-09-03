<div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold mb-6">TodoList</h1>

    <div class="mb-6">
        <button onclick="createPost()" class="bg-blue-500 text-white py-2 px-4 rounded-md shadow-md mb-4">Create New Post</button>
    </div>



    <!-- Create Post Form -->
    <div class="grid grid-cols-3 gap-4 flex justify-center">
    <!-- crete -->
    <div class="col-start-1 col-end-[-1] ">
            <div id="createPostForm" class="mb-6">
                <h2 class="text-2xl font-semibold mb-4 bg-black  p-3 rounded-lg ">Create Activity</h2>
                <form id="formCreate" action="/post-create" method="POST" class="bg-black p-4 rounded shadow-md">
                    <div class="mb-4">
                        <label for="createTitle" class="block text-sm font-medium text-gray-100">Title</label>
                        <input type="text" id="createTitle" name="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    </div>
                    <div class="mb-4 text-black">
                        <label for="createDescription" class="block text-sm font-medium text-gray-100">Description</label>
                        <textarea id="createDescription" name="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md shadow-md">Save</button>
                    <button type="reset" class="ml-4 bg-gray-500 text-white py-2 px-4 rounded-md shadow-md">Cancel</button>
                </form>
            </div>
        </div>

        <!-- Edit Post Form -->
        <?php foreach ($posts as $post): ?>
            <div id="editPostForm-<?= $post->id ?>" class="hidden mb-6 col-start-1  col-end-9 editPostForm-class">
                <h2 class="text-2xl font-semibold mb-4 bg-black  p-3 rounded-lg ">Edit </h2>
                <form id="formEdit" action="post-edit/<?= $post->id ?>" method="POST" class="bg-black p-4 rounded shadow-md">
                    <div class="mb-4">
                        <label for="editTitle" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="editTitle" name="title" value="<?= $post->title ?>"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    </div>
                    <div class="mb-4 text-black">
                        <label for="editDescription" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="editDescription" name="description" 
                        class="mt-1 block w-full border border-gray-300 
                    rounded-md shadow-sm p-2" rows="4" required><?= $post->description ?></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md shadow-md">Update</button>
                    <button type="button" id="cancelEdit" class="ml-4 bg-gray-500 text-white py-2 px-4 rounded-md shadow-md">Cancel</button>
                </form>
            </div>
        <?php endforeach ?>



        <!-- List -->
        <div id="postList" class="mb-6 col-start-10 col-end-12">
            <div id="postList">
                <?php if(!empty($posts)): ?>
                <h2 class="text-3xl bg-black  p-3 rounded-lg  font-semibold mb-6 col-span-full"> List</h2>
                <?php endif ?>
                <?php foreach ($posts as $post): ?>
                    <div class="bg-black p-6 rounded-lg shadow-lg my-10">
                        <h3 class="text-2xl  font-semibold mb-2"><?= htmlspecialchars($post->title) ?? 'Title is empty.' ?></h3>
                        <p class=" -700 mb-4"><?= htmlspecialchars($post->description) ?? 'Description is empty.' ?></p>
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
        const postList = document.getElementById('posts');
        const createPostForm = document.getElementById('createPostForm');
        const editPostForm = document.getElementsByClassName('editPostForm-class');




        function createPost() {
            createPostForm.classList.remove('hidden');
            for (var i = 0; i < editPostForm.length; i++) {
                editPostForm[i].classList.add('hidden');
            }
        }


        function editPost(postId) {
            for (var i = 0; i < editPostForm.length; i++) {
                editPostForm[i].classList.add('hidden');
            }
            var editForm = document.getElementById(`editPostForm-${postId}`);

            editForm.classList.remove('hidden')

            createPostForm.classList.add('hidden');

        }
    </script>
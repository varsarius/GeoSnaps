<div>
    <h1> When there is no desire, all things are at peace. - Laozi </h1>
    <h3>Add a Post</h3>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="3" required></textarea>
        </div>
        <br>
        <button type="submit">Create Post</button>
    </form>
</div>

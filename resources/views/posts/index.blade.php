<x-app-layout>
    <x-slot name="header">
        Blog Index
    </x-slot>
    <h1>Blog Name</h1>
    <div class='create'><a href='/posts/create'>create</a></div>
    <div class='posts'>
        @foreach ($posts as $post)
            <div class='post'>
                <h2 class='title'>
                    <a href='/posts/{{ $post->id }}'>{{ $post->title }}</a>
                </h2>
                <p class='body'>{{ $post->body }}</p>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }}, '{{ $post->title }}')">delete</button> 
                </form>
            </div>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $posts->links() }}
    </div>
    <script>
        function deletePost(id, title) {
            'use strict'
                
            if (window.confirm(`Do you want to delete ${title}`)) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        Blog 
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class='text-xl'>Blog Name</h1>
            <a href='/posts/create'><div class="px-2 py-1 text-indigo-500 border border-indigo-500 font-semibold rounded hover:bg-indigo-100">create</div></a>
            
            <!--問4：$postsが定義されているのはどこか-->
            @foreach ($posts as $post)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class='title'>
                            
                            <!--問3：$postが定義されているのはどこか-->
                            <a href='/posts/{{ $post->id }}'>{{ $post->title }}</a>
                            
                        </h2>
                        <p class='body'>{{ $post->body }}</p>
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf   
                            @method('DELETE')
                            <button type="button" class="px-2 py-1 text-red-500 border border-red-500 font-semibold rounded hover:bg-red-100" onclick="deletePost({{ $post->id }}, '{{ $post->title }}')">delete</button> 
                        </form>
                    </div>
                </div>
            @endforeach
    
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
        </div>
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
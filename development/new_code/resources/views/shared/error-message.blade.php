@if (session()->has('error'))
    <div class="fixed bottom-4 right-4 z-50 bg-yellow-500 text-white px-9 py-4 rounded" id="errorMessage">
        {{ session('error') }}
    </div>
@endif


<script>
    let errorMessage = document.getElementById('errorMessage');

    setTimeout(function() {
        errorMessage.style.transition = 'opacity 1s ease-in-out';
        errorMessage.style.opacity = 0;
    }, 3000);
</script>

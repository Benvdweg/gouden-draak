@if (session()->has('success'))
    <div class="fixed bottom-4 right-4 z-50 bg-green-500 text-white px-9 py-4 rounded" id="successMessage">
        {{ session('success') }}
    </div>
@endif


<script>
    let successMessage = document.getElementById('successMessage');

    setTimeout(function() {
        successMessage.style.transition = 'opacity 1s ease-in-out';
        successMessage.style.opacity = 0;
    }, 3000);
</script>

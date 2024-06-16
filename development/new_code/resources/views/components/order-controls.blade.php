<div>
    <form action="#" method="POST">
        @csrf
        <input type="hidden" value="up" name="direction">
        <button type="submit" class="arrow-button"><i class="fas fa-chevron-up"></i></button>
    </form>

    <form action="#" method="POST">
        @csrf
        <input type="hidden" value="down" name="direction">
        <button type="submit" class="arrow-button"><i class="fas fa-chevron-down"></i></button>
    </form>
</div>

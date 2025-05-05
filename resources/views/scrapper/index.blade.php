<h1>Vins SAQ</h1>
<ul>
    <!-- afficher les messages de succès -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
</ul>
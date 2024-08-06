@props(['routeApprove', 'routeReject'])

<div class="cf-actions">
    <form action="{{ $routeApprove }}" method="POST">
        @csrf
        @method('post')
        <button type="submit" class="btn-approve">Aprovar</button>
    </form>
    <form action="{{ $routeReject }}" method="POST">
        @csrf
        @method('post')
        <button type="submit" class="btn-reject">Rejeitar</button>
    </form>
</div>

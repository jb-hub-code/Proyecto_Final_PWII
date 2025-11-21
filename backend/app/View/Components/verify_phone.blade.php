<form action="{{ route('verify.phone.submit') }}" method="POST">
    @csrf

    <label>Código SMS</label>
    <input type="number" name="code" required class="form-control">

    <button type="submit" class="btn btn-primary mt-3">Confirmar</button>
</form>

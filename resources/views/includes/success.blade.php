<!-- Success Center -->
@if(session('success'))
    @push('scripts')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Operação concluída com sucesso!',
                showConfirmButton: true,
                timer: 1500
            })
        </script>
    @endpush
@endif
<!-- Fim Success -->
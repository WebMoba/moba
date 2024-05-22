@section('scripts')
    <script>
        $(document).ready(function() {
            $('.frData').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                var disable = $(this).data('disable');
                var actionText = disable ? 'Habilitar' : 'Deshabilitar';
                Swal.fire({
                    title: "¿Está seguro de que desea " + actionText + "?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, " + actionText,
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#editButton').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "¿Está seguro de que desea editar?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, editar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest('form')
                            .submit(); // Enviar el formulario más cercano al botón de enviar que se hizo clic
                    }
                });
            });


        });
    </script>


    <script>
        $(document).ready(function() {
            $('#editButton, #createButton').click(function(e) {
                var requiredFields = $('.required').closest('.form-group').find('input, select');
                var hasEmptyFields = false;
                var hasValidationErrors = $('.is-invalid').length > 0;
                var errorMessage = "Completa todos los campos!";

                // Limpiar los campos marcados en rojo
                $('.is-invalid').removeClass('is-invalid');

                requiredFields.each(function() {
                    if ($(this).val() === '') {
                        hasEmptyFields = true;

                    }
                });



                if (hasEmptyFields) {
                    e.preventDefault();
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        html: errorMessage
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Manejar el evento invalid.bs.validator
            $('form').on('invalid.bs.validator', function(event) {
                event.preventDefault(); // Evitar el envío del formulario

                // Obtener los campos inválidos
                var invalidFields = $(this).find('.is-invalid');

                // Construir el mensaje de error
                var errorMessage = 'Por favor, corrige los siguientes campos:<br>';
                invalidFields.each(function() {
                    var fieldName = $(this).closest('.form-group').find('label').text().trim();
                    errorMessage += '- ' + fieldName + '<br>';
                });

                // Mostrar la alerta de SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: errorMessage
                });
            });
        });
    </script>




    <script>
        $(document).ready(function() {
            $('.frData').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                Swal.fire({
                    title: "¿Está seguro de que desea anular este registro?",
                    text: "Una vez anulado, no lo podras recuperar",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, anular",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection

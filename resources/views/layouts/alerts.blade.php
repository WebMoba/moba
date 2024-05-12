

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
                    text: "¡Más tarde podrías revertir este cambio!",
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
                    text: "¡Más tarde podrías editar nuevamente este cambio!",
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

            $('#createButton').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "¿Está seguro de que desea crear?",
                    text: "¡Despues no podras eiminar el registro!",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, crear",
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
                var errorMessage = "Completa todos los campos obligatorios del formulario!";

                // Limpiar los campos marcados en rojo
                $('.is-invalid').removeClass('is-invalid');

                requiredFields.each(function() {
                    if ($(this).val() === '') {
                        hasEmptyFields = true;
                        
                    }
                });

                if (hasValidationErrors) {
                    errorMessage += "Por favor, corrige los errores en los campos marcados en rojo.";
                }

                if (hasEmptyFields || hasValidationErrors) {
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
            $('#editButton, #createButton').click(function(e) {
                var requiredFields = $('.required-label').closest('.form-group').find('input, select');
                var emptyFieldNames = []; // Array para almacenar los nombres de los campos vacíos

                requiredFields.each(function() {
                    if ($(this).val() === '') {
                        var fieldName = $(this).closest('.form-group').find('label').text().trim();
                        emptyFieldNames.push(fieldName);
                        $(this).addClass(
                        'is-invalid'); // Agregar clase de estilo para resaltar el campo vacío
                    }
                });

                if (emptyFieldNames.length > 0) {
                    e.preventDefault();
                    var errorMessage = "Completa todos los campos obligatorios del formulario!";
                    
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        html: errorMessage
                    });
                }
            });
        });
    </script>
@endsection

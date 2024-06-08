<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{ asset('Imagenes/LogoTuArte.png') }}">
    <title>
        TuArte
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/StyleContactoTuArte/ContactoTuArte.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StyleFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body onload="loadCart()" class="background-image">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <nav class="navbar">

        <!--- inicio breaddrums-->
        <div class="breadcrums">
            @include('helpers.breadcrumbs', [
                'breadcrumbs' => [
                    ['url' => route('welcome'), 'label' => 'Bienvenido /'],
                    ['url' => route('tuArteMenu.index'), 'label' => 'Tu Arte /'],
                    ['url' => route('tuArteMenu.Contacto.index'), 'label' => 'Contactanos'],
                ],
            ])

        </div>
        <div class="inicioRegistro"> @include('partials.inicio')</div>

        <!--- final breaddrums-->


        <div class="container-fluid">
            <a href="{{ route('mobaMenu.index') }}">
                <img src="{{ asset('Imagenes/Logotipo_Moba.png') }}" class="navbar-img-left" alt="Logo Moba">
            </a>
            <div class="navbar-buttons">
                <div class="dropdown">

                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        aria-haspopup="true" aria-expanded="false">
                        Servicios
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item"
                                href="{{ route('tuArteMenu.servicios.Accesorios.index') }}">Accesorios</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('tuArteMenu.servicios.Decoracion.index') }}">Decoracion</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('tuArteMenu.servicios.JoditasPalRecuerdo.index') }}">Joditas pa'l
                                Recuerdo</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('tuArteMenu.servicios.Mascotas.index') }}">Mascotas</a></li>
                    </ul>
                </div>
                <a href="{{ route('tuArteMenu.index') }}" class="btn btn-primary">Nosotros</a>
                <a href="{{ route('tuArteMenu.categorias.index') }}"class="btn btn-primary">Categorias</a>
                <a href="{{ route('tuArteMenu.galeria.index') }}" class="btn btn-primary">Galeria</a>
                <a href="{{ route('tuArteMenu.Contacto.index') }}" class="btn btn-primary active-link">Contáctanos</a>
                <button class="btn btn-cart position-relative" data-bs-toggle="modal" data-bs-target="#cartModal">
                    <i class="bi bi-cart3"></i>
                    <span class="badge bg-success rounded-pill cart-badge">0</span>
                </button>
            </div>
            <a href="{{ route('tuArteMenu.index') }}">
                <img src="{{ asset('Imagenes/LogoTuArte.png') }}" class="navbar-img-right" alt="Logo Tu Arte">
            </a>
        </div>

        <!--- inicio breaddrums-->

    </nav>


    <!-- Líneas verticales con iconos -->
    <div class="vertical-line left-line">
        <hr class="linea1">
        <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
        <hr class="linea1">
    </div>

    <div class="container">

        <!-- Contenido contacto  -->

        <div class="box">
            <h1>Contacto</h1><br><br>

            <h3>Nuestro deseo más grande es que te hallas enamorado de
                cada pieza tanto como nosotros, si deseas una pieza personalizada, o adquirir alguna de las piezas que
                se encuentran
                en nuestro portafolio, solo debes contactarnos, estaremos
                muy felices de hablar contigo.
            </h3><br>
            <h3> Contacto: +57 3106584795</h3>
        </div>

        <!-- Contenido formulario de contacto -->



        <div class="box form">
            <form method="POST" action="{{ route('enviar-correo') }}" id="contact-form">
                @csrf
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre"
                    value="{{ auth()->check() ? auth()->user()->name : '' }}" required><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"
                    value="{{ auth()->check() ? auth()->user()->email : '' }}" required><br>
                <ul class="option-listOne">Tipo Identificación
                    <li class="option-item">
                        <input type="radio" id="option1" name="options" value="Cedula Extranjeria" required
                            class="circle">
                        <label for="option2" class="option-label">Cedula Extranjeria</label>
                    </li>
                    <li class="option-item">
                        <input type="radio" id="option2" name="options" value="Cedula" required class="circle">
                        <label for="option1" class="option-label">Cedula</label>
                    </li>
                    <li class="option-item">
                        <input type="radio" id="option3" name="options" value="NIT" required class="circle">
                        <label for="option3" class="option-label">NIT</label>
                    </li>
                </ul>
                <label for="numeroId">Numero Identificación</label>
                <input type="text" id="numeroId" name="numeroId" maxlength="10" required><br>
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" maxlength="10" required><br>
                <label for="departamento">Departamento</label>
                <input type="text" id="departamento" name="departamento" required><br>
                <label for="ciudad">Ciudad</label>
                <input type="text" id="ciudad" name="ciudad" required><br><br>

                <label for="asunto">Asunto:</label>
                <select id="asunto" name="asunto" required>
                    <option value="Consulta General">Consulta General</option>
                    <option value="Solicitud de Pedido">Solicitud de Pedido</option>
                    <option value="PQR">PQR</option>
                    <option value="Otro">Otro</option>
                </select><br><br>

                <label for="mensaje">Mensaje</label><br>
                <textarea id="mensaje" name="mensaje" rows="5" @if (isset($_GET['cartInfo'])) readonly @endif>@php
                    $cartInfo = isset($_GET['cartInfo']) ? urldecode($_GET['cartInfo']) : '';
                    echo $cartInfo;
                @endphp</textarea><br><br>
                <input type="submit" value="Enviar" id="submit">
            </form>
        </div>
    </div>

    <div class="vertical-line right-line">
        <hr class="linea2">
        <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
        <hr class="linea2">
    </div>
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title header-title" id="cartModalLabel">Tus productos</h5>
                    <h5 class="modal-title total-price">Total: $<span id="totalPrice">0</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody id="cartItems">
                            <!-- Los elementos del carrito se agregarán aquí dinámicamente -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" id="realizarPedido">Realizar Pedido</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: '{{ session('success') }}'
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}'
                });
            @endif

            // Obtén el formulario
            const form = document.getElementById('contact-form');

            // Añade el evento de envío
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Evita el envío del formulario

                const isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};

                if (!isAuthenticated) {
                    Swal.fire({
                        title: 'Para enviar un mensaje, primero debes iniciar sesión o registrarte.',
                        icon: 'info',
                        confirmButtonText: 'Aceptar'
                    }).then(() => {
                        window.location.href = "{{ route('login') }}";
                    });
                } else {
                    // Enviar el formulario usando Fetch API para asegurar que se envíe correctamente
                    const formData = new FormData(form);
                    fetch(form.action, {
                            method: form.method,
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: 'Tu mensaje ha sido enviado.'
                                }).then(() => {
                                    form.reset(); // Resetear el formulario después del envío
                                    document.getElementById('mensaje').value = ''; // Limpiar el campo de mensaje
                                    clearCart(); // Limpiar el carrito
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Hubo un problema al enviar tu mensaje.'
                                });
                            }
                        })
                        .catch(data => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: 'Tu mensaje ha sido enviado.'
                            }).then(() => {
                                form.reset(); // Resetear el formulario después del envío
                                document.getElementById('mensaje').value = ''; // Limpiar el campo de mensaje
                                clearCart(); // Limpiar el carrito
                            });
                        });
                }
            });
        });
    </script>
    <script>
        document.querySelector('.dropdown').addEventListener('mouseenter', function() {
            this.querySelector('.dropdown-menu').classList.add('show');
        });

        document.querySelector('.dropdown').addEventListener('mouseleave', function() {
            this.querySelector('.dropdown-menu').classList.remove('show');
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll('.card-link');
            const cartBadge = document.querySelector('.cart-badge');
            const cartItems = document.getElementById('cartItems');
            const totalPriceElement = document.getElementById('totalPrice');
            const isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};
            const cartButton = document.querySelector('.btn-cart');

            function updateTotal() {
                let total = 0;
                const cartRows = cartItems.querySelectorAll('tr');
                cartRows.forEach(row => {
                    const price = parseFloat(row.querySelector('.product-price').textContent.replace('$',
                        ''));
                    const quantity = parseInt(row.querySelector('.product-quantity').value);
                    total += price * quantity;
                });
                totalPriceElement.textContent = Math.round(total);
                cartBadge.textContent = cartRows.length;
                cartBadge.classList.toggle('active', cartRows.length > 0);
            }

            function saveCart() {
                const cartData = Array.from(cartItems.querySelectorAll('tr')).map(row => ({
                    productId: row.getAttribute('data-product-id'),
                    productName: row.querySelector('td:nth-child(2)').textContent,
                    productPrice: row.querySelector('.product-price').textContent,
                    productImage: row.querySelector('img').src,
                    productQuantity: row.querySelector('.product-quantity').value,
                }));
                localStorage.setItem('cart', JSON.stringify(cartData));
            }

            function loadCart() {
                const cartData = JSON.parse(localStorage.getItem('cart') || '[]');
                cartData.forEach(item => addCartItem(item.productId, item.productName, item.productPrice, item
                    .productImage, item.productQuantity));
                updateTotal();
            }

            function addCartItem(productId, productName, productPrice, productImage, productQuantity = 1) {
                const existingItem = document.querySelector(`#cartItems tr[data-product-id="${productId}"]`);
                if (!existingItem) {
                    const newRow = document.createElement('tr');
                    newRow.setAttribute('data-product-id', productId);
                    newRow.innerHTML = `
                        <td><img src="${productImage}" alt="${productName}" width="50"></td>
                        <td>${productName}</td>
                        <td class="product-price">${productPrice}</td>
                        <td><input type="number" class="form-control product-quantity" value="${productQuantity}" min="1" max="999"></td>
                        <td><i class="bi bi-x-lg remove-product" style="cursor: pointer;"></i></td>
                    `;
                    cartItems.appendChild(newRow);

                    newRow.querySelector('.product-quantity').addEventListener('change', function() {
                        if (this.value < 1) this.value = 1;
                        updateTotal();
                        saveCart();
                    });

                    newRow.querySelector('.remove-product').addEventListener('click', function() {
                        newRow.remove();
                        updateTotal();
                        saveCart();
                    });
                }
            }

            function clearCart() {
                localStorage.removeItem('cart');
                while (cartItems.firstChild) {
                    cartItems.removeChild(cartItems.firstChild);
                }
                updateTotal();
            }

            function showLoginAlert() {
                Swal.fire({
                    title: "Inicia sesión para realizar un pedido",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Iniciar sesión",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('login') }}";
                    } else {
                        window.location.reload();
                    }
                });
            }

            function handleProductClick(event) {
                if (!isAuthenticated) {
                    event.preventDefault();
                    clearCart();
                    showLoginAlert();
                }
            }

            cards.forEach(card => {
                card.addEventListener('click', function(event) {
                    handleProductClick(event);
                    if (isAuthenticated) {
                        event.preventDefault();
                        const checkIcon = this.querySelector('.check-icon');
                        checkIcon.style.display = checkIcon.style.display === 'none' ?
                            'inline-block' : 'none';

                        const productId = this.getAttribute('data-product-id');
                        const productName = this.getAttribute('data-product-name');
                        const productPrice = this.getAttribute('data-product-price');
                        const productImage = this.getAttribute('data-product-image');

                        const existingItem = document.querySelector(
                            `#cartItems tr[data-product-id="${productId}"]`);
                        if (!existingItem && checkIcon.style.display !== 'none') {
                            addCartItem(productId, productName, productPrice, productImage);
                        } else if (existingItem) {
                            existingItem.remove();
                        }
                        updateTotal();
                        saveCart();
                    }
                });
            });

            cartItems.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-product')) {
                    const row = event.target.closest('tr');
                    row.remove();
                    updateTotal();
                    saveCart();
                    const productId = row.getAttribute('data-product-id');
                    const card = document.querySelector(`.card-link[data-product-id="${productId}"]`);
                    if (card) {
                        const checkIcon = card.querySelector('.check-icon');
                        checkIcon.style.display = 'none';
                    }
                }
            });

            cartButton.addEventListener('click', function(event) {
                handleProductClick(event);
            });

            let inactivityTimer;

            const resetInactivityTimer = () => {
                clearTimeout(inactivityTimer);
                inactivityTimer = setTimeout(clearCart, 20 * 60 * 1000); // 20 minutes
            }

            window.onload = resetInactivityTimer;
            document.onmousemove = resetInactivityTimer;
            document.onkeypress = resetInactivityTimer;

            loadCart();
        });
    </script>
    <script>
        function clearMinValue(input) {
            if (input.value === "1") {
                input.value = "";
            }
        }

        function resetMinValue(input) {
            if (input.value === "") {
                input.value = "1";
            } else {
                validateQuantity(input);
            }
        }

        function validateQuantity(input) {
            const max = 999;
            const min = 1;
            if (input.value > max) {
                input.value = max;
            }
            if (input.value < min) {
                input.value = min;
            }
        }

        // Aplicar esta validación a todos los inputs existentes cuando se carga la página
        document.addEventListener("DOMContentLoaded", function() {
            const quantityInputs = document.querySelectorAll('.product-quantity');
            quantityInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    clearMinValue(this);
                });
                input.addEventListener('blur', function() {
                    resetMinValue(this);
                });
                input.addEventListener('input', function() {
                    validateQuantity(this);
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('realizarPedido').addEventListener('click', function() {
                // Recopilar información del carrito
                const cartRows = document.querySelectorAll('#cartItems tr');

                if (cartRows.length === 0) {
                    // Mostrar alerta de advertencia
                    Swal.fire({
                        title: 'Alerta',
                        text: 'Seleccione productos para realizar un pedido',
                        icon: 'warning',
                        confirmButtonText: 'Aceptar'
                    });
                } else {
                    let cartInfo = '';

                    cartRows.forEach(row => {
                        const productName = row.querySelector('td:nth-child(2)').textContent;
                        const productPrice = row.querySelector('.product-price').textContent;
                        const productQuantity = row.querySelector('.product-quantity').value;
                        cartInfo +=
                            `${productName} - Precio: ${productPrice}, Cantidad: ${productQuantity}\n`;
                    });

                    // Obtener el total del carrito
                    const totalPrice = document.getElementById('totalPrice').textContent;
                    cartInfo += `Total: ${totalPrice}`;

                    // Mostrar la alerta
                    Swal.fire({
                        title: 'Completa el siguiente formulario para finalizar tu pedido',
                        icon: 'info',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirigir a la página de contacto con la información del carrito como parámetro
                            window.location.href =
                                `{{ route('tuArteMenu.Contacto.index') }}?cartInfo=${encodeURIComponent(cartInfo)}`;
                        }
                    });
                }
            });
        });
    </script>
    @include('partials.footerMoba')
</body>

</html>

<style>
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 70vw;
        width: 100%;
        margin-top: 6%;

        }
     

    .active-link {
        position: relative;
        color: red;
    }

    .active-link:after {
        color: #2bb9e5;
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        /* Grosor de la línea */
        background-color: red;
        /* Color de la línea */
    }

    .box {
        height: 80%;
        width: 45%;
        margin-top: 5%;
        margin-left: 5%;
        overflow: auto;

    }

    .boxText {
        width: 95%;
        height: 95%;
        margin-top: 2%;
    }

    h1 {
        color: white;
    }

    h3 {
        color: #BCCCE0;
        font-size: 1.8vw;
    }

    label {
        color: #BCCCE0;
        font-size: 2hw;
    }

    .box form {

        width: 45hw;
        height: 50hw;
        font-size: 1.3vw;
    }


    form {
        margin-top: 10%;
        margin-left: 20%;


    }

    input {
        width: 90hw;
        height: 1.5vw;
        margin-right: 10%;
        background-color: #3E3E3F;
        color: white;
        font-size: 1vw;
    }

    textarea {
        width: 90%;
        background-color: #3E3E3F;
        color: white;
        height: 4vw;
    overflow: auto;
    font-family: sans-serif !important;
    }

    #submit {
        background-color: #BCCCE0;
        width: 25%;
        color: black;

    }

    .container-fluid {
        padding: 0 !important;
    }

    .option-listOne {
        list-style-type: none;
        padding: 0;
        margin: 0;
        flex-wrap: wrap;
        gap: 2px;
        display: flex;
        color: white !important;

    }

    /* Estilo para cada opción */
    .option-item {
        width: 6.8vw;
        font-size: 0.7vw;
        margin-bottom: 5px;
        text-align: center;

    }

    /* Estilo para el input oculto */
    .option-input {
        display: none;

    }


    /* Estilo para la etiqueta */
    .option-label {
        display: inline-block;
        padding: 8px 12px;
        cursor: pointer;
        width: 6vw;
        height: 2wv;
    }

    /* Estilo para cuando se pasa el mouse sobre la etiqueta */
    .option-label:hover {
        background-color: red;
    }

    .option-input:checked+.option-label {
        background-color: #007bff;
        color: white;
    }


    /*estilos Breadcrums*/

    .breadcrums {
        display: flex;
    }

    .breadcrums a {
        text-decoration: none;
        color: white;
        font-size: 0.9vw;
        margin-right: 2px;
        /* Esto agrega un espacio entre los enlaces */
    }

    .breadcrumbs li {
        display: inline;
        padding: 0;
    }

    .breadcrumbs a:hover {
        color: red;
    }

    form {
        margin: 0px !important;

    }

    input.circle {
        /* Aquí puedes definir los estilos */
        /* Por ejemplo: */
        width: 1vw;
        background-color: red;
        /* Y cualquier otro estilo que desees */
    }

    /* Estilos para el botón del carrito (btn-cart) */
    .btn-cart {
        position: relative;
        background-color: transparent;
        color: white;
        border: none;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s ease;
        font-size: 1.5em;
        /* Ajusta el tamaño del icono según sea necesario */
    }

    .btn-cart:hover {
        background-color: transparent;
    }

    /* Estilos para el icono dentro del botón del carrito */
    .btn-cart i {
        vertical-align: middle;
    }

    /* Estilos para el contador flotante (cart-badge) */
    .cart-badge {
        position: absolute;
        top: -10px;
        right: -10px;
        display: none;
        color: white;
        font-size: 0.8em;
        padding: 0.3em 0.6em;
        border-radius: 50%;
        background-color: red;
        border: 1px solid white;
        z-index: 1;
        font-family: sans-serif !important;
    }

    .card-link img {
        pointer-events: none;
    }

    /* Mostrar el contador solo cuando hay íconos activos */
    .cart-badge.active {
        display: inline-block;
    }

    /* Estilos para el input numérico */
    .product-quantity {
        width: 84px;
        /* Ajusta el ancho del input numérico según sea necesario */
    }

    /* Estilos para alinear verticalmente el contenido de las celdas <td> */
    table tbody tr td {
        vertical-align: middle;
    }

    .total-price {
        color: black;
    }

    .header-title {
        color: black;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .total-price {
        margin: 0 auto;
    }

    .remove-product {
        cursor: pointer;
        color: red;
    }
    #asunto{
        font-size: 1.1vw;
    background-color: grey;
    color: white;
    font-family: sans-serif !important;

}

</style>

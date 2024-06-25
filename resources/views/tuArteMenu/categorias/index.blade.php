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
    <link rel="stylesheet" href="{{ asset('css/StyleCategorias/categorias.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StyleFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body onload="loadCart()" class="background-image">
    <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-image: url('{{ asset('Imagenes/Fondo_TuArte2.jpg') }}'); background-size: 100% 100%; background-position: center top; background-repeat: no-repeat; opacity: 1; z-index: 0; filter: brightness(50%); -webkit-filter: brightness(50%);">
    </div>
    <nav class="navbar">
        <!--- inicio breaddrums-->
        <div class="breadcrums">
            @include('helpers.breadcrumbs', [
                'breadcrumbs' => [
                    ['url' => route('welcome'), 'label' => 'Bienvenido /'],
                    ['url' => route('tuArteMenu.index'), 'label' => 'Tu Arte /'],
                    ['url' => route('tuArteMenu.categorias.index'), 'label' => 'Categorias'],
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


                <a href="{{ route('tuArteMenu.index') }}" class="btn btn-primary ">Nosotros</a>
                <a href="{{ route('tuArteMenu.categorias.index') }}"class="btn btn-primary active-link ">Categorias</a>
                <a href="{{ route('tuArteMenu.galeria.index') }}" class="btn btn-primary ">Galeria</a>
                <a href="{{ route('tuArteMenu.Contacto.index') }}" class="btn btn-primary ">Contáctanos</a>
                <button class="btn btn-cart position-relative" data-bs-toggle="modal" data-bs-target="#cartModal">
                    <i class="bi bi-cart3"></i>
                    <span class="badge bg-success rounded-pill cart-badge">0</span>
                </button>
            </div>
            <a href="{{ route('tuArteMenu.index') }}">
                <img src="{{ asset('Imagenes/LogoTuArte.png') }}" class="navbar-img-right" alt="Logo Tu Arte">
            </a>
        </div>


    </nav>

    <!-- Líneas verticales con iconos -->
    <div class="vertical-line left-line">
        <hr class="linea1">
        <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
        <hr class="linea1">
    </div>

    <!-- Contenido de la página aquí -->

    <div class="container">
        <div class="contenedor">
            @foreach ($categorias->whereIn('name', ['Accesorios', 'Mascotas', 'Decoracion', 'Joditas pal Recuerdo'])->where('type', 'producto')->take(4) as $categoria)
                <div class="campo campo1">
                    <h1><a href="#" onclick="redirigir('{{ $categoria->name }}')">{{ $categoria->name }}</a>
                    </h1>
                </div>
            @endforeach
        </div>




        <script>
            function redirigir(nombreCategoria) {
                switch (nombreCategoria) {
                    case 'Mascotas':
                        window.location.href = "{{ route('tuArteMenu.servicios.Mascotas.index') }}";
                        break;
                    case 'Accesorios':
                        window.location.href = "{{ route('tuArteMenu.servicios.Accesorios.index') }}";
                        break;
                    case 'Decoracion':
                        window.location.href = "{{ route('tuArteMenu.servicios.Decoracion.index') }}";
                        break;
                    case 'Joditas pal Recuerdo':
                        window.location.href = "{{ route('tuArteMenu.servicios.JoditasPalRecuerdo.index') }}";
                        break;
                    default:
                        break;
                }
            }
        </script>
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
                if (cartItems.children.length === 0) {
                    event.preventDefault();
                    window.location.href = "{{ route('tuArteMenu.servicios.Accesorios.index') }}";
                } else {
                    handleProductClick(event);
                }
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
    @include('partials.footerTuArte')
</body>

</html>

<style>
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
</style>

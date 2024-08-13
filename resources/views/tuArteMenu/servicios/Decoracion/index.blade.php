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
    <link rel="stylesheet" href="{{ asset('css/StylesServicios/DecoracionTuArte.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StyleFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body onload="loadCart()" style="position: relative;">
    <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-image: url('{{ asset('Imagenes/Fondo_TuArte1.jpg') }}'); background-size: 100% 100%; background-position: center top; background-repeat: no-repeat; opacity: 1; z-index: -1; filter: brightness(50%); -webkit-filter: brightness(50%);">
    </div>
    <nav class="navbar">
        <!--- inicio breaddrums-->
        <div class="breadcrums">
            @include('helpers.breadcrumbs', [
                'breadcrumbs' => [
                    ['url' => route('welcome'), 'label' => 'Bienvenido /'],
                    ['url' => route('tuArteMenu.index'), 'label' => 'Tu Arte /'],
                    ['url' => route('tuArteMenu.servicios.Decoracion.index'), 'label' => 'Servicios / Decoracion'],
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
                    <a href="" class="active-link">
                        <button class="btn btn-primary active-lonk dropdown-toggle" type="button"
                            id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </button>
                    </a>
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
                <a href="{{ route('tuArteMenu.Contacto.index') }}" class="btn btn-primary">Contáctanos</a>
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
    <div class="vertical-line right-line">
        <hr class="linea2">
        <a href="https://www.instagram.com/tuarte03"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/TuArte03"><i class="bi bi-facebook"></i></a>
        <hr class="linea2">
    </div>

    <!-- Contenido de la página aquí -->

    <div class="title-container">
        <h1 class="big-title">DECORACIÓN</h1>
    </div>
    <div class="txt1">
        <h1 class="txts1">¿Buscas la mejor pieza de decoración para tus espacios?</h1>
    </div>
    <div class="txt2">
        <h1 class="txts2">¡Has llegado al lugar indicado!</h1>
    </div>
    <div class="txt3">
        <h1 class="txts3">Nuestro portafolio cuenta con piezas unicas y diseñadas a tu gusto, que van con tu
            personalidad y hacen
            tus espacios mas agradables.</h1>
        <h1 class="txts3">Esta línea nos trae gran variedad de productos como lo son porta esferos, porta celulares,
            colgadores de
            llaves, retablos, recordatorios, decoraciones para festas, imanes, joyeros, cajas y muchas cosas más...</h1>
    </div>
    <!---Carrusel--->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row" id="carouselItemsContainer">
                    @foreach ($products as $product)
                        <div class="col">
                            <a href="" class="card-link" data-product-id="{{ $product->id }}"
                                data-product-name="{{ $product->name }}"
                                data-product-price="{{ $product->price }}"
                                data-product-image="{{ asset('storage/' . $product->image) }}">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                        alt="{{ $product->name }}">
                                    <div class="card-body">
                                        <div class="stars">
                                            @php
                            /* LAS ESTRELLAS DE PUNTUACIÓN PARA CALIFICACIÓN DEL PRODUCTO */
                                                $randomStars = rand(4, 5);
                                            @endphp
                                            @for ($i = 0; $i < 0; $i++)
                                                @if ($i < $randomStars)
                                                    <i class="bi bi-star-fill active"></i>
                                                @else
                                                    <i class="bi bi-star-fill"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <p class="card-text">${{ $product->price }}</p>
                                            <span class="check-icon" style="display: none;"><i class="bi bi-check-circle"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
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
            const carouselContainer = document.getElementById('carouselItemsContainer');
            const products = Array.from(carouselContainer.children);
            let itemsPerSlide = getItemsPerSlide();

            function getItemsPerSlide() {
                if (window.innerWidth >= 1200) {
                    return 4;
                } else if (window.innerWidth >= 992) {
                    return 3;
                } else if (window.innerWidth >= 768) {
                    return 2;
                } else {
                    return 1;
                }
            }

            function updateCarousel() {
                const carouselInner = document.querySelector('.carousel-inner');
                carouselInner.innerHTML = '';
                let chunkedProducts = chunkArray(products, itemsPerSlide);

                chunkedProducts.forEach((chunk, index) => {
                    const carouselItem = document.createElement('div');
                    carouselItem.classList.add('carousel-item');
                    if (index === 0) {
                        carouselItem.classList.add('active');
                    }

                    const rowDiv = document.createElement('div');
                    rowDiv.classList.add('row');

                    chunk.forEach(product => {
                        rowDiv.appendChild(product);
                    });

                    carouselItem.appendChild(rowDiv);
                    carouselInner.appendChild(carouselItem);
                });
            }

            function chunkArray(array, size) {
                const result = [];
                for (let i = 0; i < array.length; i += size) {
                    result.push(array.slice(i, i + size));
                }
                return result;
            }

            window.addEventListener('resize', () => {
                itemsPerSlide = getItemsPerSlide();
                updateCarousel();
            });

            updateCarousel();
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const starsContainers = document.querySelectorAll('.stars');

            starsContainers.forEach(starsContainer => {
                const stars = starsContainer.querySelectorAll('i');

                stars.forEach((star, index) => {
                    star.addEventListener('click', function() {
                        // Remover la clase 'active' de todas las estrellas
                        stars.forEach((s, i) => {
                            if (i <= index) {
                                s.classList.add(
                                    'active'
                                ); // Agregar la clase 'active' a las estrellas hasta la seleccionada
                            } else {
                                s.classList.remove('active');
                            }
                        });
                    });
                });
            });
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
</style>

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
    <link rel="stylesheet" href="{{ asset('css/StylesServicios/AccesoriosTuArte.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StyleFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body onload="loadCart()" style="position: relative;">
    <div
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-image: url('{{ asset('Imagenes/FondoPrueba.png') }}'); background-size: cover; background-position: center top; background-repeat: no-repeat; opacity: 1; z-index: -1; filter: brightness(30%); -webkit-filter: brightness(30%);">
    </div>
    <nav class="navbar">
        <!--- inicio breaddrums-->
        <div class="breadcrums">
            @include('helpers.breadcrumbs', [
                'breadcrumbs' => [
                    ['url' => route('welcome'), 'label' => 'Bienvenido /'],
                    ['url' => route('tuArteMenu.index'), 'label' => 'Tu Arte /'],
                    ['url' => route('tuArteMenu.servicios.Accesorios.index'), 'label' => 'Servicios / Accesorios'],
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
        <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
        <hr class="linea2">
    </div>

    <!-- Contenido de la página aquí -->

    <div class="title-container">
        <h1 class="big-title">ACCESORIOS</h1>
    </div>
    <div class="txt1">
        <h1 class="txts1">¿Buscas accesorios que vayan perfecto con tu personalidad?</h1>
    </div>
    <div class="txt2">
        <h1 class="txts2">¡Has llegado al lugar indicado!</h1>
    </div>
    <div class="txt3">
        <h1 class="txts3">Nuestra Creatividad y enfoque en hacer productos unicos, hacen que tengamos en nuestro
            portafolio piezas con las que te vas a identificar y que sin duda querras tener en tu joyero.</h1>
        <h1 class="txts3">En esta línea encuentras aretes largos, aretes topitos, dijes, manillas, pines, anillos.</h1>
    </div>
    <!---Carrusel--->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @php
                $chunks = $products->chunk(4); // Divide la colección en grupos de 4 elementos
            @endphp
            @foreach ($chunks as $key => $chunk)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach ($chunk as $product)
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
                                                    // Genera un número aleatorio entre 4 y 5 para las estrellas amarillas
                                                    $randomStars = rand(4, 5);
                                                @endphp
                                                @for ($i = 0; $i < 5; $i++)
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
                                                <span class="check-icon" style="display: none;"><i
                                                        class="bi bi-check-circle"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
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
                    <button type="button" class="btn btn-success">Comprar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybBogGz5qFa8dU4szVv5UqVf+I0Yb0EG7Pa3Xf6LCpHe5tg3f" crossorigin="anonymous">
    </script>
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
            }

            cards.forEach(card => {
                card.addEventListener('click', function(event) {
                    event.preventDefault();
                    const checkIcon = this.querySelector('.check-icon');
                    let activeCheckIcons = document.querySelectorAll(
                        '.check-icon[style="display: inline-block;"]');

                    if (checkIcon.style.display === 'none') {
                        checkIcon.style.display = 'inline-block';
                        activeCheckIcons = document.querySelectorAll(
                            '.check-icon[style="display: inline-block;"]');
                    } else {
                        checkIcon.style.display = 'none';
                        activeCheckIcons = document.querySelectorAll(
                            '.check-icon[style="display: inline-block;"]');
                        // Si el producto ya está en el carrito, elimínalo
                        const productId = this.getAttribute('data-product-id');
                        const existingItem = document.querySelector(
                            `#cartItems tr[data-product-id="${productId}"]`);
                        if (existingItem) {
                            existingItem.remove();
                            updateTotal();
                        }
                    }

                    if (activeCheckIcons.length > 0) {
                        cartBadge.classList.add('active');
                        cartBadge.textContent = activeCheckIcons.length;
                    } else {
                        cartBadge.classList.remove('active');
                    }

                    const productId = this.getAttribute('data-product-id');
                    const productName = this.getAttribute('data-product-name');
                    const productPrice = this.getAttribute('data-product-price');
                    const productImage = this.getAttribute('data-product-image');

                    const existingItem = document.querySelector(
                        `#cartItems tr[data-product-id="${productId}"]`);
                    if (!existingItem && checkIcon.style.display !== 'none') {
                        const newRow = document.createElement('tr');
                        newRow.setAttribute('data-product-id', productId);
                        newRow.innerHTML = `
                            <td><img src="${productImage}" alt="${productName}" width="50"></td>
                            <td>${productName}</td>
                            <td class="product-price">${productPrice}</td>
                            <td><input type="number" class="form-control product-quantity" value="1" min="1" max="99"></td>
                            <td><i class="bi bi-x-lg remove-product" style="cursor: pointer;"></i></td>
                        `;
                        cartItems.appendChild(newRow);

                        newRow.querySelector('.product-quantity').addEventListener('change',
                            function() {
                                if (this.value < 1) this.value = 1;
                                updateTotal();
                            });
                    }
                    updateTotal();
                });
            });

            // Agregar listener para eliminar productos del carrito al hacer clic en la "x"
            cartItems.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-product')) {
                    const row = event.target.closest('tr');
                    row.remove();
                    updateTotal();
                    // Desmarcar el producto correspondiente en la lista de productos
                    const productId = row.getAttribute('data-product-id');
                    const card = document.querySelector(`.card-link[data-product-id="${productId}"]`);
                    if (card) {
                        const checkIcon = card.querySelector('.check-icon');
                        checkIcon.style.display = 'none';
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cartBadge = document.querySelector('.cart-badge');
            const cartItems = document.getElementById('cartItems');
            const totalPriceElement = document.getElementById('totalPrice');

            function saveCart() {
                const cartData = [];
                cartItems.querySelectorAll('tr').forEach(row => {
                    const productId = row.getAttribute('data-product-id');
                    const productName = row.querySelector('td:nth-child(2)').textContent;
                    const productPrice = row.querySelector('.product-price').textContent;
                    const productImage = row.querySelector('img').src;
                    const productQuantity = row.querySelector('.product-quantity').value;
                    cartData.push({
                        productId,
                        productName,
                        productPrice,
                        productImage,
                        productQuantity
                    });
                });
                localStorage.setItem('cart', JSON.stringify(cartData));
            }

            function loadCart() {
                const cartData = JSON.parse(localStorage.getItem('cart') || '[]');
                cartData.forEach(item => {
                    addCartItem(item.productId, item.productName, item.productPrice, item.productImage, item
                        .productQuantity);
                });
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
                        <td><input type="number" class="form-control product-quantity" value="${productQuantity}" min="1" max="99"></td>
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
                if (cartRows.length > 0) {
                    cartBadge.classList.add('active');
                } else {
                    cartBadge.classList.remove('active');
                }
            }

            document.querySelectorAll('.card-link').forEach(card => {
                card.addEventListener('click', function(event) {
                    event.preventDefault();
                    const productId = this.getAttribute('data-product-id');
                    const productName = this.getAttribute('data-product-name');
                    const productPrice = this.getAttribute('data-product-price');
                    const productImage = this.getAttribute('data-product-image');
                    addCartItem(productId, productName, productPrice, productImage);
                    updateTotal();
                    saveCart();
                });
            });

            loadCart();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};

            function clearCart() {
                localStorage.removeItem('cart');
                const cartItems = document.getElementById('cartItems');
                while (cartItems.firstChild) {
                    cartItems.removeChild(cartItems.firstChild);
                }
                updateTotal();
            }

            function showLoginAlert() {
                Swal.fire({
                    title: "Inicia sesión para realizar una compra",
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

            const productLinks = document.querySelectorAll('.card-link');
            productLinks.forEach(link => {
                link.addEventListener('click', handleProductClick);
            });

            const cartButton = document.querySelector('.btn-cart');
            cartButton.addEventListener('click', function(event) {
                if (!isAuthenticated) {
                    event.preventDefault();
                    clearCart();
                    showLoginAlert();
                }
            });
        });

        function loadCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartItems = document.getElementById('cartItems');
            cart.forEach(item => {
                addItemToCart(item);
            });
            updateTotal();
        }

        function updateTotal() {
            let total = 0;
            const cartItems = document.getElementById('cartItems');
            const cartRows = cartItems.querySelectorAll('tr');
            cartRows.forEach(row => {
                const price = parseFloat(row.querySelector('.product-price').textContent.replace('$', ''));
                const quantity = parseInt(row.querySelector('.product-quantity').value);
                total += price * quantity;
            });
            const totalPriceElement = document.getElementById('totalPrice');
            totalPriceElement.textContent = Math.round(total);
            const cartBadge = document.querySelector('.cart-badge');
            cartBadge.textContent = cartRows.length;
            if (cartRows.length > 0) {
                cartBadge.classList.add('active');
            } else {
                cartBadge.classList.remove('active');
            }
        }

        function addItemToCart(product) {
            const cartItems = document.getElementById('cartItems');
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><img src="${product.image}" class="img-thumbnail" width="50"></td>
                <td>${product.name}</td>
                <td class="product-price">$${product.price}</td>
                <td><input type="number" class="form-control product-quantity" value="${product.quantity}" min="1"></td>
                <td class="product-total">$${product.price * product.quantity}</td>
                <td><button class="btn btn-danger btn-sm" onclick="removeItemFromCart(this)">Eliminar</button></td>
            `;
            cartItems.appendChild(row);
        }

        function removeItemFromCart(button) {
            const row = button.closest('tr');
            row.remove();
            updateTotal();
        }
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

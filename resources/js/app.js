import './bootstrap';

import Alpine from 'alpinejs';

// require('./bootstrap');

window.Alpine = Alpine;

Alpine.start();


// function cargarOpcionesSelect() {
//     // Llamadas AJAX para obtener opciones de select
//     $.ajax({
//         url: '/api/servicess',
//         method: 'GET',
//         success: function(response) {
//             // Procesar la respuesta y actualizar el contenido del select de servicios
//             $('.services-select').empty();
//             $.each(response, function(key, value) {
//                 $('.services-select').append('<option value="' + value.id + '">' + value.name + '</option>');
//             });
//         },
//         error: function(xhr, status, error) {
//             console.error(error);
//         }
//     });

    
//     $.ajax({
//         url: '/api/productss',
//         method: 'GET',
//         success: function(response) {
//             // Procesar la respuesta y actualizar el contenido del select de productos
//             $('.products-select').empty();
//             $.each(response, function(key, value) {
//                 $('.products-select').append('<option value="' + value.id + '">' + value.name + '</option>');
//             });
//         },
//         error: function(xhr, status, error) {
//             console.error(error);
//         }
//     });

//     $.ajax({
//         url: '/api/projectss',
//         method: 'GET',
//         success: function(response) {
//             // Procesar la respuesta y actualizar el contenido del select de proyectos
//             $('.projects-select').empty();
//             $.each(response, function(key, value) {
//                 $('.projects-select').append('<option value="' + value.id + '">' + value.name + '</option>');
//             });
//         },
//         error: function(xhr, status, error) {
//             console.error(error);
//         }
//     });

//     $.ajax({
//         url: '/api/quotess',
//         method: 'GET',
//         success: function(response) {
//             // Procesar la respuesta y actualizar el contenido del select de cotizaciones
//             $('.quotes-select').empty();
//             $.each(response, function(key, value) {
//                 $('.quotes-select').append('<option value="' + value.id + '">' + value.description + '</option>');
//             });
//         },
//         error: function(xhr, status, error) {
//             console.error(error);
//         }
//     });
//     // Repite este bloque de código para las otras rutas de productos, proyectos y cotizaciones.
// }

// // Llamar a la función cuando se cargue completamente el documento
// $(document).ready(function() {
//     cargarOpcionesSelect();
// });




// // $(document).ready(function() {
// //     // Llamadas AJAX para obtener opciones de select
// //     $.ajax({
// //         url: '/get-services',
// //         method: 'GET',
// //         success: function(response) {
// //             // Procesar la respuesta y actualizar el contenido del select de servicios
// //             $('.services-select').empty();
// //             $.each(response, function(key, value) {
// //                 $('.services-select').append('<option value="' + value.id + '">' + value.name + '</option>');
// //             });
// //         },
// //         error: function(xhr, status, error) {
// //             console.error(error);
// //         }
// //     });

// //     $.ajax({
// //         url: '/get-products',
// //         method: 'GET',
// //         success: function(response) {
// //             // Procesar la respuesta y actualizar el contenido del select de productos
// //             $('.products-select').empty();
// //             $.each(response, function(key, value) {
// //                 $('.products-select').append('<option value="' + value.id + '">' + value.name + '</option>');
// //             });
// //         },
// //         error: function(xhr, status, error) {
// //             console.error(error);
// //         }
// //     });

// //     $.ajax({
// //         url: '/get-projects',
// //         method: 'GET',
// //         success: function(response) {
// //             // Procesar la respuesta y actualizar el contenido del select de proyectos
// //             $('.projects-select').empty();
// //             $.each(response, function(key, value) {
// //                 $('.projects-select').append('<option value="' + value.id + '">' + value.name + '</option>');
// //             });
// //         },
// //         error: function(xhr, status, error) {
// //             console.error(error);
// //         }
// //     });

// //     $.ajax({
// //         url: '/get-quotes',
// //         method: 'GET',
// //         success: function(response) {
// //             // Procesar la respuesta y actualizar el contenido del select de cotizaciones
// //             $('.quotes-select').empty();
// //             $.each(response, function(key, value) {
// //                 $('.quotes-select').append('<option value="' + value.id + '">' + value.description + '</option>');
// //             });
// //         },
// //         error: function(xhr, status, error) {
// //             console.error(error);
// //         }
// //     });
// // });
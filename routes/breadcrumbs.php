<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Automobilių dalys', route('home'));
});

// Home > Blog
Breadcrumbs::for('login', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Prisijungimas', route('login'));
});

Breadcrumbs::for('register', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Registracijos forma', route('register'));
});

Breadcrumbs::for('company', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Apie mus', route('company'));
});
Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Kontaktai', route('contact'));
});
Breadcrumbs::for('regulations', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Nuostatai', route('regulations'));
});
Breadcrumbs::for('privacy', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Privatumo politika', route('privacy'));
});
Breadcrumbs::for('cookie', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Slapukų politika', route('cookie'));
});
Breadcrumbs::for('cart', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Krepšelis', route('cart.index'));
});

Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Paskyra', route('profile'));
});

Breadcrumbs::for('documents', function (BreadcrumbTrail $trail) {
    $trail->parent('profile');
    $trail->push('Dokumentai', route('documents'));
});
Breadcrumbs::for('orders', function (BreadcrumbTrail $trail) {
    $trail->parent('profile');
    $trail->push('Užsakymai', route('orders.index'));
});
Breadcrumbs::for('orders-detail', function (BreadcrumbTrail $trail, $reference) {
    $trail->parent('orders');
    $trail->push($reference, route('orders.show',$reference));
});

Breadcrumbs::for('payments', function (BreadcrumbTrail $trail) {
    $trail->parent('profile');
    $trail->push('Mokėjimai', route('payments'));
});
Breadcrumbs::for('refunds', function (BreadcrumbTrail $trail) {
    $trail->parent('profile');
    $trail->push('Grąžinimai', route('refunds'));
});
Breadcrumbs::for('password-reset', function (BreadcrumbTrail $trail) {
    $trail->parent('profile');
    $trail->push('Slaptažodžio keitimas', route('password-reset'));
});

// catalog
Breadcrumbs::for('catalog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Catalogas', route('catalog'));
});

Breadcrumbs::for('products', function (BreadcrumbTrail $trail) {
    $trail->parent('catalog');
    $trail->push('Prėkes', route('products.index'));
});
/*Breadcrumbs::for('product', function (BreadcrumbTrail $trail,$name) {
    $trail->parent('products');
    $trail->push($name, route('products.show'));
});*/
// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});

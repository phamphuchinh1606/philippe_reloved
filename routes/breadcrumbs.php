<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

//User===================================================================
Breadcrumbs::for('user', function ($trail) {
    $trail->parent('home');
    $trail->push('List User', route('user.index'));
});

//Building Type Create
Breadcrumbs::for('user.create', function ($trail) {
    $trail->parent('user');
    $trail->push('Create Building Type');
});

//Building Type Update
Breadcrumbs::for('user.edit', function ($trail, $userName) {
    $trail->parent('user');
    $trail->push($userName);
});
//========================End User===============================================

//Brand===================================================================
Breadcrumbs::for('brand', function ($trail) {
    $trail->parent('home');
    $trail->push('List Brand', route('brand.index'));
});

//Building Type Create
Breadcrumbs::for('brand.create', function ($trail) {
    $trail->parent('brand');
    $trail->push('Create Brand');
});

//Building Type Update
Breadcrumbs::for('brand.edit', function ($trail, $brandName) {
    $trail->parent('brand');
    $trail->push($brandName);
});
//========================End Brand===============================================

//Model===================================================================
Breadcrumbs::for('model', function ($trail) {
    $trail->parent('home');
    $trail->push('List Model', route('model.index'));
});

//Model Create
Breadcrumbs::for('model.create', function ($trail) {
    $trail->parent('model');
    $trail->push('Create Model');
});

//Model Update
Breadcrumbs::for('model.edit', function ($trail, $modelName) {
    $trail->parent('model');
    $trail->push($modelName);
});
//========================End Model===============================================

//Status===================================================================
Breadcrumbs::for('status', function ($trail) {
    $trail->parent('home');
    $trail->push('List Status', route('model.index'));
});

//Model Create
Breadcrumbs::for('status.create', function ($trail) {
    $trail->parent('status');
    $trail->push('Create Status');
});

//Model Update
Breadcrumbs::for('status.edit', function ($trail, $statusName) {
    $trail->parent('status');
    $trail->push($statusName);
});
//========================End Status===============================================




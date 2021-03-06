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

//Colors===================================================================
Breadcrumbs::for('color', function ($trail) {
    $trail->parent('home');
    $trail->push('List Color', route('color.index'));
});

//Color Create
Breadcrumbs::for('color.create', function ($trail) {
    $trail->parent('color');
    $trail->push('Create Color');
});

//Color Update
Breadcrumbs::for('color.edit', function ($trail, $colorName) {
    $trail->parent('color');
    $trail->push($colorName);
});
//========================End Colors===============================================

//Categories===================================================================
Breadcrumbs::for('category', function ($trail) {
    $trail->parent('home');
    $trail->push('List Category', route('category.index'));
});

//Color Create
Breadcrumbs::for('category.create', function ($trail) {
    $trail->parent('category');
    $trail->push('Create Category');
});

//Color Update
Breadcrumbs::for('category.edit', function ($trail, $categoryName) {
    $trail->parent('category');
    $trail->push($categoryName);
});
//========================End Categories===============================================

//Item===================================================================
Breadcrumbs::for('item', function ($trail) {
    $trail->parent('home');
    $trail->push('List Item', route('item.index'));
});

//Item Create
Breadcrumbs::for('item.create', function ($trail) {
    $trail->parent('item');
    $trail->push('Create Item');
});

//Item Update
Breadcrumbs::for('item.edit', function ($trail, $itemName) {
    $trail->parent('item');
    $trail->push($itemName);
});
//========================End Item===============================================

//Sale Item===================================================================
Breadcrumbs::for('sale_item', function ($trail) {
    $trail->parent('home');
    $trail->push('List Item', route('sale_item.index'));
});

//Sale Item Create
Breadcrumbs::for('sale_item.create', function ($trail) {
    $trail->parent('sale_item');
    $trail->push('Create Item');
});

//Sale Item Update
Breadcrumbs::for('sale_item.edit', function ($trail, $itemName) {
    $trail->parent('sale_item');
    $trail->push($itemName);
});
//========================End Sale Item===============================================

//Tag===================================================================
Breadcrumbs::for('tag', function ($trail) {
    $trail->parent('home');
    $trail->push('List Tag', route('tag.index'));
});

//Item Create
Breadcrumbs::for('tag.create', function ($trail) {
    $trail->parent('tag');
    $trail->push('Create Tag');
});

//Item Update
Breadcrumbs::for('tag.edit', function ($trail, $tagName) {
    $trail->parent('tag');
    $trail->push($tagName);
});
//========================End Tag===============================================


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NavigationBarLinks;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get("/itemsAll", [NavigationBarLinks::class, "index"])->middleware(['auth', 'verified'])->name("items.all");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//navigationRute
Route::get("/pizzaAll", [NavigationBarLinks::class, "pizza"])->name("pizza.all");
Route::get("/hamburgerAll", [NavigationBarLinks::class, "hamburger"])->name("hamburger.all");
Route::get("/saladAll", [NavigationBarLinks::class, "salad"])->name("salad.all");
Route::get("/drinkAll", [NavigationBarLinks::class, "drinks"])->name("drinks.all");

Route::get("/food_sub_category/{id}", [FoodController::class, "show"])->name("food_sub_category");
Route::get("/drink_sub_category/{id}", [DrinkController::class, "show"])->name("drink_sub_category");

//singleItem
Route::get("/singleItem/{id}", [ItemController::class, "singleItem"])->name("singleItem");

//cart routes
Route::get("/yourcart", [CartController::class, "index"])->name("yourcart");
Route::post("/singleItem/order", [OrderController::class, "store"])->name("order.store");

//order
Route::get("/yourOrder", [OrderController::class, "show"])->name("yourOrder");
Route::post("/delete/{id}", [CartController::class, "delete"])->name("cart.delete");
Route::post("/qty/{id}", [CartController::class, "qty"])->name("cart.qty");
Route::post("/finishOrder", [OrderController::class, "finish"])->name("orderFinish");

//admin rute-users
Route::get("/admin", [AdminController::class, "index"])->name("admin.page");
Route::post("/admin", [AdminController::class, "store"])->name("item.store");
//Route::post("/admin/a", [AdminController::class, "storeImage"])->name("image.store");
Route::get("/admin/users", [AdminController::class, "usersPage"])->name("users.page");

//admin user delete
Route::post("/admin/users/{id}", [AdminController::class, "delete"])->name("delete.user");

//admin user update
Route::post("/admin/userUpdate", [AdminController::class, "update"])->name("user.update");

//showOrdersPage
Route::get("/orders", [AdminController::class, "showOrdersPage"])->name("showOrdersPage");

//items
Route::get("/items", [AdminController::class, "items"])->name("items");
Route::post("/items/{id}", [AdminController::class, "deleteItem"])->name("item.destroy");
Route::post("/singleItem/itemUpdate", [AdminController::class, "updateItem"])->name("admin.update");


/*Route::get("/allItems", [ItemController::class, "allItems"]);

Route::post("/allItems/{id}", [ItemController::class, "admindelete"])->name("admin.delete");*/

/*
//items ruta
Route::get("/items", [ItemController::class, "allitems"])->name("all.items");



Route::get("/food", [ItemController::class, "food"]);
Route::get("/drinks", [ItemController::class, "drink"]);
*/

require __DIR__.'/auth.php';

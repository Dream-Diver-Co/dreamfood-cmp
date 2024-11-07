<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Summer;
use App\Models\Winter;
use App\Models\Admincontact;
use App\Models\About;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Client;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\SpecialContact;
use App\Models\Deal;
use App\Models\ConsecutiveOrder;


class FrontendController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        $categories = Category::withCount('subcategories')->get();

        return view('frontend.index', compact('categories','cartItems'));
    }

    public function about()
    {
        // Retrieve cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('frontend.page.about',compact('cartItems'));
    }

    public function contact()
    {
        // Retrieve cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        $admincontacts = Admincontact::all();
        return view('frontend.page.contact',compact('admincontacts','cartItems'));
    }

    public function chef()
    {
        // Retrieve cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('frontend.page.chef',compact('cartItems'));
    }

    public function featured()
    {

        // Retrieve cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        return view('frontend.page.featured',compact('cartItems'));
    }

    public function subscription()
    {
        // Retrieve cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('frontend.page.subscription',compact('cartItems'));
    }

    public function booking()
    {
        // Retrieve cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('frontend.page.booking',compact('cartItems'));
    }

    public function special()
    {
        // $contacts = SpecialContact::all();
        $contacts = SpecialContact::where('user_id', auth()->id())->get();
        return view('frontend.order.special', compact('contacts'));
    }

    // public function deal()
    // {
    //     $products = Product::all();
    //     return view('frontend.page.deal', compact('products'));
    // }

    public function deal()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        $deals = Deal::with('product')->get();
        return view('frontend.page.deal', compact('deals','cartItems'));
    }


    public function shop()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        $categories = Category::withCount('subcategories')->get();
        return view('frontend.page.shop', compact('categories','cartItems'));
    }

    public function subcategory()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        $subcategories = SubCategory::withCount('products')->get();

        return view('frontend.page.subcategory', compact('subcategories','cartItems'));
    }

    public function product()
    {

        // Retrieve cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        // Fetch products with "regular" status
        $products = Product::where('status', 'breakfast')
            ->with('subcategory', 'category')
            ->get();

        return view('frontend.page.product', compact('products','cartItems'));
    }
    // public function product()
    // {
    //     return view('frontend.page.product');
    // }



    // public function about()
    // {
    //     // Retrieve cart items for the authenticated user
    //     $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
    //     $abouts = About::all();
    //     return view('frontend.page.about', compact('abouts','cartItems'));
    // }

    // public function contact()
    // {
    //     // Retrieve cart items for the authenticated user
    //     $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

    //     $admincontacts = Admincontact::all();
    //     return view('frontend.page.contact', compact('admincontacts','cartItems'));
    // }

    // public function shop()
    // {
    //     // Retrieve cart items for the authenticated user
    //     $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
    //     $categories = Category::withCount('subcategories')->get();
    //     return view('frontend.page.shop', compact('categories','cartItems'));
    // }

    // public function subcategory()
    // {

    //     // Retrieve cart items for the authenticated user
    //     $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

    //     $subcategories = SubCategory::withCount('products')->get();
    //     return view('frontend.page.subcategory', compact('subcategories','cartItems'));
    // }

    // public function product()
    // {

    //     // Retrieve cart items for the authenticated user
    //     $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

    //     // Fetch products with "regular" status
    //     $products = Product::where('status', 'regular')
    //         ->with('subcategory', 'category')
    //         ->get();

    //     return view('frontend.page.product', compact('products','cartItems'));
    // }

    public function showSubcategories($categoryId)
    {

        // Retrieve cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        $category = Category::with('subCategories')->findOrFail($categoryId);
        return view('frontend.page.subcategory', compact('category','cartItems'));
    }

    public function showProducts($subcategoryId)
    {

        // Retrieve cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        // Fetch products with "regular" status in the specified subcategory
        $subcategory = SubCategory::findOrFail($subcategoryId);
        $products = $subcategory->products()
            ->where('status', 'regular')
            ->paginate(8); // Adjust the number per page as needed

        return view('frontend.page.product', compact('subcategory', 'products','cartItems'));
    }


    public function product_details($id)
    {

        // Retrieve cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        $product = Product::findOrFail($id); // Fetch the product details by ID

        return view('frontend.page.product_details', compact('product','cartItems')); // Pass the product data to the view
    }

    public function showProductsByCategory(Category $category)
    {
        // Retrieve cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        // Load the products for the given category, along with subcategories if needed
        $products = Product::where('category_id', $category->id)->get();

        // Return the view, passing the category and products data
        return view('frontend.page.category_products', compact('category', 'products','cartItems'));
    }

    public function showSubcategoryProducts($id)
    {

        // Retrieve cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        $subcategory = Subcategory::with(['products' => function ($query) {
            $query->where('status', 'regular')->paginate(8); // Adjust the number per page as needed
        }])->findOrFail($id);

        return view('frontend.products', compact('subcategory','cartItems'));
    }

    public function offer()
    {

        // Retrieve cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        $offerProducts = Product::where('status', 'Offer')->get();

        return view('frontend.page.offer', compact('offerProducts','cartItems'));
    }
}

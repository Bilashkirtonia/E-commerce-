<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
               
                <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" href="{{ route('product_list') }}">All Products</a>
                @foreach ($categories as $category)
                <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="{{ route('category_product_list',$category->category_id) }}">{{ $category->category->name }}</a>
                @endforeach

            </div>

            @include('fronted.search')

            <!-- Filter -->
            <div class="dis-none panel-filter w-full">
                <div class="wrap-filter flex-w w-full" style="background-color: #858585;">
                    <div>
                        <div style="padding: 20px; font-size: 25px; color: #fff">
                            Brands
                        </div>
                        <div style="padding: 0px 20px 20px 20px;">
                            @foreach ($brands as $brand)
                            <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="{{ route('brand_product_list',$brand->brand_id) }}" class="filter-link stext-106 trans-04" style="color: #fff">
                                {{ $brand->brand->name }}
                            </a>
                            @endforeach
                            
                            <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="" class="filter-link stext-106 trans-04" style="color: #fff">
                                Malayshian
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row isotope-grid">
            @foreach ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{ url('upload/product_img/',$product->image) }}" alt="IMG-PRODUCT">

                        <a  href="{{ route('product_details_show',$product->slug) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                            Add to Card
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ $product->name }}
                            </a>

                            <span class="stext-105 cl3">
                                TK {{ $product->price }}
                            </span>
                        </div>

                    </div>
                </div>
            </div> 
            @endforeach
            
        </div>
        {{ $products->links() }}
    </div>
</section>
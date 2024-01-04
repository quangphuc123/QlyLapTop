<div class="col-lg-3">
    <div class="sidebar-wrapper sidebar-wrapper-mrg-right">
        <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
            <h4 class="sidebar-widget-title">Categories </h4>
            <div class="shop-catigory">
                <ul>
                    @foreach ($productCatalogue as $key => $val)
                        <li><a href="shop.html">{{ $val->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
            <h4 class="sidebar-widget-title">Price Filter </h4>
            <div class="price-filter">
                <span>Range: $100.00 - 1.300.00 </span>
                <div id="slider-range"></div>
                <div class="price-slider-amount">
                    <div class="label-input">
                        <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                    </div>
                    <button type="button">Filter</button>
                </div>
            </div>
        </div>
        <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
            <h4 class="sidebar-widget-title">Refine By </h4>
            <div class="sidebar-widget-list">
                <ul>
                    <li>
                        <div class="sidebar-widget-list-left">
                            <input type="checkbox"> <a href="#">On Sale <span>4</span> </a>
                            <span class="checkmark"></span>
                        </div>
                    </li>
                    <li>
                        <div class="sidebar-widget-list-left">
                            <input type="checkbox" value=""> <a href="#">New
                                <span>5</span></a>
                            <span class="checkmark"></span>
                        </div>
                    </li>
                    <li>
                        <div class="sidebar-widget-list-left">
                            <input type="checkbox" value=""> <a href="#">In Stock
                                <span>6</span> </a>
                            <span class="checkmark"></span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-widget shop-sidebar-border pt-40">
            <h4 class="sidebar-widget-title">Popular Tags</h4>
            <div class="tag-wrap sidebar-widget-tag">
                <a href="#">Clothing</a>
                <a href="#">Accessories</a>
                <a href="#">For Men</a>
                <a href="#">Women</a>
                <a href="#">Fashion</a>
            </div>
        </div>
    </div>
</div>

<?php
/* Template Name: Product List */
get_header();
?>

<section class="banner pb-0" style="background-color: #f7f7f7 ;">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a href="#">Category</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Birthday Ballloons</li>
    </ol>
    <h2>Birthday Balloons</h2>
  </div>
</section>
<section class="section-occasion gap no-top" style="background-color: #f7f7f7 ;">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="accordion">
          <div class="items">
            <div class="dropdown-text d-flex align-items-center justify-content-between">
              <p class="text">Category</p>
              <i><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg></i>
            </div>
            <div class="hidden-box">
              <ul>
                <li>
                  <div class="bolo"></div><a href="#">Animals, Bugs & Fish</a>
                </li>
                <li>
                  <div class="bolo"></div><a href="#">Anniversary</a>
                </li>
                <li>
                  <div class="bolo"></div><a href="#">Baby</a>
                </li>
                <li>
                  <div class="bolo"></div><a href="#">Beach & Luau</a>
                </li>
                <li>
                  <div class="bolo"></div><a href="#">Birthday</a>
                </li>
                <li>
                  <div class="bolo"></div><a href="#">Congratulations</a>
                </li>
                <li>
                  <div class="bolo"></div><a href="#">Fall & Winter</a>
                </li>
                <li>
                  <div class="bolo"></div><a href="#">Flowers & Nature</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="items">
            <div class="dropdown-text d-flex align-items-center justify-content-between">
              <p class="text">Size</p>
              <i><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg></i>
            </div>
            <div class="hidden-box">
              <ul>
                <li>
                  <div class="bolo"></div><a href="#">3 ft (90 cm)</a>
                </li>
                <li>
                  <div class="bolo"></div><a href="#">30 inch (75 cm) </a>
                </li>
                <li>
                  <div class="bolo"></div><a href="#">24 inch (60 cm)</a>
                </li>
                <li>
                  <div class="bolo"></div><a href="#">16 inch (40 cm)</a>
                </li>
                <li>
                  <div class="bolo"></div><a href="#">11 inch (28 cm)</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="items">
            <div class="dropdown-text d-flex align-items-center justify-content-between">
              <p class="text">Brand</p>
              <i><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg></i>
            </div>
            <div class="hidden-box">
              <ul class="brands">
                <li>
                  <a href="#"> <img alt="brands-img" src="https://placehold.co/146x94"></a>
                </li>
                <li>
                  <a href="#"> <img alt="brands-img" src="https://placehold.co/146x94"></a>
                </li>
                <li>
                  <a href="#"> <img alt="brands-img" src="https://placehold.co/146x94"></a>
                </li>
                <li>
                  <a href="#"> <img alt="brands-img" src="https://placehold.co/146x94"></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="items">
            <div class="dropdown-text d-flex align-items-center justify-content-between">
              <p class="text">Shape</p>
              <i><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg></i>
            </div>
            <div class="hidden-box">
              <ul>
                <li>
                  <div class="bolo"></div><a href="#">Round Balloons</a>
                </li>
                <li>
                  <div class="bolo"></div><a href="#">Heart Balloon</a>
                </li>
                <li>
                  <div class="bolo"></div><a href="#">Alphapet Balloon</a>
                </li>
                <li>
                  <div class="bolo"></div><a href="#">Cartoon Balloon</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="items">
            <div class="dropdown-text d-flex align-items-center justify-content-between">
              <p class="text">Price</p>
              <i><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg></i>
            </div>
            <div class="hidden-box">
              <div class="wrapper">
                <h2>Price Range</h2>
                <p>Use slider or enter min and max price</p>

                <div class="price-input">
                  <div class="field">
                    <span>Min</span>
                    <input type="number" class="input-min" value="2500">
                  </div>
                  <div class="separator">-</div>
                  <div class="field">
                    <span>Max</span>
                    <input type="number" class="input-max" value="7500">
                  </div>
                </div>
                <div class="slider">
                  <div class="progress"></div>
                </div>
                <div class="range-input">
                  <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                  <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="products">
          <h6>Items 1-25 of 6133</h6>
          <div class="sort-by d-flex align-items-center">
            <span>Sort By</span><select class="nice-select Advice">
              <option>Recently Added</option>
              <option>Select Topic 1</option>
              <option>Select Topic 2</option>
              <option>Select Topic 3</option>
              <option>Select Topic 4</option>
            </select>
            <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                <i>
                  <svg height="112pt" viewBox="0 -38 512 512" width="112pt" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="m180 0h-160c-11.046875 0-20 8.953125-20 20v160c0 11.046875 8.953125 20 20 20h160c11.046875 0 20-8.953125 20-20v-160c0-11.046875-8.953125-20-20-20zm-20 160h-120v-120h120zm76-98c0-11.046875 8.953125-20 20-20h236c11.046875 0 20 8.953125 20 20s-8.953125 20-20 20h-236c-11.046875 0-20-8.953125-20-20zm276 76c0 11.046875-8.953125 20-20 20h-236c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h236c11.046875 0 20 8.953125 20 20zm-332 98h-160c-11.046875 0-20 8.953125-20 20v160c0 11.046875 8.953125 20 20 20h160c11.046875 0 20-8.953125 20-20v-160c0-11.046875-8.953125-20-20-20zm-20 160h-120v-120h120zm352-98c0 11.046875-8.953125 20-20 20h-236c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h236c11.046875 0 20 8.953125 20 20zm0 76c0 11.046875-8.953125 20-20 20h-236c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h236c11.046875 0 20 8.953125 20 20zm0 0" />
                  </svg>
                </i>
              </button>
              <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                <i>
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                    xml:space="preserve">
                    <path d="M0,0v237.268h237.268V0H0z M199.805,199.805H37.463V37.463h162.341V199.805z" />
                    <path d="M274.732,0v237.268H512V0H274.732z M474.537,199.805H312.195V37.463h162.341V199.805z" />
                    <path d="M0,274.732V512h237.268V274.732H0z M199.805,474.537H37.463V312.195h162.341V474.537z" />
                    <path
                      d="M274.732,274.732V512H512V274.732H274.732z M474.537,474.537H312.195V312.195h162.341V474.537z" />
                  </svg>
                </i>
              </button>
            </div>
          </div>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <ul>
              <li class="grid-list">
                <div class="d-flex align-items-center">
                  <img alt="product" src="https://placehold.co/110x118">
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Mattalic Latex Balloons</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$12.61</h6>
                  </div>
                </div>
                <div class="grid-list-text">
                  <ul class="color">
                    <li class="purple"></li>
                    <li class="blue"></li>
                    <li class="orange"></li>
                  </ul>
                  <span>SKU 25-0458</span>
                  <div class="add-to-cart two">
                    <a href="#" class="btn"><span>Add to Cart</span></a>
                    <a href="#" class="heart-wishlist">
                      <i class="fa-regular fa-heart"></i>
                    </a>
                  </div>
                </div>
              </li>
              <li class="grid-list">
                <div class="d-flex align-items-center">
                  <img alt="product" src="https://placehold.co/110x118">
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Star Balloon Decoration</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$13.61</h6>
                  </div>
                </div>
                <div class="grid-list-text">
                  <ul class="color">
                    <li class="purple"></li>
                    <li class="blue"></li>
                    <li class="orange"></li>
                  </ul>
                  <span>SKU 25-0458</span>
                  <div class="add-to-cart two">
                    <a href="#" class="btn"><span>Add to Cart</span></a>
                    <a href="#" class="heart-wishlist">
                      <i class="fa-regular fa-heart"></i>
                    </a>
                  </div>
                </div>
              </li>
              <li class="grid-list">
                <div class="d-flex align-items-center">
                  <img alt="product" src="https://placehold.co/110x118">
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Star Balloon Decoration</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$15.61</h6>
                  </div>
                </div>
                <div class="grid-list-text">
                  <ul class="color">
                    <li class="purple"></li>
                    <li class="blue"></li>
                    <li class="orange"></li>
                  </ul>
                  <span>SKU 25-0458</span>
                  <div class="add-to-cart two">
                    <a href="#" class="btn"><span>Add to Cart</span></a>
                    <a href="#" class="heart-wishlist">
                      <i class="fa-regular fa-heart"></i>
                    </a>
                  </div>
                </div>
              </li>
              <li class="grid-list">
                <div class="d-flex align-items-center">
                  <img alt="product" src="https://placehold.co/110x118">
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>18" Round Foil Balloon</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$32.61</h6>
                  </div>
                </div>
                <div class="grid-list-text">
                  <ul class="color">
                    <li class="purple"></li>
                    <li class="blue"></li>
                    <li class="orange"></li>
                  </ul>
                  <span>SKU 25-0458</span>
                  <div class="add-to-cart two">
                    <a href="#" class="btn"><span>Add to Cart</span></a>
                    <a href="#" class="heart-wishlist">
                      <i class="fa-regular fa-heart"></i>
                    </a>
                  </div>
                </div>
              </li>
              <li class="grid-list">
                <div class="d-flex align-items-center">
                  <img alt="product" src="https://placehold.co/110x118">
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Mattalic Latex Balloons</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$18.61</h6>
                  </div>
                </div>
                <div class="grid-list-text">
                  <ul class="color">
                    <li class="purple"></li>
                    <li class="blue"></li>
                    <li class="orange"></li>
                  </ul>
                  <span>SKU 25-0458</span>
                  <div class="add-to-cart two">
                    <a href="#" class="btn"><span>Add to Cart</span></a>
                    <a href="#" class="heart-wishlist">
                      <i class="fa-regular fa-heart"></i>
                    </a>
                  </div>
                </div>
              </li>
              <li class="grid-list end">
                <div class="d-flex align-items-center">
                  <img alt="product" src="https://placehold.co/110x118">
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>18" Round Foil Balloon</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$20.61</h6>
                  </div>
                </div>
                <div class="grid-list-text">
                  <ul class="color">
                    <li class="purple"></li>
                    <li class="blue"></li>
                    <li class="orange"></li>
                  </ul>
                  <span>SKU 25-0458</span>
                  <div class="add-to-cart two">
                    <a href="#" class="btn"><span>Add to Cart</span></a>
                    <a href="#" class="heart-wishlist">
                      <i class="fa-regular fa-heart"></i>
                    </a>
                  </div>
                </div>
              </li>
              <ul>
                <div class="pagination-gap three">
                  <ul id="border-pagination">
                    <li class="ps-0"><a href="javascript:void(0)"><i class="fa-solid fa-angle-left"></i></a></li>
                    <li><a href="javascript:void(0)" class="active">01</a></li>
                    <li><a href="javascript:void(0)">02</a></li>
                    <li>....</li>
                    <li><a href="javascript:void(0)">08</a></li>
                    <li><a href="javascript:void(0)"><i class="fa-solid fa-angle-right"></i></a></li>
                  </ul>
                </div>
              </ul>
          </div>
          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <div class="row list">
              <div class="col-md-4 col-sm-6">
                <div class="recent-product-two">
                  <div class="recent-product-two-img">
                    <img alt="product" src="https://placehold.co/174x190">
                  </div>
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Love Script Silver Baloon</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$18.61</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="recent-product-two">
                  <div class="recent-product-two-img">
                    <img alt="product" src="https://placehold.co/174x190">
                    <ul class="color">
                      <li class="purple"></li>
                      <li class="blue"></li>
                      <li class="orange"></li>
                    </ul>
                  </div>
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Mattalic Latex Balloons</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$42.61</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="recent-product-two">
                  <div class="recent-product-two-img">
                    <img alt="product" src="https://placehold.co/174x190">
                  </div>
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Star Balloon Decoration</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$18.61</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="recent-product-two">
                  <div class="recent-product-two-img">
                    <img alt="product" src="https://placehold.co/174x190">
                    <ul class="color">
                      <li class="purple"></li>
                      <li class="blue"></li>
                      <li class="orange"></li>
                    </ul>
                  </div>
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Star Balloon Decoration</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$42.61</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="recent-product-two">
                  <div class="recent-product-two-img">
                    <img alt="product" src="https://placehold.co/174x190">
                  </div>
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Love Script Silver Baloon</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$18.61</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="recent-product-two">
                  <div class="recent-product-two-img">
                    <img alt="product" src="https://placehold.co/174x190">
                    <ul class="color">
                      <li class="purple"></li>
                      <li class="blue"></li>
                      <li class="orange"></li>
                    </ul>
                  </div>
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>18" Round Foil Balloon</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$42.61</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="recent-product-two">
                  <div class="recent-product-two-img">
                    <img alt="product" src="https://placehold.co/174x190">
                  </div>
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Star Balloon Decoration</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$18.61</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="recent-product-two">
                  <div class="recent-product-two-img">
                    <img alt="product" src="https://placehold.co/174x190">
                    <ul class="color">
                      <li class="purple"></li>
                      <li class="blue"></li>
                      <li class="orange"></li>
                    </ul>
                  </div>
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Mattalic Latex Balloons</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$42.61</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="recent-product-two">
                  <div class="recent-product-two-img">
                    <img alt="product" src="https://placehold.co/174x190">
                  </div>
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Mattalic Latex Balloons</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$18.61</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="recent-product-two">
                  <div class="recent-product-two-img">
                    <img alt="product" src="https://placehold.co/174x190">
                    <ul class="color">
                      <li class="purple"></li>
                      <li class="blue"></li>
                      <li class="orange"></li>
                    </ul>
                  </div>
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Mattalic Latex Balloons</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$42.61</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="recent-product-two">
                  <div class="recent-product-two-img">
                    <img alt="product" src="https://placehold.co/174x190">
                  </div>
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Love Script Silver Baloon</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$18.61</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="recent-product-two">
                  <div class="recent-product-two-img">
                    <img alt="product" src="https://placehold.co/174x190">
                    <ul class="color">
                      <li class="purple"></li>
                      <li class="blue"></li>
                      <li class="orange"></li>
                    </ul>
                  </div>
                  <div class="weekly-sellers-text">
                    <span>LATEX BALLOONS</span>
                    <a href="product-details.html">
                      <h5>Mattalic Latex Balloons</h5>
                    </a>
                    <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <h6>$42.61</h6>
                  </div>
                </div>
              </div>
              <div class="pagination-gap">
                <ul id="border-pagination">
                  <li class="ps-0"><a href="javascript:void(0)"><i class="fa-solid fa-angle-left"></i></a></li>
                  <li><a href="javascript:void(0)" class="active">01</a></li>
                  <li><a href="javascript:void(0)">02</a></li>
                  <li>....</li>
                  <li><a href="javascript:void(0)">08</a></li>
                  <li><a href="javascript:void(0)"><i class="fa-solid fa-angle-right"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php
get_footer();
?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- import CSS -->
        <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <el-container id="app">

            <el-header :style="{fontSize: '20px', lineHeight: '60px'}">
                <a href="https://github.com/YeeunYou/Vue.js-basic-ecommerce" target="_blank">
                    <i class="fab fa-github" :style="{marginRight: '10px'}"></i>
                </a>
                Basic photo album page with Vue.js
            </el-header>

            <el-main>
                <el-row :gutter="20" type="flex" justify="center">

                    <el-col :span="14">
                        <div>
                            @{{ productStatus }}
                        </div>
                        {{-- Display Products associated with the selected category --}}
                        <el-col :span="12" v-show="selectedCategoryId === product.categoryId"
                            v-for="product in products"
                            :key="product.id">
                            <h1>@{{ product.name }}</h1>
                            <img :src="product.image"
                                 :alt="product.name"
                                 style="width: 100%; max-width: 500px"
                                 @click="selectProduct(product.id)">

                            {{--<div v-if="!product.quantity">--}}
                                {{--<i class="far fa-envelope"></i>--}}
                                {{--Email me when in stock--}}
                            {{--</div>--}}
                            {{--<div v-else-if="product.quantity < 3">--}}
                                {{--Hurry! Only @{{ product.quantity }} left--}}
                            {{--</div>--}}
                            {{--<div v-else>--}}
                                {{--@{{ product.quantity }} left--}}
                            {{--</div>--}}
                        </el-col>
                    </el-col>

                    <el-col :span="6">
                        {{-- Display Colour Categories --}}
                        <h1>Colour Themes</h1>
                        <div v-for="category in categories"
                             :key="category.id"
                             :style="{backgroundColor: category.color}"
                             style="width: 100px; height: 100px; margin-right: 15px; display: inline-block;"
                             @mouseover="selectCategory(category.id)">
                        </div>
                    </el-col>

                </el-row>
            </el-main>

        </el-container>

        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

        <!-- import JavaScript -->
        <script src="https://unpkg.com/element-ui/lib/index.js"></script>

        <script>

            let app = new Vue({
                el: '#app',
                data: {
                    products: [
                        {
                            id: 0,
                            name: 'Dinosaur Wallpaper',
                            quantity: 7,
                            image: '/images/blue-dinosaur.jpg',
                            categoryId: 0,
                        },
                        {
                            id: 1,
                            name: 'Flowers with Mint Background Wallpaper',
                            quantity: 0,
                            image: '/images/blue-flower.jpg',
                            categoryId: 0,
                        },
                        {
                            id: 2,
                            name: 'Single Flower Wallpaper',
                            quantity: 2,
                            image: '/images/blue-single-flower.jpg',
                            categoryId: 0,
                        },
                        {
                            id: 3,
                            name: 'Flowers with Pink Background Wallpaper',
                            quantity: 2,
                            image: '/images/pink-flower.jpg',
                            categoryId: 1,
                        },
                        {
                            id: 4,
                            name: 'Pink Headphone Wallpaper',
                            quantity: 0,
                            image: '/images/pink-headphone.jpg',
                            categoryId: 1,
                        },
                        {
                            id: 5,
                            name: 'Pink Flowers with Yellow Background Wallpaper',
                            quantity: 10,
                            image: '/images/yellow-pinkflower.jpg',
                            categoryId: 2,
                        },
                        {
                            id: 6,
                            name: 'Yellow Flowers with Yellow Background Wallpaper',
                            quantity: 6,
                            image: '/images/yellow-yellowflower.jpg',
                            categoryId: 2,
                        },
                    ],
                    categories: [
                        {
                            id: 0,
                            color: '#A5CFCB'    // Blue colour
                        },
                        {
                            id: 1,
                            color: '#F5B4B2'    // Pink colour
                        },
                        {
                            id: 2,
                            color: '#F8DA92'    // Yellow colour
                        },
                    ],
                    selectedCategoryId: 0,   // By default, I set the selected category to 0 (blue colour)
                    selectedProducts: [],
                },
                methods: {
                    // Passes the index of the category user hovered over
                    selectCategory(id){
                        // Changed selected category id to (colorIndex)
                        // This will then display products of the selected category
                        this.selectedCategoryId = id;
                    },
                    // Passes the index of selected product
                    selectProduct(id){
                        alert('test');
                        this.selectedProducts.push(id);
                        console.log(this.selectedProducts());
                    }
                },
                computed: {
                    productStatus(){
                        // Loop through this.products array to get object data
                        this.products.forEach((product) => {
                            if(!product.quantity){
                                console.log('test');
                                return 'test';
                            }else if(product.quantity < 3){
                                console.log('test2');
                                return 'test2';
                            }else{
                                console.log('test3');
                                return 'test3';
                            }
                        });
                    },
                },
            });

        </script>

    </body>
</html>

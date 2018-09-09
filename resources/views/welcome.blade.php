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
        <div id="app">

            <div class="content">

                {{-- Display Colour Categories --}}
                <div v-for="category in categories"
                     :key="category.id"
                     :style="{backgroundColor: category.color}"
                     style="width: 100px; height: 100px; margin-right: 15px; display: inline-block;"
                     @mouseover="selectCategory(category.id)">
                </div>

                {{-- Display Products associated with the selected category --}}
                <ul>
                    <li v-if="selectedCategoryId === product.categoryId"
                        v-for="product in products"
                        :key="product.id">
                        <img :src="product.image"
                             :alt="product.name"
                             style="width: 500px;"
                             @click="selectProduct(product.id)">
                        <h1>@{{ product.name }}</h1>
                        <span v-if="!product.quantity">
                            <i class="far fa-envelope"></i>
                            Email me when in stock
                        </span>
                        <span v-else-if="product.quantity < 3">
                            Hurry! Only @{{ product.quantity }} left
                        </span>
                        <span v-else>
                            @{{ product.quantity }} left
                        </span>
                    </li>
                </ul>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

        <script>

            let app = new Vue({
                el: '#app',
                data: {
                    products: [
                        {
                            id: 0,
                            name: 'Dinosaur Wallpaper',
                            quantity: 5,
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
                            name: 'Flowers with Pink Background Wallpaper',
                            quantity: 2,
                            image: '/images/pink-flower.jpg',
                            categoryId: 1,
                        },
                        {
                            id: 3,
                            name: 'Pink Headphone Wallpaper',
                            quantity: 0,
                            image: '/images/pink-headphone.jpg',
                            categoryId: 1,
                        },
                        {
                            id: 4,
                            name: 'Pink Flowers with Yellow Background Wallpaper',
                            quantity: 10,
                            image: '/images/yellow-pinkflower.jpg',
                            categoryId: 2,
                        },
                        {
                            id: 5,
                            name: 'Yellow Flowers with Yellow Background Wallpaper',
                            quantity: 6,
                            image: '/images/yellow-yellowflower.jpg',
                            categoryId: 2,
                        },
                    ],
                    categories: [
                        {
                            id: 0,
                            color: '#5EC7CD'    // Blue colour
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
                },
            });

        </script>

    </body>
</html>

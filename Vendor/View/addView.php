<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Add</title>
    <!-- Bootstrap CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="min-h-screen flex flex-col">
    <nav class="flex-none m-3 flex h-16 items-center justify-evenly border-b-2 border-black" style="height: fit-content;">
        <div class="flex-1 p-6">
            <h1 class="text-3xl">Product Add</h1>
        </div>
        <div class="flex flex-1 p-4 items-center justify-end">
            <button class="m-2 border-2 border-black p-2">Save</button>
            <button id="mass_delete" class="m-2 border-2 border-black p-2"><a href="/scandiweb/product/list" >Cancel</a></button>
        </div>
    </nav>
    <section class="flex-auto flex flex-row flex-wrap content-start" style="height: 400px!important;overflow: scroll;">

        <form>
            <div class="m-5 grid grid-cols-2">
                <label>SKU</label>
                <input id="sku" class="border-black border-2 pl-3" type="text" require />
            </div>

            <div class="m-5 grid grid-cols-2">
                <label>Name</label>
                <input id="name" class="border-black border-2 pl-3" type="text" require />
            </div>

            <div class="m-5 grid grid-cols-2">
                <label>Price ($)</label>
                <input id="price" class="border-black border-2 pl-3" type="text" require />
            </div>

            <div class="m-5 grid grid-cols-2">
                <label>Type Switcher</label>
                <select id="type" class="border-black border-2" type="text" require>
                    <option value="default" selected disabled>Type Switcher</option>
                    <option value="Book">Book</option>
                    <option value="Disc">Disc</option>
                    <option value="Furniture">Furniture</option>
                </select>
            </div>

            <div id="typeprams">

            </div>

        </form>

    </section>
    <footer class="flex-none border-t-2 border-black m-3">
        <div class="text-center w-full">ScandiWeb Test assignment</div>
    </footer>
    <script src="/scandiweb/public/addView.js" defer></script>
</body>

</html>
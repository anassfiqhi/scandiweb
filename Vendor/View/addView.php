<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Add</title>
    <!-- TailWind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="min-h-screen flex flex-col">
    <nav class="flex-none m-3 flex h-16 items-center justify-evenly border-b-2 border-black" style="height: fit-content;">
        <div class="flex-1 p-6">
            <h1 class="text-3xl">Product Add</h1>
        </div>
        <div class="flex flex-1 p-4 items-center justify-end">
            <button id="save" class="m-2 border-2 border-black p-2">Save</button>
            <button id="cancel" class="m-2 border-2 border-black p-2"><a href="/scandiweb/product/list" >Cancel</a></button>
        </div>
    </nav>
    <section class="flex-auto flex flex-row flex-wrap content-start" style="height: 400px!important;overflow: scroll;">

        <form id="form" onsubmit="event.preventDefault()">
            <div class="m-5 grid grid-cols-2">
                <label for="sku">SKU</label>
                <input id="sku" class="border-black border-2 pl-3" type="text" required pattern="^[A-Za-z0-9]+$" />
            </div>

            <div class="m-5 grid grid-cols-2">
                <label for="name">Name</label>
                <input id="name" class="border-black border-2 pl-3" type="text" required />
            </div>

            <div class="m-5 grid grid-cols-2">
                <label for="price">Price ($)</label>
                <input id="price" class="border-black border-2 pl-3" type="text" required pattern="^[0-9]+([.][0-9])*$" />
            </div>

            <div class="m-5 grid grid-cols-2">
                <label for="type"> Type Switcher </label>
                <select id="type" class="border-black border-2" type="text" required>
                    <option value="" selected disabled >Type Switcher</option>
                    <option value="Book">Book</option>
                    <option value="Disc">Disc</option>
                    <option value="Furniture">Furniture</option>
                </select>
            </div>

            <div id="typeprams" class="mt-9">

            </div>
            <div id="typemessage" class="text-center">

            </div>
            <input type="submit" id="submit" class="m-2 border-2 border-black p-2" value="Save" style="display: none;" />
        </form>

    </section>
    <footer class="flex-none border-t-2 border-black m-3">
        <div class="text-center w-full">ScandiWeb Test assignment</div>
    </footer>
    <script src="/scandiweb/public/js/addView.js" defer></script>
</body>

</html>
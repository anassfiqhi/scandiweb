<?//=$sku?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product List</title>
        <!-- TailWind CSS -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    </head>

    <body class="min-h-screen flex flex-col">
        <nav class="flex-none m-3 flex h-16 items-center justify-evenly border-b-2 border-black" style="height: fit-content;">
            <div class="flex-1 p-6">
                <h1 class="text-3xl" >Product List</h1>
            </div>
            <div class="flex flex-1 p-4 items-center justify-end">
                <button class="m-2 border-2 border-black p-2"><a href="/scandiweb/product/add">Add</a></button>
                <button id="mass_delete" class="m-2 border-2 border-black p-2">Mass Delete</button>
            </div>
        </nav>
        <section class="flex-auto flex flex-row flex-wrap justify-center content-start" style="height: 400px!important;overflow: scroll;">

            <?php
                foreach ($products as $key => $value) {
            ?> 
                <div id="product_<?=$value["sku"]?>" class="product p-3 m-2 border-2 border-black w-min cursor-pointer select-none" style="height: fit-content;width: fit-content;">
                    <input type="checkbox" value="<?=$value["sku"]?>" class="pointer-events-none" />
                    <div class="text-center">
                        <div> <?=$value["sku"]?> </div>
                        <div> <?=$value["name"]?> </div>
                        <div class="break-words" > <?= number_format ( $value["price"] , 2 ) ?> $</div>
                        <div>
                            <?php 
                                if($value["productType"] == "Book"){
                                    echo "Weight : ".$value["weight"]." KG";
                                }
                                elseif($value["productType"] == "Disc"){
                                    echo "Size : ".number_format ( $value["size"] )." MB";
                                }elseif($value["productType"] == "Furniture"){
                                    echo "Dimension : ".$value["width"]."x".$value["height"]."x".$value["length"];
                                }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
            

        </section>
        <footer class="flex-none border-t-2 border-black m-3">
            <div class="text-center w-full">ScandiWeb Test assignment</div>
        </footer>
        <script src="/scandiweb/public/js/listView.js" defer></script>
    </body>

    </html>
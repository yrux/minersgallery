<x-app-layout>
    <div class="brand_heading">
        <h1>Welcome to Miner's Gallery</h1>
        <p>
            Home of fine minerals, rock specimens, lapidary slabs, colored
            gems, crystals, minerals and metals from around the world.
        </p>
    </div>
    <div class="row newestItems">
        <div class="col-12">
            <h1 class="newestItems_heading">Newest Items</h1>
            <div class="newestItems_cards">
                @each('components.productcard',$products,'product')
            </div>
        </div>
    </div>
</x-app-layout>

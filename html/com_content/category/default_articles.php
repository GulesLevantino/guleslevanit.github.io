<section>
    <script defer>
        let select = document.getElementById("key-select");

        function change_sort() {
            let form = document.getElementById("form-data");
            form.submit();
        }
    </script>
			<div class="name-page">Каталог Товаров</div>
			<div class="sort">
                <form action="" id="form-data">
                    <label class="sort-text">Сортировать по:</label>
                    <select class="sort-filter" name="sort" onchange="change_sort()">
                        <option value="price-up">Цена по возрастанию</option>
                        <option value="price-down">Цена по убыванию</option>
                        <option value="popular">Популярные</option>
                    </select>
                </form>
			</div>
            <?
                $counter = 0;

                function sort1($a, $b) {
                    return($b->jcfields[1]->value - $a->jcfields[1]->value);
                }

                function sort2($a, $b) {
                    return($a->jcfields[1]->value - $b->jcfields[1]->value);
                }

                function sort3($a, $b) {
                    return($b->hits - $a->hits);
                }

                if (isset($_GET["sort"])) {
                    if ($_GET["sort"] == "price-up") {
                        usort($this->items, "sort1");
                    }

                    if ($_GET["sort"] == "price-down") {
                        usort($this->items, "sort2");
                    }

                    if ($_GET["sort"] == "popular") {
                        usort($this->items, "sort3");
                    }
                }
                
            ?>

            <?foreach($this->items as $item) :?>
                <?if ($counter % 4 == 0) :?>
                    <?if ($counter != 0 && $counter % 4 == 0) :?>
                        </div>
                    <?endif;?>
                    <div class="smartphones">
                <?endif;?>

                <div class="apple-phone">
					<a href="/index.php/products/<?=$item->alias?>"><img src="<?=json_decode($item->images)->image_intro?>" alt=""></a>
					<p class="product-name-phone"><?=$item->title?></p>
					<p class="price-catalog">от <?=$item->jcfields[1]->value?> ₽</p>
				</div>

                <?$counter++;?>
            <?endforeach;?>
			
		</section>
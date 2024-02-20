<?if (strpos($_SERVER["REQUEST_URI"], "products")) {?>
<section>
			<h6> <a href="/index.php/products" class="main-link">Каталог</a> / <?=$this->item->title?></h6>
			
			<div class="product_and_information">
				<div class="image-product">
					<img src="<?=json_decode($this->item->images)->image_intro?>" alt="">
				</div>
				<div class="information-product">
					<h1 class="name-product"><?=$this->item->title?></h1>
					<div class="color-product">
						<h5>Цвет:</h5>
						<div class="color">
                            <?
                                $colors = explode(",", $this->item->jcfields[3]->value);

                                foreach($colors as $color) {
                                    ?>
                                        <a href="#"><div class="color_black" style="background: <?=$color?>;"></div></a>
                                    <?
                                }
                            ?>
							<!-- <a href="#"><div class="color_black"></div></a>
							<a href="#"><div class="color_red"></div></a>
							<a href="#"><div class="color_green"></div></a>
							<a href="#"><div class="color_blue"></div></a>
							<a href="#"><div class="color_grey"></div></a> -->
						</div>
					</div>
					<div class="memory-product">
						<h5>Память:</h5>
						<div class="memory">
							<p class="memory-number"><a href="#"><?=$this->item->jcfields[2]->value?></a></p>
						</div>
					</div>
					<div class="price-product">
						<p class="price-product-text"><?=$this->item->jcfields[1]->value?> ₽
					</p></div>
					<div class="">
						<a href="#" class="purchase">Добавить товар в корзину</a>

					</div>
				</div>	
			</div>
		</section>
		<article>
			<div class="different-functions">
				<div class="different-functions-text">
					<a href="#"><p>Описание</p></a>
					<a href="#"><p>Характеристики</p></a>
					<a href="#"><p>Аксессуары</p></a>
					<a href="#"><p>Отзывы</p></a>
				</div>
			</div>
            <p><?=$this->item->introtext?></p>
		</article>
        <? } else {
            echo ($this->item->introtext);
        }
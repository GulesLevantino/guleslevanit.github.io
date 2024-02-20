<?

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

$app   = Factory::getApplication();
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');

if ($this->params->get('logoFile')) {
    $logo = HTMLHelper::_('image', Uri::root(false) . htmlspecialchars($this->params->get('logoFile'), ENT_QUOTES), $sitename, ['loading' => 'eager', 'decoding' => 'async'], false, 0);
} elseif ($this->params->get('siteTitle')) {
    $logo = '<span title="' . $sitename . '">' . htmlspecialchars($this->params->get('siteTitle'), ENT_COMPAT, 'UTF-8') . '</span>';
} else {
    $logo = HTMLHelper::_('image', 'logo.svg', $sitename, ['class' => 'logo d-inline-block', 'loading' => 'eager', 'decoding' => 'async'], true, 0);
}

$app   = Factory::getApplication();
$input = $app->getInput();
$wa    = $this->getWebAssetManager();

// $wa->useStyle('registration');
// $wa->useStyle('help');
// $wa->useStyle('login');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
</head>
<body>
<?php if ($this->countModules('menu', true)) : ?>
    <header>
		<div class="wrap">
            <?php if ($this->params->get('brand', 1)) : ?>
                <a class="all-link" href="<?php echo $this->baseurl; ?>/">
                    <?php echo $logo; ?>
                </a>
            <?php endif; ?>

            <nav>
				<ul>

                    
                        <jdoc:include type="modules" name="search" />
                    

                    <?php if ($this->countModules('menu', true)) : ?>
                        <jdoc:include type="modules" name="menu" />
                    <?php endif; ?>
					<!-- <li class="center">
						<form action="#">
							<div class="nav__search">
								<input type="text" placeholder="Поиск по сайту">
								<button>
									<img src="assets/icons/search.png" alt="">
								</button>
							</div>
						</form>
					</li> -->
							<!-- <li class="right">
								<p class="left-text"><a href="catalog.html" class="all-link"><b>Каталог</b></a></p>
							   <p class="left-text"> <a href="#" class="all-link"><b>Услуги</b></a></p>
							   <p class="left-text"> <a href="#" class="all-link"><b>Поддержка</b></a></p>
								<div class="cities" onclick="open_cities()">
									<a href="#"><img src="assets/icons/location.png" alt="" class="nav__icon"></a>
									<div class="nav__text">Муром</div>
								</div>
								<div>
									<a href="#"><img src="assets/icons/cart.png" alt="" class="nav__icon"></a>
								</div>
									<div>
										<img src="assets/icons/login.png" alt="" class="nav__icon">
										<div class="nav__text"><a href="login.html" class="all-link">Войти</a></div>
									</div>
							</li> -->
						</ul>
					</nav>
				</div>
			</header>

            <?php endif; ?>
            <?if (strpos($_SERVER["REQUEST_URI"], "products")) {
                $wa->useStyle('catalog');
                $wa->useStyle('product_card');
            } else {
                $wa->useStyle('main');
            } ?>

<?if (strpos($_SERVER["REQUEST_URI"], "about")) {
                $wa->useStyle('help');
            } else {
                $wa->useStyle('main');
            } ?>

<?if (strpos($_SERVER["REQUEST_URI"], "login")) {
                $wa->useStyle('login');
            } else {
                $wa->useStyle('main');
            } ?>
    <!-- <header>
        <div class="wrap">
            <?php if ($this->params->get('brand', 1)) : ?>
                <a class="all-link" href="<?php echo $this->baseurl; ?>/">
                    <?php echo $logo; ?>
                </a>
            <?php endif; ?>
            <nav>

            </nav>
            <?php if ($this->countModules('menu', true)) : ?>
                <nav role="navigation" class="navigatio-m">
                    <jdoc:include type="modules" name="menu" />
                </nav>
            <?php endif; ?>

            <?php if ($this->countModules('shop', true)) : ?>
                <jdoc:include type="modules" name="shop" />
            <?php endif; ?>
        </div>
    </header> -->

    <jdoc:include type="component" />

    <?php if ($this->countModules('about', true)) : ?>
        <jdoc:include type="modules" name="about" />
    <?endif;?>

    <?php if ($this->countModules('brands', true)) : ?>
        <jdoc:include type="modules" name="brands" />
    <?php endif; ?>

    <?php if ($this->countModules('lastProd', true)) : ?>
        <jdoc:include type="modules" name="lastProd" />
    <?php endif; ?>

    <?php if ($this->countModules('news', true)) : ?>
        <jdoc:include type="modules" name="news" />
    <?php endif; ?>

    <?php if ($this->countModules('help', true)) : ?>
        <jdoc:include type="modules" name="help" />
    <?php endif; ?>

    <?php if ($this->countModules('login', true)) : ?>
        <jdoc:include type="modules" name="login" />
    <?php endif; ?>

    <?php if ($this->countModules('footer', true)) : ?>
        <jdoc:include type="modules" name="footer" />
    <?php endif; ?>
</body>
</html>

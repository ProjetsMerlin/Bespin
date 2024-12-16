<?php
if ( ! defined( 'ABSPATH' ) ) {
exit;
}
?>
<?php get_header();?>
<?php
if (get_field('css') ) {
$css = get_field('css');
echo '<style>' . $css . '</style>';
}
?>
<div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">

    <?php get_template_part('template-parts/content','sidebar');?>

    <div class="flex flex-col flex-1">

        <?php get_template_part('template-parts/content','header');?>

        <main class="flex-1 bg-gray-200 overflow-auto">
            <div class="container px-6 py-8 mx-auto">
                <h3 class="text-5xl font-medium text-gray-700 text-center">
                    <?= get_the_title();?>
                </h3>
                <section class="m-auto max-w-5xl">
                    <div
                        class="description my-8 <?php if ( is_single()) : echo "flex"; endif; ?> justify-center container-md">
                        <?= apply_filters('the_content', get_the_content());?>
                    </div>
                    <div class="flex justify-center container-md">
                        <ul class="js_tabs mb-5 flex list-none flex-row flex-wrap border-b-0 ps-0" role="tablist"
                            data-twe-nav-ref>
                            <?php foreach(TYPES as $key => $type) : ?>
                            <?php if( !empty ( get_field($type) ) ) : ?>
                            <li role="presentation">
                                <a href="<?= $type; ?>" class="<?php if(intval($key) === 0) : echo "isolate border-transparent bg-neutral-100"; endif; ?> my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-2xl
                                        font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent
                                        hover:bg-neutral-100 focus:isolate focus:border-transparent dark:text-white/50 dark:hover:bg-neutral-700/60
                                        dark:data-twe-nav-active:text-primary">
                                    <?= $names[$key]; ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <?php foreach(TYPES as $key => $type) : ?>
                    <?php if( $type !== "html" ) : ?>
                    <div id="<?= $type;?>" class="js_tabContent mb-6"
                        <?php if( intval($key) !== 0): echo 'style="display: none;"'; endif; ?>>
                        <div class="relative opacity-100 transition-opacity duration-150 ease-linear">
                            <span class="copy" data-element="pre">
                                <?= file_get_contents(get_stylesheet_directory_uri() . '/assets/icons/copy.svg');?>
                            </span>
                            <pre id="pre"
                                class="<?= $code[$type];?>"><code><?php if( $type === "html_visible" ) : echo htmlspecialchars(get_field($type,false,true,true)); else : echo get_field($type); endif ; ?></code></pre>
                        </div>
                    </div>
                    <?php else : ?>
                    <div id="html" class="js_tabContent mb-6">
                        <div class="opacity-100 transition-opacity duration-150 ease-linear">
                            <?= get_field("html") ; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach;?>
                </section>
            </div>
        </main>
    </div>
</div>
<?php
if (get_field('js') ) {
$script = get_field('js');
echo '<script>' . $script . '</script>';
}
?>

<?php get_footer()?>
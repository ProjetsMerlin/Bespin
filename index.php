<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
?>
<?php get_header();?>
<div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">

    <?php get_template_part('template-parts/content','sidebar');?>

    <div class="flex flex-col flex-1">

        <?php get_template_part('template-parts/content','header');?>

        <main class="flex-1 overflow-auto bg-gray-200">
            <div class="container px-6 py-8 mx-auto">
                <h3 class="text-7xl font-medium text-gray-700 text-center">
                    <?= run_title();?>
                </h3>
                <p class="my-4 text-2xl text-gray-500 text-center">
                    <?= run_category();?>
                </p>
                <?php if(true === is_404()) : ?>
                    <p class="mt-8 text-center">
                        <?= __("Désolé, mais cette page n'existe plus ou n'a jamais existée", 'bespin') ; ?>
                    </p>
                <?php else : ?>
                <?php get_template_part('template-parts/content', "loop" );?>
                <?php endif;?>
            </div>
        </main>
    </div>
</div>

<?php get_footer()?>
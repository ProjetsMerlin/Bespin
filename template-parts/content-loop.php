<div class="mt-4">
    <?php if (have_posts()) : ?>
    <div class="flex flex-wrap -mx-6 mt-8">
        <?php while ( have_posts( ) ) : the_post();?>
        <a href="<?= get_the_permalink(); ?>" class="w-full px-6 sm:w-1/2 xl:w-1/3 mb-4" title="<?= get_the_title();?>">
            <div class="opacity-85 hover:opacity-100 flex items-center px-5 py-6 bg-white rounded-md shadow-sm card">
                <div
                    class="p-3 bg-opacity-75 rounded-full icon_category <?php if (get_the_category(get_the_ID())) : echo 'bg_'. get_the_category(get_the_ID())[0]->slug; else : echo 'bg_orange'; endif; ?>">
                    <?php if( get_post_type() === "post" ) : ?>
                    <?= file_get_contents(get_stylesheet_directory_uri() . '/assets/icons/'. get_the_category(get_the_ID())[0]->slug . '.svg');?>
                    <?php else : ?>
                    <?= file_get_contents(get_stylesheet_directory_uri() . '/assets/icons/bespin.svg');?>
                    <?php endif;?>
                </div>
                <div class="mx-5">
                    <h4 class="text-2xl font-semibold text-gray-700">
                        <?= get_the_title(); ?>
                    </h4>
                    <div class="text-gray-500">
                        <?= get_the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </a>
        <?php endwhile;?>
    </div>
    <?php else : ?>
    <p class="mt-8 text-center">
        <?= __("Désolé, votre demande n'a retourné aucun résultats", 'bespin') ; ?>
    </p>
    <div class="mt*8 text-center">
        <p class="mt-8 mb-8 block w-full">
            <?php _e('Réaliser une autre recherche ?', "bespin") ; ?>
        </p>
        <?php get_template_part('template-parts/content','searchform');?>
    </div>
    <?php endif; ?>
</div>
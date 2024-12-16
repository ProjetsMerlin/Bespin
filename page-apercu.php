<?php
/* Template name: apercu */
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
?>
<?php get_header();?>
<div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">

    <?php get_template_part('template-parts/content','sidebar');?>

    <div class="flex flex-col flex-1">

        <?php get_template_part('template-parts/content','header');?>

        <main class="flex-1 bg-gray-200 overflow-auto">
            <div class="container px-6 py-8 mx-auto">
                <h3 class="text-7xl font-medium text-gray-700 text-center">
                    <?= run_title();?>
                </h3>

                <div class="flex flex-col mt-8">
                    <div class="py-2 -my-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div class="inline-block min-w-full align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            <?= __("Titre", 'bespin') ; ?>
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            <?= __("Description", 'bespin') ; ?>
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            <?= __("Status", 'bespin') ; ?>
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            <?= __("Catégorie", 'bespin') ; ?>
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50" aria-hidden="true">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <?php
                                    $args = array( 
                                        "type" => "post",
                                        "status" => "publish",
                                        'orderby' => 'date',
                                        'order' => 'desc'
                                    );
                                    $the_query = new WP_Query( $args );
                                    ?>
                                    <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <!-- thumnnail flex-shrink-0 w-10 h-10  ? -->
                                                <div class="hidden">
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                        alt="<?= get_the_title(); ?>">
                                                </div>
                                                <div class="ml-4">
                                                    <a href="<?= get_the_permalink(); ?>"
                                                        class="text-sm font-medium leading-5 text-gray-900">
                                                        <?= get_the_title(); ?>
                                                    </a>
                                                    <div class="text-sm leading-5 text-gray-500">
                                                        <?= get_the_date(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">
                                                <?= get_the_excerpt(); ?>
                                            </div>
                                            <div class="text-sm leading-5 text-gray-500">
                                                <a
                                                    href="<?= site_url("/author/" . get_the_author_meta("display_name", get_current_user_id() ) ) ;?>">
                                                    <?= ucfirst(get_the_author_meta("display_name", get_current_user_id() ) );?>
                                                </a>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                <?= ucfirst ( get_post_status() ) ; ?>
                                            </span>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            <?= get_the_category()[0]->cat_name; ?>
                                        </td>
                                        <?php $url_edit = "/wp-admin/post.php?post=".get_the_id()."&action=edit"; ?>
                                        <td
                                            class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                            <a href="<?php if ( empty (get_current_user_id() ) ) : echo get_the_permalink(); else : echo site_url($url_edit); endif;?>"
                                                class="text-orange-600 hover:text-indigo-900">
                                                <?php if ( empty (get_current_user_id() ) ) : ?>
                                                <?= __("Voir", 'bespin');?>
                                                <?php else : ?>
                                                <?= __("Éditer", 'bespin');?>
                                                <?php endif; ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endwhile;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php get_footer()?>
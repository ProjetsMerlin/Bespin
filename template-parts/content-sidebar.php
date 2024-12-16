<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
    class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed inset-y-0 left-0 z-30 w-64 transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
            <img width="24" src="<?= get_stylesheet_directory_uri(); ?>/favicon.png" alt="">
            <a href="<?= site_url(); ?>" title="<?= get_bloginfo("name");?>"
                class="mx-2 text-2xl font-semibold text-white">
                <?= get_bloginfo("name");?>
            </a>
        </div>
    </div>

    <nav class="mt-10">
        <?php foreach((get_categories()) as $category): ?>
        <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
            href="<?= site_url();?>/categories/<?= $category->slug;?>"><?= $category->cat_name;?></a>
        <?php endforeach;?>
    </nav>
</div>
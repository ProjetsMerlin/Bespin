<header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-orange-600">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
        </button>
        <?php get_template_part('template-parts/content','searchform');?>
    </div>

    <div class="flex items-center">
        <?= wp_nav_menu( array ( 
            "menu_class" => "menu flex",
        ));?>

        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = ! dropdownOpen"
                class="relative block w-8 h-8 rounded-full shadow focus:outline-none">
                <img class="object-cover w-full h-full" src="<?= get_avatar_url( get_current_user_id() ); ?>"
                    alt="<?= ucfirst(detail_admin("display_name"));?>"
                    title="<?= ucfirst(detail_admin("display_name"));?>" load="lazy">
            </button>

            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full"
                style="display: none;"></div>

            <div x-show="dropdownOpen"
                class="absolute right-0 z-10 w-48 mt-2 bg-white rounded-md shadow-xl"
                style="display: none;">
                <?php if ( !empty (get_current_user_id() ) ) : ?>
                <a href="<?= site_url();?>/author/<?= ucfirst(detail_admin("user_nicename"));?>"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-600 hover:text-white">
                    <?= __("Mes articles", 'bespin') ; ?>
                </a>
                <?php else : ?>
                <a href="<?= site_url('/wp-login.php?action=register'); ?>"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-600 hover:text-white">
                    <?= __("M'inscrire", 'bespin') ; ?>
                </a>
                <?php endif; ?>
                <?php if ( !empty (get_current_user_id() ) ) : ?>
                <a href="<?= site_url();?>/wp-admin"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-600 hover:text-white">
                    <?= __("Dashboard", 'bespin') ; ?>
                </a>
                <?php else : ?>
                <a href="<?= site_url();?>/login"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-600 hover:text-white">
                    <?= __("Connexion", 'bespin') ; ?>
                </a>
                <?php endif; ?>
                <?php if ( !empty (get_current_user_id() ) ) : ?>
                <a href="<?= site_url();?>/wp-login.php?action=logout"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-600 hover:text-white">
                    <?= __("Déconnexion", 'bespin') ; ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
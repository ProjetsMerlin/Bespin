<div class="relative mx-4 lg:mx-0">
    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
        <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
            <path
                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            </path>
        </svg>
    </span>
    <form role="search" method="get" class="search-form" action="<?= esc_url( home_url( '/' ) ) ; ?>">
        <label>
            <span class="screen-reader-text">
                <?= _x( 'Rechercher:', 'label' ); ?>
            </span>
            <input type="search" class="w-32 pl-10 pr-4 rounded-md form-input sm:w-64 focus:border-orange-600"
                placeholder="<?= esc_attr_x( 'Rechercher &hellip;', 'placeholder' ) ; ?>"
                value="<?= get_search_query() ; ?>" name="s" />
        </label>
        <input type="submit" class="search-submit" value="<?= esc_attr_x( 'Rechercher', 'submit button' ) ; ?>" />
    </form>
</div>
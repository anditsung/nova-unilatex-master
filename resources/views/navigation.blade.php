<nova-sidebar>
    <template>
        <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="var(--sidebar-icon)" class="heroicon-ui" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/></svg>
        <span class="sidebar-label">
            {{ __("Master") }}
        </span>
    </template>

    <template v-slot:menu>

        <li class="leading-wide mb-4 text-sm">
            <router-link
                :to="{
                    name: 'index',
                    params: {
                        resourceName: 'unit-types',
                    }
                }" class="text-white ml-8 no-underline dim">
                {{__("Unit Types")}}
            </router-link>
        </li>

        <li class="leading-wide mb-4 text-sm">
            <router-link
                :to="{
                    name: 'index',
                    params: {
                        resourceName: 'colors',
                    }
                }" class="text-white ml-8 no-underline dim">
                {{__("Colors")}}
            </router-link>
        </li>

    </template>
</nova-sidebar>

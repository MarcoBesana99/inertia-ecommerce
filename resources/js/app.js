require('./bootstrap');

// Import modules...
import { createApp, h } from 'Vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@Inertiajs/Inertia-vue3';
import { InertiaProgress } from '@Inertiajs/Progress';

const el = document.getElementById('app');

createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
})
    .mixin({ methods: { route } })
    .use(InertiaPlugin)
    .mount(el);

InertiaProgress.init({ color: '#4B5563' });

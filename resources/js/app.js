require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { VueLd } from 'vue-ld';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(VueLd,{
                clientSideId: '61d2f2fd59d4b50dc54b51cd',
                user: {
                    key: 'mizan@test.com',
                    email: 'mizan@test.com',
                    name: 'mizan@test.com',
                },
                options: {
                    // Standard LaunchDarkly JavaScript SDK options
                },
            })
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });

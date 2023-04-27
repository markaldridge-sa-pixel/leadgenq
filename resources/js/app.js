import {
    createApp,
    h
} from 'vue'
import {
    createInertiaApp
} from '@inertiajs/vue3'
createInertiaApp({
    progress: {
        color: '#29d',
    },
    resolve: name => require(`./Pages/${name}`),
    title: title => title ? `${title} - LeadGenQ` : 'LeadGenQ',
    setup({
        el,
        App,
        props,
        plugin
    }) {
        createApp({
                render: () => h(App, props)
            })
            .use(plugin)
            .mount(el)
    },
})

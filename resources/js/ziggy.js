const Ziggy = {"url":"http:\/\/localhost\/laravel-vue-quiz","port":null,"defaults":{},"routes":{"login":{"uri":"\/","methods":["GET","HEAD"]},"topics.quiz":{"uri":"topic\/quiz","methods":["GET","HEAD"]},"attend-quiz":{"uri":"quiz","methods":["GET","HEAD"]},"view-question":{"uri":"quiz\/{any}","methods":["GET","HEAD"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };

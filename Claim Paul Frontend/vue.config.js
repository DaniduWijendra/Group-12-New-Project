module.exports = {
  devServer: {
    disableHostCheck: true,
    //host: 'localhost',
    //proxy: 'http://localhost:8080',
    //proxy:'http://192.168.1.102:8080'
  },

  transpileDependencies: ['vuetify'],

  pluginOptions: {
    i18n: {
      locale: 'en',
      fallbackLocale: 'en',
      localeDir: 'locales',
      enableInSFC: false,
    },
  },
}

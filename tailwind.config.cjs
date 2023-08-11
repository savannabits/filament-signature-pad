const preset = require('./vendor/filament/filament/tailwind.config.preset')

module.exports = {
    presets: [preset],
    content: [
        './src/**/*.php',
        './resources/view/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
